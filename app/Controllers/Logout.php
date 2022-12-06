<?php 
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\LoginStatusModel;

    class Logout extends ResourceController
    {
        use ResponseTrait;
        public function __construct()
        {
            helper(['form']);
        }
        public function logout() {

            $status_id = session()->get('status_Id');

            date_default_timezone_set('Asia/Kolkata');   
                $logout_at = date('Y-m-d H:i:s', time()); 
                // print_r($logout_at);die();
            $newData = array(
                'logout_at' => $logout_at
            );
            $statusModel = new LoginStatusModel();
            $statusModel->where('id',$status_id);
            $statusModel->set($newData);
            $status_Id = $statusModel->update(); 

            $session=session();
            $array_items = ['id', 'name', 'temple', 'user', 'temple_name', 'image', 'prefix'];
            $session->remove($array_items);
            $session->destroy();

            // $session->remove('id');
            // $session->remove('name');
            // if ($session->has('temple_name')) {
            //     $session->destroy();
            // }
            // else{
            //     echo 'error here';
            // }
            // $session->stop();
           
            return redirect()->to(base_url("/"));
        }
    }

?>