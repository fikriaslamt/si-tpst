

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


<!-- Tambah Data modal -->
<div id="tambahForm" class=" flex items-center justify-center rounded-md my-3  hidden">

  <div class="place-content-center lg:w-11/12 md:w-full sm:w-full p-4 border-2 mt-2">
    <button id="formExitButton" type="button" class="float-right text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5" id="closeSetoranForm">
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-5 text-lg font-normal text-blue-900 ">Tambah Data Kegiatan</h3>
        <form class="space-y-6" action="<?= base_url('Konten/tambahKegiatan')?>" method="POST" enctype="multipart/form-data">

            <div>
                <label for="judul" class="block mb-2 text-sm font-medium text-blue-900 ">Judul</label>
                <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " maxlength = "90" placeholder="judul kegiatan" required>
            </div>

            <div class="mt-8 flex flex-col  w-full">
                <label for="isi" class="pb-2 text-sm font-bold text-blue-900">Isi</label>
                <textarea id="isi" name="isi" required class="bg-gray-50 border border-gray-300  pl-3 py-3 rounded-lg text-sm focus:outline-none focus:border-indigo-700 resize-none placeholder-gray-500 text-gray-600 " placeholder="isi kegiatan" required  rows="15"></textarea>
                <!-- <p class="w-full text-right text-xs pt-1 text-gray-600 ">Character Limit: 200</p> -->
            </div>

            <div class=" grid gap-4 grid-cols-2">
              <div  class="">
                  <label class="block mb-2 text-sm font-medium text-blue-900" for="image">Upload Gambar Thumbnail</label>
                  <input name="image" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="image" type="file" required>
              </div>

              <div class="">
                  <label class="block mb-2 text-sm font-medium text-blue-900" for="gallery">Upload Gallery</label>
                  <input name="gallery[]" multiple="" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="gallery" type="file" required>
              </div>
            </div>

            <div>
                <label for="tanggal" class="block mb-2 text-sm font-medium text-blue-900 ">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>
            
        
            <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah</button>
            
        </form>
    </div>
  </div>
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
        <h3 class="mb-5 text-lg font-normal text-blue-900 ">Edit Data Kegiatan</h3>
        <form class="space-y-6" action="<?= base_url('Konten/tambahKonten')?>" method="POST" enctype="multipart/form-data">

            <div>
                <label for="judul" class="block mb-2 text-sm font-medium text-blue-900 ">Judul</label>
                <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " maxlength = "90" placeholder="judul kegiatan" required>
            </div>

            <div class="mt-8 flex flex-col  w-full">
                <label for="isi" class="pb-2 text-sm font-bold text-blue-900">Isi</label>
                <textarea id="isi" name="isi" required class="bg-gray-50 border border-gray-300  pl-3 py-3 rounded-lg text-sm focus:outline-none focus:border-indigo-700 resize-none placeholder-gray-500 text-gray-600 " placeholder="isi kegiatan" required  rows="15"></textarea>
                <!-- <p class="w-full text-right text-xs pt-1 text-gray-600 ">Character Limit: 200</p> -->
            </div>

            <div class=" grid gap-4 grid-cols-2">
              <div  class="">
                  <label class="block mb-2 text-sm font-medium text-blue-900" for="image">Upload Gambar Thumbnail</label>
                  <input name="image" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="image" type="file" required>
              </div>

              <div class="">
                  <label class="block mb-2 text-sm font-medium text-blue-900" for="gallery">Upload Gallery</label>
                  <input name="gallery[]" multiple="" accept=".jpg, .png, .jpeg" class="block w-full text-sm text-blue-900 border border-blue-300 rounded-lg cursor-pointer bg-blue-50 " id="gallery" type="file" required>
              </div>
            </div>

            <div>
                <label for="tanggal" class="block mb-2 text-sm font-medium text-blue-900 ">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>
            
        
            <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah</button>
            
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
            <button id="tambahButton" class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
              Tambah
            </button>
          </div>

              <!-- /.card-header -->
              <div class="card-body overflow-auto">
              <form class="flex items-center lg:w-1/4 md:w-1/3  float-right" id="searchForm" action="" method="get">   
                  <label for="simple-search" class="sr-only">Search</label>
                  <div class="relative w-full">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                      </div>
                      <?php $request = \Config\Services::request(); ?>
                      <input type="text" id="searchInput" name="search" value="<?= $request->getGet('search');?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " placeholder=" Search Keyword">
                  </div>
                  <button  type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                      <span class="sr-only">Search</span>
                  </button>
              </form>
                <table id="example1" class="table table-striped mt-5">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach ($data as $data) : ?>
                    <tr>
                      <td><?= $i;$i++; ?></td>
                      <td><?= $data["tanggal"]; ?></td>
                      <td><p class="lg:truncate lg:w-96 md:truncate md:w-50  sm:truncate sm:w-20 "><?= $data["judul"]; ?></p></td>
                      <td><p class="lg:truncate lg:w-96 md:truncate md:w-50  sm:truncate sm:w-20 "><?= $data["isi"]; ?></td>
                      <td><?= $data["nama"]; ?></td>
                      <td>
                          <!-- Call to action buttons -->
                          <ul class="flex flex-row items-center justify-center">  
                              <li class="mx-1">
                                <button id="editButton"                        
                                        data-id="<?= $data["id"] ?>"
                                        data-judul="<?= $data["judul"] ?>"
                                        data-isi="<?= $data["isi"] ?>"
                                        data-tanggal="<?= $data["tanggal"] ?>"
                                        class="bg-yellow-500 btn-sm rounded-0"
                                        type="button"
                                        data-toggle="edit-modal"
                                        data-placement="top"
                                        title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                              </li>
                              <li class="mx-1">
                                <button data-modal-target="delete-modal"
                                        data-modal-toggle="delete-modal"
                                        data-id="<?= $data["id"] ?>"
                                        class="bg-red-500 btn-sm rounded-0"
                                        type="button"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Delete">
                                    <i class="fa fa-trash text-white"></i>
                                </button>
                              </li>
                          </ul>



                      </td>
                    </tr>
                    
                 
                  <?php endforeach; ?>
                  </tbody>
                 
                </table>
                <div class="mt-2 float-left">
                  <i>Total entries :  <?= $pager->getTotal(); ?> Data</i>
                </div> 

                <div class="mt-2 float-right">
                  <?= $pager->links('default','pagination')?>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->


    </section>
    <!-- /.content -->
  </div>




<!-- delete Data modal -->
<div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to delete this?</h3>
                <a id="delete-link" href="" data-modal-hide="delete-modal">
                    <button type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                </a>
                <button data-modal-hide="delete-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>





<script>
    const editButtons = document.querySelectorAll('#editButton');
    const editForm = document.querySelector('#editForm form');
    const editJudulInput = editForm.querySelector('[name="judul"]');
    const editIsiInput = editForm.querySelector('[name="isi"]');
    const editTanggalInput = editForm.querySelector('[name="tanggal"]');

    const deleteButtons = document.querySelectorAll('[data-modal-toggle="delete-modal"]');
    const deleteLink = document.getElementById('delete-link');
    
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
          $("#editForm").removeClass("hidden");
          $("#tabel").addClass("hidden");

            const dataId = this.getAttribute('data-id');
            const dataJudul = this.getAttribute('data-judul');
            const dataIsi = this.getAttribute('data-isi');
            const dataTanggal = this.getAttribute('data-tanggal');
            const editUrl = `<?= base_url('Konten/editKegiatan/') ?>${dataId}`;

            editForm.action = editUrl;
            editJudulInput.value = dataJudul;
            editIsiInput.value = dataIsi;
            editTanggalInput.value = dataTanggal;
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const dataId = this.getAttribute('data-id');
            const deleteUrl = `<?= base_url('Konten/deleteKegiatan/') ?>${dataId}`;
            deleteLink.href = deleteUrl;
        });
    });
</script>


<script>
  // jQuery code to handle button click events
  $(document).ready(function() {

    // Show setoran table and hide penarikan table on setoran button click
    $("#tambahButton").click(function() {
      $("#tambahForm").removeClass("hidden");
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