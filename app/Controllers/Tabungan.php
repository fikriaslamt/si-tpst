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

    public function verifyKode(){
        $kode = $this->request->getPost('searchValue');
        $tabungan = new M_tabungan(); // Replace with your tabungan
        
        // Query the database using your model
        $nasabah = new M_nasabah(); // Replace with your nasabah
        $results = $nasabah->searchBykode($kode);


        foreach($results as $result){
            $idNasabah = $result['id'];
            $nama = $result['nama'];
            $alamat = $result['alamat'];
        }
        $saldo = $tabungan->getSaldo($idNasabah);

        $data = array([
            'nama' => $nama,
            'alamat' => $alamat,
            'saldo' => $saldo,
        ]);
        return $this->response->setJSON($data);
    }
    
    


    public function tambahSetoran()
    {   
        $nasabah = new M_nasabah();
        $tabungan = new M_tabungan();
        $setoran = new M_setoran();
        $sampah = new M_sampah();
        $riwayat = new M_riwayat_transaksi();

        $admin = session('id');
  
        $nomor = $this->request->getPost('nomor');
        $id = $nasabah->select('id')->where('no_tabungan',$nomor)->first();

        $sampahData = $this->request->getPost('addmore');
        $sampahData2 = $this->request->getPost('add');

        $totalBerat = 0.0;
        $hargaTotal = 0.0;

       
        $tanggal = date("Y/m/d");
        $uuid = uniqid();

        $data = [
            'id_transaksi' => $uuid,
            'tanggal' => $tanggal,
            'nasabah_id' => $id['id'],
            'admin_id' => $admin,
        ];

        foreach ($sampahData as $index => $s) {
            
            $daftarSampah = $sampah->where('id',$s['input'])->first();
            $harga = $daftarSampah['harga_nasabah']* $sampahData2[$index]['sampah'];

            $totalBerat = $sampahData2[$index]['sampah'];
            $hargaTotal += $harga;
            $idSampah = $s['input'];

            $data['total_berat'] = $totalBerat;
            $data['total_harga'] = $harga;
            $data['sampah_id'] = $idSampah;

            $setoran->insert($data);

//riwayat transaksi
            $riwayat->addRiwayat("Setoran",$tanggal,$harga,$admin);
        }


//tabungan 
        $dataTabungan = $tabungan->where('nasabah_id',$id['id'])->first();
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
        $nasabah = new M_nasabah();
        $tabungan = new M_tabungan();
        $penarikan = new M_penarikan();
        $riwayat = new M_riwayat_transaksi();

        $admin = session('id');

        $nomor = $this->request->getPost('nomor');

        $id = $nasabah->select('id')->where('no_tabungan',$nomor)->first();
        
        $totalPenarikan = $this->request->getPost('saldo');
        $tanggal = date("Y/m/d");



//tabungan 
        $dataTabungan = $tabungan->where('nasabah_id',$id['id'])->first();
        $saldoBaru = $dataTabungan['saldo'] - $totalPenarikan;
        $SaldoPenarikan = $dataTabungan['penarikan'] + $totalPenarikan;

        $data2 = [
            'saldo' => $saldoBaru,
            'penarikan' => $SaldoPenarikan,
        ];
       
        $tabungan->update($dataTabungan['id'],$data2);

//penarikan
        $penarikan->insert([
            'tanggal' => $tanggal,
            'nasabah_id' => $id['id'],
            'admin_id' => $admin,
            'total_penarikan' => $totalPenarikan,
        ]);

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
