<?php

namespace App\Controllers;
use App\Models\M_nasabah;
use App\Models\M_admin;
use App\Models\M_sampah;


class Admin extends BaseController
{   

//dashboard
    public function dashboard()
    {   
        $header['title']='Dashboard';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/dashboard');
        echo view('partials/admin_footer');
    }

//sampah
    public function dataSampah()
    {   
        $header['title']='Data Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/dataSampah');
        echo view('partials/admin_footer');
    }

    public function daftarSampah()
    {  

        $sampah = new M_sampah();

        $data['data'] = $sampah->findAll();

        $header['title']='Daftar Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/daftarSampah',$data);
        echo view('partials/admin_footer');
    }

    public function limbah()
    {   
        $header['title']='Limbah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/limbah');
        echo view('partials/admin_footer');
    }

    public function pengangkutanSampah()
    {   
        $header['title']='Pengangkutan Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/pengangkutanSampah');
        echo view('partials/admin_footer');
    }


//nasabah
    public function riwayatTransaksi()
    {   
        $header['title']='Riwayat Transaksi';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/riwayatTransaksi');
        echo view('partials/admin_footer');
    }

    public function dataNasabah()
    {   
        $nasabah = new M_nasabah();

        $data['data'] = $nasabah->findAll();

        $header['title']='Data Nasabah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/dataNasabah',$data);
        echo view('partials/admin_footer');
    }

    public function tabungan()
    {   
        $header['title']='Tabungan';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/tabungan');
        echo view('partials/admin_footer');
    }

//konten
    public function konten()
    {   
        $header['title']='Konten';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/konten/konten');
        echo view('partials/admin_footer');
    }


//akun
    public function akun()
    {   
        $akun = new M_admin();

        $data['data'] = $akun->findAll();

        $header['title']='Kelola Akun';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/akun/akun',$data);
        echo view('partials/admin_footer');
    }
}
