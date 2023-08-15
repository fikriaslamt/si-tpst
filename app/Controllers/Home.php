<?php

namespace App\Controllers;
use App\Models\M_konten;
use App\Models\M_sampah;
use App\Models\M_tabungan;

use App\Controllers\Auth;

class Home extends BaseController
{
    public function index()
    {  
        $auth = new Auth();

        $result["data"]= $auth->getNewDataPost();
        

        echo view('home/home.php',$result);
        echo view('partials/footer');
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

    public function search(){
        
        // Get the search query from the URL parameter
        $input = $this->request->getVar('input');
       
        // Perform a search query using your model
        $tabungan = new M_tabungan();
        $results = $tabungan->where('nasabah_id',$input)->first();
        
        $data=[
            'results' =>$results
        ];
        echo view('partials/header');
        echo view('home/searchbar.php',$data);
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
