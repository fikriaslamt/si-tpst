<?php

namespace App\Controllers;
use App\Models\M_nasabah;
use App\Models\M_penarikan;
use App\Models\M_riwayat_transaksi;
use App\Models\M_tabungan;
use App\Models\M_setoran;
use App\Models\M_sampah;

class Tabungan extends BaseController
{   

    public function searchNasabah(){
        $searchValue = $this->request->getPost('searchValue');

        // Query the database using your model
        $tabungan = new M_tabungan(); // Replace with your tabungan
        $results = $tabungan->searchById($searchValue);

        // Return the results as JSON
        return $this->response->setJSON($results);
    }

    public function tambahSetoran()
    {   
        $tabungan = new M_tabungan();
        $setoran = new M_setoran();
        $sampah = new M_sampah();
        $riwayat = new M_riwayat_transaksi();

        $admin = session('name');
  
        $nomor = $this->request->getPost('nomor');

        $sampahData = $this->request->getPost('addmore');
        $sampahData2 = $this->request->getPost('add');

        $totalBerat = 0.0;
        $hargaSampah = 0.0;
        $hargaTotal = 0.0;

       
        $tanggal = date("Y/m/d");
        $uuid = uniqid();

        $data = [
            'id_transaksi' => $uuid,
            'tanggal' => $tanggal,
            'nasabah_id' => $nomor,
            'admin' => $admin,
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

//riwayat transaksi
            $riwayat->addRiwayat("Setoran",$tanggal,$harga,$admin);
        }


//tabungan 
        $dataTabungan = $tabungan->where('nasabah_id',$nomor)->first();
        $saldoBaru = $dataTabungan['saldo'] + $hargaTotal;

        $data2 = [
            'saldo' => $saldoBaru,
        ];

        $tabungan->update($dataTabungan['id'],$data2);



        session()->setFlashdata('error', "Setoran Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/tabungan'));

    }

    public function tambahPenarikan()
    {    
        $tabungan = new M_tabungan();
        $penarikan = new M_penarikan();
        $riwayat = new M_riwayat_transaksi();

        $admin = session('name');

        $nomor = $this->request->getPost('nomor');
        $totalPenarikan = $this->request->getPost('saldo');
        $tanggal = date("Y/m/d");

//penarikan
        $penarikan->insert([
            'tanggal' => $tanggal,
            'nasabah_id' => $nomor,
            'admin' => $admin,
            'total_penarikan' => $totalPenarikan,
        ]);

//tabungan 
        $dataTabungan = $tabungan->where('nasabah_id',$nomor)->first();
        $saldoBaru = $dataTabungan['saldo'] - $totalPenarikan;
        $SaldoPenarikan = $dataTabungan['penarikan'] + $totalPenarikan;

        $data2 = [
            'saldo' => $saldoBaru,
            'penarikan' => $SaldoPenarikan,
        ];
       
        $tabungan->update($dataTabungan['id'],$data2);

//riwayat transaksi
        $riwayat->addRiwayat("Penarikan",$tanggal,$totalPenarikan,$admin);

        session()->setFlashdata('error', "Penarikan Berhasil");
        return redirect()->to(base_url('admin/tabungan'));

    }



    // public function editTabungan($id)
    // {   
    //     $nasabah = new M_nasabah();

    //     $data['news'] = $nasabah->where('id', $id)->first();

    //     $nasabah->update($id,[
    //         'nama' => trim($this->request->getVar('nama')),
    //     ]);

    //     session()->setFlashdata('error', "Data Berhasil Diubah");
    //     return redirect()->to(base_url('admin/dataNasabah'));

    // }

    // public function deleteTabungan($id)
    // {   
    //     $nasabah = new M_nasabah();

    //     $nasabah->delete($id);

    //     session()->setFlashdata('error', "Data Berhasil Dihapus");
    //     return redirect()->to(base_url('admin/dataNasabah'));

    // }

    
}
