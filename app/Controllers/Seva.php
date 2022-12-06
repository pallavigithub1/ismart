<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\SevaModel;
use App\Models\sevaPriceModel;
use App\Models\AttributeValueModel;
use App\Models\UsersModel;
use App\Models\MasterModel;

helper('text');
// Devotee Master, temple addtion, Devotee addition..  

class Seva extends ResourceController
{
    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
	}
	public function index(){
        

    
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
        // $model = new MasterModel();
        // $model->where('temple_id',$temple_id);
        // $model->where('master_name','sevatype')->orderBy('id','DESC');
        // $details  = $model->get()->getResultArray();
        // $data['sevatype'] = $details;

		return view('seva_master_v',$data);
	}
    public function add_seva(){
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
        $data['seva_code'] = random_string('alnum',8);
        date_default_timezone_set('Asia/Kolkata');
        $data['date'] = date('Y-m-d', time());

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','sevatype')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['sevatype'] = $details;

        $bash=['a,b,c'];
        $data['rel'] = $bash;

        return view('add_seva_v',$data);
    }
    
    public function check_seva(){
        $seva_code = $this->request->getVar('seva_code');        
        $seva_name = $this->request->getVar('seva_name'); 

       

        $ugtSaveModel = new SevaModel();
        $data1  = $ugtSaveModel->where('seva_code',$seva_code)->first();
        $data2  = $ugtSaveModel->where('seva_name',$seva_name)->first();
       

        if($data1 || $data2){
            return json_encode(array(
                'result'    => 1,
                'message'     => 'seva code and seva name already exists'                
                ));
        }
        else{
            return json_encode(array(
                'result'    => 0                
                ));
        }

    }
    
        public function add_seva_details(){

        $temple_id = session()->get('temple');
        $seva_code = $this->request->getVar('seva_code');
        
        $seva_name = $this->request->getVar('seva_name');
        $regional_name =  $this->request->getVar('regional_value');
        $description = $this->request->getVar('description');
        $type = $this->request->getVar('type'); // 1 genral 2 - pudu

       
        
        $booking_open = date('Y-m-d',strtotime($this->request->getVar('booking_start')));
        $booking_end = date('Y-m-d',strtotime($this->request->getVar('booking_end')));
        
        $status = $this->request->getVar('status');
        $account_ref_code =  $this->request->getVar('a_r_code');
        $enable_units = $this->request->getVar('enable_units');
        $enable_amount = $this->request->getVar('enable_amount');

        $s_instructions =  $this->request->getVar('s_instructions');

        $seva_enable = $this->request->getVar('status');
        $enable_online_booking = $this->request->getVar('online_booking');
        $sms_required = $this->request->getVar('sms_required');
        $reminder_required = $this->request->getVar('reminder_required');
        $per_day_quota =  $this->request->getVar('p_d_quota');
        $online_quota = $this->request->getVar('o_quota');
        $meals_count = $this->request->getVar('m_count');

        $devotees_count = $this->request->getVar('d_count');

        

        $model = new UsersModel();
        $data = $model->first();

        $attribute = $this->request->getVar('attribute[]');
        $value = $this->request->getVar('value[]');

        $amt_open = $this->request->getVar('amt_open');
        $amt_end = $this->request->getVar('amt_end');
        $amt = $this->request->getVar('amt');
        
        
     //    $amt_open = date('Y-m-d',strtotime($this->request->getVar('amt_open[]')));
     //     $amt_end = date('Y-m-d',strtotime($this->request->getVar('amt_end[]')));
      

        

        $newData = array(
            'seva_code'=>$seva_code,
            'temple_id'=> $temple_id,
            'seva_name'=>$seva_name,
            'regional_name'=>$regional_name,
            'description'=>$description,
            'type' =>  $type,

            'booking_open'=>$booking_open,
            'booking_end'=> $booking_end,
            'enable'=>$status,
            'account_ref_code'=>$account_ref_code,
            'enable_units'=>$enable_units,
            'enable_amount'=>$enable_amount,
            'enable'=> $seva_enable,

            'special_instructions'=>$s_instructions,

            'enable_online_booking' =>  $enable_online_booking,
            'sms_required'=>$sms_required,
            'reminder_required'=> $reminder_required,
            'per_day_quota'=>$per_day_quota,
            'online_quota'=>$online_quota,
            'meals_count'=>$meals_count,
            'devotees_count'=>$devotees_count,

            'created_by' => $data['name']
        
        );

            
       // print_r($amt_open);
       // die();
        $ugtSaveModel = new SevaModel();
        $data1  = $ugtSaveModel->where('seva_code',$seva_code)->first();
        $data2  = $ugtSaveModel->where('seva_name',$seva_name)->first();
        if($data1 || $data2)
        {
            return json_encode(array(
                'result'    => 2,
                'message'   => 'seva code and seva name already exists',

            ));
        }
        else{
                
                for($i = 0; $i < count($amt_open); $i++){
                    $a_open = $amt_open[$i];
                    $open_date = date('Y-m-d',strtotime($a_open));
                    $a_end = $amt_end[$i];
                    $end_date = date('Y-m-d',strtotime($a_end));
                    
                    if(($open_date)>=$booking_open && ($end_date)<=$booking_end)
                    {
                        
                    }
                    else
                    {
                        return json_encode(array(
                            'result'    => 3,
                            'message'   => 'price start and price end dates to be between booking open and booking end dates'
                        ));
                    }
                    
                }
                
                $ugtSaveModel2 = new SevaModel();
                $ugtSaveModel2->where('temple_id',$temple_id);
                $ugtSaveModel2->save($newData);                
                $insertedID = $ugtSaveModel2->insertID();
                
                for($i = 0; $i < count($amt_open); $i++){
                    
                    $a_open = $amt_open[$i];
                    $open_date = date('Y-m-d',strtotime($a_open));
                    $a_end = $amt_end[$i];
                    $end_date = date('Y-m-d',strtotime($a_end));
                    
                    $newadd = [
                        'seva_id'=>$insertedID, 
                        'price_start'=>$open_date,
                        'price_end'=>$end_date,
                        'amount'=>$amt[$i],
                        'created_by' => $data['name'],
                        'temple_id'=> $temple_id

                    ];
                    $ugtSaveModel1 = new SevaPriceModel();
                    $ugtSaveModel1->where('temple_id',$temple_id);
                    $ugtSaveModel1->save($newadd);
                    $addedID = $ugtSaveModel1->insertID();            

                }
               

                for($i = 0; $i < count($attribute); $i++){
                    $newval = [
                        'seva_id'=>$insertedID, 
                        'seva_code'=>$seva_code,
                        'attribute'=>$attribute[$i],
                        'values'=>$value[$i],
                        'temple_id'=> $temple_id,
                        'created_by' => $data['name']
                    ];
                    $ugtAttrModel3 = new AttributeValueModel();
                    $ugtAttrModel3->where('temple_id',$temple_id);                                
                    $ugtAttrModel3->save($newval);
                    $valID = $ugtAttrModel3->insertID();
                }

                if($insertedID){
                    return json_encode(array(
                        'result'    => 1,
                        'message'     => 'Seva  is added successfully..',
                        'msg' => $newadd
                        ));
                }
                else{
                    return json_encode(array(
                        'result'    => 0,
                        'message'     => 'Something went wrong...'
                        ));
                }

        }
        
    }
    
    public function show_seva_details(){
        $temple_id = session()->get('temple');
          
        $model  = new SevaModel();
        $id = '1'; 
        // $model->where('enable','1')->orderBy('id','DESC');
        $model->orderBy('id','DESC');
        $model->where('temple_id',$temple_id);

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
//   public function show_seva_details_subgrid(){
//         $temple_id = session()->get('temple');
//         $id = $this->request->getVar('id'); 
//         $model  = new SevaModel();
//         $id = '1'; 
//         // $model->where('enable','1')->orderBy('id','DESC');
//         $model->orderBy('id','DESC');
//         $model->where('id',$id);

//         $data  = $model->get()->getResultArray();
//         $indexed_rows = [];
//         foreach ($data as $i) {
//             $indexed_rows[$i['id']] = $i;
//         } 

//         if($indexed_rows){
//             return $this->respondCreated($data);
//         }else{
//             return $this->failNotFound('No item found');
//         }
//   }
  public function show_seva_details_subgrid(){
        $temple_id = session()->get('temple');
        $id = $_GET['id'];  
        $model  = new SevaModel();
       
        // $model->where('enable','1')->orderBy('id','DESC');        
        $model->where('id',$id)->orderBy('id','DESC');
        $model->where('temple_id',$temple_id);

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
   
   
       public function remove_seva(){

        $id  = $this->request->getVar('id');

       
        $delete = new SevaModel();        
        $delete->where('id',$id);
        // $delete->where('temple_id',$temple_id);
        $deleteID = $delete->delete();

        $delete1 = new sevaPriceModel();
        $delete1->where('seva_id',$id);        
        $deleteID2 = $delete1->delete();

        $delete2 = new AttributeValueModel();
        $delete2->where('seva_id',$id);        
        $deleteID3 = $delete2->delete();

        
        if($deleteID && $deleteID2 && $deleteID3){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Deleted Successfully'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }

   

    public function update_item_details(){
       
        $temple_id = session()->get('temple');
        
        $id = $this->request->getVar('id');

        
        $seva_code = $this->request->getVar('seva_code');
        $seva_name = $this->request->getVar('seva_name');
        $regional_name = $this->request->getVar('regional_name');
        $description = $this->request->getVar('description');
        $type =  $this->request->getVar('type');
        // $effective_start_date = $this->request->getVar('effective_start_date');
        // $effective_end_date = $this->request->getVar('effective_end_date');
        $status = $this->request->getVar('status');
        $account_ref_code = $this->request->getVar('account_ref_code');

        $effective_start_date = date('Y-m-d',strtotime($this->request->getVar('effective_start_date')));
        $effective_end_date = date('Y-m-d',strtotime($this->request->getVar('effective_end_date')));

        $per_day_online = $this->request->getVar('per_day_online');
        $online_quota = $this->request->getVar('online_quota');
        $meals_count = $this->request->getVar('meals_count');
        $devotees_count = $this->request->getVar('devotees_count');

        // $enable_units = $('input[name=enable_units]:checked','#myForm').val();
        // $seva_enable = $this->request->getVar('status');
        $enable_units = $this->request->getVar('enable_units');
        $enable_amount = $this->request->getVar('enable_amount');
        $enable_online_booking = $this->request->getVar('enable_online_booking');
        $sms_required = $this->request->getVar('sms_required');
        $reminder_required = $this->request->getVar('reminder_required');

        $model = new UsersModel();
        $data = $model->first();

        date_default_timezone_set('Asia/Kolkata');   /* ----------2/1/21-------*/
        $updated_at = date('d-m-Y H:i:s', time());  

        $amt_open = $this->request->getVar('amt_open');
        $amt_end = $this->request->getVar('amt_end');
        $amt = $this->request->getVar('amt');
        
        // $enable_amount = $this->request->getVar('enable');
        // $amount = $this->request->getVar('amount');
        for($i = 0; $i < count($amt_open); $i++){
            $a_open = $amt_open[$i];
            $open_date = date('Y-m-d',strtotime($a_open));
            $a_end = $amt_end[$i];
            $end_date = date('Y-m-d',strtotime($a_end));
            
            if(($open_date)>=$effective_start_date && ($end_date)<=$effective_end_date)
            {
                
            }
            else
            {
                return json_encode(array(
                    'result'    => 3,
                    'message'   => 'price start and price end dates to be between booking open and booking end dates'
                ));
            }
            
        }

        $delete = new sevaPriceModel();        
        $delete->where('seva_id',$id);
        $delete->where('temple_id',$temple_id);
        $deleteID = $delete->delete();

        $newData = array(
            'seva_code'=> $seva_code,
            'seva_name'=> $seva_name,
            'regional_name'=>$regional_name,
            'description'=>$description,
            'type'=> $type,
            'booking_open'=> $effective_start_date,
            'booking_end'=> $effective_end_date,
            'enable'=> $status,
            'account_ref_code'=> $account_ref_code,
            'per_day_quota'=> $per_day_online,
            'online_quota'=> $online_quota,
            'meals_count'=> $meals_count,
            'devotees_count'=> $devotees_count,
            'temple_id'=> $temple_id,
            // 'enable'=> $seva_enable,
            'enable_units'=> $enable_units,
            'enable_amount'=> $enable_amount,
            'enable_online_booking'=> $enable_online_booking,
            'sms_required'=> $sms_required,
            'reminder_required'=> $reminder_required,

            'updated_by' => $data['name'],
            'updated_at' => $updated_at

            // 'amount'=> $amount,
            // 'enable_amount' =>  $enable_amount,
        );

        for($i=0; $i<count($amt_open); $i++){


            $a_open = $amt_open[$i];
            $open_date = date('Y-m-d',strtotime($a_open));
            $a_end = $amt_end[$i];
            $end_date = date('Y-m-d',strtotime($a_end));
            
            $newadd = [
                
                'seva_id'=>$id,
                'price_start'=>$open_date,
                'price_end'=>$end_date,
                'amount'=>$amt[$i],
                'temple_id'=> $temple_id,
                'updated_by' => $data['name'],
                'updated_at' => $updated_at
            ];

            $addModel = new sevaPriceModel();
            $addModel->where('temple_id',$temple_id);
            $addModel->save($newadd);
            $addID = $addModel->insertID();
        };
        

        $ugtSaveModel = new SevaModel();
        $ugtSaveModel->where('temple_id',$temple_id);
        $ugtSaveModel->set($newData);
        $ugtSaveModel->where('id',$id);
        $update = $ugtSaveModel->update();
        

        
        if( $update && $addID && $deleteID){
             return json_encode(array(
                  'result'    => 1,
                  'message'     => 'Master Item is Updated successfully..'
                  ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'     => 'Something went wrong...'
                  ));
        }
    }

    public function edit_seva($id){

        // $id = $this->request->getVar('id');
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
        $model1  = new SevaModel(); 
        $model1->where('temple_id',$temple_id);
        $data2 = $model1->where('id',$id)->first();
        $data['info'] = $data2;

        $smodel2 = new sevaPriceModel();
        $smodel2->where('temple_id',$temple_id);
        $data1 = $smodel2->where('seva_id',$id )->findAll();
        $data['info1'] = $data1;

        $model3 = new MasterModel();
        $model3->where('temple_id',$temple_id);
        $model3->where('master_name','sevatype')->orderBy('id','DESC');
        $details  = $model3->get()->getResultArray();
        $data['sevatype'] = $details;

        $bash=['a,b,c'];
        $data['endo'] = $bash;

        return view('seva_edit',$data);
        
    
    }
    
    
    // --------------end------------------------

	public function check_mobile(){
		 //

        // $model  = new TempleModel();
        // $id = '1'; 
        // $model->orderBy('id','DESC');

        // $temple_details  = $model->get()->getResultArray();
        // $data['temple_details'] = $temple_details;
         //=================================

        $mobile = $this->request->getVar('mobile');

        $model  = new ContactModel();      

        $data  = $model->where('mobile_number',$mobile)->first();

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


    public function export_seva_details(){

        $temple_id = session()->get('temple');
          
        $model  = new SevaModel();
        $id = '1'; 

        $model->orderBy('id','DESC');
        $model->where('temple_id',$temple_id);

        $data  = $model->get()->getResultArray();
        $indexed_rows = [];
        foreach ($data as $i) {
            $indexed_rows[$i['id']] = $i;
        } 

        return json_encode(array(
            'result'    => 1,
            'message'     => $indexed_rows
            ));
    }

}	
