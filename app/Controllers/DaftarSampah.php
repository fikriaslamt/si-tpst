<?php

namespace App\Controllers;
use App\Models\M_sampah;

class DaftarSampah extends BaseController
{   



    public function tambahDaftarSampah()
    {   
        $daftarSampah = new M_sampah();
        
        $daftarSampah->insert([
            'jenis' => $this->request->getVar('jenis'),
            'harga_tpst' => $this->request->getVar('harga_tpst'),
            'harga_nasabah' => $this->request->getVar('harga_nasabah'),
            'tanggal_update' => $this->request->getVar('tanggal'),
        
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/daftarSampah'));

    }

    public function editDaftarSampah($id)
    {   
        $daftarSampah = new M_sampah();

        $daftarSampah->update($id,[
            'jenis' => $this->request->getVar('jenis'),
            'harga_tpst' => $this->request->getVar('harga_tpst'),
            'harga_nasabah' => $this->request->getVar('harga_nasabah'),
            'tanggal_update' => $this->request->getVar('tanggal'),
        ]);

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/daftarSampah'));

    }

    public function deleteDaftarSampah($id)
    {   
        $nasabah = new M_sampah();

        $nasabah->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/daftarSampah'));

    }

    
}
