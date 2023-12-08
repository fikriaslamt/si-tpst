<?php

namespace App\Models;

use CodeIgniter\Model;

class M_konten_publikasi extends Model
{
    protected $table = "konten_publikasi";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','image','judul','slug','link','tanggal','views' ,'admin_id'];
    
    function getPaginated($num,$keyword = null){
        $builder = $this->table('konten_publikasi');

        if($keyword != ''){
            $builder->like('judul',$keyword);
        }

        $data = $builder->select('konten_publikasi.id, konten_publikasi.image, konten_publikasi.judul, konten_publikasi.slug, konten_publikasi.link, konten_publikasi.tanggal, konten_publikasi.views, admin.nama')
                ->join('admin','konten_publikasi.admin_id=admin.id')
                ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getData($slug){
        $builder = $this->table('konten_publikasi');
        $data = $builder->where('slug',$slug)->first();

        return $data;
    }

    public function incrementCount($slug)
    {           
        $builder = $this->table('konten_publikasi');

        $builder->where('slug',$slug)->set('views', 'views + 1', false)
             ->update();
    }

}
