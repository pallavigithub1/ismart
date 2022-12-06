<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\MasterModel;
use App\Models\DevoteeModel;
use App\Models\IsmartModel;
use App\Models\SevaModel;
use App\Models\puduvattuModel;
use App\Models\bookingModel;
use App\Models\additionalInformationModel;
use App\Models\UsersModel;
use App\Models\sevaPriceModel;
use App\Models\simpleDateCalenderModel;
use App\Models\ContactModel;
use App\Models\GeneratedSevaModel;
// Devotee Master, temple addtion, Devotee addition..  

class Puduvattu extends ResourceController
{
    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
        // helper(['url']);
	}
	public function add_new(){
         

    
        //$query = $model->getLastQuery();
		//echo (string)$query;
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
        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Nakshathra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['nakshathra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Panchanga')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['panchanga'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Masa')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['masa'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Tithi')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['tithi'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Paksha')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['paksha'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','paymentmode')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['paymentmode'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Rashi')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['rashi'] = $details;
        
        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Gothra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['gothra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Festival')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['festival'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','subseva')->orderBy('id','ASC');
        $details  = $model->get()->getResultArray();
        $data['subseva'] = $details;

        $model = new simpleDateCalenderModel();
        // $model->where('temple_id',$temple_id);
        $model->where('type','month')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['month'] = $details;

        $model = new simpleDateCalenderModel();
        // $model->where('temple_id',$temple_id);
        $model->where('type','week')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['week'] = $details;


        $model = new simpleDateCalenderModel();
        // $model->where('temple_id',$temple_id);
        $model->where('type','day')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['day'] = $details;


        $model = new SevaModel();
        $model->where('temple_id',$temple_id);
        $model->where('enable','1');
        $model->where('type','Endowment')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['sevas'] = $details;

        $bash=['a,b,c'];
        $data['rel'] = $bash;


		return view('puduvattu_v',$data);
	}

    // ----------------------------------- adding seva page---------------------

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
        return view('puduvattu_v2',$data);
    }

    // -----------------------------receipt page------------------------------------------

    public function print(){
        
        $id = $_GET['id']; 
        $temple_id = session()->get('temple');       
        
        
        $model  = new TempleModel();             
        $model->orderBy('id','DESC');
        $model->where('id',$temple_id);
        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;
        
        $model = new bookingModel();
        $model->where('temple_id',$temple_id);
        $details = $model->where('id',$id)->first();
        $data['info'] = $details;
        $contact_id = $details['contact_id'];


        $model1 = new puduvattuModel();
        $model1->where('temple_id',$temple_id);
        $number = $model1->where('id',$contact_id)->first();
        $data['phone'] = $number;

        // $model1 = new SevaModel();
        // $model1->where('temple_id',$temple_id);
        // $number = $model1->where('id',$contact_id)->first();
        // $data['phone'] = $number;

        return view('receipt_puduvattu_booking',$data);
    }
    
    // ----------------------------------showing details for jqgrid-----------------------

    // public function show_details(){

    //     $temple_id = session()->get('temple');

    //     $model  = new bookingModel();
    //     // $id = '1'; 
    //     // $model->where('enable','1')->orderBy('id','DESC');
    //     $model->where('temple_id',$temple_id);
    //     // $model->where('WEEK(created_at)', date('W'));
    //     $model->where('created_at >= date(NOW()) - INTERVAL 7 DAY');
    //     $model->orderBy('id','DESC');

    //     $data  = $model->get()->getResultArray();
    //     $indexed_rows = [];
    //     foreach ($data as $i) {
    //         $indexed_rows[$i['id']] = $i;
    //     } 

    //     if($indexed_rows){
    //         return $this->respondCreated($data);
    //     }else{
    //         return $this->failNotFound('No item found');
    //     }
    // }
    public function edit_endowment($id){

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
            $model->orderBy('id','DESC');
            $model->where('id',$temple_id);
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;
        }
        
        $model  = new bookingModel();
	    $model->where('temple_id',$temple_id);        
        $details = $model->where('id',$id)->first();
        $data['info1'] = $details;
        $cont_id = $details['contact_id'];
        // -----------------------------fetching all data (start_date, end_date & amount )------------------------------------------

        // $seva_id = $this->request->getVar('id');
        $cmodel = new DevoteeModel();
        $data['info2'] = $cmodel->where('id',$cont_id )->first();

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Festival')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['festival'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Gothra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['gothra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Tithi')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['tithi'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Rashi')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['rashi'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Nakshathra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['nakshathra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','subseva')->orderBy('id','ASC');
        $details  = $model->get()->getResultArray();
        $data['subseva'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Paksha')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['paksha'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Masa')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['masa'] = $details;

        $model = new SevaModel();
        $model->where('temple_id',$temple_id);
        $model->where('enable','1');
        $model->where('type','Endowment')->orderBy('id','DESC');
        $details1  = $model->get()->getResultArray();
        $data['sevas'] = $details1;

        $model = new simpleDateCalenderModel();
        $model->where('type','month')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['month'] = $details;

        $model = new simpleDateCalenderModel();
        $model->where('type','week')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['week'] = $details;

        $model = new simpleDateCalenderModel();
        $model->where('type','day')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['day'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Paymentmode')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['paymentmode'] = $details;

        // $model  = new TempleModel();
        // $model->where('id', $temple_id);
        // $details  = $model->first();
        // $data['details'] = $details;
        
        $bash=['d,e,f'];
        $data['endo'] = $bash;
        
        $smodel2 = new additionalInformationModel();
        $smodel2->where('temple_id',$temple_id);
        $data1 = $smodel2->where('booking_id',$id )->findAll();
        $data['info3'] = $data1;
        
        // print_r($data['info1']);die();
        return view('endowment_edit',$data);
    }
        public function show_details(){

        $from_date = $this->request->getVar('from_date');
        $to_date = $this->request->getVar('to_date');        

        $temple_id = session()->get('temple');

        $model  = new bookingModel();
        $model->select('booking_details.*,contact_details.mobile_number');
        $model->join('contact_details','booking_details.contact_id = contact_details.id');        
        $model->where('booking_details.temple_id',$temple_id);
        // $model->where('WEEK(created_at)', date('W'));
        
        
        if(empty($from_date) && empty($to_date)){
             $model->where('booking_details.created_at >= date(NOW()) - INTERVAL 7 DAY');
        }           
        if(!empty($from_date))
        {
            $a = date('Y-m-d',strtotime($from_date));
            $model->where('booking_date >=',$a);
        }

        if(!empty($to_date))
        {
            $b = date('Y-m-d',strtotime($to_date));
            $model->where('booking_date <=',$b);
        }
        
        $model->orderBy('booking_details.id','DESC');
        $data  = $model->get()->getResultArray();
        // $indexed_rows = [];
        // foreach ($data as $i) {
        //     $indexed_rows[$i['id']] = $i;
        // } 

        // if($indexed_rows){
            // return $this->respondCreated($data);
        // }
        // else{
        //     return $this->failNotFound('No item found');
        // }
        return json_encode($data);

       

    }

    // -------------------------------------------showing details for subgrid-------------------

    public function details(){

        $id = $_GET['id']; 
        // print_r($id);die();
        $temple_id = session()->get('temple');
        
        $model1  = new bookingModel();         
        $general_id =  $model1->where('id',$id )->first(); 
        $data1 = $general_id;
        $contact_id = $general_id['contact_id'];

        $model  = new puduvattuModel();  
        $model->where('temple_id',$temple_id);       
        $model->where('id',$contact_id );     
        $model->orderBy('id','DESC');
        $data  = $model->get()->getResultArray();
        $indexed_rows = [];
        foreach ($data as $i) {
            $indexed_rows[$i['id']] = $i;
        } 

        if($indexed_rows){
            return $this->respondCreated($data);
        }else{
            return $this->failNotFound('No item found');
        }

    }

	public function check_mobile(){
		

        $mobile = $this->request->getVar('mobile');
        $temple_id = session()->get('temple');


       
        $model  = new puduvattuModel();  
        
        $model->select('name');
        $model->where('temple_id',$temple_id);

        $data  = $model->where('mobile_number',$mobile)->findAll();

        if($data){
            return json_encode(array(
                  'result'    => 1,
                  'message'   => $data
                  ));
        }
        else{
        	 return json_encode(array(
                  'result'    => 0,
                  'message'     => 'No data Found'
                  ));
        }
		return $data;
	}

    public function check_name(){
            

        $name = $this->request->getVar('name');
        $mobile_number = $this->request->getVar('mobile_number');
        $temple_id = session()->get('temple');

        $model  = new DevoteeModel();        
        $model->where('mobile_number',$mobile_number);
        $model->where('temple_id',$temple_id);
        $data  = $model->where('name',$name)->first();
        $contact_id = $data['id'];

        $model1 = new bookingModel();
        $data2 = $model1->where('contact_id',$contact_id)->first();

        

        if($data){
            return json_encode(array(
                    'result'    => 1,
                    'message'   => $data,
                    'msg'=>$data2
                    ));
        }
        else{
                return json_encode(array(
                    'result'    => 0,
                    'message'     => 'No data Found',
                    'msg'=> $mobile_number,
                    'hi'=>$name
                    ));
        }
        return $data;
    }

    public function check_codename(){
        $data1 = [];
        $seva_date  = $this->request->getVar('seva_date');
        $temple_id = session()->get('temple');
        
        $seva_type = 'Endowment';
        $enable = 1;
        
        $aa = ($seva_date);
        $na = strtotime($aa);
        $bc = date('Y-m-d', $na);
        if($seva_date){
            $sevaModel = new SevaModel();
            $sevaModel->select('seva_name, id');
           
            $sevaModel->where('booking_open <=',$bc);
            $sevaModel->where('booking_end >=',$bc);
            $sevaModel->where('type',$seva_type);
            $sevaModel->where('enable',$enable);
            $sevaModel->where('temple_id',$temple_id);
            $data1 = $sevaModel->findAll();
        };
        if($data1){
            return json_encode(array(
                  'result'    => 1,
                  'message'   => $data1
            ));
        }
        else{
        	 return json_encode(array(
                  'result'    => 0,
                  'message'     => 'No data Found'
            ));
        }
		return $data1;
    }

    public function check_sevaname(){
        $seva_name = $this->request->getVar('seva_name');
        $temple_id = session()->get('temple');
        $seva_date  = $this->request->getVar('seva_date');
        $ab = ($seva_date);
        $ns = strtotime($ab);
        $sdate = date('Y-m-d', $ns);

        $model  = new SevaModel();  
        $data  = $model->where('seva_name',$seva_name)->first();
        $aa = ($data['id']);
        $ab = ($data['enable_amount']);

        $model1  = new sevaPriceModel();
        $model1->select('amount'); 
        $model1->where('seva_id',$aa);
        $model->where('temple_id',$temple_id);
        $model1->where('price_start <=',$sdate);
        $model1->where('price_end >=',$sdate);
        $data1 = $model1->first();

        $model2  = new sevaPriceModel();
        $model2->select('id'); 
        $model2->where('seva_id',$aa);
        $model->where('temple_id',$temple_id);
        $model2->where('price_start <=',$sdate);
        $model2->where('price_end >=',$sdate);
        $data2 = $model2->first();
        
        if($seva_name ){
            return json_encode(array(
                'result'    => 1,
                'message'   => $seva_name,
                'msg'   => $data1,
                'work' => $ab,
                'seva_id' => $aa,
                'sp_id' => $data2
            ));
        }
        else{
        	return json_encode(array(
                'result'    => 0,
                'message'     => 'No data Found'
            ));
        }
		return ($data);
    }
    public function check_amount(){
        $seva_name = $this->request->getVar('seva_name');
        $temple_id = session()->get('temple');
        $seva_date  = $this->request->getVar('seva_date');
        $bc = ($seva_date);
        $ns = strtotime($bc);
        $sdate = date('Y-m-d', $ns);

        $model  = new SevaModel();  
        $data  = $model->where('seva_name',$seva_name)->first();
        $aa = ($data['id']);
        $ab = ($data['enable_amount']);

        $model1  = new sevaPriceModel();
        $model1->select('amount'); 
        $model1->where('seva_id',$aa);
        $model->where('temple_id',$temple_id);
        $model1->where('price_start <=',$sdate);
        $model1->where('price_end >=',$sdate);
        $data1 = $model1->first();
        
        if($seva_name ){
            return json_encode(array(
                'result'    => 1,
                'message'   => $seva_name,
                'msg'   => $data1,
                'work' => $ab
            ));
        }
        else{
        	return json_encode(array(
                'result'    => 0,
                'message'     => 'No data Found'
            ));
        }
		return ($data);
    }

    // ----------------------------------------------adding data ---------------------------------------------

    public function city_state(){
        $pin_code = $this->request->getVar('pincode');
        $data = file_get_contents('http://postalpincode.in/api/pincode/'.$pin_code);
        $data = json_decode($data);
        if(isset($data->PostOffice['0'])){
            $arr['city'] = $data->PostOffice['0']->Taluk;
            $arr['state'] = $data->PostOffice['0']->State;
            echo json_encode($arr);
        }else{
            echo 'no';
        }
    }
    // public function cityState(){
    //     $pin_code = $this->request->getVar('pincode');
    //     $data = file_get_contents('http://postalpincode.in/api/pincode/'.$pin_code);
    //     $data = json_decode($data);
    //     if(isset($data->PostOffice['0'])){
    //         $arr['city'] = $data->PostOffice['0']->Taluk;
    //         $arr['state'] = $data->PostOffice['0']->State;
    //         echo json_encode($arr);
    //     }else{
    //         echo 'no';
    //     }
    // }
    
     public function auto(){
        
        $data1= [];
        
       
        $mobile_number = $this->request->getVar('term1');
        
        
       
        if($mobile_number)
        {
            $mobile_number_Model = new ContactModel();
            $mobile_number_Model->select('mobile_number');
            $mobile_number_Model->like('mobile_number',$mobile_number);
            $data1 = $mobile_number_Model->get()->getResultArray();
            echo json_encode($data1);
        }
       
    }

    // public function cool(){ 

    //     // ---------------------------------------contact details variable----------------------------------
        
    //     $mobile_number  = $this->request->getVar('mobile_number');
    //     $temple_id  = session()->get('temple');
    //     $created_by  = session()->get('name');
    //     $updated_by  = session()->get('name');
    //     $name = $this->request->getVar('name');
    //     $address1 = $this->request->getVar('address1');
    //     $address2 = $this->request->getVar('address2');
    //     $pinVal = $this->request->getVar('select');
    //     $pinVal9 = $this->request->getVar('select9');
    //     if($pinVal == 'india'){
    //         $city =  $this->request->getVar('city');
    //         $pin_code = $this->request->getVar('pin_code');
    //         $state = $this->request->getVar('state');
    //     }
    //     if($pinVal9 == 'others'){
    //         $city =  $this->request->getVar('city1');
    //         $pin_code = $this->request->getVar('pin_code1');
    //         $state = $this->request->getVar('state1');
    //     }
    //     $country = $this->request->getVar('country');
    //     $email = $this->request->getVar('email');        
    //     // $booking_date = $this->request->getVar('booking_date');
    //     $booking_date = date('Y-m-d',strtotime($this->request->getVar('booking_date')));
    //     $booking_pnr = $this->request->getVar('booking_pnr');        

    //     date_default_timezone_set('Asia/Kolkata');   
    //     $updated_at = date('d-m-Y H:i:s', time());  

    //     // $model = new UsersModel();
    //     // $data = $model->first();


    //     $status = $this->request->getVar('status');
    //     $pan = $this->request->getVar('pan');
    //     $adhar = $this->request->getVar('adhar');
    //     $purpose = $this->request->getVar('purpose');
        
    //     // -------------------------------------------seva details variable------------------------------------

    //     $name_of = $this->request->getVar('name_of');
    //     $rashi1 = $this->request->getVar('rashi');
    //     $rashi =explode('-', $rashi1);
    //     $gothra1 = $this->request->getVar('gothra');
    //     $gothra =explode('-', $gothra1);
    //     $nakshathra1 = $this->request->getVar('nakshathra');
    //     $nakshathra =explode('-', $nakshathra1);

    //     // ------------------------------------------main seva variable------------------------------------

    //     $main_seva = $this->request->getVar('main_seva');
    //     $amount = $this->request->getVar('amount');
    //     $seva_include = $this->request->getVar('seva_include[]');   /* -----------method to convert to string--------*/
    //     $seva_include1 = implode($seva_include, ',');

    //     // --------------------------------seva payment details----------------------------------

    //     $payment_mode = $this->request->getVar('payment_mode');

    //     // $payment_date = $this->request->getVar('payment_date');
    //     $payment_date  = date('Y-m-d',strtotime($this->request->getVar('payment_date')));
    //     $added_by = $this->request->getVar('added_by');
    //     $crb = $this->request->getVar('crb');
    //     $details = $this->request->getVar('details');
        
    //     $receipt_no = $this->request->getVar('receipt_no');
    //     $advance_amount = $this->request->getVar('advance_amount');
    //     $balance_amount = $this->request->getVar('balance_amount');
    //     $comment = $this->request->getVar('comment');

    //      // --------------------additional information---------------------------

    //      $relation = $this->request->getVar('relation[]');
    //      $Ai_name = $this->request->getVar('Ai_name[]');
    //      $birthday = $this->request->getVar('birthday[]');

    //     // -----------------------------seva date---------------------------------------------

        

    //     $radioVal = $this->request->getVar('optradio');
    //     if($radioVal == "date"){
    //         $seva_date = $this->request->getVar('seva_date');
    //     }
    //     else if($radioVal == "festival"){
    //         $seva_date = $this->request->getVar('seva_festival');
    //     }
    //     // else if($radioVal == "others"){
    //     //     $seva_date = $this->request->getVar('seva_others');
    //     // }
    //     else if($radioVal == "calendar"){
    //         $seva_calendar = $this->request->getVar('sellist[]');
    //         $seva_date = implode($seva_calendar, "\\");
    //     }
    //     else if($radioVal == "panchanga"){
    //         $seva_panchanga = $this->request->getVar('sellist1[]');
    //         $seva_date = implode($seva_panchanga, "/");
    //     }

       
        
    //     // -----------------------------------(array method) data insearting to database for contact details-----------------
    //     // -----------if we insert existing name it won't take extra (id) instred of that we need to update in same(id)----------

        
    //     $updata = new puduvattuModel(); 
    //     $where = [
    //         'name'=>$name,
    //         'mobile_number'=>$mobile_number
    //     ];
    //     $enrty_update = $updata->where($where)->first();

    //     if($enrty_update){
    //         $updateNewData = array(
    //             'mobile_number'=> $mobile_number,
    //             'name'=> $name,
    //             'address1' => $address1,
    //             'address2' => $address2,
    //             'city' => $city, 
    //             'pin_code' => $pin_code, 
    //             'state' => $state, 
    //             'country' => $country,  
    //             'email' => $email,
    //             'temple_id' => $temple_id,
             
    //             // 'booking_date' => $booking_date,
    //             // 'booking_pnr' => $booking_pnr,
    //             // 'created_at' => $created_at,

    //             'updated_at' => $updated_at,
    //             'updated_by' => $updated_by,
 
    //             'pan' => $pan,
    //             'adhar' => $adhar, 
    //             'purpose' => $purpose
    //         );
            
    //         $updateCModel = new puduvattuModel();
    //         $updateCModel->set($updateNewData);
    //         $updateCModel->where('name',$name);
    //         $updatedID = $updateCModel->update(); 
    //         $insertedID = $enrty_update['id'];
    //     }else {

    //         $newData = array(
    //             'mobile_number'=> $mobile_number,
    //             'name'=> $name,
    //             'address1' => $address1,
    //             'address2' => $address2,
    //             'city' => $city, 
    //             'pin_code' => $pin_code, 
    //             'state' => $state, 
    //             'country' => $country, 
    //             'email' => $email,
    //             'temple_id' => $temple_id,
             
    //             // 'booking_date' => $booking_date,
    //             // 'booking_pnr' => $booking_pnr,
    //             // 'created_at' => $created_at,

    //             'created_by' => $created_by,
    //             'pan' => $pan,
    //             'adhar' => $adhar, 
    //             'purpose' => $purpose
    //         );  
            
    //         // ----------------------- (inserting method) contact_details--------------------------------
    
    //         $ugtSaveModel = new puduvattuModel(); 
    //         $ugtSaveModel->save($newData);
    //         $insertedID = $ugtSaveModel->insertID();

    //     }
     
        


    //     // ----------------------------(array method) db->seva_details & seva_main------------------------

    //     $newdata1 = array(            
    //         'contact_id'=>$insertedID,
    //         'name_of'=> $name_of,
    //         'status' => $status,
    //         'rashi'=> $rashi[0],
    //         'gothra'=>$gothra[0],
    //         'nakshathra'=>$nakshathra[0],
    //         'main_seva'=> $main_seva,
    //         'seva_price'=> $amount,
    //         'grand_total'=> $amount,
    //         'advance_amount'=> $advance_amount,
    //         'balance_amount'=> $balance_amount,
    //         'receipt_no'=> $receipt_no,
    //         'comments'=>$comment,
    //         'booking_date' => $booking_date,
    //         'seva_include'=>$seva_include1,
    //         'seva_date'=>$seva_date,
    //         'payment_mode'=>$payment_mode,
    //         'payment_date'=>$payment_date,
    //         'crb'=>$crb,
    //         'booking_pnr' => $booking_pnr,
    //         'details'=>$details,
    //         'created_by'=>$created_by,
    //         'temple_id' => $temple_id

    //     );

    //     // ----------------------- (insert method) seva_details & seva_main ----------------------------

    //     $bookingModel = new bookingModel();
    //     $bookingModel->save($newdata1);
    //     $bookedID = $bookingModel->insertID();

    //     // ---------------------------------additation information------------------------
        
    //     for($i=0; $i<count($relation); $i++){

    //         $b_day = $birthday[$i];
    //         $bir_day = date('Y-m-d',strtotime($b_day));
            
    //         $newadd = [
    //             'booking_id'=>$bookedID, 
    //             'contact_id'=>$insertedID,
    //             'relation'=>$relation[$i],
    //             'name'=>$Ai_name[$i],
    //             'birthday'=>$bir_day,
    //             'created_by'=>$created_by,
    //             'temple_id' => $temple_id

    //         ];

    //         $addModel = new additionalInformationModel();
    //         $addModel->save($newadd);
    //         $addID = $addModel->insertID();
    //     };      


               
    //     if(( $insertedID || $updatedID) && ($bookedID) && ($addID)){ 
    //          return json_encode(array(
    //               'result'    => 1,
    //               'message'     => 'Booked Successfully.....',
    //                 'msg' => $newdata1  ,
    //                 'msg1' => $insertedID,
    //                 'gothra' => $newdata1
    //                                             /*   ======>>>   this is json method where data are taken like [array] form  */
    //               ));
    //     }
    //     else{
    //          return json_encode(array(
    //               'result'    => 0,
    //               'message'     => 'Something went wrong.....'
    //               ));
    //     }

        
    // }

   

    public function cool(){ 

        // ---------------------------------------contact details variable----------------------------------
        
        $mobile_number  = $this->request->getVar('mobile_number');
        $temple_id  = session()->get('temple');
        $created_by  = session()->get('name');
        $updated_by  = session()->get('name');
        $name = $this->request->getVar('name');
        $address1 = $this->request->getVar('address1');
        $address2 = $this->request->getVar('address2');
        $pinVal = $this->request->getVar('select');
        $pinVal9 = $this->request->getVar('select9');
        if($pinVal == 'india'){
            $city =  $this->request->getVar('city');
            $pin_code = $this->request->getVar('pin_code');
            $state = $this->request->getVar('state');
        }
        if($pinVal9 == 'others'){
            $city =  $this->request->getVar('city1');
            $pin_code = $this->request->getVar('pin_code1');
            $state = $this->request->getVar('state1');
        }
        $country = $this->request->getVar('country');
        $email = $this->request->getVar('email');        
        // $booking_date = $this->request->getVar('booking_date');
        $booking_date = date('Y-m-d',strtotime($this->request->getVar('booking_date')));
        $booking_pnr = $this->request->getVar('booking_pnr');        
        
        date_default_timezone_set('Asia/Kolkata');   
        $updated_at = date('d-m-Y H:i:s', time());  
        
        // $model = new UsersModel();
        // $data = $model->first();
        
        
        $status = $this->request->getVar('status');
        $pan = $this->request->getVar('pan');
        $adhar = $this->request->getVar('adhar');
        $purpose = $this->request->getVar('purpose');
        
        // -------------------------------------------seva details variable------------------------------------
        
        $name_of = $this->request->getVar('name_of');
        $rashi1 = $this->request->getVar('rashi');
        $rashi =explode('-', $rashi1);
        $gothra1 = $this->request->getVar('gothra');
        $gothra =explode('-', $gothra1);
        $nakshathra1 = $this->request->getVar('nakshathra');
        $nakshathra =explode('-', $nakshathra1);
        
        // ------------------------------------------main seva variable------------------------------------
        
        $main_seva = $this->request->getVar('main_seva');
        $amount = $this->request->getVar('amount');
        $seva_id = $this->request->getVar('seva_id');
        $seva_price_id = $this->request->getVar('sp_id');
        $seva_include = $this->request->getVar('seva_include[]');   /* -----------method to convert to string--------*/
        $seva_include1 = implode(',',$seva_include);
        // print_r($seva_include1);die();
        
        // --------------------------------seva payment details----------------------------------
        
        $payment_mode = $this->request->getVar('payment_mode');
        
        // $payment_date = $this->request->getVar('payment_date');
        $payment_date  = date('Y-m-d',strtotime($this->request->getVar('payment_date')));
        $added_by = $this->request->getVar('added_by');
        $crb = $this->request->getVar('crb');
        $details = $this->request->getVar('details');
        
        $receipt_no = $this->request->getVar('receipt_no');
        $advance_amount = $this->request->getVar('advance_amount');
        $balance_amount = $this->request->getVar('balance_amount');
        $comment = $this->request->getVar('comment');
        
        
        // --------------------additional information---------------------------
        
        $relation = $this->request->getVar('relation[]');
        $Ai_name = $this->request->getVar('Ai_name[]');
        $birthday = $this->request->getVar('birthday[]');
        
        // -----------------------------seva date---------------------------------------------
        
        
        
        $radioVal = $this->request->getVar('optradio');
        if($radioVal == "date"){
            $seva_date = $this->request->getVar('seva_date');
            $seva_date1  = date('Y-m-d',strtotime($this->request->getVar('seva_date')));
        }
        else if($radioVal == "festival"){
            $seva_date = $this->request->getVar('seva_festival');
        }
        // else if($radioVal == "others"){
            //     $seva_date = $this->request->getVar('seva_others');
            // }
            else if($radioVal == "calendar"){
                $seva_calendar = $this->request->getVar('sellist[]');
                $seva_date = implode($seva_calendar, "\\");
            }
            else if($radioVal == "panchanga"){
                $seva_panchanga = $this->request->getVar('sellist1[]');
                $seva_date = implode($seva_panchanga, "/");
            }

            // print_r($seva_panchanga);die();

            
            
            
            
            // -----------------------------------(array method) data insearting to database for contact details-----------------
            // -----------if we insert existing name it won't take extra (id) instred of that we need to update in same(id)----------
            
            
            $updata = new puduvattuModel(); 
            $where = [
                'name'=>$name,
                'mobile_number'=>$mobile_number
            ];
            $enrty_update = $updata->where($where)->first();
            
        if($enrty_update){
            $updateNewData = array(
                'mobile_number'=> $mobile_number,
                'name'=> $name,
                'address1' => $address1,
                'address2' => $address2,
                'city' => $city, 
                'pin_code' => $pin_code, 
                'state' => $state, 
                'country' => $country,  
                'email' => $email,
                'temple_id' => $temple_id,
             
                // 'booking_date' => $booking_date,
                // 'booking_pnr' => $booking_pnr,
                // 'created_at' => $created_at,

                'updated_at' => $updated_at,
                'updated_by' => $updated_by,
 
                'pan' => $pan,
                'adhar' => $adhar, 
                'purpose' => $purpose
            );
            
            $updateCModel = new puduvattuModel();
            $updateCModel->set($updateNewData);
            $updateCModel->where('name',$name);
            $updatedID = $updateCModel->update(); 
            $insertedID = $enrty_update['id'];


        }else {

            $newData = array(
                'mobile_number'=> $mobile_number,
                'name'=> $name,
                'address1' => $address1,
                'address2' => $address2,
                'city' => $city, 
                'pin_code' => $pin_code, 
                'state' => $state, 
                'country' => $country, 
                'email' => $email,
                'temple_id' => $temple_id,
             
                // 'booking_date' => $booking_date,
                // 'booking_pnr' => $booking_pnr,
                // 'created_at' => $created_at,

                'created_by' => $created_by,
                'pan' => $pan,
                'adhar' => $adhar, 
                'purpose' => $purpose
            );  
            
            // ----------------------- (inserting method) contact_details--------------------------------
    
            $ugtSaveModel = new puduvattuModel(); 
            $ugtSaveModel->save($newData);
            $insertedID = $ugtSaveModel->insertID();


        }
     
        


        // ----------------------------(array method) db->seva_details & seva_main------------------------
       
        $newdata1 = array(   
            
            'contact_id'=>$insertedID,
            'name_of'=> $name_of,
            'status' => $status,
            'rashi'=> $rashi[0],
            'gothra'=>$gothra[0],
            'nakshathra'=>$nakshathra[0],
            'main_seva'=> $main_seva,
            'seva_price'=> $amount,
            'grand_total'=> $amount,
            // // 'advance_amount'=> 0,
            // // 'balance_amount'=> 0,
            // 'advance_amount'=> $advance_amount,
            // 'balance_amount'=> $balance_amount,
            'receipt_no'=> $receipt_no,
            'comments'=>$comment,
            'booking_date' => $booking_date,
            'seva_include'=>$seva_include1,
            'seva_date'=>$seva_date,
            // 'seva_date_actual'=>$seva_date1,
            'payment_mode'=>$payment_mode,
            'payment_date'=>$payment_date,
            'crb'=>$crb,
            'booking_pnr' => $booking_pnr,
            'details'=>$details,
            'created_by'=>$created_by,
            'temple_id' => $temple_id,
            'seva_id' => $seva_id,
            'seva_price_id' => $seva_price_id,

        );
        
        
        $bookingModel = new bookingModel();
        $bookingModel->save($newdata1);
        $bookedID = $bookingModel->insertID();
        
        // print_r($bookedID);die();
        if($radioVal == "date"){
           
            $extra = array(
                'temple_id'=> $temple_id,
                'booking_id'=>$bookedID,
                'contact_id'=>$insertedID,
                'seva_date'=>$seva_date1

            );
        }

        $generate_seva = new GeneratedSevaModel();
        $generate_seva->save($extra);
        $generated_extra = $generate_seva->insertID();

       

        


       

        // ---------------------------------additation information------------------------
        
        for($i=0; $i<count($relation); $i++){

            $b_day = $birthday[$i];
            $bir_day = date('Y-m-d',strtotime($b_day));
            
            $newadd = [
                'booking_id'=>$bookedID, 
                'contact_id'=>$insertedID,
                'relation'=>$relation[$i],
                'name'=>$Ai_name[$i],
                'birthday'=>$bir_day,
                'created_by'=>$created_by,
                'temple_id' => $temple_id

            ];

            $addModel = new additionalInformationModel();
            $addModel->save($newadd);
            $addID = $addModel->insertID();
        };      


               
        if(( $insertedID || $updatedID) && ($bookedID) && ($addID)){ 
             return json_encode(array(
                  'result'    => 1,
                  'message'     => 'Booked Successfully.....',
                    'msg' => $newdata1  ,
                    'msg1' => $insertedID,
                    'gothra' => $newdata1
                                                /*   ======>>>   this is json method where data are taken like [array] form  */
                  ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'     => 'Something went wrong.....'
                  ));
        }

        
    }

    public function view_page(){


        $temple_id  = session()->get('temple');

        $id = $this->request->getVar('id');  

        $model = new bookingModel();
        $model->where('temple_id',$temple_id);
        $data = $model->where('id',$id)->first();
        $contact_id = $data['contact_id'];

        $model1 = new ContactModel();
        $model1->where('temple_id',$temple_id);
        $data1 = $model1->where('id',$contact_id)->first();

        $model2 = new additionalInformationModel();
        $model2->where('temple_id',$temple_id);
        $data2 = $model2->where('booking_id',$id)->findAll();
        
        // print_r($data2);
        // die();

        if($data){
            return json_encode(array(

                'result'    => 1,
                'message'   => $data,
                'msg1'   => $data1,
                'msg2'   => $data2                 
            ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'   => 'Something went wrong...'
                  ));

        }
    }


    public function update_pudu_details(){
        $temple_id  = session()->get('temple');
        $updated_by  = session()->get('name');
        $created_by  = session()->get('name');
        
        $mobile_number  = $this->request->getVar('mobile_number');
        $id  = $this->request->getVar('id');
        $b_id  = $this->request->getVar('b_id');
        $name = $this->request->getVar('name');
        $address1 = $this->request->getVar('address1');
        $address2 = $this->request->getVar('address2');
        $pin_code = $this->request->getVar('pin_code');
        $city =  $this->request->getVar('city');
        $state = $this->request->getVar('state');
        $country = $this->request->getVar('country');
        $email = $this->request->getVar('email');
        $comments = $this->request->getVar('comment');
        $gothra = $this->request->getVar('gothra');
        $seva_date = $this->request->getVar('seva_date');
        $seva_amount = $this->request->getVar('seva_amount');
        $booking_date = date('Y-m-d',strtotime($this->request->getVar('booking_date')));
        $booking_pnr = $this->request->getVar('booking_pnr'); 
        $status = $this->request->getVar('status');
        $pan = $this->request->getVar('pan');
        $adhar = $this->request->getVar('adhar');
        $purpose = $this->request->getVar('purpose');
        $name_of = $this->request->getVar('name_of');
        $rashi = $this->request->getVar('rashi');
        $nakshathra = $this->request->getVar('nakshathra');
        $main_seva = $this->request->getVar('main_seva');
        $payment_mode = $this->request->getVar('payment_mode');
        $crb = $this->request->getVar('crb');
        $payment_date  = date('Y-m-d',strtotime($this->request->getVar('payment_date')));
        $details = $this->request->getVar('details');
        $seva_include1= $this->request->getVar('seva_include[]');
        if($seva_include1){   
            $seva_include= implode($seva_include1, ',');
        }
        $radioVal = $this->request->getVar('optradio');
        if($radioVal == "date"){
            $seva_date = $this->request->getVar('seva_date');
        }
        else if($radioVal == "festival"){
            $seva_date = $this->request->getVar('seva_festival');
        }
        else if($radioVal == "calendar"){
            $seva_calendar = $this->request->getVar('sellist[]');
            $seva_date = implode($seva_calendar, "\\");
        }
        else if($radioVal == "panchanga"){
            $seva_panchanga = $this->request->getVar('sellist1[]');
            $seva_date = implode($seva_panchanga, "/");
        }
        
        $relation = $this->request->getVar('relation[]');
        $Ai_name = $this->request->getVar('Ai_name[]');
        $birthday = $this->request->getVar('birthday[]');

        $delete = new additionalInformationModel();        
        $delete->where('booking_id',$b_id);
        $delete->where('temple_id',$temple_id);
        $deleteID = $delete->delete();
        // $model = new UsersModel();
        // $data = $model->first();

        date_default_timezone_set('Asia/Kolkata');   
        $updated_at = date('d-m-Y H:i:s', time());

        $updateContact = array(
            'mobile_number'=> $mobile_number,
            'name'=> $name,
            'address1' => $address1,
            'address2' => $address2,
            'pin_code' => $pin_code,
            'city' => $city,  
            'state' => $state, 
            'country' => $country, 
            'email' => $email,
            'updated_at' => $updated_at,
            'updated_by' => $updated_by,

            'status' => $status, 
            'pan' => $pan,
            'adhar' => $adhar, 
            'purpose' => $purpose
        );
        $updateCModel = new puduvattuModel();
        $updateCModel->set($updateContact);
        $updateCModel->where('id',$id);
        $updatedCID = $updateCModel->update(); 

        $updateBooking = array(
            'comments' => $comments,
            'name_of' => $name_of,
            'gothra'=>$gothra,
            'nakshathra'=>$nakshathra,
            'main_seva'=> $main_seva,
            'seva_price'=> $seva_amount,
            'grand_total'=> $seva_amount,
            'booking_date' => $booking_date,
            'seva_date'=>$seva_date,
            'booking_pnr' => $booking_pnr,
            'rashi'=> $rashi,
            'payment_mode'=>$payment_mode,
            'payment_date'=>$payment_date,
            'crb'=>$crb,
            'seva_include'=>$seva_include,
            'details'=>$details,
            'updated_at' => $updated_at,
            'updated_by' => $updated_by
        );
        $updateBModel = new bookingModel();
        $updateBModel->set($updateBooking);
        $updateBModel->where('id',$b_id);
        $updatedBID = $updateBModel->update();
        
        for($i=0; $i<count($relation); $i++){

            $b_day = $birthday[$i];
            $bir_day = date('Y-m-d',strtotime($b_day));
            
            $newadd = [
                'booking_id'=>$b_id, 
                'contact_id'=>$updatedCID,
                'relation'=>$relation[$i],
                'name'=>$Ai_name[$i],
                'birthday'=>$bir_day,
                'created_by'=>$created_by,
                'temple_id' => $temple_id
            ];

            $addModel = new additionalInformationModel();
            $addModel->save($newadd);
            $addID = $addModel->insertID();
        };   
        
        if(($updatedCID) && ($updatedBID) && ($addID)){ 
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Updated Successfully...'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function export_endowment_details(){
        // $from_date = $this->request->getVar('from_date');
        // $to_date = $this->request->getVar('to_date');        

        $temple_id = session()->get('temple');

        $model  = new bookingModel();
        $model->select('booking_details.*,contact_details.*');
        $model->join('contact_details','booking_details.contact_id = contact_details.id');        
        // $model->join('contact_details','booking_details.contact_id = contact_details.id');        
        $model->where('booking_details.temple_id',$temple_id);
        // $model->LIMIT(1);

        // $model->where('WEEK(created_at)', date('W'));
        
        
        // if(empty($from_date) && empty($to_date)){
        //      $model->where('booking_details.created_at >= date(NOW()) - INTERVAL 7 DAY');
        // }           
        // if(!empty($from_date))
        // {
        //     $a = date('Y-m-d',strtotime($from_date));
        //     $model->where('booking_date >=',$a);
        // }

        // if(!empty($to_date))
        // {
        //     $b = date('Y-m-d',strtotime($to_date));
        //     $model->where('booking_date <=',$b);
        // }
        
        $model->orderBy('booking_details.id','DESC');
        $data  = $model->get()->getResultArray();


    
    

        // print_r($data);die();
        return json_encode(array(
            'result'    => 1,
            'message'     => $data
            ));
    }
   


}	



