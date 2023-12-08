<?php

namespace App\Models;

use CodeIgniter\Model;

class M_penarikan extends Model
{
    protected $table = "penarikan";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','tanggal','nasabah_id','admin_id','total_penarikan','image_bukti'];
    

    function getPaginated($num,$keyword = null,$startDate=null,$endDate=null){
        $builder = $this->table('penarikan');

        if($keyword != ''){
            $builder->like('nasabah.no_tabungan',$keyword);
        }

        if ($startDate != "" && $endDate != ""){
            $builder->where('penarikan.tanggal >=', $startDate)->where('penarikan.tanggal <=', $endDate);
        }

        $data = $builder->select('penarikan.id, penarikan.tanggal, nasabah.no_tabungan, admin.nama, penarikan.total_penarikan, penarikan.image_bukti')
        ->join('nasabah','penarikan.nasabah_id=nasabah.id')
        ->join('admin','penarikan.admin_id=admin.id')
        ->orderBy('penarikan.tanggal','DESC')
        ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getAllData(){
        $builder = $this->table('penarikan');


        $data = $builder->select('penarikan.id, penarikan.tanggal, nasabah.no_tabungan, admin.nama, penarikan.total_penarikan')
        ->join('nasabah','penarikan.nasabah_id=nasabah.id')
        ->join('admin','penarikan.admin_id=admin.id')
        ->orderBy('tanggal','DESC')
        ->findAll();

        return $data;
    }
    function getDataById($id){
        $builder = $this->table('penarikan');


        $data = $builder->where('penarikan.nasabah_id',$id)
        ->select('penarikan.id, penarikan.tanggal, nasabah.no_tabungan, admin.nama, penarikan.total_penarikan')
        ->join('nasabah','penarikan.nasabah_id=nasabah.id')
        ->join('admin','penarikan.admin_id=admin.id')
        ->orderBy('tanggal','DESC')
        ->findAll();

        return $data;
    }
}
