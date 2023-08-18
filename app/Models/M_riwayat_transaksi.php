<?php

namespace App\Models;

use CodeIgniter\Model;

class M_riwayat_transaksi extends Model
{
    protected $table = "riwayat_transaksi";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','jenis_transaksi','jumlah','admin'];
    

    function addRiwayat($jenis,$tanggal,$jumlah,$admin){
        $builder = $this->table('riwayat_Transaksi');

        $builder->insert([
            'tanggal' => $tanggal,
            'jenis_transaksi' => $jenis,
            'jumlah' => $jumlah,
            'admin' => $admin,
        ]);
    }

    function getRiwayatByDate(){
        $builder = $this->table('riwayat_Transaksi');


        $years = [];
        $lastYear = '';
        $setoranChart = [];
        $penarikanChart = [];
        $limbahChart = [];

        $chartData = $builder->select('YEAR(tanggal) AS year, MONTH(tanggal) AS month, COUNT(id) AS total, jenis_transaksi AS jenis')->groupBy('YEAR(tanggal), MONTH(tanggal), jenis_transaksi')->findAll();

        foreach ($chartData as $row) {
            $year = $row['year'];
            $month = $row['month'];
            $years[$year]=$year;
            $lastYear = $year;
            
            if($row['jenis'] == 'Penarikan'){
                $penarikanChart[$year][$month] = $row['total'];
            }
            if ($row['jenis'] == 'Setoran'){
                $setoranChart[$year][$month] = $row['total'];
            }
            if($row['jenis'] == 'Limbah'){
                $limbahChart[$year][$month] = $row['total'];
            }

        }
       

        return [
            'lastYear' => $lastYear,
            'year' => $years,
            'penarikanChart' => $penarikanChart,
            'setoranChart' => $setoranChart,
            'limbahChart' => $limbahChart,
        ];
        
    }
}
