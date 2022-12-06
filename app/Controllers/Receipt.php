<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\TempleModel;
// use App\Models\sevaDetailsModel;

class Receipt extends ResourceController{

    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
        helper(['url']);
	}
    
    public function index(){
    
        
        $model  = new TempleModel();
        $id = '1'; 
        $model->orderBy('id','DESC');

        $temple_details  = $model->get()->getResultArray();
        $data['temple_details'] = $temple_details;

		return view('receipt',$data);
	}

    // public function generate_receipt(){
      
    //     $id = $this->request->getVar('id'); 
    //     $model  = new puduvattuModel();
    //     $data['info'] = $model->where('id',$id)->get()->getResultArray();
    //     // $data['mobile'] = $model;

       
       
        

		
	// }

   

}

?>