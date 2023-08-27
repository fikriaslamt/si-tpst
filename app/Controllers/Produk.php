<?php

namespace App\Controllers;

use App\Models\M_penjualan_produk;
use App\Models\M_produk;

class Produk extends BaseController
{   

    public function tambahProduk()
    {   
        $produk = new M_produk();
        
        $tanggal = date("Y/m/d");

        $produk->insert([
                'tanggal_update' => $tanggal,
                'jenis_produk' => $this->request->getVar('produk'),
                'harga' => $this->request->getVar('harga'),
                'total_stok' => $this->request->getVar('stok'),
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

        $oldData = $produk->where('id',$id)->first();
        
        $terjual = $this->request->getVar('stokTerjual');
        $pendapatan =  $oldData['harga'] * $terjual;

        $tanggal = date("Y/m/d");
        $penjualan = $oldData['total_penjualan'] + $terjual;
        $sisaStok = $oldData['total_stok'] - $terjual;
        $keuntungan = $oldData['nominal_penjualan'] + $pendapatan;

        $produk->update($id,[
            'tanggal_update' => $tanggal,
            'total_stok' => $sisaStok,
            'total_penjualan' => $penjualan,
            'nominal_penjualan' => $keuntungan,
        ]);

        $penjualanProduk->insert([
            'produk_id' => $id,
            'admin_id' => $admin,
            'tanggal' => $tanggal,
            'total_terjual' => $terjual,
            'nominal_penjualan' => $pendapatan,
        ]);
       

        session()->setFlashdata('error', "Data Berhasil Di Update");
        return redirect()->to(base_url('Admin/produk'));

    }

    public function editProduk($id)
    {   
        $produk = new M_produk();

           $produk->update($id,[
                'harga' => $this->request->getVar('harga'),
                'total_stok' => $this->request->getVar('stok'),
            ]);
       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('Admin/produk'));

    }
   
}
