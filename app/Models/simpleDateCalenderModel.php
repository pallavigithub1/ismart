<?php namespace App\Models;

use CodeIgniter\Model;

class simpleDateCalenderModel extends Model
{
protected $table ='simple_calendar';
protected $allowedFields = ['id','type','value'];
}
