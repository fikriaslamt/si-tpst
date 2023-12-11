<?php

namespace App\Models;

use CodeIgniter\Model;

class M_profil extends Model
{
    protected $table = "profil";
    protected $allowedFields        = ['nama','deskripsi','alamat','visi','whatsapp','instagram','facebook','youtube','email','ketua_nama',
    'ketua_img','sekretaris_nama','sekretaris_img','bendahara_nama','bendahara_img','beranda1_img','beranda2_img','beranda3_img'];
   
}
