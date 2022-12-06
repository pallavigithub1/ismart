<?php namespace App\Models;

use CodeIgniter\Model;

class generalSevaModel extends Model {

    protected $table ='general_seva_booking_details';
    protected $allowedFields = ['id','gc_id','seva_id','seva_price_id','temple_id','seva_date','seva_code','booking_pnr','status','receipt_no','booking_date','seva_name','price','seva_units','comment','amount','remark','payment_mode','created_by','created_at','updated_by','updated_at'];
}


?>


