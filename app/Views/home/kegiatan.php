        
<div id="detailKegiatan" class="">
    <div class="flex justify-center items-center">
        <div class="2xl:mx-auto 2xl:container lg:px-20 lg:py-16 md:py-12 md:px-6 py-9 px-4 w-full sm:w-auto">
            <div role="main" class="flex flex-col items-center justify-center">
                <h1 class="mb-5 pb-4 text-center text-3xl text-grey-900 font-bold">Semua Kegiatan</h1>
            </div>
            <div class="lg:flex items-center md:mt-12">
                
                <div class=mb-6">
                    <div class="sm:flex lg:grid lg:grid-cols-4 md:grid md:grid-cols-3 items-center justify-between gap-6 ">
                        <?php foreach($data as $data):?>
                        <div class=" relative mt-4 ">
                            <div>
                                <div class="absolute bottom-0 left-0 pl-6 pr-2 py-2 bg-gray-800 opacity-75 w-full ">
                                    <p class="py-4 px-6 text-xs font-medium leading-3 underline text-white absolute bottom-0 left-0 "><?= $data["tanggal"];?></p>

                                    <h2 class="text-md font-semibold  text-white mt-2 truncate ..."><?= $data["judul"];?></h2>
                                    <a href="<?= base_url("/home/detailKegiatan/".$data["slug"])?>" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer float-right text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/blog-I-svg1.svg" alt="arrow">
                                    </a>
                                </div>
                            </div>
                            <img src="<?=base_url('uploads/kegiatan/'.$data["thumbnail"])?>" class=" h-80 w-full" alt="chair" />
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>

                
            
            </div>

            <div class="mt-2 float-left">
                <i>Total entries :  <?= $pager->getTotal(); ?> Data</i>
            </div> 

            <div class="mt-2 float-right">
                <?= $pager->links('default','pagination')?>
            </div>
        </div>
    </div>
</div>
        
