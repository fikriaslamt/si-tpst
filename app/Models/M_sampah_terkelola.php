<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah_terkelola extends Model
{
    protected $table = "sampah_terkelola";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','sampah_id','tanggal_masuk','tanggal_update','total_berat'];
   
}
