<?php

namespace App\Models;

use CodeIgniter\Model;

class M_nasabah extends Model
{
    protected $table = "nasabah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','no_tabungan','nama','alamat','kode'];

    function getPaginated($num,$keyword = null){
        $builder = $this->table('nasabah');

        if($keyword != ''){
            $builder->like('nama',$keyword)->orLike('alamat',$keyword);
        }

        return [
            'data' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    function searchById($id){
        $builder = $this->table('nasabah');
        return $builder->where('no_tabungan', $id)->findAll();
    }


    function searchByKode($id,$no){
        $builder = $this->table('nasabah');
        $data = $builder->where('kode', $id)->where('no_tabungan', $no)->findAll();
        return $data;
    }

    function getTotalNasabah(){
        $builder = $this->table('nasabah');
        return $builder->countAll();
    }

    function getAllData(){
        $builder = $this->table('nasabah');
        return $builder->findAll();
    }
}
