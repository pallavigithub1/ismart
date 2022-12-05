<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\SevaModel;
use App\Models\generalSevaModel;

class SevaWiseReport extends ResourceController{

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
		return view('seva_wise_report_v',$data);
	}

    public function fetch_sevas(){
        $type = $this->request->getVar('type');
        $model = new SevaModel;
        $model->select('id,seva_name');
        $model->where('type', $type);
        $result = $model->findAll();
        if($result){
            return json_encode(array(
                 'result'    => 1,
                 'message'     => $result
                 ));
       }
       else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'No Data Found...'
                 ));
       }
        

    }

    public function fetch_seva_wise(){

        $temple_id = session()->get('temple');
        $seva_id = $this->request->getVar('seva');
        $type = $this->request->getVar('type');

        if($type == 'General'){


            $generalModel = new generalSevaModel;
            $generalModel->select('general_seva_booking_details.*,B.name as name_of,B.gothra,B.nakshathra,B.mobile_number');
            $generalModel->join('general_booking_contact_details B', 'B.id = general_seva_booking_details.gc_id');
            $generalModel->where('general_seva_booking_details.seva_id',$seva_id);
            $generalModel->where('general_seva_booking_details.temple_id' , $temple_id);
            $data = $generalModel->findAll();


        }else{

            $puduvattu_seva = new bookingModel;
            $puduvattu_seva->select('booking_details.*,contact_details.mobile_number');
            $puduvattu_seva->join('contact_details', 'contact_details.id = booking_details.contact_id');
            $puduvattu_seva->where('booking_details.seva_id',$seva_id);
            $puduvattu_seva->where('booking_details.temple_id' , $temple_id);
            $data = $puduvattu_seva->findAll();
        }

        if($data){
            return json_encode(array(
                 'result'    => 1,
                 'mssg'     => $data,
                 'type' => $type
                 ));
       }
       else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'No Data Found...'
                 ));
       }

    }

}

?>
