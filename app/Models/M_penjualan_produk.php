<?php

namespace App\Models;

use CodeIgniter\Model;

class M_penjualan_produk extends Model
{
    protected $table = "penjualan_produk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','produk_id','admin_id','tanggal','total_terjual','nominal_penjualan'];
    
    function getDataByDate(){
        $builder = $this->table('penjualan_produk');


        $years = [];
        $lastYear = '';
 
        $chart = [];
 

        $chartData = $builder->select('YEAR(penjualan_produk.tanggal) AS year, MONTH(penjualan_produk.tanggal) AS month, produk.jenis_produk, SUM(penjualan_produk.total_terjual) as total') 
        ->join('produk','penjualan_produk.produk_id=produk.id')
        ->groupBy('YEAR(penjualan_produk.tanggal), MONTH(penjualan_produk.tanggal), produk.jenis_produk')
        ->findAll();

       

        return [
            'lastYear' => $lastYear,
            'year' => $years,
            'chart' => $chartData
        ];
        
    }
}   
