<?php

namespace App\Models;

use CodeIgniter\Model;

class M_produk extends Model
{
    protected $table = "produk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal_update','jenis_produk','harga','total_stok','total_penjualan','nominal_penjualan'];
    
    function getPaginated($num,$keyword = null){
        $builder = $this->table('produk');

        if($keyword != ''){
            $builder->like('jenis_produk',$keyword);
        }

        return [
            'data' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    function getTotal(){
        $builder = $this->table('produk');

        $data= $builder->select('SUM(total_penjualan) as total, SUM(nominal_penjualan) as nominal')->findAll();

        return[
            'total' => $data[0]['total'],
            'nominal' => $data[0]['nominal']

        ];
    }
}   
