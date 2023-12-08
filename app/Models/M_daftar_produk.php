<?php

namespace App\Models;

use CodeIgniter\Model;

class M_daftar_produk extends Model
{
    protected $table = "daftar_produk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal_update','jenis_produk','harga','image'];
    

    function getPaginated($num,$keyword = null,$startDate=null,$endDate=null){
        $builder = $this->table('daftar_produk');

        if($keyword != ''){
            $builder->like('jenis_produk',$keyword)->orLike('harga',$keyword);
        }

        if ($startDate != "" && $endDate != ""){
            $builder->where('tanggal_update >=', $startDate)->where('tanggal_update <=', $endDate);
        }

        return [
            'data' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    function getAllData(){
        $builder = $this->table('daftar_produk');
        return $builder->findAll();
    }

}
