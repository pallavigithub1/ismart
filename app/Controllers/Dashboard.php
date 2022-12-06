<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\IsmartModel;
use App\Models\MasterModel;
use App\Models\TempleModel;
use App\Models\UsersModel;
use App\Models\generalSevaModel;
use App\Models\generalBookingSevaPriceModel;
use App\Models\generalBookingModel;
use App\Models\bookingModel;
use App\Models\ContactModel;
use App\Models\additionalInformationModel;
// Devotee Master, temple addtion, Devotee addition..  

class Dashboard extends ResourceController
{
    use ResponseTrait;
	public function __construct()
	{
		helper(['form','url']);
	}	
    // all users
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
            $model->where('id',$temple_id);
            // $id = '1'; 
            // $model->orderBy('id','DESC');

            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;
        }
        return view('dashboard_v',$data);
	}

    public function change_temple(){
         $temple_id = $this->request->getVar('temple_id');
         $model  = new TempleModel();
         $details = $model->where('id',$temple_id)->first();
         $name = $details['name'];
         $image = $details['image'];
         $prefix = $details['receipt_number_prefix'];
         $sessionData = array(
                    'id' => session()->get('id'),
                    'name' => session()->get('name'),
                    'temple' => $temple_id,
                    'user'=>true,
                    'temple_name' => $name,
                    'image' => $image,
                    'prefix' => $prefix
        );
        session()->set($sessionData);
        $role_id = '1';
        echo json_encode(array(
                      'result'    => 1,
                      'message'   => 'valid',
                      'role_id'   => $role_id,
                      'name' => session()->get('name'),
                      'temple_id' => session()->get('temple')
                  ));
    }
    public function details($role_id = null){
        $t_id = session()->get('t_id');
        $role_id = $this->request->getVar('role');
        if($role_id == '2'){
            $model  = new TempleModel();
             $model->where('id',$t_id);
            // $model->orderBy('id','DESC');
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;


            return view('dashboard_v',$data);
        }
        elseif($role_id == '1'){
            $model  = new TempleModel();
             $model->where('id',$t_id);
            // $model->orderBy('id','DESC');
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;


            return view('dashboard_v',$data);
        }elseif($role_id == '3'){
            $model  = new TempleModel();
             $model->where('id',$t_id);
            // $model->orderBy('id','DESC');
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;


            return view('dashboard_v',$data);
        }else{
            $model  = new TempleModel();
            $model->orderBy('id','DESC');
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;

            $bash=['a,b,c'];
            $data['endo'] = $bash;
            return view('dashb_v',$data);
        }
        
        // $indexed_rows = [];
        // foreach ($temple_details as $i) {
        //     $indexed_rows[$i['id']] = $i;
        // } 
        // $data['temple_details'] = $temple_details;

        // $bash=['a,b,c'];
        // $data['endo'] = $bash;

        // return view('dashb_v',$data);
    }
    public function master($role_id = null){
        $data['loggin_id'] = session()->get('name');
        $model = new IsmartModel();
        $master_type = $model->master_type();
        $data['master_type'] = $master_type;
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

        return view('master_v',$data);
    }
    public function add_item_details(){
        $data['loggin_id'] = session()->get('name');
        $temple_id = session()->get('temple');
        $master_id = $this->request->getVar('master_id1');
        $master_type_add = $this->request->getVar('master_type_add1');
        $master_val = $this->request->getVar('master_value_add1');
        $description =  $this->request->getVar('description1');
        $r_value = $this->request->getVar('r_value1');
        $enable = $this->request->getVar('enable1');
        $newData = array(
            'temple_id'=>$temple_id,
            'master_id'=> $master_id,
            'master_name'=>$master_type_add,
            'master_value'=>$master_val,
            'description'=>$description,
            'regional_value'=>$r_value,
            'enable' =>  $enable
        );

        $ugtSaveModel = new MasterModel();
        $ugtSaveModel->save($newData);
        $ugtSaveModel->where('temple_id',$temple_id);
        $insertedID = $ugtSaveModel->insertID();
        if( $insertedID){
             return json_encode(array(
                  'result'    => 1,
                  'message'     => 'Master Item is added successfully..'
                  ));
        }
        else{
             return json_encode(array(
                  'result'    => 0,
                  'message'     => 'Something went wrong...'
                  ));
        }
    }
    public function update_item_details(){
        $data['loggin_id'] = session()->get('name');
        $temple_id = session()->get('temple');
        $master_id = $this->request->getVar('master_id');
        $master_type_add = $this->request->getVar('master_type_add');
        $master_val = $this->request->getVar('master_value_add');
        $description =  $this->request->getVar('description');
        $r_value = $this->request->getVar('r_value');
        $enable = $this->request->getVar('enable');
        $id = $this->request->getVar('id');
        $newData = array(
            'temple_id'=>$temple_id,
            'master_id'=> $master_id,
            'master_name'=>$master_type_add,
            'master_value'=>$master_val,
            'description'=>$description,
            'regional_value'=>$r_value,
            'enable' =>  $enable
        );

        $ugtSaveModel = new MasterModel();
        $ugtSaveModel->set($newData);
        $ugtSaveModel->where('id',$master_id);
        $update = $ugtSaveModel->update();

        
        if( $update){
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
   public function show_item_details(){
    $temple_id = session()->get('temple');
 
        $model  = new MasterModel();
        $id = '1'; 
        // $model->where('enable',1)->orderBy('id','DESC');
        $model->orderBy('id','DESC');
        // $model->where('id','DESC');
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
   
       public function remove_master_list_item(){

        $id  = $this->request->getVar('id');

       
        $delete = new MasterModel();        
        $delete->where('id',$id);
        // $delete->where('temple_id',$temple_id);
        $deleteID = $delete->delete();
        
        if($deleteID){
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
   
    public function edit_item_details(){
        $master_id = $this->request->getVar('id');
        $model  = new MasterModel();
        $data = $model->where('id',$master_id)->first();
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

    public function temple($role_id = null){
        $data['loggin_id'] = session()->get('name');
        $model = new IsmartModel();
        $master_type = $model->master_type();
        $data['master_type'] = $master_type;
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
        // print_r($role_id);die();
        return view('temple_v',$data);
    }



    public function add_temple_details(){ 
        $data['loggin_id'] = session()->get('name');
        //$temple_id = '1';
        $temple_name  = $this->request->getVar('temple_name');
        $email = $this->request->getVar('email');
        $address = $this->request->getVar('address');
        $phone =  $this->request->getVar('phone');
        $contact_person = $this->request->getVar('contact_person');
        $receipt_header = $this->request->getVar('receipt_header');
        $receipt_footer = $this->request->getVar('receipt_footer');
        $receipt_prefix =  $this->request->getVar('receipt_prefix');
        $receipt_instructions = $this->request->getVar('receipt_instructions');
        $imageFile = $this->request->getFile('image_logo');
        if($imageFile->isValid() && !$imageFile->hasMoved()){
            $newName = $imageFile->getName();
            $imageFile->move('uploads/', $newName);
        }
        // $filepath = base_url()."/uploads/".$newName;
        // $image_logo=$_FILES["image_logo"]["name"];
		// $temp=$_FILES["image_logo"]["tmp_name"];
		// $upd="upload/";
        $model = new UsersModel();
        $data = $model->first();
        $newData = array(
            'name'=> $temple_name,
            'image' => $imageFile->getClientName(), 
            'email'=> $email,
            'address'=> $address,
            'phonenumber'=> $phone,
            'contactperson'=> $contact_person,
            'receipt_header'=> $receipt_header,
            'receipt_footer'=> $receipt_footer,
            'receipt_number_prefix'=> $receipt_prefix,
            'receipt_instructions'=> $receipt_instructions,
            'created_by'=> $data['name']
        );

        $ugtSaveModel = new TempleModel(); 
        $ugtSaveModel->save($newData);
        $insertedID = $ugtSaveModel->insertID();
        if($insertedID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Temple is added successfully..'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }

    public function remove_temple_details(){

        $id  = $this->request->getVar('id');

       
        $delete = new TempleModel();        
        $delete->where('id',$id);
        // $delete->where('temple_id',$temple_id);
        $deleteID = $delete->delete();
       
        
        if($deleteID){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Temple Deleted Successfully',
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Error'
            ));
        }
    }


    
    public function update_temple_details(){
        $data['loggin_id'] = session()->get('name');
        $temple_id = '1';
        $id = $this->request->getVar('id');
        $model = new TempleModel();
        $details = $model->where('id',$id)->first();
        $old_img_name = $details['image'];

        $temple_name  = $this->request->getVar('temple_name');
        $email = $this->request->getVar('email');
        $address = $this->request->getVar('address');
        $phone =  $this->request->getVar('phone');
        $contact_person = $this->request->getVar('contact_person');
        $receipt_header = $this->request->getVar('receipt_header');
        $receipt_footer = $this->request->getVar('receipt_footer');
        $receipt_prefix =  $this->request->getVar('receipt_prefix');
        $receipt_instructions = $this->request->getVar('receipt_instructions');
        $imageFile = $this->request->getFile('image_logo');
        if($imageFile->isValid() && !$imageFile->hasMoved()){
            if(file_exists("uploads/".$old_img_name)){
                unlink("uploads/".$old_img_name);
            }
            $newName = $imageFile->getName();
            $imageFile->move('uploads/', $newName);
        }
        else{
            $newName = $old_img_name;
        }
        date_default_timezone_set('Asia/Kolkata');
        $updated_at = date('d-m-Y H:i:s', time());
        $model = new UsersModel();
        $data = $model->first();
        $newData = array(
            'name'=> $temple_name, 
            'image' => $newName,
            'email'=> $email,
            'address'=> $address,
            'phonenumber'=> $phone,
            'contactperson'=> $contact_person,
            'receipt_header'=> $receipt_header,
            'receipt_footer'=> $receipt_footer,
            'receipt_number_prefix'=> $receipt_prefix,
            'receipt_instructions'=> $receipt_instructions,
            'updated_by'=> $data['name'],
            'updated_at'=> $updated_at
        );

        $ugtSaveModel = new TempleModel();

        $ugtSaveModel->set($newData);
        $ugtSaveModel->where('id',$id);
        $update = $ugtSaveModel->update();

        
        if($update){
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Temple Details are Updated successfully..'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong...'
            ));
        }
    }




    
    public function show_temple_details(){
        $temple_id = session()->get('temple');
        $role_id = session()->get('role_id');
        

        $model = new TempleModel();
        if($role_id != 4){
          $model->where('id',$temple_id);  
        }
        // $model->where('id',$temple_id);
        // $model->orderBy('id','DESC');

        $data  = $model->get()->getResultArray();
        // print_r($data);die();
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
   public function edit_temple_details(){
        $temple_id = $this->request->getVar('id');
        $model  = new TempleModel();
        $data = $model->where('id',$temple_id)->first();
        // $dats['img'] = $data;
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

    public function devotee($role_id = null){
        $data['loggin_id'] = session()->get('name');
        
        
        $model  = new TempleModel();
        $id = '1'; 
        $model->orderBy('id','DESC');

        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;

        return view('devotee_v',$data);
    }
    // create
    public function create() {
        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $model->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Employee created successfully'
          ]
      ];
      return $this->respondCreated($response);
    }

    // single user
    public function show($id = null){
        $model = new EmployeeModel();
        $id = '1';
        $data = $model->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No employee found');
        }
    }
    public function show_data($id = null){
        $model = new EmployeeModel();
        $id = '1';
        $data = $model->show_data($id);
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No employee found');
        }
    }

    // update
    public function update($id = null){
        $model = new EmployeeModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $model->update($id, $data);
        $response = [
          'status'   => 200,
          'error'    => null,
          'messages' => [
              'success' => 'Employee updated successfully'
          ]
      ];
      return $this->respond($response);
    }

    // delete
    public function delete($id = null){
        $model = new EmployeeModel();
        $data = $model->where('id', $id)->delete($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Employee successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No employee found');
        }
    }
    public function view_page(){
        $temple_id  = session()->get('temple');
        $pnr = $this->request->getVar('pnr');       
      
        $model = new generalBookingSevaPriceModel();
        $model->where('temple_id',$temple_id);
        $data3 = $model->where('booking_pnr',$pnr)->first();
        // $pnr = $data['booking_pnr'];
        $gc_id = $data3['gc_id'];

        $model1 = new generalSevaModel();
        $model1->where('temple_id',$temple_id);
        $data1 = $model1->where('booking_pnr',$pnr)->findAll();

        $model2 = new generalBookingModel();
        $model2->where('temple_id',$temple_id);
        $data2 = $model2->where('id',$gc_id)->first();

        $model3 = new bookingModel();
        $model3->where('temple_id',$temple_id);
        $data4 = $model3->where('booking_pnr',$pnr)->first();
        $contact_id = $data4['contact_id'];
        $b_id = $data4['id'];

        $model4 = new ContactModel();
        $model4->where('temple_id',$temple_id);
        $data5 = $model4->where('id',$contact_id)->first();

        $model5 = new additionalInformationModel();
        $model5->where('temple_id',$temple_id);
        $data6 = $model5->where('booking_id',$b_id)->findAll();

        if($data3){
            return json_encode(array(
                'result'    => 1,
                'message'   => $data3,
                'msg'=> $data1,
                'msg1'=> $data2,
                'type'=>2  //general
            ));
        }
        elseif($data4){
            return json_encode(array(
                'result'    => 1,
                'message'   => $data4,
                'msg1'=> $data5,
                'msg2'=> $data6,
                'type'=>1    //endowment
            ));
        }
        else{
             return json_encode(array(
                'result'    => 0,
                'message'   => 'No data found...'
            ));
        }
    }

}
