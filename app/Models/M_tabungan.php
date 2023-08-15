<?php

namespace App\Models;

use CodeIgniter\Model;

class M_tabungan extends Model
{
    protected $table = "tabungan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','nasabah_id','nama','saldo','penarikan'];
   
}
