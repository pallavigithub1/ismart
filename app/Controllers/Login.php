<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;
use App\Models\LoginStatusModel;


class Login extends ResourceController
{
    use ResponseTrait;
	public function __construct()
	{
		helper(['form']);
	}	

    public function index(){
     	$data = array();
		if($this->request->getMethod() == 'post'){
			$username = $this->request->getVar('username');
			$password = $this->request->getVar('password');
			$model = new UsersModel();
	       	$where = [
	            'username' => $username,
	            'password'  => $password
	        ];
	        $data = $model->where($where)->first();
	        $uname = $model->where('username', $username)->first();
            $pwd = $model->where('password', $password)->first();
	        if($data){

                date_default_timezone_set('Asia/Kolkata');   
                $login_at = date('Y-m-d H:i:s', time()); 

                $where1 = [
                    'temple_id' => $data['temple_id'],
                    'user_id' => $data['id'],
                    'login_at' => $login_at
                ];
                $statusModel = new LoginStatusModel();
                $statusModel->insert($where1);
                $status_Id = $statusModel->insertID();

	        	$sessionData = array(
					'id'=>$data['id'],
					'name'=>$data['name'],
                    'temple' => '0',
					'user'=>true,
                    'username'=>$data['username'],
                    'password'=>$data['password'],
                    't_id'=>$data['temple_id'],
                    'role_id'=>$data['role'],
                    'status_Id' => $status_Id
				);
				session()->set($sessionData);
				$role_id = $data['role'];
				echo json_encode(array(
                    'result'    => 1,
                    'message'	  => 'valid',
                    'role_id'	  => $role_id,
                    'name' => session()->get('name')
                ));
	        }
            else
            {  
                if(!($uname) && !($pwd)){
                    echo json_encode(array(
                        'result'    => 0,
                        'message'	  => 'Invalid username & Password',
                        'role_id'	  => $role_id
                    ));
                }
                elseif(!($uname)){
                    echo json_encode(array(
                        'result'    => 2,
                        'message'	  => 'Invalid username',
                        'role_id'	  => $role_id
                    ));
                }
                elseif(!($pwd)){
                    echo json_encode(array(
                        'result'    => 3,
                        'message'	  => 'Invalid Password',
                        'role_id'	  => $role_id
                    ));
                }
            }
		}

		
	}


    // create
    public function create() {
        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $model->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Employee created successfully'
          ]
      ];
      return $this->respondCreated($response);
    }

    // single user
    public function show($id = null){
        $model = new EmployeeModel();
        $id = '1';
        $data = $model->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No employee found');
        }
    }
    public function show_data($id = null){
        $model = new EmployeeModel();
        $id = '1';
        $data = $model->show_data($id);
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No employee found');
        }
    }

    // update
    public function update($id = null){
        $model = new EmployeeModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $model->update($id, $data);
        $response = [
          'status'   => 200,
          'error'    => null,
          'messages' => [
              'success' => 'Employee updated successfully'
          ]
      ];
      return $this->respond($response);
    }

    // delete
    public function delete($id = null){
        $model = new EmployeeModel();
        $data = $model->where('id', $id)->delete($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Employee successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No employee found');
        }
    }

}
