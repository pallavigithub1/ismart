<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\sevaDetailsModel;

class GeneralSevaReport extends ResourceController{

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
		return view('general_seva_report',$data);
	}

    public function date_between_items(){

        // $from_date = $this->request->getVar('from_date');
        // $to_date = $this->request->getVar('to_date');
        $temple_id = session()->get('temple');


        $from_date = date('Y-m-d',strtotime($this->request->getVar('from_date')));
        $to_date = date('Y-m-d',strtotime($this->request->getVar('to_date')));

        $gb_seva = new sevaDetailsModel;
        $gb_seva->where('seva_date >=',$from_date);
        $gb_seva->where('seva_date <=',$to_date);
        $gb_seva->where('temple_id' , $temple_id);

        $data = $gb_seva->findAll();


        if($data ){
            return json_encode(array(
                 'result'    => 1,
                 'message'     => $data
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

?>
