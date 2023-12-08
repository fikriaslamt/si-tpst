<?php

namespace App\Controllers;
use App\Models\M_pengangkutan_sampah;


class PengangkutanSampah extends BaseController
{   

    public function tambahPengangkutanSampah()
    {   
        $pengangkutanSampah = new M_pengangkutan_sampah();

        $pengangkutanSampah->insert([
            'tanggal' => $this->request->getVar('tanggal'),
            'pengangkut' => $this->request->getVar('pengangkut'),
        ]);

  

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/pengangkutanSampah'));

    }

    public function deleteDataPengangkutan($id)
    {   
        $pengangkutan = new M_pengangkutan_sampah();

        $pengangkutan->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/pengangkutanSampah'));

    }

    
}
