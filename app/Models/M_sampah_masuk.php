<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah_masuk extends Model
{
    protected $table = "sampah_masuk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','sampah_id','tanggal_masuk','total_berat','status'];
    
    function getTimbulan(){
        $builder = $this->table('sampah_masuk');

        $data = $builder->findAll();

        $timbulan = 0.0;
        $terkelola = 0.0;
        $tidakTerkelola = 0.0;

        $persentaseterkelola = 0.0;
        $persentasetidakTerkelola = 0.0;


        foreach( $data as $d ){
            if($d['status'] == 'Terkelola'){
                $timbulan += $d['total_berat'];
                $terkelola += $d['total_berat'];
            }else{
                $timbulan += $d['total_berat'];
                $tidakTerkelola += $d['total_berat'];
            }
        }

        
        $persentaseterkelola = round(($terkelola/$timbulan)*100,2,PHP_ROUND_HALF_UP);
        $persentasetidakTerkelola = round(($tidakTerkelola/$timbulan)*100,2,PHP_ROUND_HALF_UP);

        return[
            'timbulan' => $timbulan,
            'persentaseTerkelola' => $persentaseterkelola,
            'Terkelola' => $terkelola,
            'persentasetidakTerkelola' => $persentasetidakTerkelola,
            'tidakTerkelola' => $tidakTerkelola,
        ];
    }
}
