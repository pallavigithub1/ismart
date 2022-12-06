<?php namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
protected $table ='english_calendar'; 
protected $allowedFields = ['id','temple_id','event','english_date','year','created_by','created_at','updated_by','updated_at'];
} 