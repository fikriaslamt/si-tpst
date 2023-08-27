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
use App\Models\m_produk;
use App\Models\m_penjualan_produk;
use App\Models\M_konten;
use App\Models\M_pengangkutan_sampah;
use App\Models\M_riwayat_transaksi;
use App\Models\M_sampah_terkelola;
use App\Models\M_sampah_tidak_terkelola;

class Admin extends BaseController {

//dashboard
    public function dashboard(){

        $nasabah = new M_nasabah();
        $sampahMasuk= new M_sampah_masuk();
        $setoran= new M_setoran();
        $penarikan= new M_penarikan();
        $konten = new M_konten();
        $riwayat = new M_riwayat_transaksi();
        $sampahTerkelola = new M_sampah_terkelola();
        $sampahTidakTerkelola = new M_sampah_tidak_terkelola();



        $timbulan = $sampahMasuk ->getTimbulan();
        $terkelola = $sampahTerkelola->getTotalTerkelola();
        $tidakTerkelola = $sampahTidakTerkelola->getTotalTidakTerkelola();

        $dataChart = $riwayat->getRiwayatByDate();

        $totalSetoran = $setoran->countAllResults();
        $totalPenarikan = $penarikan->countAllResults();
        $totalKonten = $konten->countAllResults();
        $totalNasabah = $nasabah->countAllResults();

        $dataRiwayat = $riwayat->orderBy('tanggal','DESC')->paginate(10);

        $data = [
            'Terkelola' => $terkelola,
            'tidakTerkelola' => $tidakTerkelola,
            'lastYear' => $dataChart['lastYear'],
            'year' => $dataChart['year'],
            'setoranChart' => $dataChart['setoranChart'],
            'penarikanChart' => $dataChart['penarikanChart'],
            'limbahChart' => $dataChart['limbahChart'],
            'riwayat' => $dataRiwayat,
            'pager' => $riwayat->pager,
            'totalNasabah' => $totalNasabah,
            'timbulan' => $timbulan,
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
    public function dataSampah(){

        $sampahMasuk = new M_sampah_masuk();
        $sampahTerkelola = new M_sampah_terkelola();
        $sampahTidakTerkelola = new M_sampah_tidak_terkelola();

        $dataTimbulan = $sampahMasuk ->getTimbulan();
        $dataTerkelola = $sampahTerkelola ->getTotalTerkelola();
        $dataTidakTerkelola = $sampahTidakTerkelola ->getTotalTidakTerkelola();

        $data['data'] = $sampahMasuk->orderBy('tanggal_masuk','DESC')->paginate(10);
        $data['pager'] = $sampahMasuk->pager;

        if($dataTimbulan !=0){
            $persentaseterkelola = round(($dataTerkelola/$dataTimbulan)*100,2,PHP_ROUND_HALF_UP);
            $persentasetidakTerkelola = round(($dataTidakTerkelola/$dataTimbulan)*100,2,PHP_ROUND_HALF_UP);
        }else{
            
            $persentaseterkelola = 0;
            $persentasetidakTerkelola = 0;
        }

        $data['timbulan'] = $dataTimbulan;
        $data['persentaseTerkelola'] = $persentaseterkelola;
        $data['persentasetidakTerkelola'] = $persentasetidakTerkelola;

        $header['title']='Data Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/dataSampah',$data);
        echo view('partials/admin_footer');
    }

    public function daftarSampah(){

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



    public function pengangkutanSampah(){

        $pengangkutanSampah = new M_pengangkutan_sampah();

        $dataPengangkutan = $pengangkutanSampah->orderBy('tanggal','DESC')->paginate(10);

        $dataChart =  $pengangkutanSampah->getDataByDate();

        $data = [
            'data' => $dataPengangkutan,
            'lastYear' => $dataChart['lastYear'],
            'year' => $dataChart['year'],
            'chart' => $dataChart['chart'],
            'pager' => $pengangkutanSampah->pager,
        ];

        $header['title']='Pengangkutan Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/pengangkutanSampah',$data);
        echo view('partials/admin_footer');
    }

//limbah

    public function dataLimbah()
    {
        $daftarLimbah = new M_daftar_limbah();
        $limbah = new M_limbah();

        $dataLimbah= $daftarLimbah->findAll();
        
        $dataChart = $limbah->getDataByDate();

        $temp=array();
        foreach ($dataLimbah as $data){
            $temp [] = $data;
        }

        $limbahData2 = $limbah->getPaginated(10);
 
        
        $data = [
            'lastYear' => $dataChart['lastYear'],
            'year' => $dataChart['year'],
            'chart' => $dataChart['chart'],
            'data' => $limbahData2['data'],
            'dataLimbah' => $dataLimbah,
            'limbah' => $temp,
            'pager' => $limbahData2['pager'],
           
        ];

        $header['title']='Data Limbah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/limbah/dataLimbah',$data);
        echo view('partials/admin_footer');
    }

    public function daftarLimbah(){

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
    public function riwayatTransaksi(){


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

        $dataSetoran = $setoran->getPaginated(10,'group1');
        $dataPenarikan= $penarikan->getPaginated(10,'group2');



        $data = [
            'data' => $dataSetoran['data'],
            'data2' => $dataPenarikan['data'],
            'dataSampah' => $dataSampah,
            'sampah' => $temp,
            'pager' => $dataPenarikan['pager'],
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

    public function dataNasabah(){

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

    public function tabungan(){

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

//produk
    public function produk(){

        $keyword = $this->request->getGet('search');

        $produk = new M_produk();
        $penjualanProduk = new M_penjualan_produk();
        $total = $produk->getTotal();

        $data = $produk->getPaginated(10,$keyword);
        $data['total'] = $total['total'];
        $data['nominal'] = $total['nominal'];

        $header['title']='Produk';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/produk/produk',$data);
        echo view('partials/admin_footer');
    }

//konten
    public function konten(){

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
    public function akun(){

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
