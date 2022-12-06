<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
	protected $table ='contact_details';
	protected $allowedFields = ['id','temple_id','mobile_number','name','address','city','pin_code','state','email','country','pan','adhar','created_by','created_at','updated_by','updated_at']; 
}
