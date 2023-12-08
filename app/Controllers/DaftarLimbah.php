<?php

namespace App\Controllers;
use App\Models\M_daftar_limbah;

class DaftarLimbah extends BaseController{
   
    public function tambahDaftarLimbah(){

        $daftarLimbah = new M_daftar_limbah();

        $tanggal = date("Y/m/d");
        $jenis = $this->request->getVar('jenis');


        $daftarLimbah->insert([
            'jenis_limbah' => $jenis,
            'harga' => $this->request->getVar('harga'),
            'tanggal_update' => $tanggal,
            'satuan'  => $this->request->getVar('satuan'),
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/daftarLimbah'));

    }

    public function editDaftarLimbah($id){

       $daftarLimbah = new M_daftar_limbah();

       $tanggal = date("Y/m/d");

       $daftarLimbah->update($id,[
            'jenis_limbah' => $this->request->getVar('jenis'),
            'harga' => $this->request->getVar('harga'),
            'tanggal_update' => $tanggal,
            'satuan'  => $this->request->getVar('satuan'),
        ]);

       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/daftarLimbah'));

    }

    public function deleteDaftarLimbah($id){

       $daftarLimbah = new M_daftar_limbah();
        
       $daftarLimbah->delete($id);


        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/daftarLimbah'));

    }


    public function getDaftarLimbah(){

        $request = service("request");
        $postData = $request->getPost();
        $dtpostData = $postData['data'];

        $draw = $dtpostData['draw'];
        $start = $dtpostData['start'];
        $rowperPage = $dtpostData['length'];
        $columnIndex = $dtpostData['order'][0]['column'];
        $columnName = $dtpostData['columns'][$columnIndex]['data'];
        $columnSortOrder = $dtpostData['order'][0]['dir'];
        $searchValue = $dtpostData['search']['value'];

        //total data
        $limbah = new M_daftar_limbah();
        $totalData = $limbah->select('id')->countAllResults();

        //total data with filter
        $totalDataWithFilter = $limbah->select('id')->orLike('jenis',$searchValue)->countAllResults();


        $response = array();
        $records = $limbah->select('*')
                ->orLike('jenis',$searchValue)
                ->orderBy($columnName,$columnSortOrder)
                ->findAll($rowperPage,$start);

        $data = array();
        foreach($records as $record){
            $data[] = array(
                'id' => $record['id'],
                'jenis_limbah' => $record['jenis_limbah'],
                'harga' => $record['harga'],
                'tanggal_update' => $record['tanggal_update'],

            );
        }

        //response
        $response = array(
            'draw' => intval($draw),
            'iTotalRecords' => $totalData,
            'iTotalDisplayRecords' => $totalDataWithFilter,
            'aaData' => $data,
            'token' => csrf_hash(),
        );


        return $this->response->setJSON($response);

    }



    
}
