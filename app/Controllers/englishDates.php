<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;
use App\Models\TempleModel;


class englishDates extends ResourceController
{
    use ResponseTrait;

    // all users
    public function index(){
        $temple_id = '1';
        $model  = new TempleModel();
        $id = '1'; 
        $model->orderBy('id','DESC');
        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;

        return view('english_dates',$data);
    }
}
?>