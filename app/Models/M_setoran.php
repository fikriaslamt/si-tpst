<?php

namespace App\Models;

use CodeIgniter\Model;

class M_setoran extends Model
{
    protected $table = "setoran";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','id_transaksi','tanggal','admin_id','nasabah_id','sampah_id','total_berat','total_harga'];

    function getPaginated($num,$name){
        $builder = $this->table('setoran');


        $data = $builder->select('setoran.id, setoran.tanggal, nasabah.no_tabungan, admin.nama, sampah.jenis, sampah.satuan , setoran.total_berat , setoran.total_harga')
        ->join('sampah','setoran.sampah_id=sampah.id')
        ->join('nasabah','setoran.nasabah_id=nasabah.id')
        ->join('admin','setoran.admin_id=admin.id')
        ->orderBy('tanggal','DESC')
        ->paginate($num,$name);

        return [
            'data' => $data,
            'pager' => $this->pager,
        ];
    }
}
