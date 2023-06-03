<?php

namespace App\Controllers;


class Login extends BaseController
{
    public function index()
    {

        
        $data = [
            'title' => 'Login Admin'
        ];
        echo view('partials/header',$data);
        echo view('admin/login');
        echo view('partials/footer');
        
    }

    public function process (){
        $users = new \App\Models\M_admin();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if ($dataUser['password'] == md5($password)) {
                session()->set([
                    'username' => $dataUser['username'],
                    'name' => $dataUser['nama'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                session()->setFlashdata('error', 'Username atau Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username atau Password Salah');
            return redirect()->back();
        }
    }

  
    
    public function logout()
    {   
        session()->destroy();
        return redirect()->to('/login');
    }
}
