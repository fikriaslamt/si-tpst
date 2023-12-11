<div id="detailKegiatan" class="w-11/12 p-4 mx-auto  lg:px-8 p-4 md:px-6 max-w-screen-xl ">

    <div class="  mx-auto p-2 ">

    <div id="default-carousel" class="relative md:w-2/3 lg:w-2/3 sm:w-4/5 mx-auto" data-carousel="slide">
       
       <div class="relative overflow-hidden h-96">
           <!-- Item 1 -->
           <?php foreach($gallery as $g):?>
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="<?=base_url('uploads/galleryKegiatan/'.$g["image"])?>" class="absolute block rounded-lg w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            <?php endforeach;?>

       </div>
       <!-- Slider indicators -->
       <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <?php $x = 0; $y=1;  foreach($gallery as $g):?>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide <?=$y++?>"data-carousel-slide-to="<?=$x++?>"></button>
            <?php if( $y == count($gallery)){break;} endforeach;?>
           
       </div>
       <!-- Slider controls -->
       <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
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
       </button>
   </div>

        <!-- <img class="w-1/3 mx-auto" src="<?= base_url("/uploads/kegiatan/".$data["thumbnail"])?>" alt=""> -->
        <div class="sticky top-16 pt-2 pb-8 bg-white">
            <h1 class="text-2xl font-bold text-center mb-16 mt-16"><?= $data["judul"];?></h1>
            <h3 class="text-sm">Published by  <?= $data["nama"];?>, at <span class="text-blue-500 underline"><?= $data["tanggal"];?> </span> <span class="float-right"> <?=$data["views"];?> views </span></h3>
            
        </div>
      

        <p class="mt-6 text-justify">
        <?= nl2br( $data["isi"]);?>
        </p>
      
    </div>

    
    

    
   

   







</div>

