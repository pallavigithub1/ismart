<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\sevaPriceModel;
use App\Models\generalSevaModel;
use App\Models\generalBookingModel;
use App\Models\generalBookingSevaPriceModel;

class ConsolidatedDayReport extends ResourceController{

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
		return view('consolidated_day_report',$data);
	}

    public function date_between_items(){

        $temple_id = session()->get('temple');

        $from_date = date('Y-m-d',strtotime($this->request->getVar('from_date')));
        $to_date = date('Y-m-d',strtotime($this->request->getVar('to_date')));
        $type = $this->request->getVar('type');
     
        if($type == 'General'){
            $generalModel = new generalBookingSevaPriceModel;
            $generalModel->select('payment_method,created_at as date');
            $generalModel->where('created_at >=',$from_date);
            $generalModel->where('created_at <=',$to_date);
            $generalModel->where('temple_id', $temple_id);
            $result = $generalModel->findAll();

            $uniqueArray1 = array();
            
            foreach($result as $value){
                $date =strtotime($value['date']);
                $uniVal = date("d-m-Y",$date);
               array_push($uniqueArray1, $uniVal);
            }
            $uniqueArray = array_unique($uniqueArray1);

            $array = array();

            foreach($uniqueArray as $value){

                $date =strtotime($value);
                $data['date'] = date("d-m-Y",$date);
                $date1 = date("Y-m-d",$date);

                $generalModel2 = new generalBookingSevaPriceModel;
                $generalModel2->select('sum(amount_paid) as amount_paid');
                $generalModel2->like('created_at',$date1);
                $generalModel2->where('payment_method ','Cash');
                $Cashresult1 = $generalModel2->findAll();

                $generalModel3 = new generalBookingSevaPriceModel;
                $generalModel3->select('sum(amount_paid) as amount_paid');
                $generalModel3->like('created_at',$date1);
                $generalModel3->where('payment_method ','Cheque');
                $Chequeresult1 = $generalModel3->findAll();

                $generalModel4 = new generalBookingSevaPriceModel;
                $generalModel4->select('sum(amount_paid) as amount_paid');
                $generalModel4->like('created_at',$date1);
                $generalModel4->where('payment_method ','UPI');
                $UPIresult1 = $generalModel4->findAll();

                $generalModel5 = new generalBookingSevaPriceModel;
                $generalModel5->select('sum(amount_paid) as amount_paid');
                $generalModel5->like('created_at',$date1);
                $generalModel5->where('payment_method ','NEFT');
                $NEFTresult1 = $generalModel5->findAll();
                $data['type']= 'General';
                if($Cashresult1[0]['amount_paid'] != ''){
                    $data['cash_amount']=$Cashresult1[0]['amount_paid'];
                } else{
                    $data['cash_amount']=0;
                }

                if($Chequeresult1[0]['amount_paid'] != ''){
                    $data['cheque_amount']=$Chequeresult1[0]['amount_paid'];
                } else{
                    $data['cheque_amount']=0;
                }

                if($UPIresult1[0]['amount_paid'] != ''){
                    $data['upi_amount']=$UPIresult1[0]['amount_paid'];
                } else{
                    $data['upi_amount']=0;
                }

                if($NEFTresult1[0]['amount_paid'] != ''){
                    $data['neft_amount']=$NEFTresult1[0]['amount_paid'];
                } else{
                    $data['neft_amount']=0;
                }
                 $data['total'] = $data['cash_amount'] + $data['cheque_amount'] + $data['upi_amount'] + $data['neft_amount'];
                array_push($array, $data);			
    
            }


        }else if( $type == 'Endowment'){
            $bookingModel = new bookingModel;
            $bookingModel->select('payment_mode,created_at as date');
            $bookingModel->where('payment_date >=',$from_date);
            $bookingModel->where('payment_date <=',$to_date);
            $bookingModel->where('temple_id', $temple_id);
            $result = $bookingModel->findAll();

            $uniqueArray1 = array();
            
            foreach($result as $value){
                $date =strtotime($value['date']);
                $uniVal = date("d-m-Y",$date);
               array_push($uniqueArray1, $uniVal);
            }
            $uniqueArray = array_unique($uniqueArray1);

            $array = array();

            foreach($uniqueArray as $value){
                // print_r($value);die();

                $date =strtotime($value);
                $data['date'] = date("d-m-Y",$date);
                $date1 = date("Y-m-d",$date);

                $bookingModel1 = new bookingModel;
                $bookingModel1->select('sum(grand_total) as amount_paid');
                $bookingModel1->like('payment_date',$date1);
                $bookingModel1->where('payment_mode ','Cash');
                $Cashresult1 = $bookingModel1->findAll();

                $bookingModel2 = new bookingModel;
                $bookingModel2->select('sum(grand_total) as amount_paid');
                $bookingModel2->like('payment_date',$date1);
                $bookingModel2->where('payment_mode ','Cheque');
                $Chequeresult1 = $bookingModel2->findAll();

                $bookingModel3 = new bookingModel;
                $bookingModel3->select('sum(grand_total) as amount_paid');
                $bookingModel3->like('payment_date',$date1);
                $bookingModel3->where('payment_mode ','UPI');
                $UPIresult1 = $bookingModel3->findAll();

                $bookingModel4 = new bookingModel;
                $bookingModel4->select('sum(grand_total) as amount_paid');
                $bookingModel4->like('payment_date',$date1);
                $bookingModel4->where('payment_mode ','NEFT');
                $NEFTresult1 = $bookingModel4->findAll();
                $data['type']= 'Endowment';
                if($Cashresult1[0]['amount_paid'] != ''){
                    $data['cash_amount']=$Cashresult1[0]['amount_paid'];
                } else{
                    $data['cash_amount']=0;
                }

                if($Chequeresult1[0]['amount_paid'] != ''){
                    $data['cheque_amount']=$Chequeresult1[0]['amount_paid'];
                } else{
                    $data['cheque_amount']=0;
                }

                if($UPIresult1[0]['amount_paid'] != ''){
                    $data['upi_amount']=$UPIresult1[0]['amount_paid'];
                } else{
                    $data['upi_amount']=0;
                }

                if($NEFTresult1[0]['amount_paid'] != ''){
                    $data['neft_amount']=$NEFTresult1[0]['amount_paid'];
                } else{
                    $data['neft_amount']=0;
                }
                 $data['total'] = $data['cash_amount'] + $data['cheque_amount'] + $data['upi_amount'] + $data['neft_amount'];
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
