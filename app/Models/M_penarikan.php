<?php

namespace App\Models;

use CodeIgniter\Model;

class M_penarikan extends Model
{
    protected $table = "penarikan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','nasabah_id','admin_id','total_penarikan'];
    

    function getPaginated($num,$name){
        $builder = $this->table('penarikan');


        $data = $builder->select('penarikan.id, penarikan.tanggal, nasabah.no_tabungan, admin.nama, penarikan.total_penarikan')
        ->join('nasabah','penarikan.nasabah_id=nasabah.id')
        ->join('admin','penarikan.admin_id=admin.id')
        ->orderBy('tanggal','DESC')
        ->paginate($num,$name);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }
}
