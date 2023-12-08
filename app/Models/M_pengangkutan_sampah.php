<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pengangkutan_sampah extends Model
{
    protected $table = "pengangkutan_sampah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','pengangkut'];

    function getPaginated($num,$keyword = null,$startDate=null,$endDate=null){
        $builder = $this->table('pengangkutan_sampah');

        
        if($keyword != ''){
            $builder->like('pengangkut',$keyword);
        }

        if ($startDate != "" && $endDate != ""){
            $builder->where('tanggal >=', $startDate)->where('tanggal <=', $endDate);
        }

        $data = $builder->orderBy('tanggal','DESC')
        ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getDataByDate(){
        $builder = $this->table('pengangkutan_sampah');


        $years = [];
        $lastYear = '';
        $chart = [];
 

        $chartData = $builder->select('YEAR(tanggal) AS year, MONTH(tanggal) AS month, COUNT(id) AS total')->groupBy('YEAR(tanggal), MONTH(tanggal)')->findAll();

        foreach ($chartData as $row) {
            $year = $row['year'];
            $month = $row['month'];
            $years[$year]=$year;
            $lastYear = $year;
            $chart[$year][$month] = $row['total'];
            
        }
       

        return [
            'lastYear' => $lastYear,
            'year' => $years,
            'chart' => $chart
        ];
        
    }

    function getAllData(){
        $builder = $this->table('pengangkutan_sampah');

        return $builder->orderBy('tanggal','DESC')->findAll();
    }
   
}
