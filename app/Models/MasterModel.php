<?php namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{
protected $table ='master_list';
protected $allowedFields = ['id','temple_id','master_id','master_name','master_value','description','regional_value','enable','created_by','created_at'];
}
