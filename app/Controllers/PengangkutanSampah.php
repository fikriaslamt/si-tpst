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
            'petugas' => $this->request->getVar('petugas'),
            'total_berat' => $this->request->getVar('total_berat'),
            'total_harga' => $this->request->getVar('total_harga'),
        
        ]);

  

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/pengangkutanSampah'));

    }

    // public function editPengangkutanSampah($id)
    // {   
    //     $daftarSampah = new M_sampah();
    //     $tabungan = new M_tabungan();
    //     $setoran = new M_setoran();

    //     $oldData = $daftarSampah->where('id',$id)->first();
    //     $stringOldData = "".$oldData['jenis'];

    //     $jenis = $this->request->getVar('jenis');
    //     $stringJenis = "".$jenis;

    //     $daftarSampah->update($id,[
    //         'jenis' => $jenis,
    //         'harga_tpst' => $this->request->getVar('harga_tpst'),
    //         'harga_nasabah' => $this->request->getVar('harga_nasabah'),
    //         'tanggal_update' => $this->request->getVar('tanggal'),
    //     ]);

    //     $query1 = "ALTER TABLE tabungan CHANGE ".$stringOldData." ".$stringJenis." float";
    //     $setoran->query($query1);
    //     $setoran->editAllowedField($oldData,$jenis);

    //     $query2 = "ALTER TABLE setoran CHANGE ".$stringOldData." ".$stringJenis." float";
    //     $tabungan->query($query2);
    //     $tabungan->editAllowedField($oldData,$jenis);

    //     session()->setFlashdata('error', "Data Berhasil Diubah");
    //     return redirect()->to(base_url('admin/daftarSampah'));

    // }

    // public function deletePengangkutanSampah($id)
    // {   
    //     $daftarSampah = new M_sampah();
    //     $tabungan = new M_tabungan();
    //     $setoran = new M_setoran();

    //     $oldData = $daftarSampah->where('id',$id)->first();
    //     $temp = "".$oldData['jenis'];
        
    //     $daftarSampah->delete($id);

    //     $query1 = "ALTER TABLE tabungan DROP ".$temp;
    //     $tabungan->query($query1);
    //     $tabungan->deleteAllowedField($temp);

    //     $query2 = "ALTER TABLE setoran DROP ".$temp;
    //     $setoran->query($query2);
    //     $setoran->deleteAllowedField($temp);

    //     session()->setFlashdata('error', "Data Berhasil Dihapus");
    //     return redirect()->to(base_url('admin/daftarSampah'));

    // }

    
}
