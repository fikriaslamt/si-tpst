<?php

namespace App\Models;

use CodeIgniter\Model;

class M_timbulan_sampah extends Model
{
    protected $table = "timbulan_sampah";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','sampah_masuk_id','periode'];
   
}
