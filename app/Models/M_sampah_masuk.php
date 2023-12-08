<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah_masuk extends Model
{
    protected $table = "sampah_masuk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal_masuk','instansi','total_berat','status'];
    
    function getPaginated($num,$keyword = null,$startDate=null,$endDate=null){
        $builder = $this->table('sampah_masuk');

        
        if($keyword != ''){
            $builder->like('instansi',$keyword);
        }

        if ($startDate != "" && $endDate != ""){
            $builder->where('tanggal_masuk >=', $startDate)->where('tanggal_masuk <=', $endDate);
        }

        $data = $builder->orderBy('tanggal_masuk','DESC')
        ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getTimbulan(){
        $builder = $this->table('sampah_masuk');
       
    
        $data = $builder->select('SUM(total_berat) as total_timbulan')->where('status = "Terkelola"')->findAll();
      
    
        $timbulan = round($data[0]['total_timbulan'],2);

    
        return $timbulan;
    }

    function getAllData(){
        $builder = $this->table('sampah_masuk');
        return $builder->orderBy('tanggal_masuk','DESC')->findAll();
    }
}
