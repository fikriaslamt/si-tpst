<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />

    <script src="<?=base_url('chart/Chart.js')?>"></script>

</head>
<body>

    <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 mb-0 
                 bg-gradient-to-r from-indigo-600 to-blue-500">
        <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center
                      md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
            <img src="<?=base_url('images/unila.png')?>" class="w-7 h-7 mr-2" alt="">
            <a href="<?=base_url('home/index')?>" class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg
                                focus:outline-none focus:shadow-outline">TPST Unila</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3
                    10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                    clip-rule="evenodd">
                </path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1
                  1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1
                  1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd">
                </path>
                </svg>
            </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0
                          hidden md:flex md:justify-end md:flex-row">
            <a  href="<?=base_url('home/index')?>"
                class="px-4 py-2 mt-2 text-sm font-semibold text-white
                rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200
                focus:outline-none focus:shadow-outline" >
                Beranda
            </a>
            <a  href="<?=base_url('home/about')?>"
                class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg
                md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200
                focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                Tentang Kami
            </a>
            <a  href="<?=base_url('home/produk')?>"
              class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg
              md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200
              focus:bg-gray-200 focus:outline-none focus:shadow-outline">
              Produk
            </a>
            <a  href="<?=base_url('home/publikasi')?>"
              class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg
              md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200
              focus:bg-gray-200 focus:outline-none focus:shadow-outline" >
              Publikasi
            </a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full text-white
                    px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg
                    md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900
                    hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Bank Sampah</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                      class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0
                        111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd">
                      </path>
                    </svg>
                </button>
                <div x-show="open"
                  x-transition:enter="transition ease-out duration-100"
                  x-transition:enter-start="transform opacity-0 scale-95"
                  x-transition:enter-end="transform opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75"
                  x-transition:leave-start="transform opacity-100 scale-100"
                  x-transition:leave-end="transform opacity-0 scale-95"
                  class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                  <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                      <a href="<?=base_url('home/saldo')?>"
                        class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg
                        md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200
                        focus:outline-none focus:shadow-outline" >
                        Cek Saldo
                      </a>
                      <a href="<?=base_url('home/daftarSampah')?>"
                        class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg
                        md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200
                        focus:outline-none focus:shadow-outline" >
                        Daftar Sampah
                      </a>
                  </div>
                </div>
            </div>
            </nav>
        </div>
    </div>


    <div class="lg:pl-20 pt-24 bg-gradient-to-r from-indigo-600 to-blue-500">
      <div class="container  px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full lg:w-2/5 justify-center items-start text-center md:text-left">
          <p class="mx-auto uppercase tracking-loose w-full text-white">belum daftar menjadi nasabah ?</p>
          <h1 class="mx-auto my-4 text-5xl font-bold leading-tight text-white">
            Daftarkan Diri Menjadi Nasabah Kami !
          </h1>

          <a class="mx-auto sm:mx-auto" href="<?=base_url('home/saldo')?>">
            <button class="drop-shadow-2xl animate-bounce mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold
              rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline
              transform transition hover:scale-105 duration-300 ease-in-out">
              Bank Sampah
            </button>
          </a>

        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 p-10 sm:p-4">
          <img class=" lg:ml-28  w-full md:w-4/5 " src="<?=base_url('images/home.png')?>" alt=""/>
        </div>
      </div>
    </div>







  </section>
  <!-- Section: Design Block -->

  <div class="container my-24 mx-auto md:px-6 ">
  <!-- Section: Design Block -->
  
  <section class="mb-32 py-20 text-center">
    <h2 class="mb-8  text-center text-3xl font-bold">
      Postingan Terbaru
    </h2>

    <div class="flex flex-col md:flex-row sm:flex-row p-10  ">
      <?php foreach ($data as $data) :?>
      <div class="mb-6 lg:mb-0 rounded-lg shadow-xl mx-2 my-4">
        <div
          class="relative block rounded-lg bg-white shadow-[0_2px_15px_-3px_
          rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
          <div class="flex">
            <div
              class="relative mx-4 -mt-4 overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg "
              data-te-ripple-init data-te-ripple-color="light">
                <img src="<?= $data["media_url"]; ?>" class="w-64 h-48" alt=""/>
              <a href="#!">
                <div
                  class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed
                  opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]">
                </div>
              </a>
            </div>
          </div>
          <div class="p-6">
            <p class="mb-4 text-neutral-500 ">
                <small>Published <u><?= substr($data["timestamp"],0,10); ?></u></small>
            </p>
            <a href="#_" class="mt-2 rounded-full relative rounded px-5 py-2.5 overflow-hidden group bg-gradient-to-r from-indigo-600 to-blue-500 relative hover:bg-gradient-to-r hover:from-indigo-500 hover:to-blue-500 text-white hover:ring-2 hover:ring-offset-2 hover:ring-indigo-400 transition-all ease-out duration-300">
            <span class="absolute right-0 w-8 h-32  -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
            <span class="relative">Read More</span>
            </a>
            
          </div>
        </div>
      </div>
      <?php endforeach;?>
      

    
    </div>
    <a href="#_" class=" mt-4 relative inline-flex items-center justify-center  px-6 py-1 overflow-hidden
     font-medium text-indigo-600 transition duration-300 ease-out border-2 border-indigo-500 rounded-lg shadow-md group">
      <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white
        duration-300 -translate-x-full bg-gradient-to-r from-indigo-600 to-blue-500 group-hover:translate-x-0 ease">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round"
            stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
          </path>
        </svg>
      </span>
      <span class="absolute flex items-center justify-center w-full h-full text-blue-500
        transition-all duration-300 transform group-hover:translate-x-full ease">
        Read All Post
      </span>
      <span class="relative invisible">Read All Post</span>
    </a>

</div>
<!-- Container for demo purpose -->



<h2 class="mb-5 mt-5 pb-4 text-center text-3xl text-grey-900 font-bold">
  Pencapaian Kami
  </h2>
<div class="mb-36 w-full h-full">

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
        <div class="w-20 h-20 relative pt-7  mb-2">
          <h4 class="text-white text-center font-bold text-5xl"><?= $persentaseTerkelola;?> <span class="text-xs text-center">%</span></h4>
        </div>
        <h4 tabindex="0" class="focus:outline-none text-lg  leading-6 text-white  text-center mb-2">
            Sampah <br />
            Terkelola
        </h4>
    </div>
    <div tabindex="0" aria-label="card 1" class="mr-5 mt-5 rounded-lg px-5 py-2 bg-gradient-to-r from-red-600 to-orange-500 focus:outline-none flex flex-col items-center  w-full ">
        <div class="w-20 h-20 relative pt-7 mb-2">
          <h4 class="text-white text-center font-bold  text-5xl"><?= $persentasetidakTerkelola;?> <span class="text-xs text-center">%</span></h4>
        </div>
        <h4 tabindex="0" class="focus:outline-none text-lg  leading-6 text-white  text-center mb-2">
            Sampah<br />
            Tidak Terkelola
        </h4>
    </div>
    <div tabindex="0" aria-label="card 1" class="mt-5 rounded-lg px-5 py-2 bg-gradient-to-r from-violet-600 to-purple-500 focus:outline-none flex flex-col items-center  w-full ">
        <div class="w-20 h-20 relative pt-7  mb-2">
          <h4 class="text-white text-center font-bold text-5xl"><?= $nasabah;?></h4>
        </div>
        <h4 tabindex="0" class="focus:outline-none text-lg  leading-6 text-white  text-center mb-2">
            Total<br />
            Nasabah
        </h4>
    </div>

  </div>
</div>

<div class="relative flex justify-start md:justify-center md:items-end lg:pt-40 bg-gradient-to-r from-indigo-600 to-blue-500 py-20 mt-36">
        <div class="flex    px-4   xl:px-20 flex-col justify-start items-start md:justify-center md:items-center relative z-10">
            <div class="flex  flex-col items-start justify-start xl:justify-center xl:space-x-8 xl:flex-row">
                <div class="flex justify-start items-center space-x-4">
                    <div class="cursor-pointer w-12">
                        <img src="<?=base_url('images/unila.png')?>" alt="logo">
                    </div>
                    <p class="w-60 text-xl xl:text-2xl font-semibold leading-normal text-white">TPST UNILA</p>
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
            <div class="mt-20 flex  xl:justify-between xl:flex-row flex-col-reverse items-center xl:items-start w-full ">
                <p class="mt-10 md:mt-12 xl:mt-0 text-sm leading-none text-white" >2020 TPST Unila. All Rights Reserved</p>
               
                <div class="flex  justify-start md:justify-end items-start  w-full md:w-auto md:items-center space-x-6 ">
                    <a href="https://www.instagram.com/tpst_unila" target="_blank">
                      <button class="text-white hover:text-gray-200 w-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>              
                      </button>
                    </a>
                    <button class="text-white hover:text-gray-200 w-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5 12.0645C22.5 6.26602 17.7984 1.56445 12 1.56445C6.20156 1.56445 1.5 6.26602 1.5 12.0645C1.5 17.3051 5.33906 21.649 10.3594 22.4374V15.1005H7.69266V12.0645H10.3594V9.75117C10.3594 7.12008 11.9273 5.66555 14.3255 5.66555C15.4744 5.66555 16.6763 5.87086 16.6763 5.87086V8.45508H15.3516C14.048 8.45508 13.6402 9.26414 13.6402 10.0957V12.0645H16.552L16.087 15.1005H13.6406V22.4384C18.6609 21.6504 22.5 17.3065 22.5 12.0645Z" fill="currentColor"/>
                            </svg>                                      
                    </button>
                    <button class="text-white hover:text-gray-200 w-6">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                      </svg>                           
                    </button>

                </div>
            </div>
           
        </div>
</div>


</body>
</html>



    



  


