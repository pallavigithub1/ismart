<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\DevoteeModel;
use App\Models\UsersModel;

helper('text');
// Devotee Master, temple addtion, Devotee addition..  

class Devotee extends ResourceController
{
    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
	}
	public function master(){
        

    
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
        $bash=['a,b,c'];
        $data['rel'] = $bash;

		return view('devotee_master_v',$data);
	}
    public function add_seva(){
        
        $model  = new TempleModel();
        $id = '1'; 
        $model->orderBy('id','DESC');

        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;
        $data['seva_code'] = random_string('alnum',8);
        date_default_timezone_set('Asia/Kolkata');
        $data['date'] = date('d-m-Y', time());
        return view('add_seva_v',$data);
    }
      public function add_devotee_details(){


        $name = $this->request->getVar('name');
        $level = $this->request->getVar('level');
        $gender = $this->request->getVar('gender');
        $temple_id = session()->get('temple');
        $mobile_number = $this->request->getVar('mobile_number');
        $address1 =  $this->request->getVar('address1');
        $address2 = $this->request->getVar('address2');
        $city = $this->request->getVar('city'); // 1 genral 2 - pudu

        $pin_code = $this->request->getVar('pin_code');
        $state = $this->request->getVar('state');
        $email = $this->request->getVar('email');
        $pan =  $this->request->getVar('pan');
        $adhar = $this->request->getVar('adhar');
        $enable = $this->request->getVar('enable');
        // $created_at = date('d-m-Y H:i:s', time());
        $model = new UsersModel();
        $data = $model->first();
        $newData = array(
            'name'=>$name,
            'temple_id'=> $temple_id,
            'level' => $level,
            'gender' => $gender,
            'mobile_number'=>$mobile_number,
            'address1'=>$address1,
            'address2'=>$address2,
            'city' => $city,

            'pin_code'=>$pin_code,
            'state'=> $state,
            'email'=>$email,
            'pan'=>$pan,
            'adhar'=>$adhar,
            'enable'=>$enable,
            'created_by' => $data['name']
        );
        
        

        $ugtSaveModel = new DevoteeModel();
        $ugtSaveModel->where('temple_id',$temple_id);
        $insertedID = $ugtSaveModel->save($newData);
        $insertedID = $ugtSaveModel->insertID();
        if($insertedID){
             return json_encode(array(
                  'result'    => 1,
                  'message'     => 'Devotee  is added successfully..'
                  ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'     => 'Something went wrong...'
                  ));
        }
    }
    public function update_devotee_details(){
//UV}D{8T0[27%

        $name = $this->request->getVar('name');
        $level = $this->request->getVar('level');
        $gender = $this->request->getVar('gender');
        $temple_id = session()->get('temple');
        $mobile_number = $this->request->getVar('mobile_number');
        $address1 =  $this->request->getVar('address1');
        $address2 = $this->request->getVar('address2');
        $city = $this->request->getVar('city'); // 1 genral 2 - pudu

        $pin_code = $this->request->getVar('pin_code');
        $state = $this->request->getVar('state');
        $email = $this->request->getVar('email');
        $pan =  $this->request->getVar('pan');
        $adhar = $this->request->getVar('adhar');
        $enable = $this->request->getVar('enable');
        $updated_at = date('d-m-Y H:i:s', time()); 
        $model = new UsersModel();
        $data = $model->first();

        $id = $this->request->getVar('id');
        $newData = array(
            'name'=>$name,
            'temple_id'=> $temple_id,
            'level' => $level,
            'gender' => $gender,
            'mobile_number'=>$mobile_number,
            'address1'=>$address1,
            'address2'=>$address2,
            'city' => $city,

            'pin_code'=>$pin_code,
            'state'=> $state,
            'email'=>$email,
            'pan'=>$pan,
            'adhar'=>$adhar,
            'enable'=>$enable,
            'updated_at' => $updated_at,
            'updated_by' => $data['name']
        );
        
        

        $ugtSaveModel = new DevoteeModel();
        $ugtSaveModel->where('temple_id',$temple_id);
        $ugtSaveModel->set($newData);
        $ugtSaveModel->where('id',$id);
        $update = $ugtSaveModel->update();

        
        if( $update){
             return json_encode(array(
                  'result'    => 1,
                  'message'     => 'Devotee details are Updated successfully..'
                  ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'     => 'Something went wrong...'
                  ));
        }
    }
    public function get_devotee_details(){

        $devotee_id = $this->request->getVar('id');
        $model  = new DevoteeModel();
        $data = $model->where('id',$devotee_id)->first();
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
   
   
   public function remove_devotee(){

        $id  = $this->request->getVar('id');

       
        $delete = new DevoteeModel();        
        $delete->where('id',$id);
        // $delete->where('temple_id',$temple_id);
        $deleteID = $delete->delete();
        
        if($deleteID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Devotee Deleted Successfully'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }

    }
   
   
    public function show_devotee_details(){
        $temple_id = session()->get('temple');

        $model  = new DevoteeModel();
        $id = '1'; 
        //$model->where('enable','1')->orderBy('id','DESC');
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

}	
