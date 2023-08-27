<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah_tidak_terkelola extends Model
{
    protected $table = "sampah_tidak_terkelola";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','sampah_masuk_id','tanggal_masuk','tanggal_update','total_berat'];
    
    function getTotalTidakTerkelola(){
        $builder = $this->table('sampah_tidak_terkelola');

        $data = $builder->select('SUM(total_berat) as total_tidak_terkelola')->findAll();

        $tidakTerkelola = round($data[0]['total_tidak_terkelola'],2);

        return $tidakTerkelola;
    }
}
