<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\UsersModel;
use App\Models\EventModel;
use App\Models\MasterModel;
use App\Models\GeneratedSevaModel;

class GenerateBooking extends ResourceController{

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
            // $temple_id = '1';
            $model->orderBy('id','DESC');
            $model->where('id',$temple_id);
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;
        }
        $model = new MasterModel();
        // $model->where('temple_id',$temple_id);
        $model->where('master_name','Festival')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['festival'] = $details;

        // print_r($details);
        // die();

        $model  = new EventModel();
        $model->select('year');
        $model->distinct();
        $details  = $model->get()->getResultArray();
        $data['year'] = $details;

        $model = new MasterModel();
        $model->where('temple_id',$temple_id);
        $model->where('master_name','Panchanga')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['panchanga'] = $details;

		return view('generatebooking_v',$data);
	}

    public function select_fun(){
        $a = $this->request->getVar('z');
        $year = $this->request->getVar('year');
        // print_r($year);
        // die();

        $b = $a[0];       
        $values = 1;
       
        $model1 = new bookingModel();
        
        // $qw =  $model1->where('english_calendar.year',$year)->first();
        // $english_date = $qw['english_date'];
        
        // print_r($qw);
        // die();
        $model2 = new GeneratedSevaModel();
       

        // $az= array(
        //     // 'GB_Status'=>$values,
        //     'seva_date'=>$english_date
        // );
        

        foreach($b as $id){

            // $model1->set($az);
            // $model1->where('booking_details.id',$id);
            // $update9 = $model1->update();
            $model1->select('booking_details.*,english_calendar.english_date,english_calendar.year');
            $model1->join('english_calendar', 'booking_details.seva_date = english_calendar.event');
            $model1->where('booking_details.id',$id);
            $model1->where('english_calendar.year',$year);
            $insertID1=$model1->first();
            $id2 = $insertID1['id'];
            $temple = $insertID1['temple_id'];
            $contact = $insertID1['contact_id'];
            $ENG = $insertID1['english_date'];

            // print_r($id2);
            // print_r($ENG);
            // print_r('<br>');

            $ay = array(

                'booking_id'=>$id2, 
                'temple_id'=>$temple,
                'seva_date'=>$ENG,
                'contact_id'=>$contact,
                'GB_status'=> $values,
                'year'=>$year
            );

            $model2->save($ay);
            $xyz = $model2->insertID(); 

            // print_r($ay);
            // print_r('<br>');
        }
        // die();
       
    }

    public function fetch_events(){
        
        $festival = $this->request->getVar('festival');
        $festival1 = $this->request->getVar('f1');
       
        // print_r($panchanga);die();
        $year = $this->request->getVar('year');
        if($festival == 'Events'){
            $model = new bookingModel();
            $model->select('booking_details.*,english_calendar.english_date,english_calendar.year');
            $model->join('english_calendar', 'booking_details.seva_date = english_calendar.event');
            $model->where('english_calendar.year',$year);
            $model->where('booking_details.seva_date',$festival1);
            // $model->where('booking_details.GB_Status','0');
            $model->like('seva_date','a','z'); 
            $model->notLike('seva_date','/');
            $model->notLike('seva_date','\%');
            // $model->groupBy('booking_details.seva_date');
            $result  = $model->findAll();
            $array = array();
            foreach($result as $value){
                 $data['id'] = $value['id'];
                 $data['name_of'] = $value['name_of'];
                 $data['booking_date'] = $value['booking_date'];
                 $data['main_seva'] = $value['main_seva'];
                 $data['seva_price'] = $value['seva_price'];
                 $data['seva_date'] = $value['seva_date'];
                 $data['english_date'] = $value['english_date'];
                 $data['english_date'] = $value['english_date'];
                 $contact_id = $value['contact_id'];
                 $booking_id = $value['id'];

                 $model2 = new GeneratedSevaModel();
                 $model2->where('booking_id',$booking_id);
                 $model2->where('contact_id',$contact_id);
                 $model2->where('year',$year);
                 $result1 = $model2->first();
                 if($result1){
                    $data['status'] =  'COMPLETED';
                 } else{
                    $data['status'] =  'INCOMPLETED';
                 }

                
                 array_push($array, $data);

            }
            
            

            if($result){
                return json_encode(array(
                    'result'    => 1,
                    'message'   => $array
                ));
            }
            else{
                return json_encode(array(
                    'result'    => 0,
                    'message'   => 'No Data Found...'
                ));
            }
        }
        if($festival == 'Panchanga'){
            $panchanga = $this->request->getVar('f3'); 
            $model = new bookingModel();
            $model->select('booking_details.*,name_of,booking_date,main_seva,seva_price,seva_date,english_date');
            $model->where('year',$year);
            $model->like('seva_date','/');
            $model->like('seva_date',$panchanga);
            // $model->groupBy("seva_date");
            $model->join('english_calendar', 'booking_details.seva_date = english_calendar.event');
            $result  = $model->findAll();
            // print_r($result);die();
            $array = array();
            foreach($result as $value){
                 $data['id'] = $value['id'];
                 $data['name_of'] = $value['name_of'];
                 $data['booking_date'] = $value['booking_date'];
                 $data['main_seva'] = $value['main_seva'];
                 $data['seva_price'] = $value['seva_price'];
                 $data['seva_date'] = $value['seva_date'];
                 $data['english_date'] = $value['english_date'];
                 $data['english_date'] = $value['english_date'];
                 $data['contact_id'] = $value['contact_id'];
                 $data['booking_id'] = $value['id'];

                 $model2 = new GeneratedSevaModel();
                 $model2->where('booking_id',$data['booking_id']);
                 $model2->where('contact_id',$data['contact_id']);
                 $model2->where('year',$year);
                 $result1 = $model2->first();
                 if($result1){
                    $data['status'] =  'COMPLETED';
                 } else{
                    $data['status'] =  'INCOMPLETED';
                 }

                
                 array_push($array, $data);

            }
            if($result){
                return json_encode(array(
                    'result'    => 1,
                    'message'   => $array
                ));
            }
            else{
                return json_encode(array(
                    'result'    => 0,
                    'message'     => 'No Data Found...'
                ));
            }
        }
        if($festival == 'English Calendar'){
            $model = new bookingModel();
            $model->select('booking_details.*,name_of,booking_date,main_seva,seva_price,seva_date,english_date');
            $model->where('year',$year);
            $model->like('seva_date','\%');
            // $model->groupBy("seva_date");
            $model->join('english_calendar', 'booking_details.seva_date = english_calendar.event');
            $result  = $model->findAll();
            // print_r($result);die();
            $array = array();
            foreach($result as $value){
                 $data['id'] = $value['id'];
                 $data['name_of'] = $value['name_of'];
                 $data['booking_date'] = $value['booking_date'];
                 $data['main_seva'] = $value['main_seva'];
                 $data['seva_price'] = $value['seva_price'];
                 $data['seva_date'] = $value['seva_date'];
                 $data['english_date'] = $value['english_date'];
                 $data['english_date'] = $value['english_date'];
                 $data['contact_id'] = $value['contact_id'];
                 $data['booking_id'] = $value['id'];

                 $model2 = new GeneratedSevaModel();
                 $model2->where('booking_id',$data['booking_id']);
                 $model2->where('contact_id',$data['contact_id']);
                 $model2->where('year',$year);
                 $result1 = $model2->first();
                 if($result1){
                    $data['status'] =  'COMPLETED';
                 } else{
                    $data['status'] =  'INCOMPLETED';
                 }

                
                 array_push($array, $data);

            }
            if($result){
                return json_encode(array(
                    'result'    => 1,
                    'message'   => $array
                ));
            }
            else{
                return json_encode(array(
                    'result'    => 0,
                    'message'     => 'No Data Found...'
                ));
            }
        }
        if($festival == 'All'){
            $model = new bookingModel();
            $model->select('booking_details.*,name_of,booking_date,main_seva,seva_price,seva_date,english_calendar.english_date');
            $model->join('english_calendar', 'booking_details.seva_date = english_calendar.event');
            $model->where('year',$year);
            $result  = $model->findAll();
            // print_r($result);die();
            $array = array();
            foreach($result as $value){
                 $data['id'] = $value['id'];
                 $data['name_of'] = $value['name_of'];
                 $data['booking_date'] = $value['booking_date'];
                 $data['main_seva'] = $value['main_seva'];
                 $data['seva_price'] = $value['seva_price'];
                 $data['seva_date'] = $value['seva_date'];
                 $data['english_date'] = $value['english_date'];
                 $data['english_date'] = $value['english_date'];
                 $data['contact_id'] = $value['contact_id'];
                 $data['booking_id'] = $value['id'];

                 $model2 = new GeneratedSevaModel();
                 $model2->where('booking_id',$data['booking_id']);
                 $model2->where('contact_id',$data['contact_id']);
                 $model2->where('year',$year);
                 $result1 = $model2->first();
                 if($result1){
                    $data['status'] =  'COMPLETED';
                 } else{
                    $data['status'] =  'INCOMPLETED';
                 }

                
                 array_push($array, $data);

            }
            if($data){
                return json_encode(array(
                    'result'    => 1,
                    'message'   => $array
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
}
?>
