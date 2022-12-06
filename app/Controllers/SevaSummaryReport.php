<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\sevaPriceModel;
use App\Models\generalSevaModel;

class SevaSummaryReport extends ResourceController{

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
		return view('seva_summary_report_v',$data);
	}

    public function date_between_items(){

        $temple_id = session()->get('temple');

        $from_date = date('Y-m-d',strtotime($this->request->getVar('from_date')));
        $to_date = date('Y-m-d',strtotime($this->request->getVar('to_date')));
        $type = $this->request->getVar('type');
     
        $sevaModel = new sevaPriceModel;
        $sevaModel->select('sevas.*,sevas_price_details.seva_id,sevas_price_details.amount,sevas_price_details.id as sp_id');
        $sevaModel->join('sevas','sevas_price_details.seva_id = sevas.id');
        $sevaModel->where('sevas_price_details.price_start >=',$from_date);
        $sevaModel->where('sevas_price_details.price_end <=',$to_date);
        $sevaModel->where('sevas.temple_id' , $temple_id);
        $sevaModel->where('sevas.type' , $type);
        $result = $sevaModel->findAll();
        $array = array();

        // print_r($result);die();

        if($type == 'General'){

            foreach($result as $value){

                $data['id']=$value['seva_id'];
                $data['sp_id']=$value['sp_id'];
    
                $GeneralSevaModel1 = new generalSevaModel;
                $GeneralSevaModel1->where('seva_id',$value['seva_id']);
                $GeneralSevaModel1->where('seva_price_id',$value['sp_id']);
                $GeneralSevaModel1->where('payment_mode','Cash');
                $Cashresult1 = $GeneralSevaModel1->findAll();
    
                $GeneralSevaModel2 = new generalSevaModel;
                $GeneralSevaModel2->where('seva_id',$value['seva_id']);
                $GeneralSevaModel2->where('seva_price_id',$value['sp_id']);
                $GeneralSevaModel2->where('payment_mode','UPI');
                $upiresult1 = $GeneralSevaModel2->findAll();
    
                $GeneralSevaModel3 = new generalSevaModel;
                $GeneralSevaModel3->where('seva_id',$value['seva_id']);
                $GeneralSevaModel3->where('seva_price_id',$value['sp_id']);
                $GeneralSevaModel3->where('payment_mode','NEFT');
                $neftresult1 = $GeneralSevaModel3->findAll();
    
                $GeneralSevaModel4 = new generalSevaModel;
                $GeneralSevaModel4->where('seva_id',$value['seva_id']);
                $GeneralSevaModel4->where('seva_price_id',$value['sp_id']);
                $GeneralSevaModel4->where('payment_mode','Cheque');
                $chequeresult1 = $GeneralSevaModel4->findAll();
               
    
                $data['cash_count']=count($Cashresult1);
                $data['cash_amount']=(count($Cashresult1) * $value['amount']);
    
                $data['upi_count']=count($upiresult1);
                $data['upi_amount']=(count($upiresult1) * $value['amount']);
    
                $data['cheque_count']=count($chequeresult1);
                $data['cheque_amount']=(count($chequeresult1) * $value['amount']);
    
                $data['neft_count']=count($neftresult1);
                $data['neft_amount']=(count($neftresult1) * $value['amount']);
    
                $data['seva_name']=$value['seva_name'];
                $data['seva_code']=$value['seva_code'];
                $data['type']=$value['type'];
                $data['amount']=$value['amount'];
                $data['regional_name']=$value['regional_name'];
            
                
                array_push($array, $data);			
    
            }


        }else if($type == 'Endowment'){

            foreach($result as $value){

                $data['id']=$value['seva_id'];
                $data['sp_id']=$value['sp_id'];
    
                $GeneralSevaModel1 = new bookingModel;
                $GeneralSevaModel1->where('seva_id',$value['seva_id']);
                $GeneralSevaModel1->where('seva_price_id',$value['sp_id']);
                $GeneralSevaModel1->where('payment_mode','Cash');
                $Cashresult1 = $GeneralSevaModel1->findAll();
    
                $GeneralSevaModel2 = new bookingModel;
                $GeneralSevaModel2->where('seva_id',$value['seva_id']);
                $GeneralSevaModel2->where('seva_price_id',$value['sp_id']);
                $GeneralSevaModel2->where('payment_mode','UPI');
                $upiresult1 = $GeneralSevaModel2->findAll();
    
                $GeneralSevaModel3 = new bookingModel;
                $GeneralSevaModel3->where('seva_id',$value['seva_id']);
                $GeneralSevaModel3->where('seva_price_id',$value['sp_id']);
                $GeneralSevaModel3->where('payment_mode','NEFT');
                $neftresult1 = $GeneralSevaModel3->findAll();
    
                $GeneralSevaModel4 = new bookingModel;
                $GeneralSevaModel4->where('seva_id',$value['seva_id']);
                $GeneralSevaModel4->where('seva_price_id',$value['sp_id']);
                $GeneralSevaModel4->where('payment_mode','Cheque');
                $chequeresult1 = $GeneralSevaModel4->findAll();
               
    
                $data['cash_count']=count($Cashresult1);
                $data['cash_amount']=(count($Cashresult1) * $value['amount']);
    
                $data['upi_count']=count($upiresult1);
                $data['upi_amount']=(count($upiresult1) * $value['amount']);
    
                $data['cheque_count']=count($chequeresult1);
                $data['cheque_amount']=(count($chequeresult1) * $value['amount']);
    
                $data['neft_count']=count($neftresult1);
                $data['neft_amount']=(count($neftresult1) * $value['amount']);
    
                $data['seva_name']=$value['seva_name'];
                $data['seva_code']=$value['seva_code'];
                $data['type']=$value['type'];
                $data['amount']=$value['amount'];
                $data['regional_name']=$value['regional_name'];
            
                
                array_push($array, $data);	
    
            }
        }

       

        if(!empty($array)){
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
