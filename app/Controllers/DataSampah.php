<?php

namespace App\Controllers;
use App\Models\M_sampah_masuk;
use App\Models\M_sampah_terkelola;


class DataSampah extends BaseController
{   



    public function tambahDataSampah()
    {   
        $sampahMasuk = new M_sampah_masuk();
   
        $tanggalMasuk = $this->request->getVar('tanggal_masuk');
        $totalBerat = $this->request->getVar('total_berat');

        $sampahMasuk->insert([
            'tanggal_masuk' => $tanggalMasuk,
            'total_berat' => $totalBerat,
            'status' => 'Belum Terkelola',
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/dataSampah'));

    }

    public function editDataSampah($id)
    {   
        $sampahMasuk = new M_sampah_masuk();
   

        $tanggalMasuk = $this->request->getVar('tanggal_masuk');
        $totalBerat = $this->request->getVar('total_berat');

        $sampahMasuk->update($id,[
            'tanggal_masuk' => $tanggalMasuk,
            'total_berat' => $totalBerat,
        ]);

        


        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/dataSampah'));

    }

    public function setStatusTerkelola($id)
    {   
        $sampahMasuk = new M_sampah_masuk();
        $sampahTerkelola = new M_sampah_terkelola();

        $data = $sampahMasuk->where('id',$id)->first();
        $day = date("Y/m/d");

        $sampahTerkelola->insert([
            'tanggal_masuk' => $data['tanggal_masuk'],
            'tanggal_update' => $day,
            'total_berat' => $data['total_berat'],
        ]);

        $sampahMasuk->update($id,[
            'status' => 'Terkelola',
        ]);


        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/dataSampah'));

    }

    
}
