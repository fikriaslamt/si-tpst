<?php

namespace App\Controllers;
use App\Models\M_nasabah;
use App\Models\M_tabungan;
use App\Models\M_setoran;
use App\Models\M_sampah;

class Tabungan extends BaseController
{   

    public function tambahSetoran()
    {   
        $tabungan = new M_tabungan();
        $setoran = new M_setoran();
        $sampah = new M_sampah();

        $nomor = $this->request->getPost('nomor');

        $sampahData = $this->request->getPost('addmore');
        $sampahData2 = $this->request->getPost('add');

        $totalBerat = 0.0;
        $hargaSampah = 0.0;
        $hargaTotal = 0.0;

       

        $uuid = uniqid();

        $data = [
            'id_transaksi' => $uuid,
            'tanggal' => date("Y/m/d"),
            'nasabah_id' => $nomor,
            'total_berat' => 0,
            'total_harga' => 0,
            'id_sampah' => 0,
          
        ];

        foreach ($sampahData as $index => $s) {
            
            $hargaSampah = $sampah->where('jenis',$s['input'])->first();
            $harga = $hargaSampah['harga_nasabah']* $sampahData2[$index]['sampah'];

            $totalBerat = $sampahData2[$index]['sampah'];
            $hargaTotal += $harga;
            $idSampah = $hargaSampah['id'];

            $data['total_berat'] = $totalBerat;
            $data['total_harga'] = $harga;
            $data['id_sampah'] = $idSampah;

            $setoran->insert($data);
        }


       //tabungan 
        $dataTabungan = $tabungan->where('nasabah_id',$nomor)->first();
        $saldoBaru = $dataTabungan['saldo'] + $hargaTotal;

        $data2 = [
            'saldo' => $saldoBaru,
        ];



        $tabungan->update($dataTabungan['id'],$data2);



        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/tabungan'));

    }
    public function tambahPenarikan()
    {   
        $nasabah = new M_nasabah();

        $nasabah->insert([
            'nama' => trim($this->request->getVar('nama')),
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/dataNasabah'));

    }



    public function editTabungan($id)
    {   
        $nasabah = new M_nasabah();

        $data['news'] = $nasabah->where('id', $id)->first();

        $nasabah->update($id,[
            'nama' => trim($this->request->getVar('nama')),
        ]);

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    public function deleteTabungan($id)
    {   
        $nasabah = new M_nasabah();

        $nasabah->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    
}
