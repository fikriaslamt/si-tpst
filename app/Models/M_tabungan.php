<?php

namespace App\Models;

use CodeIgniter\Model;

class M_tabungan extends Model
{
    protected $table = "tabungan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','nasabah_id','saldo','penarikan'];
    
    function getPaginated($num,$keyword = null){
        $builder = $this->table('tabungan');

        if($keyword != ''){
            $builder->like('no_tabungan',$keyword)->orLike('nama',$keyword);
        }

        $data = $builder->select('tabungan.id, nasabah.no_tabungan, nasabah.nama , tabungan.saldo , tabungan.penarikan')
        ->join('nasabah','tabungan.nasabah_id=nasabah.id')
        ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function searchById($id){
        $builder = $this->table('tabungan');
        return $builder->where('no_tabungan', $id)
        ->select('tabungan.id, nasabah.no_tabungan, nasabah.nama , tabungan.saldo , tabungan.penarikan')
        ->join('nasabah','tabungan.nasabah_id=nasabah.id')->findAll();
    }

    function getSaldo($id){
        $builder = $this->table('tabungan');
        $temp = $builder->where('nasabah_id', $id)->findAll();
        
        foreach($temp as $t){
            $saldo = $t['saldo'];
        }

        return  $saldo;
    }

}
