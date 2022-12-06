<?php namespace App\Models;

use CodeIgniter\Model;

class sevaDetailsModel extends Model
{
protected $table ='general_seva_booking_details'; 
protected $allowedFields = ['id','temple_id','seva_date','seva_name','amount','created_by','created_at'];
} 
