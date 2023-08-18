<?php

namespace App\Models;

use CodeIgniter\Model;

class M_tabungan extends Model
{
    protected $table = "tabungan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','nasabah_id','nama','saldo','penarikan'];
    
    function getPaginated($num,$keyword = null){
        $builder = $this->table('tabungan');

        if($keyword != ''){
            $builder->like('nasabah_id',$keyword)->orLike('nama',$keyword);
        }

        return [
            'data' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    function searchById($id){
        return $this->where('nasabah_id', $id)->findAll();
    }
}
