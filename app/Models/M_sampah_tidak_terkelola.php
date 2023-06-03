<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah_tidak_terkelola extends Model
{
    protected $table = "sampah_tidak_terkelola";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','sampah_id','tanggal_masuk','total_berat'];
   
}
