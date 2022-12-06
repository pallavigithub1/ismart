<?php namespace App\Models;

use CodeIgniter\Model;

class generalBookingSevaPriceModel extends Model
{
protected $table ='general_booking_seva_price_details'; 
protected $allowedFields = ['id','gc_id','gsb_id','seva_id','temple_id','booking_pnr','total_amount','balance_amount_paid','updated_at','updated_by','payment_method','details','amount_paid','balance_amount','received_by','created_by','created_at'];
} 
