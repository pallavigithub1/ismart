<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;
use App\Models\TempleModel;


class Settings extends ResourceController
{
    use ResponseTrait;

    // all users
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
            $model->orderBy('id','DESC');
            $model->where('id',$temple_id);
            $temple_details  = $model->get()->getResultArray();
            $data['temple_details'] = $temple_details;
        }
        return view('settings',$data);
    }

    public function change(){
        $pwd = session()->get('password');
        $old_pwd = $this->request->getVar('old_pwd');
        $new_pwd = $this->request->getVar('new_pwd');
        $conf_pwd = $this->request->getVar('conf_pwd');
        if($old_pwd == $pwd){
            if($new_pwd == $conf_pwd){
                $usrModel = new UsersModel();
                $usrModel->set('password', $new_pwd);
                $usrModel->where('password',$pwd);
                $update = $usrModel->update();
                if($update){
                    return json_encode(array(
                        'result'    => 1,
                        'message'   => 'Your Password Updated successfully..'
                    ));
                }
                else{
                    return json_encode(array(
                        'result'    => 0,
                        'message'   => 'Something went wrong...'
                    ));
                }
            }
            else{
                return json_encode(array(
                    'result'    => 0,
                    'message'     => 'new password and confirm password must be same'
                ));
            }
        }
        else{
            return json_encode(array(
                'result'    => 0,
                'message'     => 'please enter correct old password'
            ));
        }
    }
}
?>
