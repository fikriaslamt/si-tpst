<?php

namespace App\Controllers;
use App\Models\M_konten;
use App\Models\M_sampah;
use App\Models\M_tabungan;
use App\Models\M_media_ig;
use App\Models\M_sampah_terkelola;
use App\Models\M_sampah_masuk;
use App\Models\M_sampah_tidak_terkelola;
use App\Models\M_nasabah;

use App\Controllers\Auth;

class Home extends BaseController
{
    public function index()
    {  
        $auth = new Auth();
        $media = new M_media_ig();
        $nasabah = new M_nasabah();

        $sampahMasuk = new M_sampah_masuk();
        $sampahTerkelola = new M_sampah_terkelola();
        $sampahTidakTerkelola = new M_sampah_tidak_terkelola();

        $dataTimbulan = $sampahMasuk ->getTimbulan();
        $dataTerkelola = $sampahTerkelola ->getTotalTerkelola();
        $dataTidakTerkelola = $sampahTidakTerkelola ->getTotalTidakTerkelola();

        $totalNasabah = $nasabah->getTotalNasabah();

        if($dataTimbulan !=0){
            $persentaseterkelola = round(($dataTerkelola/$dataTimbulan)*100,2,PHP_ROUND_HALF_UP);
            $persentasetidakTerkelola = round(($dataTidakTerkelola/$dataTimbulan)*100,2,PHP_ROUND_HALF_UP);
        }else{
            
            $persentaseterkelola = 0;
            $persentasetidakTerkelola = 0;
        }

        $result['nasabah'] = $totalNasabah;
        $result['timbulan'] = $dataTimbulan;
        $result['persentaseTerkelola'] = $persentaseterkelola;
        $result['persentasetidakTerkelola'] = $persentasetidakTerkelola;

        $totalPost = $media->totalPost();
                
        if ($totalPost == 0){
            $auth->getNewDataPost();
        }

        $date = date_create(date("Y/m/d"));
        $date2 = $media->getDatePost();

        $datePost =date_create($date2['tanggal']);

        $temp = date_diff($date,$datePost);

        $diffDate=$temp->format("%a");
        
        if($diffDate >= '7'){
            $media->deletePost();
            $auth->getNewDataPost();
        }
    
        $result["data"]= $media->getAllPost();
        
        echo view('home/home.php',$result);

    }
    public function about()
    {   echo view('partials/header');
        echo view('home/about.php');
        echo view('partials/footer');
    }
    public function program()
    {   echo view('partials/header');
        echo view('home/program.php');
        echo view('partials/footer');
    }
    public function produk()
    {   echo view('partials/header');
        echo view('home/produk.php');
        echo view('partials/footer');
    }
    public function publikasi()
    {   
        $konten = new M_konten();

        $data['data'] = $konten->findAll();

        echo view('partials/header');
        echo view('home/publikasi.php',$data);
        echo view('partials/footer');
    }

    public function detail($id){
    
        $konten = new M_konten();
        $results = $konten->where('id',$id)->first();
        
        $data=[
            'data' =>$results
        ];
        echo view('partials/header');
        echo view('home/detailPublikasi.php',$data);
        echo view('partials/footer');
    }

    public function saldo()
    {   echo view('partials/header');
        echo view('home/saldo.php');
        echo view('partials/footer');
    }


    public function daftarSampah()
    {  
        $sampah = new M_sampah();

        $data['data'] = $sampah->findAll();
        echo view('partials/header');
        echo view('home/daftarSampah.php',$data);
        echo view('partials/footer');
    }
}
