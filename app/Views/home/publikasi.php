<div id="publikasi" class="flex justify-center mt-20 lg:mx-28 sm:mx-10 grid lg:grid-cols-2 sm:grid-cols-1">
  <?php foreach ($data as $data) : ?>
    <div class="h-60 p-6 my-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 shadow  mx-4 relative">
     
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?= $data['judul'];?></h5>
   
      <a href="<?= base_url('Home/detail/'.$data["id"])?>">
        <button  type="button"  class="absolute bottom-4 right-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
            Read more
            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
      </a>
    </div>

  <?php endforeach; ?>
</div>





