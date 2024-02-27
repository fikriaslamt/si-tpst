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


    
        $chartData = $builder->select('YEAR(sampah_masuk.tanggal_masuk) AS year, MONTH(sampah_masuk.tanggal_masuk) AS month,SUM(sampah_masuk.total_berat) AS totalMasuk, SUM(kelola_sampah.berat_kompos) AS totalKompos, SUM(kelola_sampah.berat_maggot) AS totalMaggot, SUM(kelola_sampah.tidak_terkelola) AS totalSisa')
        ->join('sampah_masuk' ,'kelola_sampah.sampah_masuk_id=sampah_masuk.id')
        ->groupBy('YEAR(sampah_masuk.tanggal_masuk), MONTH(sampah_masuk.tanggal_masuk)')
        ->findAll();
        
        $chartDataSum = $chartData;

        for ($i = 1; $i < count($chartData); $i++){
       
            $chartDataSum[$i]['totalMasuk'] += $chartDataSum[$i-1]['totalMasuk'];
            $chartDataSum[$i]['totalKompos'] += $chartDataSum[$i-1]['totalKompos'];
            $chartDataSum[$i]['totalMaggot'] += $chartDataSum[$i-1]['totalMaggot'];
            $chartDataSum[$i]['totalSisa'] += $chartDataSum[$i-1]['totalSisa'];
        }
       
        dd($chartDataSum);
    
        foreach ($chartDataSum as $row) {
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
