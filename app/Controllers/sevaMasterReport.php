<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\sevaPriceModel;

class SevaMasterReport extends ResourceController{

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
		return view('seva_master_report',$data);
	}

    public function date_between_items(){

        $temple_id = session()->get('temple');

        $from_date = date('Y-m-d',strtotime($this->request->getVar('from_date')));
        $to_date = date('Y-m-d',strtotime($this->request->getVar('to_date')));

        $sevaModel = new sevaPriceModel;
        $sevaModel->select('sevas.*,sevas_price_details.price_start,sevas_price_details.price_end,sevas_price_details.amount');
        $sevaModel->join('sevas','sevas_price_details.seva_id = sevas.id');
        $sevaModel->where('sevas_price_details.price_start >=',$from_date);
        $sevaModel->where('sevas_price_details.price_end <=',$to_date);
        $sevaModel->where('sevas.temple_id' , $temple_id);
        $result = $sevaModel->findAll();
        // print_r($result);die();
        $array = array();

        foreach($result as $value){

            $data['id']=$value['id'];
            $data['price_start']=date('d-m-Y',strtotime($value['price_start']));
            
            $data['price_end']=date('d-m-Y',strtotime($value['price_end']));
            $data['amount']=$value['amount'];

            $data['seva_name']=$value['seva_name'];
            $data['seva_code']=$value['seva_code'];
            $data['regional_name']=$value['regional_name'];
            $data['meals_count']=$value['meals_count'];
            $data['devotees_count']=$value['devotees_count'];

            $data['booking_open']=date('d-m-Y',strtotime($value['booking_open']));
            
            $data['booking_end']=date('d-m-Y',strtotime($value['booking_end']));


            if($value['enable_units'] == 0){
                $data['enable_units']=false;
            } else if($value['enable_units'] == 1){
                $data['enable_units']=true;
            }

            if($value['enable_amount'] == 0){
                $data['enable_amount']=false;
            } else if($value['enable_amount'] == 1){
                $data['enable_amount']=true;
            }

            
            array_push($array, $data);			

        }


        if($result ){
            return json_encode(array(
                 'result'    => 1,
                 'message'     => 'resive',
                 'mssg'     => $array
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
