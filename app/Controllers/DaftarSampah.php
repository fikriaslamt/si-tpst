<?php

namespace App\Controllers;
use App\Models\M_sampah;

class DaftarSampah extends BaseController
{   


    public function tambahDaftarSampah()
    {   
        $daftarSampah = new M_sampah();


        $jenis = $this->request->getVar('jenis');
        $newData = array();
        $newData[]=$jenis;

        $tanggal = date("Y/m/d");


        $daftarSampah->insert([
            'jenis' => $jenis,
            'satuan' => $this->request->getVar('satuan'),
            'harga_tpst' => $this->request->getVar('harga_tpst'),
            'harga_nasabah' => $this->request->getVar('harga_nasabah'),
            'tanggal_update' => $tanggal,
        
        ]);





        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/daftarSampah'));

    }

    public function editDaftarSampah($id)
    {   
        $daftarSampah = new M_sampah();

     
        $tanggal = date("Y/m/d");


        $daftarSampah->update($id,[
            'jenis' => $this->request->getVar('jenis'),
            'satuan' => $this->request->getVar('satuan'),
            'harga_tpst' => $this->request->getVar('harga_tpst'),
            'harga_nasabah' => $this->request->getVar('harga_nasabah'),
            'tanggal_update' => $tanggal,
        ]);

       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/daftarSampah'));

    }

    public function deleteDaftarSampah($id)
    {   
        $daftarSampah = new M_sampah();
        
        $daftarSampah->delete($id);

       

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/daftarSampah'));

    }

    
}
