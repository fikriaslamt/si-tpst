<?php

namespace App\Models;

use CodeIgniter\Model;

class M_setoran extends Model
{
    protected $table = "setoran";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','id_transaksi','tanggal','admin_id','nasabah_id','sampah_id','total_berat','total_harga','image_bukti'];

    function getPaginated($num,$keyword = null,$startDate=null,$endDate=null){
        $builder = $this->table('setoran');

        
        if($keyword != ''){
            $builder->like('nasabah.no_tabungan',$keyword)->orLike('sampah.jenis',$keyword);
        }

        if ($startDate != "" && $endDate != ""){
            $builder->where('setoran.tanggal >=', $startDate)->where('setoran.tanggal <=', $endDate);
        }

        $data = $builder->select('setoran.id, setoran.id_transaksi, setoran.tanggal, nasabah.no_tabungan, admin.nama, sampah.jenis, sampah.satuan , setoran.total_berat , setoran.total_harga , setoran.image_bukti')
        ->join('sampah','setoran.sampah_id=sampah.id')
        ->join('nasabah','setoran.nasabah_id=nasabah.id')
        ->join('admin','setoran.admin_id=admin.id')
        ->orderBy('setoran.tanggal','DESC')
        ->paginate($num);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }

    function getAllData(){
        $builder = $this->table('setoran');

        $data = $builder->select('setoran.id, setoran.tanggal, nasabah.no_tabungan, admin.nama, sampah.jenis, sampah.satuan , setoran.total_berat , setoran.total_harga')
        ->join('sampah','setoran.sampah_id=sampah.id')
        ->join('nasabah','setoran.nasabah_id=nasabah.id')
        ->join('admin','setoran.admin_id=admin.id')
        ->orderBy('tanggal','DESC')->findAll();

        return $data;
    }

    function getDataById($id){
        $builder = $this->table('setoran');

        $data = $builder->where('setoran.nasabah_id', $id)
        ->select('nasabah.no_tabungan, admin.nama, sampah.jenis AS jenis, sampah.satuan , SUM(setoran.total_berat) AS total_berat , SUM(setoran.total_harga) AS total_harga')
        ->join('sampah', 'setoran.sampah_id = sampah.id')
        ->join('nasabah', 'setoran.nasabah_id = nasabah.id')
        ->join('admin', 'setoran.admin_id = admin.id')
        ->groupBy('nasabah.no_tabungan, admin.nama, sampah.jenis, sampah.satuan')
        ->findAll();

        return $data;
    }

    function getImageByUserId($id){
        $builder = $this->table('setoran');

        $data = $builder->where('setoran.nasabah_id', $id)
        ->select('setoran.image_bukti')
        ->join('sampah', 'setoran.sampah_id = sampah.id')
        ->join('nasabah', 'setoran.nasabah_id = nasabah.id')
        ->join('admin', 'setoran.admin_id = admin.id')
        ->findAll();

        return $data;
    }
    function deleteByUserId($id){
        $builder = $this->table('setoran');

        $builder->where('setoran.nasabah_id', $id)->delete();

    }

    function getByTxId($id){
        $builder = $this->table('setoran');
        return $builder->where('setoran.id_transaksi', $id)->findAll();

    }
}
