<?php

namespace App\Controllers;

use App\Models\M_penjualan_produk;
use App\Models\M_produk;

class Produk extends BaseController
{   

    public function tambahProduk()
    {   
        $produk = new M_produk();
        

        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d h:i:sa");

        $admin = session('id');

        $daftarProdukId = $this->request->getVar('jenis');

        $produk->insert([
                'tanggal_update' => $tanggal,
                'daftar_produk_id' => $daftarProdukId, 
                'admin_id' => $admin, 
                'stok' => $this->request->getVar('stok'),
                'total_penjualan' => 0,
                'nominal_penjualan' => 0,
            ]);

            session()->setFlashdata('error', "Data Berhasil Ditambahkan");
            return redirect()->to(base_url('Admin/produk'));

    }

    public function updateProduk($id)
    {   $penjualanProduk = new M_penjualan_produk();
        $produk = new M_produk();
        $admin = session('id');

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/buktiPenjualan/',$imageName);
        }

        $oldData = $produk->getById($id);
        
        $terjual = $this->request->getVar('stokTerjual');
        $pendapatan =  $oldData['harga'] * $terjual;

        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d h:i:sa");

        $penjualan = $oldData['total_penjualan'] + $terjual;
        $sisaStok = $oldData['stok'] - $terjual;
        $keuntungan = $oldData['nominal_penjualan'] + $pendapatan;

        $produk->update($id,[
            'tanggal_update' => $tanggal,
            'admin_id' => $admin, 
            'stok' => $sisaStok,
            'total_penjualan' => $penjualan,
            'nominal_penjualan' => $keuntungan,
        ]);

        $penjualanProduk->insert([
            'daftar_produk_id' => $oldData["daftar_produk_id"],
            'admin_id' => $admin,
            'tanggal' => $tanggal,
            'total_terjual' => $terjual,
            'nominal_penjualan' => $pendapatan,
            'image_bukti' => $imageName,
        ]);
       

        session()->setFlashdata('error', "Data Berhasil Di Update");
        return redirect()->to(base_url('Admin/produk'));

    }

    public function editProduk($id)
    {   
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d h:i:sa");

        $admin = session('id');

        $produk = new M_produk();

           $produk->update($id,[
                'tanggal_update' => $tanggal,
                'stok' => $this->request->getVar('stok'),
                'admin_id' => $admin, 
            ]);
       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('Admin/produk'));

    }
   
}
