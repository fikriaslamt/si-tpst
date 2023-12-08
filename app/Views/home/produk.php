<div id="program" class="w-2xl lg:w-7/12 lg:mx-auto  mx-10 ">

<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Produk Tersedia</h2>

    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 lg:mt-10">
      <?php foreach($data as $data):?>
      <div class="group relative border rounded-lg p-5">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200  group-hover:opacity-75 ">
          <img src="<?= base_url('uploads/produk/').$data["image"];?>" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-center">
         
            <h3 class="text-sm font-bold text-gray-700  mt-2">      
                <?= $data["jenis_produk"];?>
            </h3>
      
          <div class="bg-gray-700 border rounded-full absolute right-0 top-0 px-1">
            <p class="text-xs font-medium text-white ">Rp. <?= $data["harga"];?>/pcs</p>
          </div>
        
        </div>
      </div>
      <?php endforeach;?>


      <!-- More products... -->
    </div>

    
  </div>
</div>
      
    
</div>