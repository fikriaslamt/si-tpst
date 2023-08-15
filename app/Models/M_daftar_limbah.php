<?php

namespace App\Models;

use CodeIgniter\Model;

class M_daftar_limbah extends Model
{
    protected $table = "daftar_limbah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','jenis_limbah','harga','tanggal_update','satuan'];
   
}
