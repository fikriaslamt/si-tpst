<?php

namespace App\Models;

use CodeIgniter\Model;

class M_tabungan extends Model
{
    protected $table = "tabungan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','nasabah_id','saldo','debit','kredit'];
    
    function getPaginated($num,$keyword = null){
        $builder = $this->table('tabungan');

        if($keyword != ''){
            $builder->like('nasabah.no_tabungan',$keyword)->orLike('nasabah.nama',$keyword);
        }

        $data = $builder->select('tabungan.id, nasabah.no_tabungan, nasabah.nama , tabungan.saldo , tabungan.kredit, tabungan.debit')
        ->join('nasabah','tabungan.nasabah_id=nasabah.id')
        ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getAllData(){
        $builder = $this->table('tabungan');


        $data = $builder->select('tabungan.id, nasabah.no_tabungan, nasabah.nama , tabungan.saldo , tabungan.kredit')
        ->join('nasabah','tabungan.nasabah_id=nasabah.id')
        ->findAll();

        return $data;
    }

    function searchById($id){
        $builder = $this->table('tabungan');
        return $builder->where('no_tabungan', $id)
        ->select('tabungan.id, nasabah.no_tabungan, nasabah.nama , tabungan.saldo , tabungan.kredit')
        ->join('nasabah','tabungan.nasabah_id=nasabah.id')->findAll();
    }

    function getSaldo($id){
        $builder = $this->table('tabungan');
        $temp = $builder->where('nasabah_id', $id)->findAll();
        $saldo = 0;
        foreach($temp as $t){
            $saldo = $t['saldo'];
        }

        return  $saldo;
    }

    function getTotalSaldo(){
        $builder = $this->table('tabungan');

        $data = $builder->select('SUM(tabungan.saldo) AS saldo')
        ->join('nasabah','tabungan.nasabah_id=nasabah.id')
        ->findAll();

        return $data[0];
       
    }

    function getTotalKredit(){
        $builder = $this->table('tabungan');

        $data = $builder->select('SUM(tabungan.kredit) AS kredit')
        ->join('nasabah','tabungan.nasabah_id=nasabah.id')
        ->findAll();

        return $data[0];
       
    }
    function getTotalDebit(){
        $builder = $this->table('tabungan');

        $data = $builder->select('SUM(tabungan.debit) AS debit')
        ->join('nasabah','tabungan.nasabah_id=nasabah.id')
        ->findAll();

        return $data[0];
       
    }

}
