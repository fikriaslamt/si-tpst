<?php

namespace App\Controllers;
use App\Models\M_konten;

class Konten extends BaseController
{   



    public function tambahKonten()
    {   
        $konten = new M_konten();

       $konten->insert([
            'judul' => trim($this->request->getVar('judul')),
            'link' => trim($this->request->getVar('link')),
            'tanggal' => $this->request->getVar('tanggal'),
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/konten'));

    }

    public function editKonten($id)
    {   
        $konten = new M_konten();

 
           $konten->update($id,[
                'judul' => $this->request->getVar('judul'),
                'link' => $this->request->getVar('link'),
                'tanggal' => $this->request->getVar('tanggal'),
            ]);
       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/konten'));

    }

    public function deleteKonten($id)
    {   
        $konten = new M_konten();

        $konten->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/konten'));

    }

    
}
