<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPST Unila</title>
    <link rel="icon" type="image/png" href="<?=base_url('images/unila.png')?>"/>
   
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/app.css" />

    <script src="<?=base_url('chart/package/dist/chart.js')?>"></script>
    <script src="<?=base_url('chart/package/dist/chart.umd.js')?>"></script>


</head>
<body>



  <div class="w-full text-white bg-gradient-to-r from-indigo-600 to-blue-500 mb-0  ">
        <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
            <img src="<?=base_url('images/unila.png')?>" class=" mr-4 h-28 w-28" alt="">
            <a href="<?=base_url('home/index')?>" class="text-sm  tracking-widest text-white rounded-lg
              focus:outline-none focus:shadow-outline ">
                <div class="row">
                    <p class="lg:text-3xl font-bold uppercase ">TPST UNILA</p>
                    <p class="lg:text-m font-semibold ">Kampus Universitas Lampung</p>
                    <p class="lg:text-xs overline">Jl. Prof. Dr. Ir. Sumantri Brojonegoro  </p>
                    <p class="lg:text-xs"> Kec. Rajabasa, Kota Bandar Lampung</p>
                </div>
              </a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <a  href="<?=base_url('home/index')?>" class="px-4 py-2 mt-2 text-sm font-semibold   rounded-lg  md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-white focus:bg-white focus:outline-none focus:shadow-outline" >Beranda</a>
            <a  href="<?=base_url('home/about')?>" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white focus:bg-white focus:outline-none focus:shadow-outline">Tentang Kami</a>
            <a  href="<?=base_url('home/kegiatan')?>" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Kegiatan</a>
            <a  href="<?=base_url('home/produk')?>" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white focus:bg-white focus:outline-none focus:shadow-outline" >Produk</a>
            <a  href="<?=base_url('home/publikasi')?>" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white focus:bg-white focus:outline-none focus:shadow-outline" >Publikasi</a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-white focus:bg-white focus:outline-none focus:shadow-outline">
                <span>Bank Sampah</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                    <a href="<?=base_url('home/saldo')?>"  class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 text-gray-900 focus:bg-gray-200 text-gray-900 focus:outline-none focus:shadow-outline" >Cek Saldo</a>
                    <a href="<?=base_url('home/daftarSampah')?>" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 text-gray-900 focus:bg-gray-200 text-gray-900 focus:outline-none focus:shadow-outline" >Daftar Sampah</a>
                </div>
                </div>
            </div>    
            </nav>
        </div>


    
  </div>

    <div class="lg:pl-20 pt-24 bg-cover bg-gradient-to-r from-indigo-600 to-blue-500 ">
      <div class="container  px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center lg:max-w-screen-xl">
        <!--Left Col-->
          <div class="flex flex-col w-full lg:w-2/5 justify-center items-start text-center md:text-left ">
            <!-- <div class="">
              <img src="<?=base_url('images/Picture1.png')?>" class="w-96 " alt="">
              <p class="text-white mb-20 text-s font-bold relative text-center">Prof. Dr. Ir. Lusmeilia Afriani. D. E. A., IPM., Asean. Eng.</p>
            </div> -->

              <p class="mx-auto uppercase tracking-loose w-full text-white">belum daftar menjadi nasabah ?</p>
              <h1 class="mx-auto my-4 text-5xl font-bold leading-tight text-white">
                Daftarkan Diri Menjadi Nasabah Kami !
              </h1>
              <h1 class="mx-auto my-4 text-2xl font-bold leading-tight text-white">
                BANK SAMPAH UNILA
              </h1>
              

              <a class="mx-auto sm:mx-auto mb-20" href="https://api.whatsapp.com/send/?phone=62<?=substr($profil[0]['whatsapp'],1);?>" target="_blank">
                <button class="drop-shadow-2xl animate-bounce mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold
                  rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline
                  transform transition hover:scale-105 duration-300 ease-in-out">
                  Daftar Bank Sampah
                </button>
              </a>

          </div>
          <!--Right Col-->
          <div class="lg:w-1/2 w-full sm:w-3/4 md:w-2/3  md:mx-auto  pr-0 pt-0  mb-20">
 
            <div id="default-carousel" class="relative   " data-carousel="slide">
       
                <div class="relative h-56 overflow-hidden md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                        <img src="<?=base_url('uploads/profil/'.$profil[0]['beranda1_img'])?>" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                        <img src="<?=base_url('uploads/profil/'.$profil[0]['beranda2_img'])?>" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                        <img src="<?=base_url('uploads/profil/'.$profil[0]['beranda3_img'])?>" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>

                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>

                </div>
                <!-- Slider controls -->
                <!-- <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button> -->
            </div>
            
          </div>
      </div>
    </div>



    

      <div class="flex justify-center items-center">
          <div class="2xl:mx-auto 2xl:container lg:px-20 lg:py-16 md:py-12 md:px-6 py-9 px-4 w-96 sm:w-auto">
              <div role="main" class="flex flex-col items-center justify-center">
                  <h1 class="mb-5 mt-20 pb-4 text-center text-3xl text-grey-900 font-bold">Kegiatan Kami</h1>
              </div>
              <div class="lg:flex items-stretch md:mt-12 mt-8">
                 
                  <div class="">
                      <div class="sm:flex  items-center justify-between gap-6 ">
                        <?php foreach($dataKegiatan as $dataKegiatan):?>
                          <div class="sm:w-1/4 relative mt-4 ">
                          <div>
                                <div class="absolute bottom-0 left-0 pl-6 pr-2 py-2 bg-gray-800 opacity-75 w-full ">
                                    <p class="py-4 px-6 text-xs font-medium leading-3 underline text-white absolute bottom-0 left-0 "><?= $dataKegiatan["tanggal"];?></p>

                                    <h2 class="text-md font-semibold  text-white mt-2 truncate ..."><?= $dataKegiatan["judul"];?></h2>
                                    <a href="<?= base_url("/home/detailKegiatan/".$dataKegiatan["slug"])?>" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer float-right text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/blog-I-svg1.svg" alt="arrow">
                                    </a>
                                </div>
                            </div>
                              <img src="<?=base_url('uploads/kegiatan/'.$dataKegiatan["thumbnail"])?>" class=" h-80 w-full" alt="chair" />
                          </div>
                          <?php endforeach;?>
                      </div>
                      <a href="<?=base_url('home/kegiatan')?>" class="float-right mt-4 relative inline-flex items-center justify-center  px-6 py-1 overflow-hidden
                      font-medium text-grey-900 transition duration-300 ease-out border-2 border-black shadow-md group">
                        <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white
                          duration-300 -translate-x-full bg-slate-900 group-hover:translate-x-0 ease">
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                            </path>
                          </svg>
                        </span>
                        <span class="absolute flex items-center justify-center w-full h-full text-grey-900
                          transition-all duration-300 transform group-hover:translate-x-full ease">
                          Read All Post
                        </span>
                        <span class="relative invisible">Read All Post</span>
                      </a>
                     
                  </div>
                
              </div>

              
          </div>
      </div>
       



  <!-- Section: Design Block -->


<!-- Container for demo purpose -->



  <h2 class="mb-5 mt-20 pb-4 text-center text-3xl text-grey-900 font-bold">
    Pencapaian Kami
  </h2>
<div class="mb-5 w-full h-full">

  <div class="flex flex-col md:flex-row sm:flex-row p-10">
    <div tabindex="0" aria-label="card 1" class="mr-5 mt-5 rounded-lg px-5 py-2 bg-gradient-to-r from-indigo-600 to-blue-500 focus:outline-none flex flex-col items-center  w-full ">
        <div class="w-30 h-20 relative pt-7 mb-2">
            <h4 class="text-white text-center font-bold text-5xl "><?= $timbulan;?> <span class="text-xs text-center">(ton)</span></h4>
        </div>
        <h4 tabindex="0" class="focus:outline-none text-lg  leading-6 text-white  text-center mb-2">
            Timbulan <br />
            Sampah
        </h4>
    </div>
    <div tabindex="0" aria-label="card 1" class="mr-5 mt-5 rounded-lg px-5 py-2 bg-gradient-to-r from-lime-600 to-emerald-500 focus:outline-none flex flex-col items-center  w-full ">
        <div class="w-30 h-20 relative pt-7  mb-2">
          <h4 class="text-white text-center font-bold text-5xl"><?= $persentaseTerkelola;?> <span class="text-xs text-center">%</span></h4>
        </div>
        <h4 tabindex="0" class="focus:outline-none text-lg  leading-6 text-white  text-center mb-2">
            Sampah <br />
            Terkelola
        </h4>
    </div>
    <div tabindex="0" aria-label="card 1" class="mr-5 mt-5 rounded-lg px-5 py-2 bg-gradient-to-r from-red-600 to-orange-500 focus:outline-none flex flex-col items-center  w-full ">
        <div class="w-30 h-20 relative pt-7 mb-2">
          <h4 class="text-white text-center font-bold  text-5xl"><?= $persentasetidakTerkelola;?> <span class="text-xs text-center">%</span></h4>
        </div>
        <h4 tabindex="0" class="focus:outline-none text-lg  leading-6 text-white  text-center mb-2">
            Sampah<br />
            Tidak Terkelola
        </h4>
    </div>
    <div tabindex="0" aria-label="card 1" class="mt-5 rounded-lg px-5 py-2 bg-gradient-to-r from-violet-600 to-purple-500 focus:outline-none flex flex-col items-center  w-full ">
        <div class="w-30 h-20 relative pt-7  mb-2">
          <h4 class="text-white text-center font-bold text-5xl"><?= $nasabah;?></h4>
        </div>
        <h4 tabindex="0" class="focus:outline-none text-lg  leading-6 text-white  text-center mb-2">
            Total<br />
            Nasabah
        </h4>
    </div>

  </div>
</div>


<div class=" lg:grid grid-cols-2 gap-5  p-10">


           

            <div class="card  mx-2 border p-10 rounded-lg">
              <div class="card-header">
                <h3 class="text-center mb-5 font-bold text-xl">Grafik Pengelolaan Sampah Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <select id="yearSelectSampah" class="float-right rounded-lg lg:w-1/5 sm:lg-2/5 pl-2">
                  <?php  foreach($yearSampah as $index => $y):?>
                    <option value="<?= $index;?>" selected><?= $index;?></option>
                  <?php endforeach;?>
                </select>
                <div>
                  <canvas id="lineChart"></canvas>
                </div>
               
              </div>
             
            </div>

            <div class="card  mx-2 border p-10 rounded-lg">
              <div class="card-header">
                <h3 class="text-center mb-5 font-bold text-xl"">Grafik Kumulatif Pengelolaan Sampah Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <select id="kumulatifyearSelectSampah" class="float-right rounded-lg lg:w-1/5 sm:lg-2/5 pl-2">
                  <?php  foreach($kumulatifyearSampah as $index => $y):?>
                    <option value="<?= $index;?>" selected><?= $index;?></option>
                  <?php endforeach;?>
                </select>
                <div>
                  <canvas id="lineChart2"></canvas>
                </div>
               
              </div>
             
            </div>

            <div class="card border p-10 rounded-lg mx-2 " >
              <div class="card-header">
                <h3 class="text-center mb-5 font-bold text-xl"">Timbulan Sampah Berdasarkan Status Pengelolaan </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body lg:w-1/2 lg:flex mx-auto">
                <canvas id="pieChart"></canvas>
              </div>
             
            </div>

</div>




<div class="relative flex justify-start md:justify-center md:items-end lg:pt-40 bg-gradient-to-r from-indigo-600 to-blue-500 py-20 mt-36">
        <div class="flex    px-4   xl:px-20 flex-col justify-start items-start md:justify-center md:items-center relative z-10">
            <div class="flex  flex-col items-start justify-start xl:justify-center xl:space-x-8 xl:flex-row">
                <div class=" justify-start items-center space-x-4">
                    
                    <div class="flex flex-row mb-8">
                      <div class="cursor-pointer w-12 mr-2">
                          <img src="<?=base_url('images/unila.png')?>" alt="logo">
                      </div>
                      <p class="m-auto w-60 text-xl xl:text-2xl font-semibold leading-normal text-white">TPST UNILA</p>
                    </div>
                    
                    <iframe class="lg:w-48 lg:h-full rounded-md" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.365698975196!2d105.240722!3d-5.3610498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40c55d53a2b51b%3A0x8e16bb567b9bee92!2sTPST%20Unila!5e0!3m2!1sid!2sid!4v1693128966265!5m2!1sid!2sid"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
                <div class="mt-12 xl:mt-0 grid grid-cols-1 sm:grid-cols-3 gap-y-12 sm:gap-y-0 w-full md:w-auto sm:gap-x-20 md:gap-x-28 xl:gap-8">
                    <div class="sm:w-40 md:w-auto xl:w-72 flex justify-start items-start flex-col space-y-6">
                        <h2 class="text-base xl:text-xl font-bold xl:font-semibold leading-4 xl:leading-5 text-white">Community</h2>
                        <a href="<?=base_url('home/about')?>">
                          <button class="text-base text-left hover:text-gray-400 leading-none text-gray-100">
                              Tentang Kami
                          </button>
                        </a>
                    </div>

                    <div class="sm:w-40 md:w-auto xl:w-72 flex justify-start items-start flex-col space-y-6">
                        <h2 class="text-base xl:text-xl font-bold xl:font-semibold leading-4 xl:leading-5 text-white">Getting Started</h2>
                        <a href="<?=base_url('home/saldo')?>">
                          <button class="text-base text-left hover:text-gray-400 leading-none text-gray-100">
                              Bank Sampah
                          </button>
                        </a>
                       
                    </div>

                    <div class=" xl:w-72 flex justify-start items-start flex-col space-y-6">
                        <h2 class="text-base xl:text-xl font-bold xl:font-semibold leading-4 xl:leading-5 text-white">Resources</h2>
                        <a href="<?=base_url('home/saldo')?>">
                          <button class="text-base text-left hover:text-gray-400 leading-none text-gray-100">
                              Cek Saldo Nasabah
                          </button>
                        </a>
                     
                        <a href="<?=base_url('home/daftarSampah')?>">
                          <button class="text-base text-left hover:text-gray-400 leading-none text-gray-100">
                              Cek Harga Sampah
                          </button>
                        </a>
                    </div>
                </div>
            </div>  
            <div class="mt-10 flex  xl:justify-between xl:flex-row flex-col-reverse items-center xl:items-start w-full ">
                <p class="mt-10 md:mt-12 xl:mt-0 text-sm leading-none text-white" >2020 TPST Unila. All Rights Reserved</p>
               
                <div class="flex  justify-start md:justify-end items-start  w-full md:w-auto md:items-center space-x-6 ">
                    <a href="https://api.whatsapp.com/send/?phone=62<?=substr($profil[0]['whatsapp'],1);?>" target="_blank">
                      <button class="text-white hover:text-gray-200 w-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                          <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>              
                      </button>
                    </a>
                    <a href="https://www.instagram.com/<?=$profil[0]['instagram'];?>" target="_blank">
                      <button class="text-white hover:text-gray-200 w-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>              
                      </button>
                    </a>
                    <a href="https://www.facebook.com/<?=$profil[0]['facebook'];?>" target="_blank">
                      <button class="text-white hover:text-gray-200 w-6">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5 12.0645C22.5 6.26602 17.7984 1.56445 12 1.56445C6.20156 1.56445 1.5 6.26602 1.5 12.0645C1.5 17.3051 5.33906 21.649 10.3594 22.4374V15.1005H7.69266V12.0645H10.3594V9.75117C10.3594 7.12008 11.9273 5.66555 14.3255 5.66555C15.4744 5.66555 16.6763 5.87086 16.6763 5.87086V8.45508H15.3516C14.048 8.45508 13.6402 9.26414 13.6402 10.0957V12.0645H16.552L16.087 15.1005H13.6406V22.4384C18.6609 21.6504 22.5 17.3065 22.5 12.0645Z" fill="currentColor"/>
                              </svg>                                      
                      </button>
                    </a>
                    <a href="<?=$profil[0]['youtube'];?>" target="_blank">
                      <button class="text-white hover:text-gray-200 w-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                          <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                        </svg>                           
                      </button>
                    </a>
                    <a href="https://mail.google.com/mail/?view=cm&source=mailto&to=<?=$profil[0]['email'];?>" target="_blank">
                      <button class="text-white hover:text-gray-200 w-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>                           
                      </button>
                    </a>

                   
                   

                </div>
            </div>
           
        </div>
</div>


</body>
</html>



    



  


<script>

  const ctx2 = document.getElementById('pieChart');
  const ctx3 = document.getElementById('lineChart');
  const ctx4 = document.getElementById('lineChart2');



  timbulan = <?= json_encode($timbulan)?>;


  terkelola = <?= json_encode($Terkelola)?>;
  tidakTerkelola = <?= json_encode($tidakTerkelola)?>;


  sampahMasukChart = <?= json_encode($sampahMasukChart) ?>;
  komposChart = <?= json_encode($komposChart) ?>;
  maggotChart = <?= json_encode($maggotChart) ?>;
  tidakTerkelolaChart = <?= json_encode($tidakTerkelolaChart) ?>;
  lastYearSampah = <?= json_encode($lastYearSampah)?>;
  
  kumulatifsampahMasukChart = <?= json_encode($kumulatifsampahMasukChart) ?>;
  kumulatifkomposChart = <?= json_encode($kumulatifkomposChart) ?>;
  kumulatifmaggotChart = <?= json_encode($kumulatifmaggotChart) ?>;
  kumulatiftidakTerkelolaChart = <?= json_encode($kumulatiftidakTerkelolaChart) ?>;
  kumulatiflastYearSampah = <?= json_encode($kumulatiflastYearSampah)?>;

  yearSelectSampah = document.getElementById('yearSelectSampah');
  kumulatifyearSelectSampah = document.getElementById('kumulatifyearSelectSampah');




  const chart2 =  new Chart(ctx2, {
    type: 'pie',
    data:{
      labels: [
          'Terkelola',
          'Tidak Terkelola',
      ],
      datasets: [
        {
          data: [terkelola,tidakTerkelola],
          backgroundColor : [ '#00c0ef','#f56954' ],
        }
      ]},
    options: {
      responsive: true,
      plugins: {
        title: {
                display: true,
                text: 'Total Timbulan : ' + timbulan + ' ton',
                color: '#000000',
                position: 'bottom',
                align : 'end',
                font: {
                	family: 'Arial',
                	size: 12,
                }
            },
        legend: {
          position: 'top',
        }
      }
    }
  });


  const chart3 =  new Chart(ctx3, {
    type: 'line',
    data: {
      options : [],
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul',
                'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
        {
           
          label               : 'Sampah Masuk',
          backgroundColor     : 'rgba(54, 162, 235, 0.2)',
          borderColor         : 'rgb(54, 162, 235)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },

        {
          label               : 'Kompos',
          backgroundColor     : 'rgba(255, 205, 86, 0.2)',
          borderColor         : 'rgb(255, 205, 86)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },
        {
          label               : 'Maggot',
          backgroundColor     : 'rgba(75, 192, 192, 0.2)',
          borderColor         : 'rgb(75, 192, 192)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },

        {
          label               : 'Sampah Tidak Terkelola',
          backgroundColor     : 'rgba(255, 99, 132, 0.2)',
          borderColor         : 'rgb(255, 99, 132)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4, 
          fill                : true,
          data                : []
        },
       ]
    },
    options: {
      plugins: {
            title: {
                display: true,
                text: '( Ton )',
                color: '#000000',
                position: 'left',
                font: {
                	family: 'Arial',
                	size: 12,
                    weight: 'bold',
                }
            }
        },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const chart4 =  new Chart(ctx4, {
    type: 'line',
    data: {
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul',
                'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
        {
           
          label               : 'Sampah Masuk',
          backgroundColor     : 'rgba(54, 162, 235, 0.2)',
          borderColor         : 'rgb(54, 162, 235)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },

        {
          label               : 'Kompos',
          backgroundColor     : 'rgba(255, 205, 86, 0.2)',
          borderColor         : 'rgb(255, 205, 86)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },
        {
          label               : 'Maggot',
          backgroundColor     : 'rgba(75, 192, 192, 0.2)',
          borderColor         : 'rgb(75, 192, 192)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },

        {
          label               : 'Sampah Tidak Terkelola',
          backgroundColor     : 'rgba(255, 99, 132, 0.2)',
          borderColor         : 'rgb(255, 99, 132)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4, 
          fill                : true,
          data                : []
        },
       ]
    },
    options: {
      plugins: {
            title: {
                display: true,
                text: '( Ton )',
                color: '#000000',
                position: 'left',
                font: {
                	family: 'Arial',
                	size: 12,
                    weight: 'bold',
                }
            }
        },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });





  function updateChartSampah (selectedYear){
    const selectedSampahMasukChart = sampahMasukChart[selectedYear] || {}; // Use empty object if no Chart available
    const selectedKomposChart = komposChart[selectedYear] || {};
    const selectedMaggotChart = maggotChart[selectedYear] || {};
    const selectedTidakTerkelolaChart = tidakTerkelolaChart[selectedYear] || {};
    
    // Fill in missing months with zero values
    for (let i = 1; i <= 12; i++) {
        if (!selectedSampahMasukChart[i]) {
            selectedSampahMasukChart[i] = 0;
        }
        if (!selectedKomposChart[i]) {
            selectedKomposChart[i] = 0;
        }
        if (!selectedMaggotChart[i]) {
            selectedMaggotChart[i] = 0;
        }
    
        if (!selectedTidakTerkelolaChart[i]) {
            selectedTidakTerkelolaChart[i] = 0;
        }
    }
    
    // Update the chart Chart for each dataset
    chart3.data.datasets[0].data = Object.values(selectedSampahMasukChart);
    chart3.data.datasets[1].data = Object.values(selectedKomposChart);
    chart3.data.datasets[2].data = Object.values(selectedMaggotChart);
    chart3.data.datasets[3].data = Object.values(selectedTidakTerkelolaChart);
    
    // Update the chart
    chart3.update();
  };

  function updateChartSampahKumulatif (selectedYear){
    const selectedSampahMasukChart = kumulatifsampahMasukChart[selectedYear] || {}; // Use empty object if no Chart available
    const selectedKomposChart = kumulatifkomposChart[selectedYear] || {};
    const selectedMaggotChart = kumulatifmaggotChart[selectedYear] || {};
    const selectedTidakTerkelolaChart = kumulatiftidakTerkelolaChart[selectedYear] || {};
    
    // Fill in missing months with zero values
    for (let i = 1; i <= 12; i++) {
        if (!selectedSampahMasukChart[i]) {
            selectedSampahMasukChart[i] = 0;
        }
        if (!selectedKomposChart[i]) {
            selectedKomposChart[i] = 0;
        }
        if (!selectedMaggotChart[i]) {
            selectedMaggotChart[i] = 0;
        }
    
        if (!selectedTidakTerkelolaChart[i]) {
            selectedTidakTerkelolaChart[i] = 0;
        }
    }
    
    // Update the chart Chart for each dataset
    chart4.data.datasets[0].data = Object.values(selectedSampahMasukChart);
    chart4.data.datasets[1].data = Object.values(selectedKomposChart);
    chart4.data.datasets[2].data = Object.values(selectedMaggotChart);
    chart4.data.datasets[3].data = Object.values(selectedTidakTerkelolaChart);
    
    // Update the chart
    chart4.update();
  };



  yearSelectSampah.addEventListener('change', function () {
      const selectedYear = yearSelectSampah.value;

      updateChartSampah(selectedYear);
  });

  kumulatifyearSelectSampah.addEventListener('change', function () {
      const selectedYear = kumulatifyearSelectSampah.value;

      updateChartSampahKumulatif(selectedYear);
  });

  document.addEventListener('DOMContentLoaded',function () {
      const selectedYearSampah = lastYearSampah;
      const selectedYearSampahKumulatif = kumulatiflastYearSampah;
      updateChartSampah(selectedYearSampah);
      updateChartSampahKumulatif(selectedYearSampahKumulatif);


    });
</script>