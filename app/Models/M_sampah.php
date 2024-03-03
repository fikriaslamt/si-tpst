<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah extends Model
{
    protected $table = "sampah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','jenis','satuan','harga_tpst','harga_nasabah','tanggal_update'];
    

    function getPaginated($num,$keyword = null,$startDate=null,$endDate=null){
        $builder = $this->table('sampah');

        if($keyword != ''){
            $builder->like('jenis',$keyword);
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
        $builder = $this->table('sampah');
        return $builder->findAll();
    }

    function getDataWithPage($num){
        $builder = $this->table('sampah');

        $data =  $builder->paginate($num);
     
        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }
}
