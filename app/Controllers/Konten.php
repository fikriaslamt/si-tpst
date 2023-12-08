<?php

namespace App\Controllers;

use App\Models\M_gallery_kegiatan;
use App\Models\M_konten_kegiatan;
use App\Models\M_konten_publikasi;

class Konten extends BaseController
{   



    public function tambahKonten()
    {   
        $konten = new M_konten_publikasi();

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/publikasi/',$imageName);
        }

        $admin = session('id');
        $judul = $this->request->getVar('judul');
        $slug       = url_title($judul, '-', TRUE);

       $konten->insert([
            'image' => $imageName,
            'judul' => $judul,
            'slug' => $slug,
            'link' => trim($this->request->getVar('link')),
            'tanggal' => $this->request->getVar('tanggal'),
            'admin_id' => $admin,
        ]);

        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/publikasi'));

    }

    public function editKonten($id)
    {   
        $konten = new M_konten_publikasi();

        $oldData = $konten->find($id);

        $oldImage = $oldData['image'];

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/publikasi/".$oldImage)){
                unlink("uploads/publikasi/".$oldImage);
            }

            $imageName = $file->getRandomName();
            $file->move('uploads/publikasi/',$imageName);

        }else{
            $imageName = $oldImage;
        }

        $admin = session('id');
        $judul = $this->request->getVar('judul');
        $slug       = url_title($judul, '-', TRUE);
        
           $konten->update($id,[
                'image' => $imageName,
                'judul' => $judul,
                'slug' => $slug,
                'link' => $this->request->getVar('link'),
                'tanggal' => $this->request->getVar('tanggal'),
                'admin_id' => $admin,
            ]);
       

        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/publikasi'));

    }

    public function deleteKonten($id)
    {   
        $konten = new M_konten_publikasi();

        $oldData = $konten->find($id);
        $oldImage = $oldData['image'];

        if(file_exists("uploads/publikasi/".$oldImage)){
            unlink("uploads/publikasi/".$oldImage);
        }
        
        $konten->delete($id);

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/publikasi'));

    }
    public function tambahKegiatan()
    {   
        $konten = new M_konten_kegiatan();
        $gallery = new M_gallery_kegiatan();

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/kegiatan/',$imageName);
        }

        $judul = $this->request->getVar('judul');
        $slug       = url_title($judul, '-', TRUE);

        $admin = session('id');

       $konten->insert([
            'thumbnail' => $imageName,
            'judul' => $judul,
            'slug' => $slug,
            'isi' => trim($this->request->getVar('isi')),
            'tanggal' => $this->request->getVar('tanggal'),
            'admin_id' => $admin,
        ]);

        $id = $konten->getIdByThumbnail($imageName);


        $files = $this->request->getFileMultiple('gallery');
        foreach($files as $file){
            if($file->isValid() && !$file->hasMoved()){
                $galleryName = $file->getRandomName();
                $file->move('uploads/galleryKegiatan/',$galleryName);
            }
            $gallery->insert([
                'konten_kegiatan_id' => $id,
                'image' => $galleryName,
            ]);
        }



       


        session()->setFlashdata('error', "Data Berhasil Ditambahkan");
        return redirect()->to(base_url('admin/kegiatan'));

    }

    public function editKegiatan($id)
    {   
        $konten = new M_konten_kegiatan();
        $gallery = new M_gallery_kegiatan();

        $oldData = $konten->find($id);

        $oldImage = $oldData['thumbnail'];

        $file = $this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){

            if(file_exists("uploads/kegiatan/".$oldImage)){
                unlink("uploads/kegiatan/".$oldImage);
            }

            $imageName = $file->getRandomName();
            $file->move('uploads/kegiatan/',$imageName);

        }else{
            $imageName = $oldImage;
        }

        $judul = $this->request->getVar('judul');
        $slug       = url_title($judul, '-', TRUE);
        $admin = session('id');

           $konten->update($id,[
                'thumbnail' => $imageName,
                'judul' => $judul,
                'slug' => $slug,
                'isi' => $this->request->getVar('isi'),
                'tanggal' => $this->request->getVar('tanggal'),
                'admin_id' => $admin,
            ]);

        $oldDataGallery = $gallery->getGallery($id);
        foreach($oldDataGallery as $odg){

            if(file_exists("uploads/galleryKegiatan/".$odg['image'])){
                unlink("uploads/galleryKegiatan/".$odg['image']);
            } 
            $gallery->delete($odg['id']);
        }

            
        $files = $this->request->getFileMultiple('gallery');
        foreach($files as $file){
            if($file->isValid() && !$file->hasMoved()){
                $galleryName = $file->getRandomName();
                $file->move('uploads/galleryKegiatan/',$galleryName);
            }
            $gallery->insert([
                'konten_kegiatan_id' => $id,
                'image' => $galleryName,
            ]);
        }


        session()->setFlashdata('error', "Data Berhasil Diubah");
        return redirect()->to(base_url('admin/kegiatan'));

    }

    public function deleteKegiatan($id)
    {   
        $konten = new M_konten_kegiatan();
        $gallery = new M_gallery_kegiatan();

        $oldData = $konten->find($id);
        $oldImage = $oldData['thumbnail'];

        if(file_exists("uploads/kegiatan/".$oldImage)){
            unlink("uploads/kegiatan/".$oldImage);
        }
        
        $konten->delete($id);

        $oldDataGallery = $gallery->getGallery($id);
        foreach($oldDataGallery as $odg){

            if(file_exists("uploads/galleryKegiatan/".$odg['image'])){
                unlink("uploads/galleryKegiatan/".$odg['image']);
            } 
            $gallery->delete($odg['id']);
        }

        session()->setFlashdata('error', "Data Berhasil Dihapus");
        return redirect()->to(base_url('admin/kegiatan'));

    }

    
}
