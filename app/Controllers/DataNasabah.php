<?php

namespace App\Controllers;
use App\Models\M_nasabah;

class DataNasabah extends BaseController
{   



    public function tambahDataNasabah()
    {   
        $nasabah = new M_nasabah();

        $nasabah->insert([
            'nama' => trim($this->request->getVar('nama')),
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    public function editDataNasabah($id)
    {   
        $nasabah = new M_nasabah();

        $data['news'] = $nasabah->where('id', $id)->first();

        $nasabah->update($id,[
            'nama' => trim($this->request->getVar('nama')),
        ]);

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    public function deleteDataNasabah($id)
    {   
        $nasabah = new M_nasabah();

        $nasabah->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    
}
