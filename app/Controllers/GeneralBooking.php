<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\sevaPriceModel;
use App\Models\TempleModel;
use App\Models\generalBookingModel;
use App\Models\generalSevaModel;
use App\Models\generalBookingSevaPriceModel;
use App\Models\UsersModel;
use App\Models\SevaModel;
use App\Models\MasterModel;
class GeneralBooking extends ResourceController{

    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
	}
    
    public function add_new(){
    
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
        $model->where('master_name','Gothra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['gothra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Nakshathra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['nakshathra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','paymentmode');
        $details  = $model->get()->getResultArray();
        $data['paymentmode'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Rashi')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['rashi'] = $details;
        
        
        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Paymentmode')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['paymentmode'] = $details;

        $bash=['a,b,c'];
        $data['rel'] = $bash;

		return view('general_booking',$data);
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
            $model->orderBy('id','DESC');
            $model->where('id',$temple_id);
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;
        }
        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Gothra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['gothra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Nakshathra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['nakshathra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Rashi')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['rashi'] = $details;

        return view('general_booking_v2',$data);
    }

    public function print(){

        $id = $_GET['id'];
        // $temple_id = session()->get('temple'); 

        $model  = new TempleModel();       
        $model->orderBy('id','DESC');
        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;

        $model = new generalBookingModel();
        // $model->where('temple_id',$temple_id);
        $details = $model->where('id',$id)->first();
        $data['info'] = $details;
        $booking_pnr = $details['booking_pnr'];

        $model1 = new generalSevaModel();
        // $model->where('temple_id',$temple_id);
        $pnr = $model1->where('booking_pnr',$booking_pnr)->findAll();
        $data['pnr'] = $pnr;

        $model2 = new generalBookingSevaPriceModel();
        // $model->where('temple_id',$temple_id);
        $price = $model2->where('booking_pnr',$booking_pnr)->first();
        $data['price'] = $price;

        
        return view('receipt_general_booking',$data);

    }
    
    public function print_grid_data(){
        $id = $_GET['id'];
        $temple_id = session()->get('temple'); 

        $model  = new TempleModel();       
        $model->orderBy('id','DESC');
        $model->where('id',$temple_id);
        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;

        $model = new generalBookingSevaPriceModel();
        $model->where('temple_id',$temple_id);
        $details = $model->where('gsb_id',$id)->first();
        $data['info'] = $details;
        $booking_pnr = $details['booking_pnr'];

        $model1 = new generalSevaModel();
        $model->where('temple_id',$temple_id);
        $pnr = $model1->where('booking_pnr',$booking_pnr)->findAll();
        $data['count'] = count($pnr);
        $data['pnr'] = $pnr;
        $generalid = $pnr[0]['gc_id'];

        $model2 = new generalBookingModel();
        $model->where('temple_id',$temple_id);
        $general = $model2->where('id',$generalid)->first();
        $data['gc'] = $general;
        return $this->respondCreated($data);

    }

    public function print_grids(){
        $id = $_GET['id'];
        $seva_id = $_GET['seva_id'];
        $temple_id = session()->get('temple'); 

        $model  = new TempleModel();       
        $model->orderBy('id','DESC');
        $model->where('id',$temple_id);
        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;

        $model = new generalBookingSevaPriceModel();
        $model->where('temple_id',$temple_id);
        $details = $model->where('gsb_id',$id)->first();
        $data['info'] = $details;
        $booking_pnr = $details['booking_pnr'];

        $model1 = new generalSevaModel();
        $model1->where('temple_id',$temple_id);
        $model1->where('id',$seva_id);
        $pnr = $model1->where('booking_pnr',$booking_pnr)->findAll();
        $data['count'] = count($pnr);
        $data['pnr'] = $pnr;
        $generalid = $pnr[0]['gc_id'];

        $model2 = new generalBookingModel();
        $model->where('temple_id',$temple_id);
        $general = $model2->where('id',$generalid)->first();
        $data['gc'] = $general;
        
        

        return view('receipt_general_booking_grid',$data);

    }
    public function getcityState(){
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
    // public function show_details(){

    //     $temple_id = session()->get('temple'); 


    //     $model  = new generalBookingModel();
    //     $model->select('general_booking_seva_price_details.*,booking_date,name,gothra,nakshathra,mobile_number,email');
    //     $model->join('general_booking_seva_price_details', 'general_booking_contact_details.id = general_booking_seva_price_details.gc_id');
    //     $model->where('general_booking_seva_price_details.temple_id',$temple_id);
    //     // $id = '1'; 
    //     // $model->where('enable','1')->orderBy('id','DESC');
    //     // $model->where('WEEK(created_at)', date('W'));
    //     $model->orderBy('general_booking_contact_details.id','DESC');
    //     $data  = $model->get()->getResultArray();

    //     // $model  = new generalBookingSevaPriceModel();
    //     // // $id = '1'; 
    //     // // $model->where('enable','1')->orderBy('id','DESC');
    //     // // $model->where('WEEK(created_at)', date('W'));
    //     // $model->orderBy('id','DESC');
    //     // $data  = $model->get()->getResultArray();


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
    
    public function show_details(){

        $from_date = $this->request->getVar('from_date');
        $to_date = $this->request->getVar('to_date'); 

        $temple_id = session()->get('temple'); 


        $model  = new generalSevaModel();
        $model->select('general_seva_booking_details.*,general_booking_contact_details.name,general_booking_contact_details.mobile_number,general_booking_seva_price_details.total_amount,general_booking_seva_price_details.received_by');
        $model->join('general_booking_seva_price_details', 'general_seva_booking_details.id = general_booking_seva_price_details.gsb_id');
        $model->join('general_booking_contact_details','general_seva_booking_details.gc_id = general_booking_contact_details.id');
        $model->where('general_seva_booking_details.temple_id',$temple_id);
        if(empty($from_date) && empty($to_date)){
            $model->where('general_seva_booking_details.created_at >= date(NOW()) - INTERVAL 7 DAY');
        }
        else if(!empty($from_date) && !empty($to_date))
        {
            $a = date('Y-m-d',strtotime($from_date));
            $model->where('booking_date >=',$a);
            $b = date('Y-m-d',strtotime($to_date));
            $model->where('booking_date <=',$b);
        }

        // if(!empty($to_date))
        // {
        //     $b = date('Y-m-d',strtotime($to_date));
        //     $model->where('booking_date <=',$b);
        // }
        
        // $model->where('WEEK(created_at)', date('W'));
        $model->orderBy('general_seva_booking_details.id','DESC');
        $data  = $model->get()->getResultArray();

      


        // $indexed_rows = [];
        // foreach ($data as $i) {
        //     $indexed_rows[$i['id']] = $i;
        // } 

        // if($indexed_rows){
            return $this->respondCreated($data);
        // }
        // else{
        //     return $this->failNotFound('No item found');
        // }
    }

    // public function details(){

    //     $id = $_GET['id']; 
    //     $temple_id = session()->get('temple'); 

    //     $model1 = new generalBookingSevaPriceModel(); 
    //     $model1->where('temple_id',$temple_id);       
    //     $pnr = $model1->where('gsb_id',$id )->first(); 
    //     $data1 = $pnr;
    //     $booking_pnr = $pnr['booking_pnr'];

        
       
        
    //     $model = new generalSevaModel(); 
    //     $model->where('temple_id',$temple_id);       
    //     $model->where('booking_pnr',$booking_pnr )->findAll();     
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
    
    
    public function auto(){
        
        $data1= [];
        
       
        $mobile_number = $this->request->getVar('term1');
        
        
       
        if($mobile_number)
        {
            $mobile_number_Model = new generalBookingModel();
            $mobile_number_Model->select('mobile_number');
            $mobile_number_Model->like('mobile_number',$mobile_number);
            $data1 = $mobile_number_Model->get()->getResultArray();
            echo json_encode($data1);
        }
       
    }

    public function details(){

        $id = $_GET['id']; 
        $temple_id = session()->get('temple'); 

        
        $model1  = new generalBookingSevaPriceModel();
        $model1->where('temple_id',$temple_id);          
        $general_id =  $model1->where('gsb_id',$id )->first(); 
        $data1 = $general_id;
        $pnr = $general_id['booking_pnr'];

        $model  = new generalSevaModel();         
        $model->where('booking_pnr',$pnr );
        $model->where('temple_id',$temple_id);
        $model->orderBy('id','DESC');
        $data  = $model->get()->getResultArray();
        // $indexed_rows = [];
        // foreach ($data as $i) {
        //     $indexed_rows[$i['id']] = $i;
        // } 

        // if($indexed_rows){
            return $this->respondCreated($data);
        // }else{
        //     return $this->failNotFound('No item found');
        // }

    } 

    // ----------------------------------to fetch the details using mobile_number ------------------------ 

    public function check_mobile(){
        $mobile = $this->request->getVar('mobile');
        $temple_id = session()->get('temple');
        $model  = new generalBookingModel();  
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
        $temple_id = session()->get('temple');
        $mobile_number = $this->request->getVar('mobile_number');
        $model  = new generalBookingModel();  
        $model->where('mobile_number',$mobile_number);
        $model->where('temple_id',$temple_id);

        $data  = $model->where('name',$name)->first();
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
		return ($data);
    }
 
    

  
    public function check_codes(){
        $data1 = [];
        $seva_date  = $this->request->getVar('seva_date');
        $seva_type = 'general';
        $enable = 1;
        $aa = ($seva_date);
        $na = strtotime($aa);
        $bc = date('Y-m-d', $na);
        if($seva_date){
            $sevaModel = new SevaModel();
            $sevaModel->select('seva_code, seva_name,id');
            // $sevaModel->where('BETWEEN booking_open and booking_end',$bc);
            $sevaModel->where('booking_open <=',$bc);
            $sevaModel->where('booking_end >=',$bc);
            $sevaModel->where('type',$seva_type);
            $sevaModel->where('enable',$enable);
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
                  'message'     => 'No Seva Found'
            ));
        }
        return $data1;
    }

    public function getAmount(){

        $seva_name1 = $this->request->getVar('seva_name[]');
        // $seva_code = $this->request->getVar('seva_code');
        $seva_name2= explode(' - ',$seva_name1);
        // $seva_name= $seva_name2[1].trim(); 

        $seva_date  = $this->request->getVar('seva_date');
        
        $ab = ($seva_date);
        $ns = strtotime($ab);
        $sdate = date('Y-m-d', $ns);
       

        $model  = new SevaModel();  
        $data  = $model->where('seva_name',$seva_name2[1])->first();
        $aa = ($data['id']);
        // print_r($aa);die();
        $ab = $data['enable_units'];
        $ac = $data['enable_amount'];

        $model1  = new sevaPriceModel();
        $model1->select('amount'); 
        $model1->where('seva_id',$aa);
        $model1->where('price_start <=',$sdate);
        $model1->where('price_end >=',$sdate);
        $data1 = $model1->first();

        $model2  = new sevaPriceModel();
        $model2->select('id'); 
        $model2->where('seva_id',$aa);
        $model2->where('price_start <=',$sdate);
        $model2->where('price_end >=',$sdate);
        $data2 = $model2->first();
        
        if($seva_name2[1]){
            return json_encode(array(
                'result'    => 1,
                'message'   => $seva_name2[1],
                'msg'   => $data1,
                'sp_id'   => $data2,
                'work' =>  $ab,
                'enableamount' => $ac ,
                'seva_id' => $aa
            ));
        }
        else{
        	return json_encode(array(
                'result'    => 0,
                'message'     => 'Select Seva'
            ));
        }
		// return ($data);

    }



public function contact(){

        $total_amount  = $this->request->getVar('total_amount');
        $payment_mode  = $this->request->getVar('payment_mode');
        $details  = $this->request->getVar('details');
        $amount_paid  = $this->request->getVar('amount_paid');
        $balance_amount  = $this->request->getVar('balance_amount');
        $received_by  = $this->request->getVar('received_by');

        // $model = new UsersModel();
        // $data = $model->first();

        date_default_timezone_set('Asia/Kolkata');   /* ----------2/1/21-------*/
        $updated_at = date('d-m-Y H:i:s', time()); 

        // -----------------------------------contact details---------------------------------------------------------

        $mobile_number  = $this->request->getVar('mobile_number');
        $temple_id = session()->get('temple');
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
        $comment = $this->request->getVar('comment');
        $gothra1 = $this->request->getVar('gothra');
        $gothra= explode('-',$gothra1);
        $booking_date = date('Y-m-d',strtotime($this->request->getVar('booking_date')));
        $booking_pnr = $this->request->getVar('booking_pnr');
        $status = $this->request->getVar('status');
        $pan = $this->request->getVar('pan');
        $adhar = $this->request->getVar('adhar');
        $purpose = $this->request->getVar('purpose');
        $rashi1 = $this->request->getVar('rashi');
        $rashi= explode('-',$rashi1);
        $nakshathra1 = $this->request->getVar('nakshathra');
        $nakshathra= explode('-',$nakshathra1);
        
        // $Model = new generalSevaModel();
        // $Model->select('receipt_no');
        // $Model->orderBy('id','DESC');
        // $data = $Model->first();
        // $kk = $data['receipt_no'];
        
        // if(empty($kk)){
        //     $a = 0;
        // }else{
        //     $f = explode("/",$kk);
        //     $a = $f[1];
        // }
        // $year = date("Y"); 
        // $value = $this->request->getVar('value');
        // $receipt = (int)$a+1;

        // $receipt_num = $value.'-'.$year.'/'.$receipt;
        // print_r($receipt_num);
        // echo $value;
        // die();
        
        // ------------------------------------general_seva_details----------------------------------------

        $seva_date  = $this->request->getVar('seva_date[]');
        $seva_name  = $this->request->getVar('seva_name[]');
        // $seva_name2 = explode("-",$seva_name);
        // $seva_code  = $seva_name2[0];
        

        $price = $this->request->getVar('price[]');
        $seva_units = $this->request->getVar('seva_units[]');
        $amount = $this->request->getVar('amount[]');
        $remark = $this->request->getVar('remark[]');
        $seva_id = $this->request->getVar('seva_id[]');
        $seva_price_id = $this->request->getVar('sp_id[]');

        // $added_by  = $this->request->getVar('added_by');

        // print_r($seva_name);         
        // die();

        // date_default_timezone_set('Asia/Kolkata');   
        // $updated_at = date('Y-m-d H:i:s', time()); 
        $updata = new generalBookingModel(); 
        $where = [
            'name'=>$name,
            'mobile_number'=>$mobile_number
        ];
        $enrty_update = $updata->where($where)->first();

        if($enrty_update){

            $newData = array(
                'mobile_number'=> $mobile_number,
                'name'=> $name,
                'address1'=>$address1,
                'address2'=>$address2,
                'city'=> $city,
                'pin_code'=> $pin_code,
                'state'=> $state,
                'country' => $country,
                'email'=> $email,
                'gothra'=> $gothra[0],
                'pan'=> $pan,
                'adhar'=> $adhar,
                'purpose'=> $purpose,
                'rashi'=> $rashi[0],
                'nakshathra'=>$nakshathra[0],
                'updated_by'=> $updated_by,
                'updated_at'=> $updated_at,
                'temple_id'=> $temple_id
            );
            // print_r($newData);
            // die();
            $ugtSaveModel = new generalBookingModel(); 
            $ugtSaveModel->set($newData);
            $ugtSaveModel->where('name',$name);
            $updatedID = $ugtSaveModel->update(); 
            $insertedID = $enrty_update['id'];

        }else
        {
            $newData = array(
                'mobile_number'=> $mobile_number,
                'name'=> $name,
                'address1'=>$address1,
                'address2'=>$address2,
                'city'=> $city,
                'pin_code'=> $pin_code,
                'state'=> $state,
                'country' => $country,
                'email'=> $email,
                'gothra'=> $gothra[0],            
                'pan'=> $pan,
                'adhar'=> $adhar,
                'purpose'=> $purpose,
                'rashi'=> $rashi[0],
                'nakshathra'=>$nakshathra[0],
                'created_by'=> $created_by,
                'temple_id'=> $temple_id

            );
            // print_r($newData);
            // die();
            $ugtSaveModel = new generalBookingModel(); 
            $ugtSaveModel->save($newData);
            $insertedID = $ugtSaveModel->insertID();

        }
        


        // ------------------------------------general seva array -----------------------------

        
        for($i = 0; $i < count($seva_date); $i++){

            
            $s_name = $seva_name[$i];
            $seva_name2 = explode("-",$s_name);

            // print_r($seva_name2);
            // die();

            $s_date = $seva_date[$i];
            $seva_date1 = date('Y-m-d',strtotime($s_date));
            $sevaData = array(
                'gc_id'=>$insertedID,
                'seva_date'=> $seva_date1,
                'seva_code'=> $seva_name2[0],
                'seva_name'=> $seva_name2[1],
                'booking_pnr'=> $booking_pnr,
                'status'=> $status,
                'booking_date'=> $booking_date,
                'receipt_no'=> 1,
                'price'=> $price[$i],
                'seva_units'=> $seva_units[$i],
                'amount'=> $amount[$i],
                'remark'=> $remark[$i],
                'updated_at' => $updated_at,
                'created_by'=> $created_by,
                'temple_id'=> $temple_id,
                'comment'=> $comment,
                'seva_id'=> $seva_id[$i],
                'seva_price_id'=> $seva_price_id[$i],
                'payment_mode'=>$payment_mode,
            );
            // print_r($sevaData);
            // die();
            $generalSevaModel = new generalSevaModel();
            $generalSevaModel->save($sevaData);
            $sevasID = $generalSevaModel->insertID();       

        }
        $paymentData = array(
            'gc_id'=>$insertedID,
            'gsb_id'=>$sevasID,
            'booking_pnr'=>$booking_pnr,
            'total_amount'=>$total_amount,
            'payment_method'=>$payment_mode,
            'details'=>$details,
            'amount_paid'=>$amount_paid,
            'balance_amount'=>$balance_amount,
            'received_by'=>$received_by,
            'created_by'=> $created_by,
            'temple_id'=> $temple_id

        );

        $generalSevapriceModel = new generalBookingSevaPriceModel();
        $generalSevapriceModel->save($paymentData);
        $priceID = $generalSevapriceModel->insertID();

        

        if($insertedID && $sevasID && $priceID){
            return json_encode(array(
                 'result'    => 1,
                 'message'     => 'Booked Successfully.....',
                 'msg' => $insertedID
                 
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
      
        $model = new generalBookingSevaPriceModel();
        $model->where('temple_id',$temple_id);
        $data = $model->where('gsb_id',$id)->first();
        $pnr = $data['booking_pnr'];
        $gc_id = $data['gc_id'];

        $model1 = new generalSevaModel();
        $model1->where('temple_id',$temple_id);
        $data1 = $model1->where('booking_pnr',$pnr)->findAll();

        $model2 = new generalBookingModel();
        $model2->where('temple_id',$temple_id);
        $data2 = $model2->where('id',$gc_id)->first();

        
        
        if($data){
            return json_encode(array(
                  'result'    => 1,
                  'message'   => $data,
                  'msg'=> $data1,
                  'msg1'=> $data2
                ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'   => 'Something went wrong...'
                  ));

        }

    }

    public function general_edit($id){
        // print_r($id);die();

        $temple_id = session()->get('temple');
        // $booking_pnr = $this->request->getVar('booking_date_e');
        // $data = $model->where('id',$temple_id)->first();
        // $general_id = ($data['gc_id']);
        // $booking_pnr = ($data['booking_pnr']);

        // $model1 = new generalBookingModel();
        // $data1 = $model1->where('id',$general_id)->first();

        // $model2 = new generalSevaModel();
        // $data2 = $model2->where('booking_pnr',$booking_pnr)->findAll();
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
        $model14 = new generalBookingSevaPriceModel();
        $model14->where('temple_id',$temple_id);
        $data4 = $model14->where('gsb_id',$id)->first();
        $data['price'] = $data4;
        $general_id = $data4['gc_id'];
        $booking_pnr = $data4['booking_pnr'];

        $model2 = new generalSevaModel();
        $model2->where('temple_id',$temple_id);        
        $data2 = $model2->where('booking_pnr',$booking_pnr)->findAll();
        $data['seva_details'] = $data2;
        $data['gc_id'] = $data2[0]['gc_id'];
        
        // print_r($data2[0]['gc_id']);
        // die();

        $model3 = new generalBookingModel();
        $model3->where('temple_id',$temple_id);
        $data3 = $model3->where('id',$general_id)->first();
        $data['generalbooking'] = $data3;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Gothra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['gothra'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Nakshathra')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['nakshathra'] = $details;       

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Rashi')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['rashi'] = $details;
        
        
        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Paymentmode')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['paymentmode'] = $details;

        $bash=['d,e,f'];
        $data['endo'] = $bash;

        return view('general_booking_edit',$data);
    
    }


    public function edit_general_booking(){

        $total_amount  = $this->request->getVar('total_amount_e');
        $payment_mode  = $this->request->getVar('payment_mode_e');
        $details  = $this->request->getVar('details_e');
        $amount_paid  = $this->request->getVar('amount_paid_e');
        $balance_amount  = $this->request->getVar('balance_amount_e');
        $balance_amount_paid  = $this->request->getVar('balance_amount_paid');

        $received_by  = $this->request->getVar('received_by_e');
    
        $model = new UsersModel();
        $data = $model->first();
    
        date_default_timezone_set('Asia/Kolkata');  
        $updated_at = date('d-m-Y H:i:s', time()); 
    
        $temple_id = session()->get('temple');
        
        $id =  $this->request->getVar('id');            /*-------------price_id---------*/
        $gc_id =  $this->request->getVar('b_id');    /*-------------contact_id---------*/
        $gsb_id =  $this->request->getVar('p_id');  /*-------------booking_id---------*/
        
        $mobile_number  = $this->request->getVar('mobile_number_e');

        $name = $this->request->getVar('name_e');
        $address1 = $this->request->getVar('address1_e');
        $address2 = $this->request->getVar('address2_e');
        $city = $this->request->getVar('city_e');
        $pin_code = $this->request->getVar('pin_code_e');
        $state = $this->request->getVar('state_e');
        $email = $this->request->getVar('email_e');
        $comment = $this->request->getVar('comments_e');
        $gothra1 = $this->request->getVar('gothra_e');
        $gothra=explode('-',$gothra1);
        $receipt_no = $this->request->getVar('receipt_no_e');
        $booking_date = date('Y-m-d',strtotime($this->request->getVar('booking_date_e')));
        $booking_pnr = $this->request->getVar('booking_pnr_e');
        $status = $this->request->getVar('status_e');
        $pan = $this->request->getVar('pan_e');
        $adhar = $this->request->getVar('adhar_e');
        $purpose = $this->request->getVar('purpose_e');
        $rashi1 = $this->request->getVar('rashi_e');
        $rashi= explode('-',$rashi1);
        $nakshathra1 = $this->request->getVar('nakshathra_e');
        $nakshathra= explode('-',$nakshathra1);
        $grand_total  = $this->request->getVar('grand_total_e');

        date_default_timezone_set('Asia/Kolkata');   
        $updated_at = date('d-m-Y H:i:s', time()); 
    
        // ------------------------------------general_seva_details----------------------------------------
        $model = new UsersModel();
        $data = $model->first();
        $seva_date  = $this->request->getVar('seva_date_e[]');
        print($seva_date);
        $seva_name  = $this->request->getVar('seva_name_e[]');
        
        
        
    
        $price  = $this->request->getVar('price_e[]');
        $seva_units  = $this->request->getVar('seva_unit_e[]');
        $amount  = $this->request->getVar('amount_e[]');
        $remark  = $this->request->getVar('remarks_e[]');
       
    
        date_default_timezone_set('Asia/Kolkata');   
        $updated_at = date('Y-m-d H:i:s', time());

        $delete = new generalSevaModel();  
        // $delete->where('gc_id',$gc_id);
        $delete->where('booking_pnr',$booking_pnr);
        $delete->where('temple_id',$temple_id);
        $deleteID = $delete->delete();
    
    
        $newData = array(
            'mobile_number'=> $mobile_number,
            'name'=> $name,
            'address1'=>$address1,
            'address2'=>$address2,
            'city'=> $city,
            'pin_code'=> $pin_code,
            'state'=> $state,
            'email'=> $email,
            // 'comment'=> $comment,
            'gothra'=> $gothra[0],
            // 'booking_date'=> $booking_date,
            // 'booking_pnr'=> $booking_pnr,
            'status'=> $status,
            'pan'=> $pan,
            'adhar'=> $adhar,
            'purpose'=> $purpose,
            'rashi'=> $rashi[0],
            'nakshathra'=>$nakshathra[0],
            'updated_by'=> $data['name'],
            'updated_at'=> $updated_at,
            'temple_id'=> $temple_id
        );
    
       

        // print_r($seva_date);
        // die();
        $ugtSaveModel1 = new generalBookingModel(); 
        $ugtSaveModel1->where('temple_id',$temple_id);
        $ugtSaveModel1->set($newData);
        $ugtSaveModel1->where('id',$gc_id);
        $updatedID = $ugtSaveModel1->update(); 
        // print_r($updatedID);die();
        

      
        if($updatedID){
        for($i=0; $i<count($seva_date); $i++){


            $s_date = $seva_date[$i];
            $seva_date1 = date('Y-m-d',strtotime($s_date));

            $s_name = $seva_name[$i];
            $seva_name2 = explode("-",$s_name);

           
            // print_r($s_name);
            // die();

            
                $sevaData = array(
                    'gc_id'=>$gc_id,
                    'seva_date'=> $seva_date1,
                    'seva_code'=> $seva_name2[0],
                    'seva_name'=> $seva_name2[1],
                    'booking_pnr'=> $booking_pnr,
                    'booking_date'=> $booking_date,
                    'receipt_no'=> $receipt_no,
                    'price'=> $price[$i],
                    'seva_units'=> $seva_units[$i],
                    'amount'=> $amount[$i],
                    'remark'=> $remark[$i],
                    'updated_at' => $updated_at,
                    'updated_by'=> $data['name'],
                    'temple_id'=> $temple_id,
                    'comment'=> $comment
    
    
                );
    
                
                // print_r($sevaData);
                // die();
                
                $generalsevaModel1 = new generalSevaModel();
                // $generalsevaModel->where('id',$gsb_id);
                $generalsevaModel1->where('temple_id',$temple_id);
                $generalsevaModel1->save($sevaData);  
                $updategeneral = $generalsevaModel1->insertID();  
            }
          
                
            
            

        

        $paymentData = array(
            'gc_id'=>$gc_id,
            'gsb_id'=>$updategeneral,
            'booking_pnr'=>$booking_pnr,
            'total_amount'=>$total_amount,
            'payment_method'=>$payment_mode,
            'details'=>$details,
            'amount_paid'=>$amount_paid,
            'balance_amount'=>$balance_amount,
            'balance_amount_paid'=>$balance_amount_paid,
            'received_by'=>$received_by,
            'updated_by'=> $data['name'],
            'temple_id'=> $temple_id,
            'updated_at' => $updated_at

        );

        

        $generalSevapriceModel1 = new generalBookingSevaPriceModel();
        $generalSevapriceModel1->where('temple_id',$temple_id);
        $generalSevapriceModel1->set($paymentData);
        $generalSevapriceModel1->where('id',$id);
        $priceID = $generalSevapriceModel1->update();


    };

       


        if($updategeneral && $priceID && $updatedID){ 
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Updated Successfully...',
                'message1'   => $updatedID
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    
    
    
    }

   
}






?>
