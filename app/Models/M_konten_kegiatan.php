<?php

namespace App\Models;

use CodeIgniter\Model;

class M_konten_kegiatan extends Model
{
    protected $table = "konten_kegiatan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','judul','slug','isi','thumbnail','views','admin_id'];
    
    function getPaginated($num,$keyword = null){
        $builder = $this->table('konten_kegiatan');

        if($keyword != ''){
            $builder->like('konten_kegiatan.judul',$keyword);
        }

        $data = $builder->select('konten_kegiatan.id, konten_kegiatan.tanggal, konten_kegiatan.judul, konten_kegiatan.slug, konten_kegiatan.isi, konten_kegiatan.thumbnail, konten_kegiatan.views, admin.nama')
                ->join('admin','konten_kegiatan.admin_id=admin.id')
                ->paginate($num);
     
        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getDataWithLimit($limit){
        $builder = $this->table('konten_kegiatan');
        $data = $builder->limit($limit)->orderBy('tanggal')->find();

        return $data;
    }

    function getDataWithPage($num){
        $builder = $this->table('konten_kegiatan');

        $data =  $builder->orderBy('tanggal')->paginate($num);
     
        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getData($slug){
        $builder = $this->table('konten_kegiatan');
        $data = $builder->where('slug',$slug)->select('konten_kegiatan.id, konten_kegiatan.tanggal, konten_kegiatan.judul, konten_kegiatan.slug, konten_kegiatan.isi, konten_kegiatan.thumbnail, konten_kegiatan.views, admin.nama')
        ->join('admin','konten_kegiatan.admin_id=admin.id')->first();

        return $data;
    }

    public function incrementCount($slug)
    {           
        $builder = $this->table('konten_kegiatan');

        $builder->where('slug',$slug)->set('views', 'views + 1', false)
             ->update();
        
       
    }

    function getIdByThumbnail($thumbnail){
        $builder = $this->table('konten_kegiatan');
        $data = $builder->where('thumbnail',$thumbnail)->first();

        return $data['id'];
    }
}
