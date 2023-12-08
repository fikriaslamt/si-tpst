<?php

namespace App\Controllers;
use App\Models\M_konten_publikasi;
use App\Models\M_konten_kegiatan;
use App\Models\M_sampah;
use App\Models\M_tabungan;
use App\Models\M_media_ig;
use App\Models\M_daftar_produk;
use App\Models\M_sampah_terkelola;
use App\Models\M_sampah_masuk;
use App\Models\M_sampah_tidak_terkelola;
use App\Models\M_nasabah;
use App\Models\M_setoran;
use App\Models\M_penarikan;
use App\Models\M_riwayat_transaksi;


use App\Controllers\Auth;
use App\Models\M_gallery_kegiatan;
use App\Models\M_kelola_sampah;

class Home extends BaseController
{
    public function index()
    {  

        $nasabah = new M_nasabah();

        $sampahMasuk = new M_sampah_masuk();
        $sampahTerkelola = new M_kelola_sampah();

        $dataTimbulan = $sampahMasuk ->getTimbulan();
        $dataKelola = $sampahTerkelola ->getTotalTerkelola();
        $dataTerkelola = $dataKelola["terkelola"];
        $dataTidakTerkelola = $dataKelola["tidakTerkelola"];

        $totalNasabah = $nasabah->getTotalNasabah();

        if($dataTimbulan !=0){
            $persentaseterkelola = round(($dataTerkelola/$dataTimbulan)*100,2,PHP_ROUND_HALF_UP);
            $persentasetidakTerkelola = round(($dataTidakTerkelola/$dataTimbulan)*100,2,PHP_ROUND_HALF_UP);
        }else{
            
            $persentaseterkelola = 0;
            $persentasetidakTerkelola = 0;
        }



        $nasabah = new M_nasabah();
        $sampahMasuk= new M_sampah_masuk();
        $setoran= new M_setoran();
        $penarikan= new M_penarikan();

        $konten = new M_konten_kegiatan();
        $riwayat = new M_riwayat_transaksi();
        $sampahTerkelola = new M_kelola_sampah();



        $dataChartSampah = $sampahTerkelola->getDataPerDate();
        $dataKumulatifChartSampah = $sampahTerkelola->getDataKumulatifPerDate();




        $dataKelola = $sampahTerkelola ->getTotalTerkelola();
        $dataTerkelola = $dataKelola["terkelola"];
        $dataTidakTerkelola = $dataKelola["tidakTerkelola"];

        $dataChart = $riwayat->getRiwayatByDate();

        $totalSetoran = $setoran->countAllResults();
        $totalPenarikan = $penarikan->countAllResults();
        $dataKegiatan = $konten->getDataWithLimit(4);
        $totalNasabah = $nasabah->countAllResults();

        $dataRiwayat = $riwayat->orderBy('tanggal','DESC')->paginate(10);

        $data = [
            'Terkelola' => $dataTerkelola,
            'tidakTerkelola' => $dataTidakTerkelola,

            'lastYear' => $dataChart['lastYear'],
            'year' => $dataChart['year'],
            'setoranChart' => $dataChart['setoranChart'],
            'penarikanChart' => $dataChart['penarikanChart'],
            'limbahChart' => $dataChart['limbahChart'],

            'lastYearSampah' => $dataChartSampah['lastYear'],
            'yearSampah' => $dataChartSampah['year'],
            'sampahMasukChart' => $dataChartSampah['sampahMasukChart'],
            'komposChart' => $dataChartSampah['komposChart'],
            'maggotChart' => $dataChartSampah['maggotChart'],
            'tidakTerkelolaChart' => $dataChartSampah['tidakTerkelolaChart'],

            'kumulatiflastYearSampah' => $dataKumulatifChartSampah['lastYear'],
            'kumulatifyearSampah' => $dataKumulatifChartSampah['year'],
            'kumulatifsampahMasukChart' => $dataKumulatifChartSampah['sampahMasukChart'],
            'kumulatifkomposChart' => $dataKumulatifChartSampah['komposChart'],
            'kumulatifmaggotChart' => $dataKumulatifChartSampah['maggotChart'],
            'kumulatiftidakTerkelolaChart' => $dataKumulatifChartSampah['tidakTerkelolaChart'],

            'riwayat' => $dataRiwayat,
            'pager' => $riwayat->pager,
            'totalNasabah' => $totalNasabah,
            'totalTransaksi' => $totalSetoran+$totalPenarikan,

            'dataKegiatan' => $dataKegiatan,
            'nasabah' => $totalNasabah,
            'timbulan' => $dataTimbulan,
            'persentaseTerkelola' => $persentaseterkelola,
            'persentasetidakTerkelola' => $persentasetidakTerkelola,
        ];

                

        
        echo view('home/home.php',$data);

    }
    public function about()
    {   
        $header['title']='Tentang Kami';
        echo view('partials/header',$header);
        echo view('home/about.php');
        echo view('partials/footer');
    }

    public function kegiatan()
    {  
        $keyword = $this->request->getGet('search');
        $konten = new M_konten_kegiatan();

        $data = $konten->getDataWithPage(12);
        $header ['title'] = "Kegiatan";
        echo view('partials/header',$header);
        echo view('home/kegiatan.php',$data);
        echo view('partials/footer');
    }

    public function detailKegiatan($slug){

        // $konten = new M_konten_kegiatan();

        $kegiatan = new M_konten_kegiatan();
        $gallery = new M_gallery_kegiatan();

        $kegiatan->incrementCount($slug);

        $detailKegiatan = $kegiatan->getData($slug);
        // dd($detailKegiatan);
        $galleryKegiatan = $gallery->getGallery($detailKegiatan["id"]);

        $data = [
            'data' => $detailKegiatan,
            'gallery' => $galleryKegiatan,
        ];
        
        $header['title']='Kegiatan';
        echo view('partials/header',$header);
        echo view('home/detailKegiatan',$data);
        echo view('partials/footer');
    }


    public function produk()
    {  
        $produk = new M_daftar_produk();

        $data['data'] = $produk->findAll();
        $header['title']='Produk';
        echo view('partials/header',$header);
        echo view('home/produk.php',$data);
        echo view('partials/footer');
    }

    public function publikasi()
    {   
        $konten = new M_konten_publikasi();

        $data['data'] = $konten->findAll();
        $header['title']='Publikasi';
        echo view('partials/header',$header);
        echo view('home/publikasi.php',$data);
        echo view('partials/footer');

    }

    public function detail($slug){
    
        $konten = new M_konten_publikasi();
        $konten->incrementCount($slug);
        $detailPublikasi = $konten->getData($slug);
        
        $data=[
            'data' =>$detailPublikasi,
        ];

        $header['title']='Publikasi';

        echo view('partials/header',$header);
        echo view('home/detailPublikasi.php',$data);
        echo view('partials/footer');
    }

    public function saldo()
    {   
        $header['title']='Cek Saldo';

        echo view('partials/header',$header);
        echo view('home/saldo.php');
        echo view('partials/footer');
    }


    public function daftarSampah()
    {  
        $sampah = new M_sampah();

        $data['data'] = $sampah->findAll();
        $header['title']='Daftar Sampah';

        echo view('partials/header',$header);
        echo view('home/daftarSampah.php',$data);
        echo view('partials/footer');
    }
}
