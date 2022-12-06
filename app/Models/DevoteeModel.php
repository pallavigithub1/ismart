<?php namespace App\Models;

use CodeIgniter\Model;

class DevoteeModel extends Model
{
protected $table ='contact_details'; 
protected $allowedFields = ['id','temple_id','mobile_number','gender','level','name','address1','address2','city','pin_code','state','country','email','pan','adhar','enable','created_at','created_by','updated_by','updated_at'];
} 
