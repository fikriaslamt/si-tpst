<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    protected $table = "admin";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','nama','username','password'];
   
}
