<?php

namespace App\Models;

use CodeIgniter\Model;

class M_nasabah extends Model
{
    protected $table = "nasabah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','nama','alamat','kode'];

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
}
