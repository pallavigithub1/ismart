<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
protected $table ='user_login';
protected $allowedFields = ['id','temple_id','role_id','Inst_id','role','phone','address','location','language','user_image','delete_status','active_from','active_end','name','email','username','password','created_by','created_at','updated_by','updated_at'];
}
