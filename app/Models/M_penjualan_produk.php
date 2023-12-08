<?php

namespace App\Models;

use CodeIgniter\Model;

class M_penjualan_produk extends Model
{
    protected $table = "penjualan_produk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','daftar_produk_id','admin_id','tanggal','total_terjual','nominal_penjualan','image_bukti'];
    

    function getPaginated($num,$startDate=null,$endDate=null){
        $builder = $this->table('penjualan_produk');

        if ($startDate != "" && $endDate != ""){
            $builder->where('penjualan_produk.tanggal >=', $startDate)->where('penjualan_produk.tanggal <=', $endDate);
        }

   
        $data = $builder->select('daftar_produk.jenis_produk, admin.nama, penjualan_produk.tanggal, penjualan_produk.total_terjual, penjualan_produk.nominal_penjualan, penjualan_produk.image_bukti')
        ->join('daftar_produk','penjualan_produk.daftar_produk_id=daftar_produk.id')
        ->join('admin','penjualan_produk.admin_id=admin.id')
        ->orderBy('penjualan_produk.tanggal','DESC')
        ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }


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
    function getAllData(){
        $builder = $this->table('penjualan_produk');
        return $builder->select('daftar_produk.jenis_produk, admin.nama, penjualan_produk.tanggal, penjualan_produk.total_terjual, penjualan_produk.nominal_penjualan, penjualan_produk.image_bukti')
        ->join('daftar_produk','penjualan_produk.daftar_produk_id=daftar_produk.id')
        ->join('admin','penjualan_produk.admin_id=admin.id')
        ->orderBy('penjualan_produk.tanggal','DESC')
        ->findAll();
    }
}   
