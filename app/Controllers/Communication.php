<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\puduvattuModel;

class Communication extends ResourceController{

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
		return view('communication_v',$data);
	}

    public function date_between_items(){

        $temple_id = session()->get('temple');

        $from_date = date('Y-m-d',strtotime($this->request->getVar('from_date')));
        $to_date = date('Y-m-d',strtotime($this->request->getVar('to_date')));

        $puduvattu_seva = new bookingModel;
        // $data = $puduvattu_seva->get()->getResultArray();
        $puduvattu_seva->where('booking_date >=',$from_date);
        $puduvattu_seva->where('booking_date <=',$to_date);
        $puduvattu_seva->where('temple_id' , $temple_id);
        

        $data = $puduvattu_seva->findAll();


        if($data ){
            return json_encode(array(
                 'result'    => 1,
                 'message'     => 'resive',
                 'mssg'     => $data
                 ));
       }
       else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong...'
                 ));
       }

    }
    public function print(){
        $id = $_GET['id']; 
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
        $model1 = new bookingModel();
        $number = $model1->where('id',$id)->first();
        $t_id = $number['temple_id'];
        $c_id = $number['contact_id'];

        $model2 = new TempleModel();
        $dat = $model2->where('id',$t_id)->first();
        $data['info'] = $dat;

        $model3 = new puduvattuModel();
        $dats = $model3->where('id',$c_id)->first();
        $data['info1'] = $dats;

        $bash=['d,e,f'];
        $data['rcpt'] = $bash;

        return view('communication_letter',$data);
    }

}

?>
