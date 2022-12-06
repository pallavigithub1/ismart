<?php namespace App\Models;

use CodeIgniter\Model;

class generalBookingModel extends Model {

    protected $table ='general_booking_contact_details';
    protected $allowedFields = ['id','temple_id','address1','address2','purpose','pin_code','state','email','country','comment','gothra','booking_date','booking_pnr','pan','adhar','rashi','nakshathra','mobile_number','name','city','created_by','created_at','updated_by','updated_at'];
}


?>



