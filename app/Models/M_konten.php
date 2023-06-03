<?php

namespace App\Models;

use CodeIgniter\Model;

class M_konten extends Model
{
    protected $table = "konten";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','admin_id','jenis_konten','judul','link','tanggal'];
   
}
