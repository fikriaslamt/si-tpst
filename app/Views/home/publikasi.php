<div id="publikasi" class="flex justify-center mt-20 lg:mx-28 sm:mx-10 grid lg:grid-cols-2 sm:grid-cols-1">

  
 
  <?php foreach ($data as $data) : ?>
    <div class="flex rounded-lg  drop-shadow-xl border  h-50 mx-5 my-5 relative">
      <div class=" rounded-lg lg:w-1/4  block h-full shadow-inner ">
        <div class="text-center tracking-wide">
        <img
        class=""
        src="<?= base_url('uploads/konten/'.$data["image"]) ?>"
        alt="" 
        width="180" height="120"
        />
        </div>
      </div>
      <div class="w-full  lg:w-3/4 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide ">
        <div class="flex flex-row lg:justify-start justify-center">
          <div class="text-blue-700 font-small text-sm text-center lg:text-left px-2 mb-2">
            <i class="far fa-clock"></i> <?= $data['tanggal'];?>
          </div>
         
        </div>
        <div class="font-semibold text-gray-800 text-m  lg:text-left px-2">
        <?= $data['judul'];?>
        </div>

        <div class="absolute bottom-0 right-0  m-2 p-2">
        <a href="<?= base_url('Home/detail/'.$data["id"]) ?>" class="px-5 py-2.5 font-medium bg-gray-700 hover:bg-gray-100 hover:text-gray-600 text-white hover:border-2 rounded-lg text-sm">
        Read More
        </a>
        </div>
      
        
      
      </div>
     
    </div>
    <?php endforeach; ?>
</div>





