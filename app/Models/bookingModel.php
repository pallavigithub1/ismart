<?php namespace App\Models;

use CodeIgniter\Model;

class bookingModel extends Model{
	protected $table ='booking_details';

	protected $allowedFields = ['id','temple_id','seva_id','contact_id','seva_price_id','name_of','status','rashi','gothra','nakshathra','main_seva','booking_pnr','receipt_no','advance_amount','balance_amount','seva_price','seva_include','payment_mode','details','payment_date','crb','seva_date','grand_total','comments','created_by','created_at','booking_date','updated_at','updated_by'];
}

?>


