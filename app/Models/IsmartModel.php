<?php 
namespace App\Models;
use CodeIgniter\Model;

class IsmartModel extends Model
{
    
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email'];

    public function index($id = Null)
    {
        //protected $table = 'employee';
       // $data['employees']  = $this->db->table('employee')->findAll();
       // return  $this->respond($data);

        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->where('id', '1');
        return $builder->get()->getResultArray();
    }
    public function show_data($id = Null)
    {
        //protected $table = 'employee';
       // $data['employees']  = $this->db->table('employee')->findAll();
       // return  $this->respond($data);

        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->where('id', '1');
        return $builder->get()->getResultArray();
    }
     public function master_type($id = Null)
    {
        //protected $table = 'employee';
       // $data['employees']  = $this->db->table('employee')->findAll();
       // return  $this->respond($data);

        $db = \Config\Database::connect();
        $builder = $db->table('master_type');
        $builder->where('delete_status', 'ACTIVE');
        return $builder->get()->getResultArray();
    }
}


?>