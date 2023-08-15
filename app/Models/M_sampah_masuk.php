<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah_masuk extends Model
{
    protected $table = "sampah_masuk";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','sampah_id','tanggal_masuk','total_berat','status'];
   
}
