<?php

namespace App\Models;

use CodeIgniter\Model;

class M_limbah extends Model
{
    protected $table = "limbah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal_masuk','daftar_limbah_id','instansi','total_berat','total_harga','admin_id'];
    

    function getPaginated($num,$keyword = null,$startDate=null,$endDate=null){
        $builder = $this->table('limbah');

        if($keyword != ''){
            $builder->like('daftar_limbah.jenis_limbah',$keyword)->orLike('limbah.instansi',$keyword);
        }

        if ($startDate != "" && $endDate != ""){
            $builder->where('limbah.tanggal_masuk >=', $startDate)->where('limbah.tanggal_masuk <=', $endDate);
        }

        $data = $builder->select('limbah.id, limbah.tanggal_masuk, daftar_limbah.jenis_limbah, limbah.instansi, daftar_limbah.satuan , limbah.total_berat , limbah.total_harga')
        ->join('daftar_limbah','limbah.daftar_limbah_id=daftar_limbah.id')
        ->orderBy('limbah.tanggal_masuk','DESC')
        ->paginate($num);

      

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getAllData(){
        $builder = $this->table('limbah');


        $data = $builder->select('limbah.id, limbah.tanggal_masuk, daftar_limbah.jenis_limbah, limbah.instansi, daftar_limbah.satuan , limbah.total_berat , limbah.total_harga')
        ->join('daftar_limbah','limbah.daftar_limbah_id=daftar_limbah.id')
        ->orderBy('limbah.tanggal_masuk','DESC')
        ->findAll();

      

        return $data;
    }

    function getDataByDate(){
        $builder = $this->table('limbah');


        $years = [];
        $lastYear = '';
 
        $chart = [];
 

        $chartData = $builder->select('YEAR(tanggal_masuk) AS year, MONTH(tanggal_masuk) AS month, COUNT(id) AS total, SUM(total_berat) AS total_berat')->groupBy('YEAR(tanggal_masuk), MONTH(tanggal_masuk)')->findAll();

        foreach ($chartData as $row) {
            $year = $row['year'];
            $month = $row['month'];
            $years[$year]=$year;
            $lastYear = $year;
            
            $chart[$year][$month] = round($row['total_berat'],2);
            
        }
       

        return [
            'lastYear' => $lastYear,
            'year' => $years,
            'chart' => $chart
        ];
        
    }
}
