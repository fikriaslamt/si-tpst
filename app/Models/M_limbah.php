<?php

namespace App\Models;

use CodeIgniter\Model;

class M_limbah extends Model
{
    protected $table = "limbah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal_masuk','jenis_limbah','total_berat','total_harga','admin'];
    

    function getPaginated($num,$keyword = null){
        $builder = $this->table('limbah');

        if($keyword != ''){
            $builder->like('jenis_limbah',$keyword)->orLike('total_harga',$keyword);
        }

        return [
            'data' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
