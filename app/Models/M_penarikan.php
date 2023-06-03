<?php

namespace App\Models;

use CodeIgniter\Model;

class M_penarikan extends Model
{
    protected $table = "penarikan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tabungan_id','total_penarikan'];
   
}
