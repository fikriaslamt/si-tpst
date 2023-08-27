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
            <a href="#_" class="mt-2 rounded-full relative rounded px-5 py-2.5 overflow-hidden group bg-gradient-to-r from-indigo-500 from-10% via-sky-500
              via-30% to-emerald-500 to-90% relative hover:bg-gradient-to-r hover:from-indigo-500 hover:to-emerald-500 text-white hover:ring-2 hover:ring-offset-2 hover:ring-indigo-400 transition-all ease-out duration-300">
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
        duration-300 -translate-x-full bg-gradient-to-r from-indigo-500 from-10% via-sky-500
              via-30% to-emerald-500 to-90% group-hover:translate-x-0 ease">
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