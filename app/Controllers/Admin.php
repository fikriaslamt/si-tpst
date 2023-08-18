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
use App\Models\M_riwayat_transaksi;




class Admin extends BaseController
{   

//dashboard
    public function dashboard()
    {   

        $nasabah = new M_nasabah();
        $sampahMasuk= new M_sampah_masuk();
        $setoran= new M_setoran();
        $penarikan= new M_penarikan();
        $konten = new M_konten();
        $riwayat = new M_riwayat_transaksi();



        $timbulan = $sampahMasuk ->getTimbulan();

        $dataChart = $riwayat->getRiwayatByDate();

        $timbulan = $sampahMasuk->getTimbulan();

        $totalSetoran = $setoran->countAllResults();
        $totalPenarikan = $penarikan->countAllResults();
        $totalKonten = $konten->countAllResults();
        $totalNasabah = $nasabah->countAllResults();

        $dataRiwayat = $riwayat->orderBy('tanggal','DESC')->paginate(10);

        $data = [
            'Terkelola' => $timbulan['Terkelola'],
            'tidakTerkelola' => $timbulan['tidakTerkelola'],
            'lastYear' => $dataChart['lastYear'],
            'year' => $dataChart['year'],
            'setoranChart' => $dataChart['setoranChart'],
            'penarikanChart' => $dataChart['penarikanChart'],
            'limbahChart' => $dataChart['limbahChart'],
            'riwayat' => $dataRiwayat,
            'pager' => $riwayat->pager,
            'totalNasabah' => $totalNasabah,
            'timbulan' => $timbulan['timbulan'],
            'totalTransaksi' => $totalSetoran+$totalPenarikan,
            'totalKonten' => $totalKonten,
        ];

        $header['title']='Dashboard';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/dashboard',$data);
        echo view('partials/admin_footer');
    }

//sampah
    public function dataSampah()
    {   

        $sampah_masuk = new M_sampah_masuk();

        $timbulan = $sampah_masuk ->getTimbulan();

        $data['data'] = $sampah_masuk->orderBy('tanggal_masuk','DESC')->paginate(10);
        $data['pager'] = $sampah_masuk->pager;
        $data['timbulan'] = $timbulan['timbulan'];
        $data['persentaseTerkelola'] = $timbulan['persentaseTerkelola'];
        $data['persentasetidakTerkelola'] = $timbulan['persentasetidakTerkelola'];

        $header['title']='Data Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/dataSampah',$data);
        echo view('partials/admin_footer');
    }

    public function daftarSampah()
    {  

        $keyword = $this->request->getGet('search');
        $sampah = new M_sampah();

        $data = $sampah->getPaginated(10,$keyword);

        $header['title']='Daftar Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/daftarSampah',$data);
        echo view('partials/admin_footer');
    }



    public function pengangkutanSampah()
    {   
        $header['title']='Pengangkutan Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
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

        $header['title']='Data Limbah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/limbah/dataLimbah',$data);
        echo view('partials/admin_footer');
    }

    public function daftarLimbah()
    {   
        $keyword = $this->request->getGet('search');
        $daftarLimbah = new M_daftar_limbah();

        $data = $daftarLimbah->getPaginated(10,$keyword);
    


        $header['title']='Daftar Limbah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/limbah/DaftarLimbah',$data);
        echo view('partials/admin_footer');
    }


//nasabah
    public function riwayatTransaksi()
    {       


        $setoran= new M_setoran();
        $penarikan= new M_penarikan();
        $sampah = new M_sampah();

        $totalSetoran = $setoran->countAllResults();
        $totalPenarikan = $penarikan->countAllResults();
   



    
        $dataSampah = $sampah->findAll();

        $temp=array();
        foreach ($dataSampah as $data){
            $temp [] = $data;
        }


        $dataPenarikan= $penarikan->orderBy('tanggal','DESC')->paginate(10);
        $dataSetoran = $setoran->orderBy('tanggal','DESC')->paginate(10);
        $dataSetoran2 = $dataSetoran;

    


        foreach ($dataSetoran as $index => $d ){
            $satuan = $sampah->where('id',$d["id_sampah"])->select('satuan')->first();
            $jenis = $sampah->where('id',$d["id_sampah"])->select('jenis')->first();
            $dataSetoran2[$index]['satuan']=is_null($satuan)?"":$satuan["satuan"];
            $dataSetoran2[$index]['jenis']=is_null($jenis)?"":$jenis["jenis"];
        }

   
     


        $data = [
            'data' => $dataSetoran2,
            'data2' => $dataPenarikan,
            'dataSampah' => $dataSampah,
            'sampah' => $temp,
            'pager' => $setoran->pager,
            'pager2' => $penarikan->pager,
            'totalTransaksi' => $totalSetoran+$totalPenarikan,
            'setoran' => $totalSetoran,
            'penarikan' => $totalPenarikan,
            // 'daftarSampah' => $daftarSampah,
            // 'berat'=>$totalBerat,
           
        ];

        $header['title']='Riwayat Transaksi';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/riwayatTransaksi',$data);
        echo view('partials/admin_footer');
    }

    public function dataNasabah()
    {   
        $keyword = $this->request->getGet('search');
        $nasabah = new M_nasabah();

        $data = $nasabah->getPaginated(10,$keyword);
    

        $header['title']='Data Nasabah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
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

        $keyword = $this->request->getGet('search');
       

    
       
        $dataTabungan = $tabungan->getPaginated(10,$keyword);
      
        $data = [
            'data' => $dataTabungan['data'],
            'dataSampah' => $dataSampah,
            'sampah' => $temp,
            'pager' => $dataTabungan['pager'],

        ];
      
        $header['title']='Tabungan';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/tabungan',$data);
        echo view('partials/admin_footer');
    }

//konten
    public function konten()
    {   

        $keyword = $this->request->getGet('search');
        $konten = new M_konten();

        $data = $konten->getPaginated(10,$keyword);
    

        $header['title']='Konten';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
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
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/akun/akun',$data);
        echo view('partials/admin_footer');
    }
}
