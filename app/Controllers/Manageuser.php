<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;
use App\Models\TempleModel;



class Manageuser extends ResourceController
{
    use ResponseTrait;

    // all users
    public function index(){
        // $temple_id = '1';
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
        return view('manageuser_v',$data);
    }
    public function add_user_details(){
//UV}D{8T0[27%

        $role = $this->request->getVar('role');
        $temple_id = session()->get('temple');
        $created_by = session()->get('name');
        $name = $this->request->getVar('name');
        $login_name =  $this->request->getVar('login_name');
        $password = $this->request->getVar('password');
        $email = $this->request->getVar('email'); // 1 genral 2 - pudu

        $mobile_number = $this->request->getVar('mobile_number');
        $language = $this->request->getVar('language');
        $active_from = date('Y-m-d',strtotime($this->request->getVar('active_from')));
        $active_end = date('Y-m-d',strtotime($this->request->getVar('active_end')));

        // echo $active_end;
        // die();
        // $status = $this->request->getVar('status');
        // $account_ref_code =  $this->request->getVar('a_r_code');
        // $enable_units = $this->request->getVar('enable_units');
        // $enable_amount = $this->request->getVar('enable_amount');

        // $enable_online_booking = $this->request->getVar('online_booking');
        // $sms_required = $this->request->getVar('sms_required');
        // $reminder_required = $this->request->getVar('reminder_required');
        // $per_day_quota =  $this->request->getVar('p_d_quota');
        // $online_quota = $this->request->getVar('o_quota');
        // $meals_count = $this->request->getVar('m_count');

        // $devotees_count = $this->request->getVar('d_count');

        // $model = new UsersModel();
        // $data = $model->first();

        // $amt_open = $this->request->getVar('amt_open');
        // $amt_end = $this->request->getVar('amt_end');
        // $amt = $this->request->getVar('amt');
        // $amt_string = '';

        // for($i = 0; $i < count($amt_open); $i++){
        //     $amt_string .= ($i+1).",".$amt_open[$i].",".$amt_end[$i].",".$amt[$i].",";
        // }
        // $amount = 555;
        // $amt_open_date = '';
        // $amt_end_date ='';
        // $flag = 0;
        // $today = date("d-m-Y");
      

        // for($i = 0; $i < count($amt_open); $i++){
        //     //echo $today;
        //     //echo $amt_open[$i];
        //     //echo $amt_end[$i];
        //     if(strtotime($amt_open[$i]) <= strtotime($today) && strtotime($amt_end[$i]) >= strtotime($today) && $flag == 0){
        //         $amount = $amt[$i];
        //         $amt_open_date = $amt_open[$i];
        //         $amt_end_date = $amt_end[$i];

        //         $flag = 1;
        //     }
        // }
        $newData = array(
            'username' => $login_name,
            'name' => $name,
            'role' => $role,
            'password' => $password,
            'email' => $email,
            'phone' => $mobile_number,
            'language' => $language,
            'active_from' => $active_from,
            'active_end' => $active_end,
            'temple_id'=> $temple_id,
            'created_by'=> $created_by
        );

            //print_r($newData);
           //die();

        // $newData = array(
        //     'seva_code'=>'QFvKTf2c',
        //     'temple_id'=> '1',
        //     'seva_name'=>'QFvKTf2c',
        //     'regional_name'=>'QFvKTf2c',
        //     'description'=>'QFvKTf2c11',
        //     'type' =>  '1',

        //     'booking_open'=>'QFvKTf2c',
        //     'booking_end'=> 'QFvKTf2c11',
        //     'status'=>'QFvKTf2c',
        //     'account_ref_code'=>'QFvKTf2c',
        //     'enable_units'=>'1',
        //     'enable_amount'=>'1',

        //     'enable_online_booking' => '1',
        //     'sms_required'=>'1',
        //     'reminder_required'=> '1',
        //     'per_day_quota'=>'1',
        //     'online_quota'=>'1',
        //     'meals_count'=>'1',
        //     'devotees_count'=>'1'
        // );

        $ugtSaveModel = new UsersModel();
        //$ugtSaveModel->save($newData);
        $ugtSaveModel->save($newData);;
        $insertedID = $ugtSaveModel->insertID();
        if($insertedID){
             return json_encode(array(
                  'result'    => 1,
                  'message'     => 'User  is added successfully..'
                  ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'     => 'Something went wrong...'
                  ));
        }
    }
    public function update_user_details(){
        $id = $this->request->getVar('id');

        
        $role = $this->request->getVar('role');
        $updated_by = session()->get('name');
        $name = $this->request->getVar('name');
        $login_name =  $this->request->getVar('login_name');
        $password = $this->request->getVar('password');
        $email = $this->request->getVar('email'); // 1 genral 2 - pudu

        $mobile_number = $this->request->getVar('mobile_number');
        $language = $this->request->getVar('language');
        $active_from = date('Y-m-d',strtotime($this->request->getVar('active_from')));
        $active_end = date('Y-m-d',strtotime($this->request->getVar('active_end')));

        // print_r($id);
        // die();

        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());

        $editData = array(
            'username' => $login_name,
            'name' => $name,
            'role' => $role,
            'password' => $password,
            'email' => $email,
            'phone' => $mobile_number,
            'language' => $language,
            'active_from' => $active_from,
            'active_end' => $active_end,
            'updated_by'=> $updated_by,
            'updated_at'=> $updated_at
        );
        $ugtSaveModel = new UsersModel();
        $ugtSaveModel->set($editData);
        $ugtSaveModel->where('id',$id);
        $update = $ugtSaveModel->update();

        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'User Details are Updated successfully..'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }
    public function show_user_details(){
        $temple_id = session()->get('temple');
        $model  = new UsersModel();
        $model->select('username, password, user_login.id, temple_details.name, temple_details.address, temple_details.phonenumber');
        $model->where('temple_id',$temple_id);
        $model->orderBy('id','DESC');
        $model->join('temple_details', 'user_login.temple_id = temple_details.id');
        $data  = $model->get()->getResultArray();
        // foreach($data as $c){
        //     $a[]=$c['temple_id'];
        // }
        // $temp = $a[0];
        // // echo $temp;
        // // die();
        // $model1 = new TempleModel();
        // $data1 = $model1->where('id',$temp)->first();
        if($data){
            return $this->respondCreated($data);
        }else{
            return $this->failNotFound('No item found');
        }
    }
    public function edit_user_details(){
        $user_id = $this->request->getVar('id');

        // print_r($user_id);
        // die();
        $model  = new UsersModel();
        $data = $model->where('id',$user_id)->first();
        if($data){
            return json_encode(array(
                  'result'    => 1,
                  'message'   => $data
                ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'   => 'Something went wrong...'
                  ));

        }
    }
    public function remove_user(){

        $id  = $this->request->getVar('id');

       
        $delete = new UsersModel();        
        $delete->where('id',$id);
        // $delete->where('temple_id',$temple_id);
        $deleteID = $delete->delete();
        
        if($deleteID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'User Deleted Successfully'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }
}
