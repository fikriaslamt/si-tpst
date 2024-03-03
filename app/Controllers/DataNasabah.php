<?php

namespace App\Controllers;
use App\Models\M_nasabah;
use App\Models\M_tabungan;
use App\Models\M_setoran;
use App\Models\M_penarikan;

class DataNasabah extends BaseController
{   


    public function searchNasabah(){
        $searchValue = $this->request->getPost('searchValue');

        // Query the database using your model
        $nasabah = new M_nasabah(); // Replace with your nasabah
        $results = $nasabah->searchById($searchValue);

        // Return the results as JSON
        return $this->response->setJSON($results);
    }

    public function tambahDataNasabah()
    {   
        $nasabah = new M_nasabah();
        $tabungan = new M_tabungan();

        $nota = $this->request->getVar('nota');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');

       
        $nasabah->insert([
            'no_tabungan' => $nota,
            'nama' => $nama,
            'alamat' => $alamat,
        ]);

        $condition = array('nama' => $nama, 'alamat' => $alamat);
        $temp = $nasabah->select('id')->where($condition)->first();
        $id=strval($temp['id']);
        $day = substr(date("Ym"),2);
        $kode = strval($day.$id);


        $nasabah->update($id,[
            'kode' => $kode,
        ]);

        $tabungan->insert([
            'nasabah_id' => $temp['id'],
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    public function editDataNasabah($id)
    {   
        $nasabah = new M_nasabah();

        $nota = $this->request->getPost('nota');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $kode = $this->request->getPost('kode');

        $nasabah->update($id,[
            'no_tabungan' => $nota,
            'nama' => $nama,
            'alamat' => $alamat,
            'kode' => $kode,
        ]);

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    public function deleteDataNasabah($id)
    {   
        $nasabah = new M_nasabah();
        $setoran = new M_setoran();
        $penarikan = new M_penarikan();
        $tabungan = new M_tabungan();

        $oldDataSetoran = $setoran->getImageByUserId($id);
        foreach ($oldDataSetoran as $oldImgSetoran ) {
            $oldImage = $oldImgSetoran['image_bukti'];
            if(file_exists("uploads/buktiSetoran/".$oldImage)){
                unlink("uploads/buktiSetoran/".$oldImage);
            }
        }
        $oldDataPenarikan = $penarikan->getImageByUserId($id);
        foreach ($oldDataPenarikan as $oldImgPenarikan ) {
            $oldImage = $oldImgPenarikan['image_bukti'];
            if(file_exists("uploads/buktiPenarikan/".$oldImage)){
                unlink("uploads/buktiPenarikan/".$oldImage);
            }
        }

        $nasabah->delete($id);
        $tabungan->where('nasabah_id',$id)->delete();
        $setoran->deleteByUserId($id);
        $penarikan->deleteByUserId($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    
}
