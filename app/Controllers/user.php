<?php
namespace  App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_user;

class User extends BaseController
{

    public function index(){
        $data = [
            'title' => 'Form Login',
            'tampil' => 'login',
        ];
        echo view('templates/wrapper', $data);
    }

   public function register() {
        $data = [
            'title' => 'Form register',
            'tampil' => 'register',
        ];
        echo view('templates/wrapper', $data);
    }

     public function regis(){
        helper(['form', 'url', 'date']);

        $userModel = new M_user();
        
        $now = date('Y-m-d H:i:s');
        
        $data = [
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'date_update' => $now
        ];

        $save = $userModel->insert($data);
       
        session()-> setFlashdata('message','Register');

        return redirect() -> to(base_url('user'));
    }
}