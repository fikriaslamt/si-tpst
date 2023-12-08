<?php

namespace App\Models;

use CodeIgniter\Model;

class M_gallery_kegiatan extends Model
{
    protected $table = "gallery_kegiatan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','konten_kegiatan_id','image'];
    
    function getGallery($id){
        $builder = $this->table('gallery_kegiatan');
        $data = $builder->where('konten_kegiatan_id',$id)->findAll();

        return $data;
    }


}
