<div id="publikasi" class="flex justify-center mt-20 lg:mx-28 sm:mx-10 grid lg:grid-cols-2 grid-cols-1">

  
 
  <?php foreach ($data as $data) : ?>
    <div class="flex rounded-lg  border-2 h-40  mx-5 my-5 relative">
      <div class=" rounded-lg lg:w-1/4  block h-full shadow-inner ">
        <div class="text-center tracking-wide">
        <img
        class="h-40"
        src="<?= base_url('uploads/publikasi/'.$data["image"]) ?>"
        
        />
        </div>
      </div>
      <div class="w-full  lg:w-3/4 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide ">
        <div class="flex flex-row lg:justify-start ">
          <div class="text-blue-700 font-small text-sm lg:text-left px-2 mb-2">
            <i class="far fa-clock"></i> <?= $data['tanggal'];?>
          </div>
         
        </div>
        <div class="font-semibold text-gray-800 text-m  lg:text-left px-2">
        <?= $data['judul'];?>
        </div>

        <div class="float-right m-2 p-2">
        <a href="<?= base_url('Home/detail/'.$data["slug"]) ?>" class="px-5 py-2.5 font-medium bg-gray-700 rounded-lg hover:underline text-white  text-sm">
        Read More
        </a>
        </div>
      
        
      
      </div>
     
    </div>
    <?php endforeach; ?>
</div>





