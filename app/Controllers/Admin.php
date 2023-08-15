<?php

namespace App\Controllers;
use App\Models\M_nasabah;
use App\Models\M_admin;
use App\Models\M_sampah;
use App\Models\M_sampah_masuk;
use App\Models\M_daftar_limbah;
use App\Models\M_limbah;
use App\Models\M_tabungan;
use App\Models\M_setoran;
use App\Models\M_penarikan;
use App\Models\M_konten;


class Admin extends BaseController
{   

//dashboard
    public function dashboard()
    {   

        $nasabah = new M_nasabah();
        $totalNasabah = $nasabah->countAllResults();

        $data = [
            'totalNasabah' => $totalNasabah,
        ];

        $header['title']='Dashboard';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/dashboard',$data);
        echo view('partials/admin_footer');
    }

//sampah
    public function dataSampah()
    {   

        $sampah_masuk = new M_sampah_masuk();

        $data['data'] = $sampah_masuk->orderBy('tanggal_masuk','ASC')->paginate(10);
        $data['pager'] = $sampah_masuk->pager;
        $header['title']='Data Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/dataSampah',$data);
        echo view('partials/admin_footer');
    }

    public function daftarSampah()
    {  

        $sampah = new M_sampah();

        $data['data'] = $sampah->paginate(10);
        $data['pager'] = $sampah->pager;

        $header['title']='Daftar Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/daftarSampah',$data);
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

//limbah

    public function dataLimbah()
    {   
        $daftarLimbah = new M_daftar_limbah();
        $dataLimbah= $daftarLimbah->findAll();
   

        $temp=array();
        foreach ($dataLimbah as $data){
            $temp [] = $data;
        }


        $limbah = new M_limbah();


       
        $limbahData1 = $limbah->findAll();
        $limbahData2 = $limbah->paginate(10);
 
       
        foreach ($limbahData1 as $index => $d ){
            $satuan = $daftarLimbah->where('jenis_limbah',$d["jenis_limbah"])->select('satuan')->first();
            $limbahData2[$index]['satuan']=is_null($satuan)?"":$satuan["satuan"];
        }

        // dd($limbahData2);
       
        $data = [
            'data' => $limbahData2,
            'dataLimbah' => $dataLimbah,
            'limbah' => $temp,
            'pager' => $limbah->pager,
           
        ];

        $header['title']='Limbah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/limbah/dataLimbah',$data);
        echo view('partials/admin_footer');
    }

    public function daftarLimbah()
    {   

        $daftarLimbah = new M_daftar_limbah();

        $data['data'] = $daftarLimbah->paginate(10);
        $data['pager'] = $daftarLimbah->pager;


        $header['title']='Limbah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/limbah/DaftarLimbah',$data);
        echo view('partials/admin_footer');
    }


//nasabah
    public function riwayatTransaksi()
    {       

        $sampah = new M_sampah();
        $dataSampah = $sampah->findAll();

        $temp=array();
        foreach ($dataSampah as $data){
            $temp [] = $data;
        }


        $setoran = new M_setoran();

 
        

       
     
       
        $dataSetoran = $setoran->paginate(10);
        $dataSetoran2 = $dataSetoran;
        
        // foreach ($dataSetoran as $dt){
        //     foreach ($daftarSampah as $ds){
            
        //         $total[$ds] = $dt[$ds];
        //      }
        //      $totalBerat[]=$total;
        //      $total = array();
        // }

        foreach ($dataSetoran as $index => $d ){
            $satuan = $sampah->where('id',$d["id_sampah"])->select('satuan')->first();
            $dataSetoran2[$index]['satuan']=is_null($satuan)?"":$satuan["satuan"];
        }

   
     


        $data = [
            'data' => $dataSetoran2,
            'dataSampah' => $dataSampah,
            'sampah' => $temp,
            'pager' => $setoran->pager,
            // 'daftarSampah' => $daftarSampah,
            // 'berat'=>$totalBerat,
           
        ];

        $header['title']='Riwayat Transaksi';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/riwayatTransaksi',$data);
        echo view('partials/admin_footer');
    }

    public function dataNasabah()
    {   
        $nasabah = new M_nasabah();

        $data['data'] = $nasabah->paginate(10);
        $data['pager'] = $nasabah->pager;

        $header['title']='Data Nasabah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/dataNasabah',$data);
        echo view('partials/admin_footer');
    }

    public function tabungan()
    {   


        $sampah = new M_sampah();
        $dataSampah = $sampah->findAll();

        $temp=array();
        foreach ($dataSampah as $data){
            $temp [] = $data;
        }


        $tabungan = new M_tabungan();


       
        $dataTabungan = $tabungan->paginate(10);
      
        $data = [
            'data' => $dataTabungan,
            'dataSampah' => $dataSampah,
            'sampah' => $temp,
            'pager' => $tabungan->pager,

           
        ];
      
        $header['title']='Tabungan';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/tabungan',$data);
        echo view('partials/admin_footer');
    }

//konten
    public function konten()
    {   

        $konten = new M_konten();

        $data['data'] = $konten->paginate(10);
        $data['pager'] = $konten->pager;

        $header['title']='Konten';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/konten/konten',$data);
        echo view('partials/admin_footer');
    }


//akun
    public function akun()
    {   
        $akun = new M_admin();

        $data['data'] = $akun->paginate(10);
        $data['pager'] = $akun->pager;

        $header['title']='Kelola Akun';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/akun/akun',$data);
        echo view('partials/admin_footer');
    }
}
