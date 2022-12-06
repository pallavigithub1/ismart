<?php namespace App\Models;

use CodeIgniter\Model;

class SevaModel extends Model
{
protected $table ='sevas'; 
protected $allowedFields = ['id','seva_code','temple_id','seva_name','regional_name','description','type','booking_open','booking_end','status','account_ref_code','special_instructions','enable','enable_units','enable_amount','enable_online_booking','sms_required','reminder_required','per_day_quota','online_quota','meals_count','devotees_count','created_by','created_at','updated_at','updated_by'];
} 
