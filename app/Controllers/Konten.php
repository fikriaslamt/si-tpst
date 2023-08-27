<?php

namespace App\Controllers;
use App\Models\M_konten;

class Konten extends BaseController
{   



    public function tambahKonten()
    {   
        $konten = new M_konten();

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/konten/',$imageName);
        }

       $konten->insert([
            'image' => $imageName,
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

        $oldData = $konten->find($id);

        $oldImage = $oldData['image'];

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/konten/".$oldImage)){
                unlink("uploads/konten/".$oldImage);
            }

            $imageName = $file->getRandomName();
            $file->move('uploads/konten/',$imageName);

        }else{
            $imageName = $oldImage;
        }

           $konten->update($id,[
                'image' => $imageName,
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

        $oldData = $konten->find($id);
        $oldImage = $oldData['image'];

        if(file_exists("uploads/konten/".$oldImage)){
            unlink("uploads/konten/".$oldImage);
        }
        
        $konten->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/konten'));

    }

    
}
