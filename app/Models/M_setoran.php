<?php

namespace App\Models;

use CodeIgniter\Model;

class M_setoran extends Model
{
    protected $table = "setoran";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','nasabah_id','sampah_id','total_berat','total_harga'];
   
}
