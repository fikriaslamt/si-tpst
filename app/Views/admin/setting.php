

<div class="content-wrapper">
<?php if (session()->getFlashdata('error')) { ?>
  <div id="alert-1" class="flex p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 border-2 border-blue-300 " role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Alert</span>
    <div class="ml-3 text-sm font-medium">
    <?php echo session()->getFlashdata('error') ?>
    </div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 " data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </div>                 
<?php } ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>




<!-- Edit Data modal -->
<div id="editForm" class=" flex items-center justify-center rounded-md my-3 hidden ">

  <div class="place-content-center lg:w-11/12  md:w-full sm:w-full p-4 border-2 mt-2">
    <button id="formEditExitButton" type="button" class="float-right text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5" id="closeSetoranForm">
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-5 text-lg font-normal text-blue-900 ">Edit Data </h3>
        <form class="space-y-6" action="<?= base_url('Admin/editSetting')?>" method="POST" enctype="multipart/form-data">

            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-blue-900 ">Nama Instansi</label>
                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="nama instansi" required value="<?=$data[0]['nama'];?>">
            </div>

            <div>
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-blue-900 ">Deskripsi Instansi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="deskripsi instansi" value="<?=$data[0]['deskripsi'];?>">
            </div>

            <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-blue-900 ">Alamat Instansi</label>
                <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="alamat instansi" required value="<?=$data[0]['alamat'];?>">
            </div>

            <div class=" grid  grid-cols-2">
                <div>
                    <label for="visi" class="block mb-2 text-sm font-medium text-blue-900 ">Visi</label>
                    <textarea value="<?=$data[0]['visi'];?>" id="visi" name="visi"  class="bg-gray-50 border border-gray-300  pl-3 py-3 rounded-lg text-sm focus:outline-none focus:border-indigo-700 resize-none placeholder-gray-500 text-gray-600 " placeholder="visi"   rows="5" ></textarea>
                </div>
                <div>
                    <label for="misi" class="block mb-2 text-sm font-medium text-blue-900 ">Misi</label>
                    <textarea value="<?=$data[0]['misi'];?>" id="misi" name="misi"  class="bg-gray-50 border border-gray-300  pl-3 py-3 rounded-lg text-sm focus:outline-none focus:border-indigo-700 resize-none placeholder-gray-500 text-gray-600 " placeholder="misi"   rows="5" ></textarea>
                </div>
              
            </div>

            <div class="my-4 border-2 p-4 rounded-lg">
                <h3 class ="font-bold text-lg text-gray-900 ">Social Media</h3>
                <div class=" grid  grid-cols-3 mt-4">
                    <div class="col-span-1 ">
                        <label for="whatsapp" class=" block mb-2 text-sm font-medium text-blue-900 ">Nomor Whatsapp</label>
                    </div>
                    <div class="col-span-2">
                        <input value="<?=$data[0]['whatsapp'];?>" type="number" name="whatsapp" id="whatsapp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="No Whatsapp" >
                    </div>
                </div>
                <div class=" grid  grid-cols-3">
                    <div class="col-span-1 ">
                        <label for="instagram" class=" block mb-2 text-sm font-medium text-blue-900 ">Link Instagram</label>
                    </div>
                    <div class="col-span-2">
                        <input value="<?=$data[0]['instagram'];?>" type="text" name="instagram" id="instagram" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="link Instagram" >
                    </div>
                </div>
                <div class=" grid  grid-cols-3">
                    <div class="col-span-1 ">
                        <label for="facebook" class=" block mb-2 text-sm font-medium text-blue-900 ">Link Facebook</label>
                    </div>
                    <div class="col-span-2">
                        <input value="<?=$data[0]['facebook'];?>" type="text" name="facebook" id="facebook" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="link Facebook" >
                    </div>
                </div>
                <div class=" grid  grid-cols-3">
                    <div class="col-span-1 ">
                        <label for="youtube" class=" block mb-2 text-sm font-medium text-blue-900 ">Link Youtube</label>
                    </div>
                    <div class="col-span-2">
                        <input value="<?=$data[0]['youtube'];?>" type="text" name="youtube" id="youtube" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="link Youtube" >
                    </div>
                </div>
                <div class=" grid  grid-cols-3">
                    <div class="col-span-1 ">
                        <label for="email" class=" block mb-2 text-sm font-medium text-blue-900 ">Email</label>
                    </div>
                    <div class="col-span-2">
                        <input value="<?=$data[0]['email'];?>" type="text" name="email" id="email" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="link email" >
                    </div>
                </div>
            </div>

            <div class="my-4 border-2 p-4 rounded-lg">
                <h3 class ="font-bold text-lg text-gray-900 ">Anggota</h3>
                <div class=" grid gap-2 grid-cols-3 mt-4">
                    <div class="col-span-2 ">
                        <label for="ketua" class=" block mb-2 text-sm font-medium text-blue-900 ">Ketua</label>
                        <input value="<?=$data[0]['ketua_nama'];?>" type="text" name="ketua" id="ketua" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nama Ketua" >

                    </div>
                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-blue-900" for="imageKetua">Upload Gambar Ketua</label>
                        <input name="imageKetua" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="imageKetua" type="file" >
                
                    </div>
                </div>

                <div class=" grid gap-2 grid-cols-3 mt-4">
                    <div class="col-span-2 ">
                        <label for="sekretaris" class=" block mb-2 text-sm font-medium text-blue-900 ">Sekretaris</label>
                        <input value="<?=$data[0]['sekretaris_nama'];?>" type="text" name="sekretaris" id="sekretaris" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nama Sekretaris" >

                    </div>
                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-blue-900" for="imageSekretaris">Upload Gambar Sekretaris</label>
                        <input name="imageSekretaris" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="imageSekretaris" type="file" >
                
                    </div>
                </div>

                <div class=" grid gap-2 grid-cols-3 mt-4">
                    <div class="col-span-2 ">
                        <label for="bendahara" class=" block mb-2 text-sm font-medium text-blue-900 ">Bendahara</label>
                        <input value="<?=$data[0]['bendahara_nama'];?>" type="text" name="bendahara" id="bendahara" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nama bendahara" >

                    </div>
                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-blue-900" for="imageBendahara">Upload Gambar Bendahara</label>
                        <input name="imageBendahara" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="imageBendahara" type="file" >
                
                    </div>
                </div>
                
                
            </div>

            <div class="my-4 border-2 p-4 rounded-lg">
                <h3 class ="font-bold text-lg text-gray-900 ">Gambar Beranda</h3>
                <div class=" grid gap-2 grid-cols-3 mt-4">
                    <div class="col-span-1 ">
                        <label class="block mb-2 text-sm font-medium text-blue-900" for="gallery1">Upload Gambar Beranda 1</label>
                    </div>
                    <div class="col-span-2">
                        <input name="gallery1" multiple="" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="gallery1" type="file" >
                    </div>
                </div>
                <div class=" grid gap-2 grid-cols-3 mt-4">
                    <div class="col-span-1 ">
                        <label class="block mb-2 text-sm font-medium text-blue-900" for="gallery2">Upload Gambar Beranda 2</label>
                    </div>
                    <div class="col-span-2">
                        <input name="gallery2" multiple="" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="gallery2" type="file" >
                    </div>
                </div>
                <div class=" grid gap-2 grid-cols-3 mt-4">
                    <div class="col-span-1 ">
                        <label class="block mb-2 text-sm font-medium text-blue-900" for="gallery3">Upload Gambar Beranda 3</label>
                    </div>
                    <div class="col-span-2">
                        <input name="gallery3" multiple="" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="galler3" type="file" >
                    </div>
                </div>
                
            </div>

          



            


            
        
            <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Submit</button>
            
        </form>
    </div>
  </div>
</div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section id="tabel" class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
          <div class="card-header">
            <!-- Tambah Data toggle -->
            <button id="editButton" class="block text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
              Edit Pengaturan
            </button>
          </div>

              <!-- /.card-header -->
              <div class="card-body overflow-auto">

                <div class="container mx-auto my-5 p-5">
                    <div class="md:flex no-wrap md:-mx-2 ">
                        <!-- Left Side -->
                        <div class="w-full md:w-3/12 md:mx-2">
                            <!-- Profile Card -->
                            <div class="bg-white p-3 border-t-4 border-green-400">
                                <div class="image overflow-hidden">
                                    <img class="h-auto w-full mx-auto"
                                        src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                        alt="">
                                </div>
                                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1"><?=$data[0]['nama'];?></h1>
                         
                                <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">
                                <?=$data[0]['deskripsi'];?>
                                </p>
                                <ul
                                    class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">

                                    <li class="flex items-center py-3">
                                        <span>Alamat</span>
                                        <span class="ml-auto"> <?=$data[0]['alamat'];?></span>
                                    </li>
                                </ul>
                            </div>
                            <!-- End of profile card -->
                            <div class="my-4"></div>
                            <!-- Friends card -->
                            <div class="bg-white p-3 hover:shadow">
                                <div class="flex items-center space-x-3 mb-2 font-semibold text-gray-900 text-xl leading-8">
                                    <span class="text-green-500">
                                        <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </span>
                                    <span>Anggota</span>
                                </div>
                                <div class="grid grid-cols-3">
                                    <div class="text-center my-2">
                                        <img class="h-16 w-16 rounded-full mx-auto"
                                            src="<?=base_url('uploads/profil/'.$data[0]["ketua_img"])?>"
                                            alt="">
                                        <h2>Ketua</h2>
                                        <h3 class="font-bold"><?=$data[0]['ketua_nama'];?></h3>
                                    </div>
                                    <div class="text-center my-2">
                                        <img class="h-16 w-16 rounded-full mx-auto"
                                            src="<?=base_url('uploads/profil/'.$data[0]["sekretaris_img"])?>"
                                            alt="">
                                            <h2>Sekretaris</h2>
                                            <h3 class="font-bold"><?=$data[0]['sekretaris_nama'];?></h3>
                                    </div>
                                  
                                    <div class="text-center my-2">
                                        <img class="h-16 w-16 rounded-full mx-auto"
                                            src="<?=base_url('uploads/profil/'.$data[0]["bendahara_img"])?>"
                                            alt="">
                                            <h2>Bendahara</h2>
                                            <h3 class="font-bold"><?=$data[0]['bendahara_nama'];?></h3>
                                    </div>
                                  
                                </div>
                            </div>
                            <!-- End of friends card -->
                        </div>
                        <!-- Right Side -->
                        <div class="w-full md:w-9/12 mx-2 h-64">
                            <!-- Profile tab -->
                            <!-- About Section -->
                            <div class="bg-white p-3 shadow-sm rounded-sm">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Media</span>
                                </div>
                                <div class="text-gray-700">
                                    <div class=" text-sm">
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">WhatsApp</div>
                                            <div class="px-4 py-2"><?=$data[0]['whatsapp'];?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Instagram</div>
                                            <div class="px-4 py-2"><?=$data[0]['instagram'];?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Facebook</div>
                                            <div class="px-4 py-2"><?=$data[0]['facebook'];?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Youtube</div>
                                            <div class="px-4 py-2"><?=$data[0]['youtube'];?></div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Email</div>
                                            <div class="px-4 py-2"><?=$data[0]['email'];?></div>
                                        </div>
                                        
                                    </div>
                                </div>
                        
                            </div>
                            <!-- End of about section -->

                            <div class="my-4"></div>

                            <!-- Experience and education -->
                            <div class="bg-white p-3 shadow-sm rounded-sm">

                                <div class="grid gap-4 grid-cols-2">
                                    <div>
                                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                            <span clas="text-green-500">
                                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </span>
                                            <span class="tracking-wide">Visi</span>
                                        </div>
                                        <ul class="list-inside space-y-2">
                                            <li>
                                                <div class="text-teal-600"><?=$data[0]['visi'];?></div>
                                            
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <div>
                                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                            <span clas="text-green-500">
                                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                    <path fill="#fff"
                                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                </svg>
                                            </span>
                                            <span class="tracking-wide">Misi</span>
                                        </div>
                                        <ul class="list-inside space-y-2">
                                            <li>
                                                <div class="text-teal-600"><?=$data[0]['misi'];?></div>
                                    
                                            </li>
                                     
                                        </ul>
                                    </div>
                                </div>
                                <!-- End of Experience and education grid -->
                            </div>
                            <div class="my-4"></div>

                            <div class="bg-white p-3 shadow-sm rounded-sm">

                                <div class="grid grid-cols-2">
                                    <div>
                                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                           
                                            <span class="tracking-wide">Gambar Beranda</span>
                                        </div>
                                        <div class="grid grid-cols-3">
                                            <div class="text-center my-2">
                                                <img class="h-16 w-16 rounded-lg mx-auto"
                                                    src="<?=base_url('uploads/profil/'.$data[0]["beranda1_img"])?>"
                                                    alt="">
                                     
                                            </div>                                            
                                            <div class="text-center my-2">
                                                <img class="h-16 w-16 rounded-lg mx-auto"
                                                    src="<?=base_url('uploads/profil/'.$data[0]["beranda2_img"])?>"
                                                    alt="">
                                     
                                            </div>                                            
                                            <div class="text-center my-2">
                                                <img class="h-16 w-16 rounded-lg mx-auto"
                                                    src="<?=base_url('uploads/profil/'.$data[0]["beranda3_img"])?>"
                                                    alt="">
                                     
                                            </div>                                            
                                        </div>
                                    </div>
                               
                                </div>
                                <!-- End of Experience and education grid -->
                            </div>
                
                            <!-- End of profile tab -->
                        </div>
                    </div>
                </div>
               
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->


    </section>
    <!-- /.content -->
  </div>






<script>
  // jQuery code to handle button click events
  $(document).ready(function() {

    // Show setoran table and hide penarikan table on setoran button click
    $("#editButton").click(function() {
      $("#editForm").removeClass("hidden");
      $("#tabel").addClass("hidden");
    });


    $("#formExitButton").click(function() {
      $("#tambahForm").addClass("hidden");
      $("#tabel").removeClass("hidden");
    });

    $("#formEditExitButton").click(function() {
      $("#editForm").addClass("hidden");
      $("#tabel").removeClass("hidden");
    });






  });
</script>