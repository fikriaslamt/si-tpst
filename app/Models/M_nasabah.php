<?php

namespace App\Models;

use CodeIgniter\Model;

class M_nasabah extends Model
{
    protected $table = "nasabah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','nama'];
   
}
