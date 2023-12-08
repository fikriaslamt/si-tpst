<?php

namespace App\Controllers;

use App\Models\M_penjualan_produk;
use App\Models\M_produk;
use App\Models\M_daftar_produk;

class DaftarProduk extends BaseController
{   

    public function tambahDaftarProduk()
    {   
        $produk = new M_daftar_produk();

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/produk/',$imageName);
        }
        
        $tanggal = date("Y/m/d");

        $produk->insert([
                'tanggal_update' => $tanggal,
                'jenis_produk' => $this->request->getVar('jenis'),
                'harga' => $this->request->getVar('harga'),
                'image' => $imageName,
            ]);

            session()->setFlashdata('error', "Data Berhasil Ditambahkan");
            return redirect()->to(base_url('Admin/daftarProduk'));

    }



    public function editDaftarProduk($id)
    {   
        $produk = new M_daftar_produk();

        $oldData = $produk->find($id);

        $oldImage = $oldData['image'];

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/produk/".$oldImage)){
                unlink("uploads/produk/".$oldImage);
            }

            $imageName = $file->getRandomName();
            $file->move('uploads/produk/',$imageName);

        }else{
            $imageName = $oldImage;
        }

        $tanggal = date("Y/m/d");

           $produk->update($id,[
            'tanggal_update' => $tanggal,
            'jenis_produk' => $this->request->getVar('jenis'),
            'harga' => $this->request->getVar('harga'),
            'image' => $imageName,
            ]);
       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('Admin/daftarProduk'));

    }

    public function deleteDaftarProduk($id)
    {   
        $produk = new M_daftar_produk();

        $oldData = $produk->find($id);
        $oldImage = $oldData['image'];

        if(file_exists("uploads/produk/".$oldImage)){
            unlink("uploads/produk/".$oldImage);
        }
        
        $produk->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/daftarProduk'));

    }
   
}
