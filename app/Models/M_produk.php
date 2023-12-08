<?php

namespace App\Models;

use CodeIgniter\Model;

class M_produk extends Model
{
    protected $table = "produk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal_update','daftar_produk_id','admin_id','sisa_stok','total_penjualan','nominal_penjualan'];
    
    function getPaginated($num,$keyword = null,$startDate=null,$endDate=null){
        $builder = $this->table('produk');

        if($keyword != ''){
            $builder->like('daftar_produk.jenis_produk',$keyword);
        }

        if ($startDate != "" && $endDate != ""){
            $builder->where('produk.tanggal_update >=', $startDate)->where('produk.tanggal_update <=', $endDate);
        }

        $data = $builder->select('produk.id, produk.tanggal_update, daftar_produk.jenis_produk, produk.sisa_stok, daftar_produk.harga , produk.total_penjualan , produk.nominal_penjualan')
        ->orderBy('produk.tanggal_update','DESC')
        ->join('daftar_produk','produk.daftar_produk_id=daftar_produk.id')
        ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getById($id){
        $builder = $this->table('produk');


        $data = $builder->select('produk.id, daftar_produk.id AS daftar_produk_id, produk.tanggal_update, daftar_produk.jenis_produk, produk.sisa_stok, daftar_produk.harga , produk.total_penjualan , produk.nominal_penjualan')
        ->join('daftar_produk','produk.daftar_produk_id=daftar_produk.id')
        ->find($id);

        return $data;
    
    }


    function getTotal(){
        $builder = $this->table('produk');

        $data= $builder->select('SUM(total_penjualan) as total, SUM(nominal_penjualan) as nominal')->findAll();

        return[
            'total' => $data[0]['total'],
            'nominal' => $data[0]['nominal']

        ];
    }

    function getAllData(){
        $builder = $this->table('produk');


        return $builder->select('produk.id, produk.tanggal_update, daftar_produk.jenis_produk, produk.sisa_stok, daftar_produk.harga , produk.total_penjualan , produk.nominal_penjualan')
        ->join('daftar_produk','produk.daftar_produk_id=daftar_produk.id')
        ->findAll();

    
    }
}   
