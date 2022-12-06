<?php namespace App\Models;

use CodeIgniter\Model;

class additionalInformationModel extends Model {

    protected $table ='puduvattu_additional_information';
    protected $allowedFields = ['id','temple_id','contact_id','booking_id','relation','name','birthday','created_by','created_at'];
}


?>



        