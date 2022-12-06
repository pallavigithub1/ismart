<?php namespace App\Models;

use CodeIgniter\Model;

class AttributeValueModel extends Model
{
protected $table ='attribute_values'; 
protected $allowedFields = ['id','temple_id','seva_id','seva_code','attribute','values','created_by','created_at'];
} 