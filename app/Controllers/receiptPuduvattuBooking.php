<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
use App\Models\bookingModel;

class receiptPuduvattuBooking extends ResourceController{

    public function index(){
    
        
        $model  = new TempleModel();
        $id = '1'; 
        $model->orderBy('id','DESC');

        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;

        $model = new bookingModel();
        $model->where('temple_id',$temple_id);
        // $model->where('enable','1');
        // $model->where('type','Endowment')->orderBy('id','DESC');
        $details  = $model->get()->getResultArray();
        $data['name_of'] = $details;

		return view('receipt_puduvattu_booking',$data);
	}

  

}
?>