<?php

namespace App\Controllers;
use App\Models\M_sampah_masuk;
use App\Models\M_sampah_terkelola;
use App\Models\M_sampah_tidak_terkelola;


class DataSampah extends BaseController
{   

    public function getDataKelola($id){
        $sampahTerkelola = new M_sampah_terkelola();
        $data = $sampahTerkelola -> where('sampah_masuk_id',$id)->first();

        return $this->response->setJSON($data);
    }

    public function tambahDataSampah()
    {   

        $sampahMasuk = new M_sampah_masuk();
        $sampahTerkelola = new M_sampah_terkelola();
        $sampahTidakTerkelola = new M_sampah_tidak_terkelola();
   
        $tanggalMasuk = $this->request->getVar('tanggal_masuk');
        $instansi = $this->request->getVar('instansi');
        $totalBerat = $this->request->getVar('total_berat');

        $sampahMasuk->insert([
            'tanggal_masuk' => $tanggalMasuk,
            'instansi' => $instansi,
            'total_berat' => $totalBerat,
            'status' => 'Belum Terkelola',
        ]);


        $temp = $sampahMasuk -> select('max(id) as id')->first();
        $idSampahMasuk = $temp['id'];


        $sampahTerkelola->insert([
            'sampah_masuk_id' => $idSampahMasuk,
            'tanggal_masuk' => $tanggalMasuk,
            'tanggal_update' => $tanggalMasuk,
            'total_berat' => 0,
        ]);

        $sampahTidakTerkelola->insert([
            'sampah_masuk_id' => $idSampahMasuk,
            'tanggal_masuk' => $tanggalMasuk,
            'tanggal_update' => $tanggalMasuk,
            'total_berat' => 0,
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/dataSampah'));

    }

    public function editDataSampah($id)
    {   
        $sampahMasuk = new M_sampah_masuk();
   

        $tanggalMasuk = $this->request->getVar('tanggal_masuk');
        $instansi = $this->request->getVar('instansi');
        $totalBerat = $this->request->getVar('total_berat');

        $sampahMasuk->update($id,[
            'tanggal_masuk' => $tanggalMasuk,
            'instansi' => $instansi,
            'total_berat' => $totalBerat,
        ]);


        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/dataSampah'));

    }

    public function setKelola($id)
    {   
        $sampahMasuk = new M_sampah_masuk();
        $sampahTerkelola = new M_sampah_terkelola();
        $sampahTidakTerkelola = new M_sampah_tidak_terkelola();

        $sisaKelola = $sampahMasuk->select('total_berat')->where('id',$id)->first();

        $maggot = $this->request->getVar('maggot');
        $kompos = $this->request->getVar('kompos');

        $totalBerat = $maggot + $kompos;

        $sisa = $sisaKelola['total_berat'] - $kompos - $maggot;

        $day = date("Y/m/d");

        $sampahTerkelola->where('sampah_masuk_id',$id)->set([
            'tanggal_update' => $day,
            'total_berat' => $totalBerat,
            'berat_kompos' => $kompos,
            'berat_maggot' => $maggot
        ])->update();
        
        $sampahTidakTerkelola->where('sampah_masuk_id',$id)->set([
            'tanggal_update' => $day,
            'total_berat' => $sisa,
        ])->update();

        $sampahMasuk->update($id,[
            'status' => 'Terkelola',
        ]);

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/dataSampah'));

    }

    
}
