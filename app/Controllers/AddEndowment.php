<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\UsersModel;
use App\Models\EventModel;
class AddEndowment extends ResourceController{

    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
	}
    // SELECT * FROM `booking_details` WHERE booking_details.seva_date NOT LIKE '%/%';
     public function event_fetch(){
        $model = new bookingModel();
        $model->select('seva_date');
        $model->like('seva_date','a','z'); 
        $model->notLike('seva_date','/%');// (<-)or '/_'
        $model->notLike('seva_date','\%');
        $model->groupBy("seva_date");
        $data  = $model->findAll();
        if($data){
            return json_encode(array(
                 'result'    => 1,
                 'message'   => $data
            ));
       }
       else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong...'
            ));
       }
    //    for($i=0; $i < count($data); $i++) { 
            
    //     }
     }
     public function panchanga_fetch(){
        $model = new bookingModel();
        $model->select('seva_date');
        $model->like('seva_date','/');
        $model->groupBy("seva_date");
        $data = $model->findAll();
        if($data){
            return json_encode(array(
                 'result'    => 1,
                 'message'   => $data
            ));
       }
       else{
            return json_encode(array(
                 'result'    => 0,
                 'message'     => 'Something went wrong...'
            ));
       }
     }
     public function english_date_fetch(){
          $model = new bookingModel();
          $model->select('seva_date');
          $model->like('seva_date','\%');
          $model->groupBy("seva_date");
          $data = $model->findAll();
          if($data){
          return json_encode(array(
                    'result'    => 1,
                    'message'   => $data
                    ));
          }
          else{
               return json_encode(array(
                    'result'    => 0,
                    'message'     => 'Something went wrong...'
                    ));
          }
     }

     public function index(){
        $model  = new TempleModel();
        $id = '1'; 
        $temple_id = '1';
        $model->orderBy('id','DESC');
        // $zz = 'a';
        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;

		return view('addendowment_v',$data);
	}
     public function store_event(){
          $english_date = $this->request->getVar('booking_start');
          $year = $this->request->getVar('year');
          $events = $this->request->getVar('event[]');
          $model = new UsersModel();
          $data = $model->first();
          for($i=0; $i<count($english_date); $i++){
               $e_date = $english_date[$i];
               $eng_date = date('Y-m-d',strtotime($e_date));
               
               $newadd = [
               'event'=>$events[$i],
               'english_date'=>$eng_date,
               'year'=>$year,
               'created_by'=>$data['name']  
               ];

               $evModel = new EventModel();
               $evModel->save($newadd);
               $eventID = $evModel->insertID();
          };     
          if($eventID){ 
               return json_encode(array(
                    'result'    => 1,
                    'message'   => 'saved Successfully.....'
               ));
          }
          else{
               return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Something went wrong.....'
               ));
          }
     }
     public function store_panchanga(){
          $panchanga_date = $this->request->getVar('panchanga_start');
          $year = $this->request->getVar('year');
          $event1 = $this->request->getVar('event1[]');
          $event2 = $this->request->getVar('event2[]');
          $event3 = $this->request->getVar('event3[]');
          $event4 = $this->request->getVar('event4[]');
          $model = new UsersModel();
          $data = $model->first();
          for($i=0; $i<count($panchanga_date); $i++){
               $p_date = $panchanga_date[$i];
               $pan_date = date('Y-m-d',strtotime($p_date));
               $panchanga = $event1[$i]."/".$event2[$i]."/".$event3[$i]."/".$event4[$i];
               
               $newadd = [
               'event'=>$panchanga,
               'english_date'=>$pan_date,
               'year'=>$year,
               'created_by'=>$data['name']  
               ];

               $pnModel = new EventModel();
               $pnModel->save($newadd);
               $panchID = $pnModel->insertID();
          };     
          if($panchID){ 
               return json_encode(array(
                    'result'    => 1,
                    'message'   => 'saved Successfully.....'
               ));
          }
          else{
               return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Something went wrong.....'
               ));
          }
     }
     public function store_date(){
          $english_date = $this->request->getVar('english_start');
          $year = $this->request->getVar('year');
          $english1 = $this->request->getVar('english1[]');
          $english2 = $this->request->getVar('english2[]');
          $english3 = $this->request->getVar('english3[]');
          $model = new UsersModel();
          $data = $model->first();
          for($i=0; $i<count($english_date); $i++){
               $en_date = $english_date[$i];
               $engl_date = date('Y-m-d',strtotime($en_date));
               $english = $english1[$i]."\\".$english2[$i]."\\".$english3[$i];
               
               $newadd = [
               'event'=>$english,
               'english_date'=>$engl_date,
               'year'=>$year,
               'created_by'=>$data['name']  
               ];

               $enModel = new EventModel();
               $enModel->save($newadd);
               $englishID = $enModel->insertID();
          };     
          if($englishID){ 
               return json_encode(array(
                    'result'    => 1,
                    'message'   => 'saved Successfully.....'
               ));
          }
          else{
               return json_encode(array(
                    'result'    => 0,
                    'message'   => 'Something went wrong.....'
               ));
          }
     }
}
?>