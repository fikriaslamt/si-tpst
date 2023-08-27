<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah_terkelola extends Model
{
    protected $table = "sampah_terkelola";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','sampah_masuk_id','tanggal_masuk','tanggal_update','total_berat','berat_kompos','berat_maggot'];
    

    function getTotalTerkelola(){
        $builder = $this->table('sampah_terkelola');

        $data = $builder->select('SUM(total_berat) as total_terkelola')->findAll();
        $terkelola = round($data[0]['total_terkelola'],2);

        return $terkelola;
    }
}
