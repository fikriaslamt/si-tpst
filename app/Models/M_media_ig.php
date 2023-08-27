<?php

namespace App\Models;

use CodeIgniter\Model;

class M_media_ig extends Model
{
    protected $table = "media_ig";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','caption','media_url','permalink','timestamp'];
    
    function getAllPost(){

        $builder = $this->table('media_ig');

        return $builder->findAll();

    }

    function totalPost(){
        $builder = $this->table('media_ig');

        return $builder->countAllResults();
    }

    function getDatePost(){
        $builder = $this->table('media_ig');

        return $builder->select('tanggal')->orderBy('tanggal','DESC')->first();

    }


    function insertPost($tanggal,$caption,$url,$permalink,$timestamp){
        $builder = $this->table('media_ig');

        $builder->insert([
            'tanggal' => $tanggal,
            'caption' => $caption,
            'media_url' => $url,
            'permalink' => $permalink,
            'timestamp' => $timestamp,
        ]);

    }

    function deletePost(){
        $builder = $this->table('media_ig');

        $builder->truncate();

    }
}
