<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pengangkutan_sampah extends Model
{
    protected $table = "pengangkutan_sampah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','total_berat'];

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
   
}
