<?php

namespace App\Models;

use CodeIgniter\Model;

class M_setoran extends Model
{
    protected $table = "setoran";
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['id','id_transaksi','tanggal','admin','nasabah_id','id_sampah','total_berat','total_harga'];

    // public function getTotalSetoran(){
    //     $builder = $this->table('setoran');

    //     $total = $builder->
        

    // }

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->allowedFields = $this->db->getFieldNames($this->table);
    // }

    // public function updateAllowedFields($fields)
    // {   
    //     $this->allowedFields = array_merge($this->allowedFields, $fields);
    // }

    // public function editAllowedField($field, $newValue)
    // {
    //     $index = array_search($field, $this->allowedFields);
    //     if ($index !== false) {
    //         $this->allowedFields[$index] = $newValue;
    //     }
    // }

    // public function deleteAllowedField($field)
    // {
    //     $this->allowedFields = array_diff($this->allowedFields, [$field]);
    // }

    // function get_field()
    // {
    //     $result = $this->db->getFieldNames($this->table);
    //     return $result;
    // }
}
