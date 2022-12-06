<?php namespace App\Models;

use CodeIgniter\Model;

class LoginStatusModel extends Model{
	protected $table ='login_status';

	protected $allowedFields = ['id','temple_id','user_id','login_at','logout_at'];
}

?>