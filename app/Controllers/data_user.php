<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\model_user;

class data_user extends Controller
{

        public function index()
        {
            $model = new model_user();
            $data['m_user']  = $model->getUser()->getResult();
            echo view('/view_user', $data);
        }
     
        public function save()
        {
            $model = new model_user();
            $data = array(
                'id'         => $this->request->getPost('id'),
                'name'       => $this->request->getPost('name'),
                'email'      => $this->request->getPost('email'),
    
            );
            $model->saveUser($data);
            return redirect()->to(base_url('data_user')); 
        }
     
        public function update()
        {
            $model = new model_user();
            $id = $this->request->getPost('id');
            $data = array(
                'id'        => $this->request->getPost('id'),
                'name'      => $this->request->getPost('name'),
                'email'     => $this->request->getPost('email'),
    
            );
            $model->updateUser($data, $id);
            return redirect()->to(base_url('data_user')); 
        }
     
        public function delete()
        {
            $model = new model_user();
            $id = $this->request->getPost('id');
            $model->deleteUser($id);
            return redirect()->to(base_url('data_user')); 
        }
}
