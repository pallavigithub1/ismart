<?php namespace App\Models;

use CodeIgniter\Model;

class sevaPriceModel extends Model
{
protected $table ='sevas_price_details'; 
protected $allowedFields = ['id','temple_id','seva_id','price_start','price_end','amount','created_at','created_by','updated_by','updated_at'];
} 
?>