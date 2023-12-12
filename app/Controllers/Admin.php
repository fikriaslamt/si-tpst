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
use App\Models\M_produk;
use App\Models\M_daftar_produk;
use App\Models\M_kelola_sampah;
use App\Models\M_penjualan_produk;
use App\Models\M_konten_publikasi;
use App\Models\M_konten_kegiatan;
use App\Models\M_pengangkutan_sampah;
use App\Models\M_profil;
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
        $konten = new M_konten_publikasi();
        $riwayat = new M_riwayat_transaksi();
        $sampahTerkelola = new M_kelola_sampah();



        $dataChartSampah = $sampahTerkelola->getDataPerDate();
        $dataKumulatifChartSampah = $sampahTerkelola->getDataKumulatifPerDate();


        $timbulan = $sampahMasuk ->getTimbulan();

        $dataKelola = $sampahTerkelola ->getTotalTerkelola();
        $dataTerkelola = $dataKelola["terkelola"];
        $dataTidakTerkelola = $dataKelola["tidakTerkelola"];

        $dataChart = $riwayat->getRiwayatByDate();

        $totalSetoran = $setoran->countAllResults();
        $totalPenarikan = $penarikan->countAllResults();
        $totalKonten = $konten->countAllResults();
        $totalNasabah = $nasabah->countAllResults();

        $dataRiwayat = $riwayat->orderBy('tanggal','DESC')->paginate(20);

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
            'timbulan' => $timbulan,
            'totalTransaksi' => $totalSetoran+$totalPenarikan,
            'totalKonten' => $totalKonten,
        ];

        $admin = session("name");

        $header['admin']=$admin;
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
        $sampahTerkelola = new M_kelola_sampah();

        $dataTimbulan = $sampahMasuk ->getTimbulan();
        $dataKelola = $sampahTerkelola ->getTotalTerkelola();
        $dataTerkelola = $dataKelola["terkelola"];
        $dataTidakTerkelola = $dataKelola["tidakTerkelola"];

        $keyword = $this->request->getGet('search');

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $dataSampahMasuk = $sampahMasuk->getPaginated(10,$keyword,$startDate,$endDate);

        $data['data'] = $dataSampahMasuk["data"];
        $data['pager'] = $dataSampahMasuk["pager"];
       
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

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Data Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/dataSampah',$data);
        echo view('partials/admin_footer');
    }

    public function daftarSampah(){

        $sampah = new M_sampah();

        $keyword = $this->request->getGet('search');

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $data = $sampah->getPaginated(10,$keyword,$startDate,$endDate);

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Daftar Sampah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/sampah/daftarSampah',$data);
        echo view('partials/admin_footer');
    }



    public function pengangkutanSampah(){

        $pengangkutanSampah = new M_pengangkutan_sampah();

        $keyword = $this->request->getGet('search');

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $dataPengangkutan = $pengangkutanSampah->getPaginated(10,$keyword,$startDate,$endDate);

        $dataChart =  $pengangkutanSampah->getDataByDate();

        $data = [
            'data' => $dataPengangkutan['data'],
            'lastYear' => $dataChart['lastYear'],
            'year' => $dataChart['year'],
            'chart' => $dataChart['chart'],
            'pager' => $pengangkutanSampah->pager,
        ];

        $admin = session("name");
        
        $header['admin']=$admin;
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


        $keyword = $this->request->getGet('search');

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $limbahData2 = $limbah->getPaginated(10,$keyword,$startDate,$endDate);
 
        
        $data = [
            'lastYear' => $dataChart['lastYear'],
            'year' => $dataChart['year'],
            'chart' => $dataChart['chart'],
            'data' => $limbahData2['data'],
            'dataLimbah' => $dataLimbah,
            'limbah' => $temp,
            'pager' => $limbahData2['pager'],
           
        ];

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Data Limbah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/limbah/dataLimbah',$data);
        echo view('partials/admin_footer');
    }

    public function daftarLimbah(){

        $daftarLimbah = new M_daftar_limbah();

        $keyword = $this->request->getGet('search');

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $data = $daftarLimbah->getPaginated(10,$keyword,$startDate,$endDate);
    

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Daftar Limbah';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar');
        echo view('partials/admin_sidebar');
        echo view('admin/limbah/daftarLimbah',$data);
        echo view('partials/admin_footer');
    }


//nasabah
    public function riwayatSetoran(){


        $setoran= new M_setoran();
        $penarikan= new M_penarikan();


        $totalSetoran = $setoran->countAllResults();
        $totalPenarikan = $penarikan->countAllResults();


        $keyword = $this->request->getGet('search');

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $dataSetoran = $setoran->getPaginated(10,$keyword,$startDate,$endDate);


        $data = [
            'data' => $dataSetoran['data'],
            'pager' => $dataSetoran['pager'],
            'totalTransaksi' => $totalSetoran+$totalPenarikan,
            'setoran' => $totalSetoran,
            'penarikan' => $totalPenarikan,
            // 'daftarSampah' => $daftarSampah,
            // 'berat'=>$totalBerat,
           
        ];

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Riwayat Transaksi';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/riwayatSetoran',$data);
        echo view('partials/admin_footer');
    }

    public function riwayatPenarikan(){


        $setoran= new M_setoran();
        $penarikan= new M_penarikan();

        $totalSetoran = $setoran->countAllResults();
        $totalPenarikan = $penarikan->countAllResults();

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $keyword2 = $this->request->getGet('search');
        

        $dataPenarikan= $penarikan->getPaginated(10,$keyword2,$startDate,$endDate);



        $data = [
            'data2' => $dataPenarikan['data'],
            'pager' => $dataPenarikan['pager'],
            'totalTransaksi' => $totalSetoran+$totalPenarikan,
            'setoran' => $totalSetoran,
            'penarikan' => $totalPenarikan,
            // 'daftarSampah' => $daftarSampah,
            // 'berat'=>$totalBerat,
           
        ];

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Riwayat Transaksi';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/riwayatPenarikan',$data);
        echo view('partials/admin_footer');
    }

    public function dataNasabah(){

        $keyword = $this->request->getGet('search');
        $nasabah = new M_nasabah();

        $data = $nasabah->getPaginated(10,$keyword);
    
        $admin = session("name");
        
        $header['admin']=$admin;
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

        $totalSaldo = $tabungan->getTotalSaldo();
        $totalKredit = $tabungan->getTotalKredit();
        $totalDebit = $tabungan->getTotalDebit();
     
        

        $keyword = $this->request->getGet('search');
       
       
        $dataTabungan = $tabungan->getPaginated(10,$keyword);

        $data = [
            'data' => $dataTabungan['data'],
            'dataSampah' => $dataSampah,
            'sampah' => $temp,
            'pager' => $dataTabungan['pager'],
            'totalSaldo' =>  number_format($totalSaldo['saldo'],2,',','.'),
            'totalDebit' =>  number_format($totalDebit['debit'],2,',','.'),
            'totalKredit' => number_format($totalKredit['kredit'],2,',','.'),
        ];

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Tabungan';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/nasabah/tabungan',$data);
        echo view('partials/admin_footer');
    }

//produk

    public function transaksiProduk(){

        

        $produk = new M_penjualan_produk();

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');


        $data = $produk->getPaginated(10,$startDate,$endDate);

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Penjualan Produk';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/produk/riwayatPenjualan',$data);
        echo view('partials/admin_footer');
    }

    public function daftarProduk(){


        $produk = new M_daftar_produk();

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $keyword = $this->request->getGet('search');

        $data = $produk->getPaginated(10,$keyword,$startDate,$endDate);
 
        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Produk';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/produk/daftarProduk',$data);
        echo view('partials/admin_footer');
    }
    public function produk(){

        $keyword = $this->request->getGet('search');

        $produk = new M_produk();
        $daftarProduk = new M_daftar_produk();
        $penjualanProduk = new M_penjualan_produk();
        $total = $produk->getTotal();

        $dataDaftarProduk = $daftarProduk->findAll();

        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $keyword = $this->request->getGet('search');

        $data = $produk->getPaginated(10,$keyword,$startDate,$endDate);


        $data['daftar'] = $dataDaftarProduk;
        $data['total'] = $total['total'];
        $data['nominal'] = number_format($total['nominal'],2,',','.'); 

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Produk';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/produk/produk',$data);
        echo view('partials/admin_footer');
    }

//konten
    public function publikasi(){

        $keyword = $this->request->getGet('search');
        $konten = new M_konten_publikasi();

        $data = $konten->getPaginated(10,$keyword);
        $admin = session("name");

        $header['title']='Publikasi';
        $header['admin']=$admin;
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/konten/publikasi',$data);
        echo view('partials/admin_footer');
    }

    public function kegiatan(){

        $keyword = $this->request->getGet('search');
        $konten = new M_konten_kegiatan();

        $data = $konten->getPaginated(10,$keyword);

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Konten Kegiatan';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/konten/kegiatan',$data);
        echo view('partials/admin_footer');
    }

  


//akun
    public function akun(){

        $akun = new M_admin();

        $data['data'] = $akun->paginate(10);
        $data['pager'] = $akun->pager;

        $admin = session("name");
        
        $header['admin']=$admin;
        $header['title']='Kelola Akun';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/akun/akun',$data);
        echo view('partials/admin_footer');
    }

    public function setting(){

    
        $profil = new M_profil();

        $dataProfil = $profil->findAll();

        $data ['data'] = $dataProfil;
 
        $admin = session("name");


        $header['admin']=$admin;
        $header['title']='Pengaturan';
        echo view('partials/admin_header',$header);
        echo view('partials/admin_navbar',$header);
        echo view('partials/admin_sidebar');
        echo view('admin/setting',$data);
        echo view('partials/admin_footer');
    }

    public function editSetting()
    {   
        $profil = new M_profil();

        $oldData = $profil->findAll();
    

        $oldImageKetua = $oldData[0]['ketua_img'];
        $oldImageSekretaris = $oldData[0]['sekretaris_img'];
        $oldImageBendahara = $oldData[0]['bendahara_img'];

        $oldImageBeranda1 = $oldData[0]['beranda1_img'];
        $oldImageBeranda2 = $oldData[0]['beranda2_img'];
        $oldImageBeranda3 = $oldData[0]['beranda3_img'];

        //image ketua
        $file = $this->request->getFile('imageKetua');

        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists("uploads/profil/" . $oldImageKetua) && is_file("uploads/profil/" . $oldImageKetua)) {
                unlink("uploads/profil/" . $oldImageKetua);
            }
        
            $imageNameKetua = $file->getRandomName();
            $file->move('uploads/profil/', $imageNameKetua);
        } else {
            $imageNameKetua = $oldImageKetua;
        }
        

        //image sekretaris
        $file = $this->request->getFile('imageSekretaris');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/profil/".$oldImageSekretaris)  && is_file("uploads/profil/" . $oldImageSekretaris)){
                unlink("uploads/profil/".$oldImageSekretaris);
            }

            $imageNameSekretaris = $file->getRandomName();
            $file->move('uploads/profil/',$imageNameSekretaris);

        }else{
            $imageNameSekretaris = $oldImageSekretaris;
        }

        //image bendahara
        $file = $this->request->getFile('imageBendahara');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/profil/".$oldImageBendahara)  && is_file("uploads/profil/" . $oldImageBendahara)){
                unlink("uploads/profil/".$oldImageBendahara);
            }

            $imageNameBendahara = $file->getRandomName();
            $file->move('uploads/profil/',$imageNameBendahara);

        }else{
            $imageNameBendahara = $oldImageBendahara;
        }

        //image beranda1
        $file = $this->request->getFile('gallery1');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/profil/".$oldImageBeranda1)  && is_file("uploads/profil/" . $oldImageBeranda1)){
                unlink("uploads/profil/".$oldImageBeranda1);
            }

            $imageNameBeranda1 = $file->getRandomName();
            $file->move('uploads/profil/',$imageNameBeranda1);

        }else{
            $imageNameBeranda1 = $oldImageBeranda1;
        }

        //image beranda2
        $file = $this->request->getFile('gallery2');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/profil/".$oldImageBeranda2)  && is_file("uploads/profil/" . $oldImageBeranda2)){
                unlink("uploads/profil/".$oldImageBeranda2);
            }

            $imageNameBeranda2 = $file->getRandomName();
            $file->move('uploads/profil/',$imageNameBeranda2);

        }else{
            $imageNameBeranda2 = $oldImageBeranda2;
        }

        //image beranda3
        $file = $this->request->getFile('gallery3');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/profil/".$oldImageBeranda3)  && is_file("uploads/profil/" . $oldImageBeranda3)){
                unlink("uploads/profil/".$oldImageBeranda3);
            }

            $imageNameBeranda3 = $file->getRandomName();
            $file->move('uploads/profil/',$imageNameBeranda3);

        }else{
            $imageNameBeranda3 = $oldImageBeranda3;
        }


        $nama = $this->request->getVar('nama');
        $deskripsi = $this->request->getVar('deskripsi');
        $alamat = $this->request->getVar('alamat');
        $visi = $this->request->getVar('visi');
        $misi = $this->request->getVar('misi');
        $whatsapp = $this->request->getVar('whatsapp');
        $instagram = $this->request->getVar('instagram');
        $facebook = $this->request->getVar('facebook');
        $youtube = $this->request->getVar('youtube');
        $email = $this->request->getVar('email');
        $ketua = $this->request->getVar('ketua');
        $sekretaris = $this->request->getVar('sekretaris');
        $bendahara = $this->request->getVar('bendahara');

        
           $profil->update(1,[
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'alamat' => $alamat,
                'visi' => $visi,
                'misi' => $misi,
                'whatsapp' => $whatsapp,
                'instagram' => $instagram,
                'facebook' => $facebook,
                'youtube' => $youtube,
                'email' => $email,
                'ketua_nama' => $ketua,
                'sekretaris_nama' => $sekretaris,
                'bendahara_nama' => $bendahara,
                'ketua_img' => $imageNameKetua,
                'sekretaris_img' => $imageNameSekretaris,
                'bendahara_img' => $imageNameBendahara,
                'beranda1_img' => $imageNameBeranda1,
                'beranda2_img' => $imageNameBeranda2,
                'beranda3_img' => $imageNameBeranda3,

            ]);
       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/setting'));

    }
}
