<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class model_user extends Model
{
    protected $table = 'm_data';
    protected $allowedFields =['id','name','email'];
 
    public function getUser()
    {
        $builder = $this->db->table('m_data');
        $builder->select('*');
        return $builder->get();
    }

    public function saveUser($data){
        $query = $this->db->table('m_data')->insert($data);
        return $query;
    }
 
    public function updateUser($data, $id)
    {
        $query = $this->db->table('m_data')->update($data, array('id' => $id));
        return $query;
    }
 
    public function deleteUser($id)
    {
        $query = $this->db->table('m_data')->delete(array('id' => $id));
        return $query;
    } 
 
   
}