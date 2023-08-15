<?php

namespace App\Controllers;
use App\Models\M_nasabah;
use App\Models\M_tabungan;
use App\Models\M_setoran;
use App\Models\M_sampah;
use App\Models\M_limbah;
use App\Models\M_daftar_limbah;

class DataLimbah extends BaseController
{   

    public function tambahDataLimbah()
    {   
        $limbah = new M_limbah();
        $daftarLimbah = new M_daftar_limbah();


        $limbahData = $this->request->getPost('addmore');
        $limbahData2 = $this->request->getPost('add');

        $totalBerat = 0.0;
        $harga = 0.0;

       

        // $uuid = uniqid();

        $data = [
        // 'id_transaksi' => $uuid,
            'tanggal_masuk' => date("Y/m/d"),
            'total_berat' => 0,
            'total_harga' => 0,
        ];

        foreach ($limbahData as $index => $s) {
            
            $hargaLimbah = $daftarLimbah->where('jenis_limbah',$s['input'])->first();
            $harga = $hargaLimbah['harga']* $limbahData2[$index]['limbah'];

            $totalBerat = $limbahData2[$index]['limbah'];
            
            $data['jenis_limbah'] = $s['input'];
            $data['total_berat'] = $totalBerat;
            $data['total_harga'] = $harga;
    

            $limbah->insert($data);
        }

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/dataLimbah'));

    }
    // public function tambahPenarikan()
    // {   
    //     $nasabah = new M_nasabah();

    //     $nasabah->insert([
    //         'nama' => trim($this->request->getVar('nama')),
    //     ]);

    //     session()->setFlashdata('error', "Data Berhasil Ditambahkan");
    //     return redirect()->to(base_url('admin/dataNasabah'));

    // }



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
