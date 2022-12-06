<?php 
namespace App\Models;
use CodeIgniter\Model;

class EmployeeModel extends Model
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
}


?>