<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\SevaModel;
use App\Models\generalSevaModel;
use App\Models\LoginStatusModel;
use App\Models\generalBookingSevaPriceModel;


class DayLoginWise extends ResourceController{

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
		return view('day_login_report_v',$data);
	}



    public function fetch_daywise(){

        $temple_id = session()->get('temple');
        $from_date = date('Y-m-d',strtotime($this->request->getVar('from_date')));
        $to_date = date('Y-m-d',strtotime($this->request->getVar('to_date')));


        $model  = new LoginStatusModel();
        $model->select('login_status.*,B.username,B.name');
        $model->join('user_login B','B.id = login_status.user_id'); 
        $model->where('login_status.login_at >=',$from_date);
        $model->where('login_status.login_at <=',$to_date);
        $model->where('login_status.temple_id ',$temple_id);
        $result = $model->findAll();

        $array = array();
       foreach($result as $value){

        $data['login_date']= date('d-m-Y',strtotime($value['login_at']));
        $data['login_at']= date('h:i a',strtotime($value['login_at']));
        
        if($value['logout_at'] == '0000-00-00 00:00:00'){
            $data['logout_at'] = 'ACTIVE';
        } else{
             $data['logout_at']= date('h:i a',strtotime($value['logout_at']));
        }
        // $data['logout_at']= $value['logout_at'];
        // $data['login_at']= $value['login_at'];
        $data['user_id']=$value['user_id'];
        $data['username']=$value['username'];

        $model1  = new bookingModel();
        $model1->select('count(payment_mode) as cash_count1,sum(grand_total) as cash_amount1');
        $model1->where('created_at >=',$value['login_at']);
        $model1->where('created_at <=',$value['logout_at']);
        $model1->where('temple_id ',$temple_id);
        $model1->where('payment_mode ','Cash');
        $model1->where('created_by',$value['name']);
        $result1 = $model1->findAll();

        $model2  = new generalBookingSevaPriceModel();
        $model2->select('count(payment_method) as cash_count2,sum(amount_paid) as cash_amount2');
        $model2->where('created_at >=',$value['login_at']);
        $model2->where('created_at <=',$value['logout_at']);
        $model2->where('temple_id ',$temple_id);
        $model2->where('payment_method','Cash');
        $model2->where('created_by',$value['name']);
        $result2 = $model2->findAll();

        $model3  = new generalBookingSevaPriceModel();
        $model3->select('count(payment_method) as cash_count3,sum(balance_amount_paid) as cash_amount3');
        $model3->where('updated_at >=',$value['login_at']);
        $model3->where('updated_at <=',$value['logout_at']);
        $model3->where('temple_id ',$temple_id);
        $model3->where('payment_method','Cash');
        $model3->where('updated_by',$value['name']);
        $result3 = $model3->findAll();

        $data['cash_count'] = $result1[0]['cash_count1'] + $result2[0]['cash_count2'] +  $result3[0]['cash_count3'];
        // if($result2[0]['cash_amount'] != null){

            $data['cash_amount'] = $result1[0]['cash_amount1'] + $result2[0]['cash_amount2'] + $result3[0]['cash_amount3'];
        // } else{
        //     $data['cash_amount'] = 0;

        // }

        
        // print_r($data);die();
        array_push($array, $data);
    }
    
        if($result){
            return json_encode(array(
                 'result'    => 1,
                 'mssg'     => $array,
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
