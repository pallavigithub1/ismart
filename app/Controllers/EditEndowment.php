<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;
use App\Models\UsersModel;
use App\Models\EventModel;
use App\Models\simpleDateCalenderModel;
class EditEndowment extends ResourceController{

    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
	}
    // SELECT * FROM `booking_details` WHERE booking_details.seva_date NOT LIKE '%/%';

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
		return view('add_edit_endowment_v',$data);
	}

    // public function event_fetch(){
    //     $year = $this->request->getVar('year');
    //     // $event = $this->request->getVar('selectEvent');

    //     $yModel = new EventModel();
    //     $year_exists = $yModel->where('year',$year)->first();
        
    //     // print_r($year_exists);
    //     // die();

    //     if($year_exists){
    //         $model = new EventModel();
    //         $model->select('event,english_date'); 
    //         $model->notLike('event','/');// (<-)or '/_'
    //         $model->notLike('event','\%');
    //         $model->where('year',$year);
    //         $data  = $model->findAll();

    //         if(empty($data)){
    //             $model = new bookingModel();
    //             $model->select('seva_date as event');
    //             // $model->join('master_list', 'booking_details.seva_date = master_list.master_value');
    //             $model->like('seva_date','a','z'); 
    //             $model->notLike('seva_date','/');// (<-)or '/_'
    //             $model->notLike('seva_date','\%');
    //             $model->groupBy("seva_date");
    //             $data  = $model->findAll();
    //         }

    //     } else{
    //         $model = new bookingModel();
    //         $model->select('seva_date as event');
    //         // $model->join('master_list', 'booking_details.seva_date = master_list.master_value');
    //         $model->like('seva_date','a','z'); 
    //         $model->notLike('seva_date','/');// (<-)or '/_'
    //         $model->notLike('seva_date','\%');
    //         $model->groupBy("seva_date");
    //         $data  = $model->findAll();
    //     };
      
    //     if($data){
    //         return json_encode($data);
    //    }
    //    else{
    //         return json_encode(array(
    //              'result'    => 0,
    //              'message'     => 'Something went wrong...'
    //         ));
    //    }
    
    // }

    // public function english_date_fetch(){
    //     $year = $this->request->getVar('year');
    //     $yModel = new EventModel();
    //     $year_exists = $yModel->where('year',$year)->like('event','\%')->first();

    //     // print_r($year_exists);
    //     // die();

    //     if($year_exists){

    //         $model = new EventModel();
    //         $model->select('event,english_date');
    //         $model->like('event','\%');
    //         // $model->join('english_calendar', 'booking_details.seva_date = english_calendar.event');            
    //         $model->where('year',$year);
    //         // $model->groupBy("seva_date");
    //         $data = $model->findAll();
    //         // $a = $data['english_date'];

    //         // print_r($data);
    //         // die();

    //         // $model = new EventModel();
    //         // $model->select('event,english_date'); 
    //         // $model->notLike('event','/');// (<-)or '/_'
    //         // $model->notLike('event','\%');
    //         // $model->where('year',$year);
    //         // $data  = $model->findAll();
            

    //         if(empty($data)){

    //             // $model = new bookingModel();
    //             // $model->select('seva_date as event, english_calendar.id');
    //             // $model->like('seva_date','\%');
    //             // $model->groupBy("seva_date");
    //             // $model->join('english_calendar', 'booking_details.seva_date = english_calendar.event');
    //             // $data = $model->findAll();

    //             $model = new bookingModel();
    //             $model->select('seva_date as event');
    //             // $model->join('simple_calendar', 'booking_details.seva_date = simple_calendar.value');
    //             // $model->notLike('seva_date','a','z'); 
    //             // $model->notLike('seva_date','/'); 
    //             // $model->where('year',$year);

    //             $model->like('seva_date','\%');
                    
    //             // $data = $model->groupBy('seva_date');
    //             $data = $model->findAll();

                
                
    //         }
               

    //     } 
    //     else{
    //         $model = new bookingModel();
    //         $model->select('seva_date as event');
    //         // $model->join('simple_calendar', 'booking_details.seva_date = simple_calendar.value');
    //         // $model->notLike('seva_date','a','z'); 
    //         // $model->notLike('seva_date','/'); 
    //         $model->like('seva_date','\%');
                   
    //         // $data = $model->groupBy('seva_date');
    //         $data = $model->findAll();
    //     };

    //     // print_r($data);
    //     // die();
        

    //     if($data){
    //         return json_encode($data);
    //    }
    //    else{
    //         return json_encode(array(
    //              'result'    => 0,
    //              'message'     => 'Something went wrong...'
    //         ));
    //    }
    // }

    public function english_date_fetch(){
             $model = new bookingModel();
            $model->select('seva_date as event');
            $model->like('seva_date','\%');
            $model->groupBy('seva_date');
            $result = $model->findAll();
            $array = array();
            $year1 = $this->request->getVar('year');
             $year = (int)$year1;

            foreach($result as $value){
             $model1 = new EventModel();
                    $model1->select('english_date');
                    $model1->where('year', $year);
                    $model1->where('event', $value['event']);
                    $result1 = $model1->first();
                    
                    
                    $data['event'] = $value['event'];
                    $data['english_date'] = $result1['english_date'];
    
                    array_push($array, $data);
                }

                return json_encode($array);

    }


  
    public function event_fetch(){

        $model = new bookingModel();
        $model->select('seva_date as event');
        $model->like('seva_date','a','z'); 
        $model->notLike('seva_date','/');// (<-)or '/_'
        $model->notLike('seva_date','\%');
        $model->groupBy("seva_date");
        $result  = $model->findAll();
        $array = array();
        $year1 = $this->request->getVar('year');
        $year = (int)$year1;

            foreach($result as $value){
             $model1 = new EventModel();
                    $model1->select('english_date');
                    $model1->where('year', $year);
                    $model1->where('event', $value['event']);
                    $result1 = $model1->first();
                    
                    
                    $data['event'] = $value['event'];
                    $data['english_date'] = $result1['english_date'];
    
                    array_push($array, $data);
                }

                return json_encode($array);
    }




public function panchanga_fetch(){


                $model = new bookingModel();
                $model->select('seva_date as event');
                $model->like('seva_date','/');
                $model->groupBy("seva_date");
                $result = $model->findAll();
                $array = array();
                $year1 = $this->request->getVar('year');
                $year = (int)$year1;

                foreach($result as $value){
                    $model1 = new EventModel();
                    $model1->select('english_date');
                    $model1->where('year', $year);
                    $model1->where('event', $value['event']);
                    $result1 = $model1->first();
                    
                    
                    $data['event'] = $value['event'];
                    $data['english_date'] = $result1['english_date'];
    
                    array_push($array, $data);
                }

                return json_encode($array);

}

  
    

    
    public function edit_event(){
        $english_date = $this->request->getVar('booking_start');
        $year = $this->request->getVar('year');
        $events = $this->request->getVar('event[]');
        date_default_timezone_set('Asia/Kolkata'); 
        $updated_at = date('d-m-Y H:i:s', time()); 
        $model = new UsersModel();
        $data = $model->first();
        $yModel = new EventModel();
        $year_exists = $yModel->where('year',$year)->first();
        if($year_exists){
            for($i=0; $i<count($english_date); $i++){
                $e_date = $english_date[$i];
                $eng_date = date('Y-m-d',strtotime($e_date));
                
                $editadd = [
                'english_date'=>$eng_date,
                'updated_by'=>$data['name'],
                'updated_at'=>$updated_at
                ];

                $evModel = new EventModel();
                $evModel->set($editadd);
                $evModel->where('year',$year);
                $evModel->where('event',$events[$i]);
                // $evModel->where("(event NOT LIKE '/%')");
                // $evmodel->notHavingLike('event','/');
                $eventID = $evModel->update(); 
            }; 
        }    
        if($eventID){ 
            return json_encode(array(
                'result'    => 1,
                'message'   => 'event updated Successfully.....'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong.....'
            ));
        }
    }
    public function edit_panchanga(){
        $panchanga_date = $this->request->getVar('panchanga_start');
        $year = $this->request->getVar('year');
        $event1 = $this->request->getVar('event1[]');
        $event2 = $this->request->getVar('event2[]');
        $event3 = $this->request->getVar('event3[]');
        $event4 = $this->request->getVar('event4[]');
        date_default_timezone_set('Asia/Kolkata'); 
        $updated_at = date('d-m-Y H:i:s', time()); 
        $model = new UsersModel();
        $data = $model->first();
        $yModel = new EventModel();
        $year_exists = $yModel->where('year',$year)->first();
        if($year_exists){
            for($i=0; $i<count($panchanga_date); $i++){
                $p_date = $panchanga_date[$i];
                $pan_date = date('Y-m-d',strtotime($p_date));
                $panchanga = $event1[$i]."/".$event2[$i]."/".$event3[$i]."/".$event4[$i];
                
                $editadd = [
                    'english_date'=>$pan_date,
                    'updated_by'=>$data['name'],
                    'updated_at'=>$updated_at
                ];

                $pnModel = new EventModel();
                $pnModel->set($editadd);
                $pnModel->where('year',$year);
                $pnModel->where('event',$panchanga);
                $panchID = $pnModel->update();
            }; 
        }   
        if($panchID){ 
            return json_encode(array(
                'result'    => 1,
                'message'   => 'panchanga updated Successfully.....'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong.....'
            ));
        }
    }
    public function edit_date(){
        $english_date = $this->request->getVar('english_start');

        // print_r($english_date);
        // die();
        $year = $this->request->getVar('year');
        $english1 = $this->request->getVar('english1[]');
        $english2 = $this->request->getVar('english2[]');
        $english3 = $this->request->getVar('english3[]');
        date_default_timezone_set('Asia/Kolkata'); 
        $updated_at = date('d-m-Y H:i:s', time()); 
        $model = new UsersModel();
        $data = $model->first();
        $yModel = new EventModel();
        $year_exists = $yModel->where('year',$year)->first();
        if($year_exists){
            for($i=0; $i<count($english_date); $i++){
                $en_date = $english_date[$i];
                $engl_date = date('Y-m-d',strtotime($en_date));
                $english = $english1[$i]."\\".$english2[$i]."\\".$english3[$i];
                
                $editadd = [
                    'english_date'=>$engl_date,
                    'updated_by'=>$data['name'],
                    'updated_at'=>$updated_at
                ];

                $enModel = new EventModel();
                $enModel->set($editadd);
                $enModel->where('year',$year);
                $enModel->where('event',$english);
                $englishID = $enModel->update();
            };
        }     
        if($englishID){ 
            return json_encode(array(
                'result'    => 1,
                'message'   => 'english updated Successfully.....'
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Something went wrong.....'
            ));
        }
    }


    public function store_events(){
        $n = $this->request->getVar('n');
        $year = $this->request->getVar('year');
        $model = new UsersModel();
        $data = $model->first();

        for($i=0; $i<$n; $i++){

            $eng_date = $this->request->getVar('Data['.$i.'][english_date]');
            $events = $this->request->getVar('Data['.$i.'][event]');

            if(empty($eng_date)){
                $english_date = null;
            }else{
            $english_date = date('Y-m-d',strtotime($eng_date));
            };
            
            $evModel = new EventModel();
            $evModel->where('year', $year);
            $evModel->where('event', $events);
            $existEvent = $evModel->first();

            if($existEvent){

                $updateArray = ['english_date'=>$english_date];
                
                $evModel1 = new EventModel();
                $evModel1->set($updateArray);
                $evModel1->where('year', $year);
                $evModel1->where('event', $events);
                $change = $evModel1->update();


            }else{

                $newadd = [
                    'event'=>$events,
                    'english_date'=>$english_date,
                    'year'=>$year,
                    'created_by'=>$data['name']  
                    ];

            $evModel2 = new EventModel();
            $evModel2->save($newadd);
            $change = $evModel2->insertID();
            }

            
        };     
        if($change){ 
            return json_encode(array(
                'result'    => 1,
                'message'   => 'Added Successfully!'
              
                
            ));
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'   => 'Somthing went wrong!'
            ));
        }
    }


    
}
?>
