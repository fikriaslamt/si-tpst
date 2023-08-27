<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah_masuk extends Model
{
    protected $table = "sampah_masuk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal_masuk','instansi','total_berat','status'];
    
    function getTimbulan(){
        $builder = $this->table('sampah_masuk');
       
    
        $data = $builder->select('SUM(total_berat) as total_timbulan')->where('status = "Terkelola"')->findAll();
      
    
        $timbulan = round($data[0]['total_timbulan'],2);

    
        return $timbulan;
    }
}
