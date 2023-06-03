<?php

namespace App\Models;

use CodeIgniter\Model;

class M_limbah extends Model
{
    protected $table = "limbah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal_masuk','jenis_limbah','total_berat','total_harga'];
   
}
