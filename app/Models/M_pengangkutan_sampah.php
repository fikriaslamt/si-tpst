<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pengangkutan_sampah extends Model
{
    protected $table = "pengangkutan_sampah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','petugas','total_berat','total_harga'];
   
}
