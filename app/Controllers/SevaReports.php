<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\generalSevaModel;
use App\Models\UsersModel;
use App\Models\generalBookingModel;
use App\Models\ContactModel;
use App\Models\generalBookingSevaPriceModel;


class SevaReports extends ResourceController{

    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
	}
    
    public function index(){
    
        $temple_id = session()->get('temple');
        $role_id = session()->get('role_id');
        if($role_id == 4){ //super admin
            $model  = new TempleModel();
            $model->orderBy('id','DESC');
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;
        }
        else{
            $model  = new TempleModel();
            // $id = '1'; 
            $model->orderBy('id','DESC');
            $model->where('id',$temple_id);
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;
        }
        $model  = new UsersModel();
        $model->where('temple_id',$temple_id);
        $details  = $model->get()->getResultArray();
        $data['details'] = $details;

		return view('seva_reports',$data);
	}

    public function search_fun(){
        
        $temple_id = session()->get('temple');

        
        $option = $this->request->getVar('people[]');
        $booking_date_from1 = $this->request->getVar('booking_from');
        $booking_date_to1 = $this->request->getVar('booking_to');
        $seva_date_from1 = $this->request->getVar('seva_from');
        $seva_date_to1 = $this->request->getVar('seva_to');
        $status = $this->request->getVar('status');
        $payment = $this->request->getVar('payment_mode');
        $booked_by = $this->request->getVar('booked_by');
        
        

        // print_r($seva_date_from1);
        // print_r($seva_date_to1);
        // print_r($booking_date_from1);
        // print_r($booking_date_to1);
        // print_r($status);        
        // print_r($payment);
        // print_r($booked_by);

        // die();
        
        if(!empty($booking_date_from1) && !empty($booking_date_to1)){

            $booking_date_from = date('Y-m-d',strtotime($booking_date_from1));
            $booking_date_to = date('Y-m-d',strtotime($booking_date_to1));

             

            if($option[0] == 'General' && $option[1] == 'Endowment'){
                $type = 5;

                $seva_details1 = new bookingModel();
                $seva_details1->select('booking_details.*,booking_details.main_seva as seva_name,contact_details.name');
                $seva_details1->join('contact_details','booking_details.contact_id = contact_details.id');                 
                $seva_details1->where('booking_date >=',$booking_date_from);
                $seva_details1->where('booking_date <=',$booking_date_to);      
                $seva_details1->where('booking_details.temple_id',$temple_id);
                $data1 = $seva_details1->findAll();

                $seva_details2 = new generalSevaModel();
                $seva_details2->select('general_seva_booking_details.*,general_booking_contact_details.name');
                $seva_details2->join('general_booking_contact_details','general_seva_booking_details.gc_id = general_booking_contact_details.id');  
                $seva_details2->where('booking_date >=',$booking_date_from);
                $seva_details2->where('booking_date <=',$booking_date_to);      
                $seva_details2->where('general_seva_booking_details.temple_id',$temple_id);
                $data2 = $seva_details2->findAll();

                $data = array_merge($data1, $data2);
                // print_r($booking_date_from);
                // print_r($data1);
                // die();

            }else if($option[0] == 'Endowment'){
               
                $type = 2;                
                $seva_details  = new bookingModel();
                $seva_details->select('booking_details.*,contact_details.mobile_number');
                $seva_details->join('contact_details','booking_details.contact_id = contact_details.id');  
                $seva_details->where('booking_date >=',$booking_date_from);
                $seva_details->where('booking_date <=',$booking_date_to);      
                $seva_details->where('booking_details.temple_id',$temple_id);
                $data = $seva_details->findAll();

                // print_r($data);
                // die();

            }else if($option[0] == 'General'){

                // print_r($option[0]);
                // die();

                $type = 1;            
                $seva_details  = new generalSevaModel();
                $seva_details->select('general_seva_booking_details.*,general_booking_contact_details.name,general_booking_contact_details.mobile_number,general_booking_seva_price_details.total_amount,general_booking_seva_price_details.received_by');
                $seva_details->join('general_booking_seva_price_details', 'general_seva_booking_details.id = general_booking_seva_price_details.gsb_id');
                $seva_details->join('general_booking_contact_details','general_seva_booking_details.gc_id = general_booking_contact_details.id');
                $seva_details->where('general_seva_booking_details.booking_date >=',$booking_date_from);
                $seva_details->where('general_seva_booking_details.booking_date <=',$booking_date_to);
                $seva_details->where('general_seva_booking_details.temple_id',$temple_id);
                $data = $seva_details->findAll();

            }

        }
        else if(!empty($seva_date_from1) && !empty($seva_date_to1)){

            $seva_date_from = date('Y-m-d',strtotime($seva_date_from1));
            $seva_date_to = date('Y-m-d',strtotime($seva_date_to1));

            if($option == 'Endowment'){

                $type = 4;

                print_r($seva_date_to);
                print_r($seva_date_from);
                die();

            }else if($option == 'General'){

                $type = 3;
                // $seva_details = new generalSevaModel();
                // $seva_details->where('seva_date >=',$seva_date_from);
                // $seva_details->where('seva_date <=',$seva_date_to);
                // $seva_details->where('temple_id' , $temple_id);
                $seva_details  = new generalSevaModel();
                $seva_details->select('general_seva_booking_details.*,general_booking_contact_details.name,general_booking_contact_details.mobile_number,general_booking_seva_price_details.received_by');
                $seva_details->join('general_booking_seva_price_details', 'general_seva_booking_details.id = general_booking_seva_price_details.gsb_id');
                $seva_details->join('general_booking_contact_details','general_seva_booking_details.gc_id = general_booking_contact_details.id');
                $seva_details->where('general_seva_booking_details.booking_date >=',$seva_date_from);
                $seva_details->where('general_seva_booking_details.booking_date <=',$seva_date_to);
                $seva_details->where('general_seva_booking_details.temple_id',$temple_id);
                $data = $seva_details->findAll();

            }            
        }
        else if(!empty($status)){
            // print_r($status);
            // die();
            if($option[0] == 'General' && $option[1] == 'Endowment'){

            //     print_r($option[0]);
            //     print_r($option[1]);
            //    print_r($status);die();
                $type = 6;
                $model = new bookingModel();
                $model->select('booking_details.booking_date,booking_details.receipt_no,contact_details.name,booking_details.seva_date,booking_details.main_seva as seva_name,booking_details.seva_price as amount,booking_details.grand_total as total_amount,booking_details.status');
                $model->where('status',$status);
                $model->join('contact_details', 'booking_details.contact_id = contact_details.id','left');
                $data1  = $model->findAll();

                $model = new generalBookingSevaPriceModel();
                $model->select('general_seva_booking_details.booking_date,general_seva_booking_details.receipt_no,general_booking_contact_details.name,general_seva_booking_details.seva_date,general_seva_booking_details.seva_name,general_seva_booking_details.amount,general_booking_seva_price_details.total_amount,general_seva_booking_details.status');
                $model->where('status',$status);
                $model->join('general_booking_contact_details', 'general_booking_seva_price_details.gc_id = general_booking_contact_details.id');
                $model->join('general_seva_booking_details', 'general_booking_seva_price_details.gsb_id = general_seva_booking_details.id','right');
                $data2  = $model->findAll();

                $data = array_merge($data1, $data2);

                // print_r($data);
                // die();

            }
            else if($option[0] == 'General'){
                // print_r($status);die();

                $type = 7;
                $model = new generalSevaModel();
                $model->select('name,mobile_number,address1,address2,status');
                $model->where('status',$status);
                $model->join('general_booking_contact_details', 'general_seva_booking_details.gc_id = general_booking_contact_details.id','left');
                $data  = $model->findAll();               

            }else if($option[0] == 'Endowment'){
                // print_r($option);print_r($status);die();

                $type = 8;
                $model = new bookingModel();
                $model->select('name,mobile_number,pin_code,email,status');
                $model->where('status',$status);
                $model->join('contact_details', 'booking_details.contact_id = contact_details.id','left');
                $data  = $model->findAll();              
            }
        }
        else if(!empty($payment)){

            // print_r($payment);
            // die();
            
            if($option[0] == 'General' && $option[1] == 'Endowment'){
                // print_r($payment);
                // die();
                
                $type = 9;
                $model = new bookingModel();
                $model->select('booking_date,receipt_no,contact_details.name,seva_date,main_seva as seva_name,seva_price as amount,grand_total as total_amount,payment_mode');
                $model->where('payment_mode',$payment);
                $model->join('contact_details', 'booking_details.contact_id = contact_details.id','left');
                $data1  = $model->findAll();

                $model = new generalBookingSevaPriceModel();
                $model->select('general_seva_booking_details.booking_date,general_seva_booking_details.receipt_no,general_booking_contact_details.name,general_seva_booking_details.seva_date,general_seva_booking_details.seva_name,general_seva_booking_details.amount,general_booking_seva_price_details.total_amount,payment_method as payment_mode');
                $model->join('general_booking_contact_details', 'general_booking_seva_price_details.gc_id = general_booking_contact_details.id','left');
                $model->join('general_seva_booking_details', 'general_booking_seva_price_details.gsb_id = general_seva_booking_details.id','left');
                $model->where('payment_method',$payment);               
                $data2  = $model->findAll();

                $data = array_merge($data1, $data2);

                // print_r($data);
                // die();
            }
            else if($option[0] == 'General'){
                // print_r($payment);
                // die();
                $type = 10;
                $model = new generalBookingSevaPriceModel();
                $model->select('name,mobile_number,booking_pnr,total_amount,payment_method');
                $model->where('payment_method',$payment);
                $model->join('general_booking_contact_details', 'general_booking_seva_price_details.gc_id = general_booking_contact_details.id','left');
                $data  = $model->findAll();                             

            }else if($option[0] == 'Endowment'){
                // print_r($option);print_r($status);die();
                $type = 11;
                $model = new bookingModel();
                $model->select('name,mobile_number,booking_date,main_seva,seva_date,payment_mode');
                $model->where('payment_mode',$payment);
                $model->join('contact_details', 'booking_details.contact_id = contact_details.id','left');
                $data  = $model->findAll();             
            }
        }

        else if(!empty($booked_by)){

            // print_r($booked_by);
            // die();
            
            if($option[0] == 'General' && $option[1] == 'Endowment'){
                // print_r($booked_by);
                // die();                
                $type = 12;
                $model = new bookingModel();
                $model->select('booking_date,receipt_no,contact_details.name,seva_date,main_seva as seva_name,seva_price as amount,grand_total as total_amount,booking_details.created_by as booked_by');
                $model->where('booking_details.created_by',$booked_by);
                $model->join('contact_details', 'booking_details.contact_id = contact_details.id','left');
                $data1  = $model->findAll();
                
                $model = new generalBookingSevaPriceModel();
                $model->select('general_seva_booking_details.booking_date,general_seva_booking_details.receipt_no,general_booking_contact_details.name,general_seva_booking_details.seva_date,general_seva_booking_details.seva_name,general_seva_booking_details.amount,general_booking_seva_price_details.total_amount,general_seva_booking_details.created_by as booked_by');
                $model->where('general_seva_booking_details.created_by',$booked_by);
                $model->join('general_booking_contact_details', 'general_booking_seva_price_details.gc_id = general_booking_contact_details.id');
                $model->join('general_seva_booking_details', 'general_booking_seva_price_details.gsb_id = general_seva_booking_details.id','right');
                $data2  = $model->findAll();
                
                $data = array_merge($data1, $data2); 
               
                
                
            }
            else if($option[0] == 'General'){
                // print_r($booked_by);
                // die();
                $type = 13;
                $model = new generalSevaModel();
                $model->select('booking_date, booking_pnr, seva_date, seva_name, created_by as booked_by');
                $model->where('created_by',$booked_by);
                // $model->join('general_seva_booking_details', 'user_login.name = general_seva_booking_details.created_by','left');
                $data  = $model->findAll(); 

               
                                         

            }else if($option[0] == 'Endowment'){
                // print_r($booked_by);
                // die();
                $type = 14;
                $model = new bookingModel();
                $model->select('name_of,receipt_no,booking_date,main_seva,seva_date,created_by as booked_by');
                $model->where('created_by',$booked_by);
                // $model->join('booking_details', 'user_login.name = booking_details.created_by','left');
                $data  = $model->findAll();

                // print_r($data);
                // die();
                           
            }
        }
        

        // $data = $seva_details->findAll();
       

        // print_r($data);
        // die();

       

        if($data){
            return json_encode(array(
                 'result'    => 1,
                 'message'     => 'resive',
                 'mssg'     => $data,
                 'type'=> $type
                 ));
       }
       else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Fill The Form Correctly...'
                 ));
       }

        // print_r($seva_date_from);
        // print_r($seva_date_to);
        // die();


    }


}

?>
