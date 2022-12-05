<?php namespace App\Models;

use CodeIgniter\Model;

class TempleModel extends Model
{
	protected $table ='temple_details';
	protected $allowedFields = ['id','name','image','email','address','phonenumber','contactperson','receipt_header','receipt_footer','receipt_number_prefix','receipt_instructions','created_at','created_by','updated_at','updated_by']; 
}
