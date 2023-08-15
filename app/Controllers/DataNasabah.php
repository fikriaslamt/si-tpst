<?php

namespace App\Controllers;
use App\Models\M_nasabah;
use App\Models\M_tabungan;

class DataNasabah extends BaseController
{   



    public function tambahDataNasabah()
    {   
        $nasabah = new M_nasabah();
        $tabungan = new M_tabungan();

        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');

       

        $nasabah->insert([
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
            'nama' => trim($nama),
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    public function editDataNasabah($id)
    {   
        $nasabah = new M_nasabah();
        $tabungan = new M_tabungan();

        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');

        $nasabah->update($id,[
            'nama' => $nama,
            'alamat' => $alamat,
        ]);

        $tabungan->set('nama',$nama)->where('nasabah_id',$id)->update();


        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    public function deleteDataNasabah($id)
    {   
        $nasabah = new M_nasabah();
        $tabungan = new M_tabungan();

        $nasabah->delete($id);
        $tabungan->where('nasabah_id',$id)->delete();

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/dataNasabah'));

    }

    
}
