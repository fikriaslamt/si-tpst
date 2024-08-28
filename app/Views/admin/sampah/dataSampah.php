<div class="content-wrapper">
  <?php if (session()->getFlashdata('error')) { ?>
    <div id="alert-1" class="flex p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 border-2 border-blue-300 " role="alert">
      <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
      </svg>
      <span class="sr-only">Alert</span>
      <div class="ml-3 text-sm font-medium">
        <?php echo session()->getFlashdata('error') ?>
      </div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 " data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
  <?php } ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">

              <h3><?= $timbulan; ?><sup style="font-size: 20px">(ton)</sup></h3>
              <p>TIMBULAN SAMPAH</p>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-12 col-sm-6 col-md-3">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $persentaseTerkelola; ?><sup style="font-size: 20px">%</sup></h3>

              <p>SAMPAH TERKELOLA</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $persentasetidakTerkelola; ?><sup style="font-size: 20px">%</sup></h3>


              <p>SAMPAH TIDAK TERKELOLA</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="card">

        <div class="card-header">
          <!-- Tambah Data toggle -->
          <button data-modal-target="tambah-modal" data-modal-toggle="tambah-modal" class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Tambah Data Sampah Masuk
          </button>
        </div>

        <div class="card-header lg:flex lg:flex-row w-full ">

            <form class="lg:flex md:flex mb-2 mt-2 lg:m-0 " action="<?= base_url('Admin/dataSampah'); ?>" method="POST">
              <input class="rounded-lg "  name="start_date" type="date" required>
              <h2 class="my-auto mx-2 " >s/d</h2>
              <input class="rounded-lg "  name="end_date" type="date" required>
              <button type="submit" class="p-2.5 ml-2 mr-4 text-sm font-medium text-white bg-amber-400 rounded-lg border hover:bg-amber-600" >
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" > <path d="M6 8C6 7.44772 6.44772 7 7 7H17C17.5523 7 18 7.44772 18 8C18 8.55228 17.5523 9 17 9H7C6.44772 9 6 8.55228 6 8Z" fill="currentColor" /> <path d="M8 12C8 11.4477 8.44772 11 9 11H15C15.5523 11 16 11.4477 16 12C16 12.5523 15.5523 13 15 13H9C8.44772 13 8 12.5523 8 12Z" fill="currentColor" /> <path d="M11 15C10.4477 15 10 15.4477 10 16C10 16.5523 10.4477 17 11 17H13C13.5523 17 14 16.5523 14 16C14 15.4477 13.5523 15 13 15H11Z" fill="currentColor" /> </svg>
              </button>            
            </form>          
            <a href="<?=base_url('Export/exportDataSampah')?>" class=" float-left lg:mb-0 mb-2 mr-4 sm:mx-auto sm:my-auto rounded px-2 py-2 overflow-hidden group bg-green-500 relative hover:bg-gradient-to-r hover:from-green-500 hover:to-green-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-green-400 transition-all ease-out duration-300">
                <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                <i class="fa fa-file-excel"></i>
                <span class="relative"> Export</span>
            </a>
            <form class="flex items-center lg:mt-0 mt-2 lg:w-1/4 md:w-1/3 float-right" id="searchForm" action="" method="get">
              <label for="simple-search" class="sr-only">Search</label>
              <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <?php $request = \Config\Services::request(); ?>
                <input type="text" id="searchInput" name="search" value="<?= $request->getGet('search'); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " placeholder=" Search Keyword">
              </div>
              <button type="submit" class=" p-2.5 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
              </button>
            </form>
        </div>


        <!-- /.card-header -->
        <div class="card-body overflow-auto">
          <table id="example1" class="table table-striped">
            <thead>
              <tr>

                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>Instansi</th>
                <th>Berat (ton)</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($data as $data) : ?>
                <tr>
                  <td><?= $i;$i++; ?></td>
                  <td><?= $data["tanggal_masuk"]; ?></td>
                  <td><?= $data["instansi"]; ?></td>
                  <td><?= $data["total_berat"]; ?></td>
                  <td><?php echo $data["status"]; ?></td>
                  <td>
                    <!-- Call to action buttons -->
                    <ul class="flex flex-row items-center justify-center">
                      <li class="mx-1">

                        <span>
                          <button data-modal-target="kelola-modal" data-modal-toggle="kelola-modal" data-id="<?= $data["id"] ?>" data-total_berat="<?= $data["total_berat"] ?>" class="bg-green-500 btn-sm rounded-50" type="button" data-toggle="tooltip" data-placement="top" title="Update Status">
                            <i class=" fas fa-share-square"></i>
                          </button>
                        </span>

                      </li>

                      <?php if($data["status"] != "Terkelola"){?>
                      <li class="mx-1">
                        <button data-modal-target="edit-modal" data-modal-toggle="edit-modal" data-id="<?= $data["id"] ?>" data-tanggal_masuk="<?= $data["tanggal_masuk"] ?>" data-instansi="<?= $data["instansi"] ?>" data-total_berat="<?= $data["total_berat"] ?>" class="bg-yellow-500 btn-sm rounded-0" type="button" data-toggle="edit-modal" data-placement="top" title="Edit">
                          <i class="fa fa-edit"></i>
                        </button>
                      </li>
                      <?php }?>

                    </ul>

                  </td>
                </tr>


              <?php endforeach; ?>
            </tbody>

          </table>
          <div class="mt-2 float-left">
            <i>Total entries : <?= $pager->getTotal(); ?> Data</i>
          </div>

          <div class="mt-2 float-right">
            <?= $pager->links('default', 'pagination') ?>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->


  </section>
  <!-- /.content -->
</div>

<!-- Edit Data modal -->
<div id="kelola-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="kelola-modal">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-5 text-lg font-normal text-blue-900">Pembagian Kelola Data Sampah</h3>

        <p class="text-xs mb-4 ml-2 font-bold text-black">Total Berat : <span id="totalBeratKelola"></span> ton</p>
        <form class="space-y-6" method="POST">
          <div class="flex flex-row items-center">
            <p id="" class="block mb-2 text-sm font-bold text-blue-900 ml-2 w-2/3">Pengolahan Kompos</p>
            <input type="number" step="0.01" id="kompos" name="kompos" oninput="inputTerkelola()" min="0"  class="w-1/3 ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>
          <div class="flex flex-row items-center">
            <p id="" class="block mb-2 text-sm font-bold text-blue-900 ml-2 w-2/3">Makanan Maggot</p>
            <input type="number" step="0.01" id="maggot" name="maggot" oninput="inputTerkelola()" min="0"  class="w-1/3 ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>

          <p class="text-xs mb-4 mt-4 ml-2 font-bold text-red-500">Sisa Tidak Terkelola : <span id="sisaTidakKelola"></span></p>


            <button type="submit" class="disable-on-pembagian w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm  px-5 py-2.5 text-center mr-2">
              Update
            </button>
         


        </form>
      </div>
    </div>
  </div>
</div>
<div id="edit-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="edit-modal">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-5 text-lg font-normal text-blue-900">Edit Data</h3>
        <form class="space-y-6" method="POST">
          <div>
            <label for="tanggal_masuk" class="block mb-2 text-sm font-medium text-blue-900">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>
          <div>
            <label for="instansi" class="block mb-2 text-sm font-medium text-blue-900">Instansi</label>
            <input type="text" name="instansi" id="instansi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>
          <div>
            <label for="total_berat" class="block mb-2 text-sm font-medium text-blue-900">Total Berat</label>
            <input type="number" step="0.01" name="total_berat" id="total_berat" min="0" onkeyup="if(this.value<0)this.value=0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>

          <button type="submit" id="btnSimpanKelola" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- delete Data modal -->
<div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-modal">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="p-6 text-center">
        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Ingin Ubah Status Menjadi "Terkelola" ?</h3>
        <a id="delete-link" href="" data-modal-hide="delete-modal">
          <button type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
            Yes, I'm sure
          </button>
        </a>
        <button data-modal-hide="delete-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
      </div>
    </div>
  </div>
</div>


<!-- Tambah Data modal -->
<div id="tambah-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="tambah-modal">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>

      </button>


      <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-5 text-lg font-normal text-blue-900 ">Tambah Data</h3>
        <form class="space-y-6" action="<?= base_url('DataSampah/tambahDataSampah') ?>" method="POST">
          <div>
            <label for="tanggal_masuk" class="block mb-2 text-sm font-medium text-blue-900">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>
          <div>
            <label for="instansi" class="block mb-2 text-sm font-medium text-blue-900">Instansi</label>
            <input type="text" name="instansi" id="instansi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>
          <div>
            <label for="total_berat" class="block mb-2 text-sm font-medium text-blue-900">Total Berat</label>
            <input type="number" step="0.01" name="total_berat" id="total_berat" min="0" onkeyup="if(this.value<0)this.value=0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>


          <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah</button>

        </form>
      </div>
    </div>
  </div>
</div>





<script>
  const editButtons = document.querySelectorAll('[data-modal-toggle="edit-modal"]');
  const editForm = document.querySelector('#edit-modal form');
  const editTanggalMasukInput = editForm.querySelector('[name="tanggal_masuk"]');
  const editIntansi = editForm.querySelector('[name="instansi"]');
  const editTotalBeratInput = editForm.querySelector('[name="total_berat"]');
  const editStatusInput = editForm.querySelector('[name="status"]');


 
  const kelolaButtons = document.querySelectorAll('[data-modal-toggle="kelola-modal"]');
  const kelolaForm = document.querySelector('#kelola-modal form');

  var kelolaKomposInput = kelolaForm.querySelector('[name="kompos"]');
  var kelolaMaggotInput = kelolaForm.querySelector('[name="maggot"]');

  const totalBeratKelolaElement = document.getElementById("totalBeratKelola");
  const sisaTidakKelolaElement = document.getElementById("sisaTidakKelola");

  var beratDataModal = "";
  var id;
  var totalKompos = 0;
  var totalMaggot = 0;
  var totalSisaKelola = 0;


  const kelolaLink = document.getElementById('kelola-link');

  editButtons.forEach(button => {
    button.addEventListener('click', function() {
      const dataId = this.getAttribute('data-id');
      const dataTanggalMasuk = this.getAttribute('data-tanggal_masuk');
      const dataInstansi = this.getAttribute('data-instansi');
      const dataTotalBerat = this.getAttribute('data-total_berat');
      const dataStatus = this.getAttribute('data-status');
      const editUrl = `<?= base_url('DataSampah/editDataSampah/') ?>${dataId}`;

      editForm.action = editUrl;
      editTanggalMasukInput.value = dataTanggalMasuk;
      editIntansi.value = dataInstansi;
      editTotalBeratInput.value = dataTotalBerat;
      editStatusInput.value = dataStatus;
    });
  });


  kelolaButtons.forEach(button => {
    var komposData = document.getElementById("kompos");
    var maggotData = document.getElementById("maggot");

    button.addEventListener('click', function() {
      id = this.getAttribute('data-id');
        

      $.ajax({
        type: "POST",
        url: `<?= base_url('DataSampah/getDataKelola/') ?>${id}`,
        data: {
          sisa: totalSisaKelola
        },
        success: function(response) {

          kelolaKomposInput.value = response.berat_kompos;
          kelolaMaggotInput.value = response.berat_maggot;
          
        }
      })
     
    

      beratDataModal = parseFloat(this.getAttribute('data-total_berat'));
     


      totalBeratKelolaElement.textContent = beratDataModal.toFixed(2); // Set total berat

      const kelolaUrl = `<?= base_url('DataSampah/setKelola/') ?>${id}`;
      kelolaForm.action = kelolaUrl
    });
  });

  function inputTerkelola(){

    const btnSimpanKelola = document.querySelector(".disable-on-pembagian[type='submit']");
    const dataTotalBerat = beratDataModal;
    let kompos = kelolaKomposInput.value;
    let maggot = kelolaMaggotInput.value;
    kompos = parseFloat(kompos);
    maggot = parseFloat(maggot);



    let sisaKelola = dataTotalBerat - kompos - maggot;

    if(sisaKelola < 0){ 
      btnSimpanKelola.setAttribute("disabled", "disabled");
      sisaTidakKelolaElement.textContent = "cannot negative value"; // Set sisa tidak kelola

    }else{
      btnSimpanKelola.removeAttribute('disabled');
      sisaTidakKelolaElement.textContent = sisaKelola == 0 ? 0 : sisaKelola.toFixed(2); // Set sisa tidak kelola

    }



  }

  

</script>