<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sampah extends Model
{
    protected $table = "sampah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','jenis','satuan','harga_tpst','harga_nasabah','tanggal_update'];
   
}
