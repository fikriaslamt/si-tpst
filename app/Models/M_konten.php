<?php

namespace App\Models;

use CodeIgniter\Model;

class M_konten extends Model
{
    protected $table = "konten";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','admin_id','image','judul','link','tanggal'];
    
    function getPaginated($num,$keyword = null){
        $builder = $this->table('konten');

        if($keyword != ''){
            $builder->like('judul',$keyword);
        }

        return [
            'data' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
