<?php

namespace App\Models;

use CodeIgniter\Model;

class M_daftar_limbah extends Model
{
    protected $table = "daftar_limbah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','jenis_limbah','harga','tanggal_update','satuan'];
    

    function getPaginated($num,$keyword = null){
        $builder = $this->table('daftar_limbah');

        if($keyword != ''){
            $builder->like('jenis_limbah',$keyword)->orLike('harga',$keyword);
        }

        return [
            'data' => $this->orderBy('tanggal_update','DESC')->paginate($num),
            'pager' => $this->pager,
        ];
    }

}
