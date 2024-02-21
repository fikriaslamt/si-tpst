<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kelola_sampah extends Model
{
    protected $table = "kelola_sampah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','sampah_masuk_id','tanggal_update','terkelola','berat_kompos','berat_maggot','tidak_terkelola'];
    

    function getTotalTerkelola(){
        $builder = $this->table('kelola_sampah');

        $data = $builder->select('SUM(terkelola) as total_terkelola, SUM(tidak_terkelola) as total_tidak_terkelola')->findAll();
        $terkelola = round($data[0]['total_terkelola'],2);
        $tidakTerkelola = round($data[0]['total_tidak_terkelola'],2);

        return [
            'terkelola' => $terkelola,
            'tidakTerkelola' => $tidakTerkelola
        ];
    }

    function getDataPerDate(){
        $builder = $this->table('kelola_sampah');


        $years = [];
        $lastYear = '';
        $sampahMasukChart = [];
        $tidakTerkelolaChart = [];
        $komposChart = [];
        $maggotChart = [];

        $chartData = $builder->select('YEAR(sampah_masuk.tanggal_masuk) AS year, MONTH(sampah_masuk.tanggal_masuk) AS month,SUM(sampah_masuk.total_berat) AS totalMasuk, SUM(kelola_sampah.berat_kompos) AS totalKompos, SUM(kelola_sampah.berat_maggot) AS totalMaggot, SUM(kelola_sampah.tidak_terkelola) AS totalSisa')
        ->join('sampah_masuk' ,'kelola_sampah.sampah_masuk_id=sampah_masuk.id')
        ->groupBy('YEAR(sampah_masuk.tanggal_masuk), MONTH(sampah_masuk.tanggal_masuk)')
        ->findAll();
  
        foreach ($chartData as $row) {
            $year = $row['year'];
            $month = $row['month'];
            $years[$year]=$year;
            $lastYear = $year;
            
            $tidakTerkelolaChart[$year][$month] = $row['totalSisa'];
            $sampahMasukChart[$year][$month] = $row['totalMasuk'];
            $komposChart[$year][$month] = $row['totalKompos'];
            $maggotChart[$year][$month] = $row['totalMaggot'];
           

        }
       

        return [
            'lastYear' => $lastYear,
            'year' => $years,
            'tidakTerkelolaChart' => $tidakTerkelolaChart,
            'sampahMasukChart' => $sampahMasukChart,
            'komposChart' => $komposChart,
            'maggotChart' => $maggotChart,
        ];
        
    }
    function getDataKumulatifPerDate(){
        $builder = $this->table('kelola_sampah');


        $years = [];
        $lastYear = '';
        $sampahMasukChart = [];
        $tidakTerkelolaChart = [];
        $komposChart = [];
        $maggotChart = [];

        $masukSubquery = $builder
        ->select('YEAR(tanggal_masuk) AS year, MONTH(tanggal_masuk) AS month, SUM(total_berat) AS totalMasuk')
        ->from('sampah_masuk')
        ->group_by('YEAR(tanggal_masuk), MONTH(tanggal_masuk)')
        ->get_compiled_select();
    
    $kelolaSubquery = $builder
        ->select('YEAR(sm.tanggal_masuk) AS year, MONTH(sm.tanggal_masuk) AS month, SUM(ks.berat_kompos) AS totalKompos, SUM(ks.berat_maggot) AS totalMaggot, SUM(ks.tidak_terkelola) AS totalSisa')
        ->from('sampah_masuk sm')
        ->join('kelola_sampah ks', 'ks.sampah_masuk_id = sm.id')
        ->group_by('YEAR(sm.tanggal_masuk), MONTH(sm.tanggal_masuk)')
        ->get_compiled_select();
    
    $query = $builder
        ->from("($masukSubquery) AS masuk")
        ->join("($kelolaSubquery) AS kelola", 'masuk.year = kelola.year AND masuk.month = kelola.month')
        ->get();
    
    $chartData = $query->result();
        // dd($chartData);
     
        foreach ($chartData as $row) {
            $year = $row['year'];
            $month = $row['month'];
            $years[$year]=$year;
            $lastYear = $year;
            
            $tidakTerkelolaChart[$year][$month] = $row['totalSisa'];
            $sampahMasukChart[$year][$month] = $row['totalMasuk'];
            $komposChart[$year][$month] = $row['totalKompos'];
            $maggotChart[$year][$month] = $row['totalMaggot'];
           
        }
       
       
        return [
            'lastYear' => $lastYear,
            'year' => $years,
            'tidakTerkelolaChart' => $tidakTerkelolaChart,
            'sampahMasukChart' => $sampahMasukChart,
            'komposChart' => $komposChart,
            'maggotChart' => $maggotChart,
        ];
        
    }

    function getAllData(){
        $builder = $this->table('kelola_sampah');
        return $builder->select('sampah_masuk.tanggal_masuk, sampah_masuk.instansi, sampah_masuk.total_berat, sampah_masuk.status, kelola_sampah.berat_kompos, kelola_sampah.berat_maggot, kelola_sampah.tidak_terkelola')
        ->orderBy('sampah_masuk.tanggal_masuk','DESC')
        ->join('sampah_masuk', 'sampah_masuk_id = sampah_masuk.id')
        ->findAll();
    }
}
