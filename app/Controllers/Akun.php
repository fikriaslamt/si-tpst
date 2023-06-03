<?php

namespace App\Controllers;
use App\Models\M_admin;

class Akun extends BaseController
{   



    public function tambahAkun()
    {   
        $admin = new M_admin();

        $admin->insert([
            'nama' => trim($this->request->getVar('nama')),
            'username' => trim($this->request->getVar('username')),
            'password' => md5($this->request->getVar('password')),
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/akun'));

    }

    public function editAkun($id)
    {   
        $admin = new M_admin();

        $data = $admin->where('id', $id)->first();

        $temp = $this->request->getVar('password');

        if ($data['password'] == $temp){
            $admin->update($id,[
                'nama' => trim($this->request->getVar('nama')),
                'username' => trim($this->request->getVar('username')),
                'password' => $this->request->getVar('password'),
            ]);
        }else{
            $admin->update($id,[
                'nama' => trim($this->request->getVar('nama')),
                'username' => trim($this->request->getVar('username')),
                'password' => md5($this->request->getVar('password')),
            ]);
        }
       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/akun'));

    }

    public function deleteAkun($id)
    {   
        $admin = new M_admin();

        $admin->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/akun'));

    }

    
}
