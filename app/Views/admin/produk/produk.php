

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
    <!-- /.content-header -->
    <section class="lg:grid md:grid sm:row grid-cols-4 justify-center">
      <div class="px-5 lg:col-span-2 sm:col-span-2">
        <div class="">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Stok Terjual</span>
              <span class="info-box-number text-l"><?= $total;?> pcs</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
       
      </div>
      <div class="px-5 lg:col-span-2 sm:col-span-2">
        <div class="">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Total Saldo</span>
              <span class="info-box-number text-l">Rp. <?= $nominal;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
       
      </div>

     
    </section>
    
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
          <div class="card-header flex flex-row">
            <!-- setoran toggle -->
            <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-large rounded-lg text-sm px-5 py-2.5 text-center " type="button">
              Tambah Produk
            </button>
            <!--penarikan toggle -->
           
          </div>

              <!-- /.card-header -->
              <div class="card-body overflow-auto">
                <table id="example1" class="table table-striped text-center">
                  <thead >
                  <tr>
                    <th>No</th>
                    <th>Tanggal Update</th>
                    <th>Produk</th>        
                    <th>Harga</th>        
                    <th>Stok</th>        
                    <th>Terjual</th>               
                    <th>Aksi</th>        
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach ($data as $data) : ?>
                    <tr>
                      <td><?= $i;$i++;?></td>
                      <td><?= $data["tanggal_update"]; ?></td>
                      <td><?= $data["jenis_produk"]; ?></td>
                      <td>Rp. <?= $data["harga"]; ?></td>
                      <td><?= $data["total_stok"]; ?> pcs</td>
                      <td><?= $data["total_penjualan"]; ?> pcs</td>
                      <td>
                        <!-- Call to action buttons -->
                        <ul class="flex flex-row items-center justify-center">
                          <li class="mx-1">

                            <span>
                              <button data-modal-target="kelola-modal" data-modal-toggle="kelola-modal" data-id="<?= $data["id"] ?>" data-total_stok="<?= $data["total_stok"]  ?>" data-harga="<?= $data["harga"]  ?>" class="bg-green-500 btn-sm rounded-50" type="button" data-toggle="tooltip" data-placement="top" title="Update Penjualan">
                                <i class=" fas fa-share-square"></i>
                              </button>
                            </span>

                          </li>


                          <li class="mx-1">
                            <button data-modal-target="edit-modal" data-modal-toggle="edit-modal" data-id="<?= $data["id"] ?>" data-stok="<?= $data["total_stok"] ?>" data-harga="<?= $data["harga"] ?>"   class="bg-yellow-500 btn-sm rounded-0" type="button" data-toggle="edit-modal" data-placement="top" title="Edit">
                              <i class="fa fa-edit"></i>
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

    <div id="add-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="add-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          
                </button>
          

                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-5 text-lg font-normal text-blue-900 ">Tambah Produk</h3>
                    <form name="add_more" class="space-y-6" action="<?= base_url('Produk/tambahProduk')?>" method="POST">
                        

                        <div class="grid grid-col-2 items-center">
                      
                              <div>
                                <label for="produk" class="block mb-2 text-sm font-medium text-blue-900 ">Jenis Produk</label>
                                <select id="produk" name="produk" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                  <option selected>Pilih Jenis Produk</option>
                                  <option value="Kompos">Kompos</option>
                                  <option value="Maggot">Maggot</option>
                                </select>
                              </div>
                            
                              <div>
                                <label for="stok" class="block mb-2 text-sm font-medium text-blue-900">Stok</label>
                                <input type="number" name="stok" id="stok" min="0" onkeyup="if(this.value<0)this.value=0" class="bg-gray-50 mb-6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                              </div>

                              <div>
                                <label for="harga" class="block mb-2 text-sm font-medium text-blue-900">Harga</label>
                                <input type="number" name="harga" id="harga" min="0" onkeyup="if(this.value<0)this.value=0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                              </div>
                  
                      
                        </div>
      
                        <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div> 

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
            <h3 class="mb-5 text-lg font-normal text-blue-900">Tambah Penjualan</h3>

            <p class="text-xs mb-4 ml-2 font-bold text-black">Stok Tersedia : <span id="totalStok"></span> pcs</p>
            <form class="space-y-6" method="POST">
              
              <div class="flex flex-row items-center">
                <p id="" class="block mb-2 text-sm font-bold text-blue-900 ml-2 w-2/3">Stok Terjual </p>
                <input type="number" step="0.01" id="stokTerjual" name="stokTerjual" oninput="inputStok()"  min="0"  class="w-1/3  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
              </div>
          
              <p class="text-xs mb-4 mt-4 ml-2 font-bold text-emerald-700">Total Harga : Rp. <span id="totalNominal"></span></p>


                <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm  px-5 py-2.5 text-center mr-2">
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
                <label for="stok" class="block mb-2 text-sm font-medium text-blue-900">Stok</label>
                <input type="number" step="0.01" name="stok" id="stok" min="0" onkeyup="if(this.value<0)this.value=0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
              </div>
              <div>
                <label for="harga" class="block mb-2 text-sm font-medium text-blue-900">Harga</label>
                <input type="number" step="0.01" name="harga" id="harga" min="0" onkeyup="if(this.value<0)this.value=0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
              </div>

              <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>


<!-- Setoran Data modal -->





<script>

  const editButtons = document.querySelectorAll('[data-modal-toggle="edit-modal"]');
  const editForm = document.querySelector('#edit-modal form');
  const editStok = editForm.querySelector('[name="stok"]');
  const editHarga = editForm.querySelector('[name="harga"]');

  
  editButtons.forEach(button => {
      button.addEventListener('click', function () {
          const dataId = this.getAttribute('data-id');
          const dataStok = this.getAttribute('data-stok');
          const dataHarga = this.getAttribute('data-harga');
          const editUrl = `<?= base_url('Produk/editProduk/') ?>${dataId}`;

          editForm.action = editUrl;
          editStok.value = dataStok;
          editHarga.value = dataHarga;
      });
  });



  const kelolaButtons = document.querySelectorAll('[data-modal-toggle="kelola-modal"]');
  const kelolaForm = document.querySelector('#kelola-modal form');
  const terjual = kelolaForm.querySelector('[name="stokTerjual"]');
  
  const totalStokElement = document.getElementById("totalStok");
  const NominalElement = document.getElementById("totalNominal");

  var id;
  var totalStok = 0;
  var harga = 0;
  var totalNominal = 0;

 
  kelolaButtons.forEach(button => {
    var stokData = document.getElementById("stokTerjual");


    button.addEventListener('click', function() {
      
      var dataTotalStok= this.getAttribute('data-total_stok');
      var dataHarga = this.getAttribute('data-harga');

      totalStok = dataTotalStok;
      harga = dataHarga;
      stokData.max = dataTotalStok;
      
      id = this.getAttribute('data-id');
      
      totalStokElement.textContent = dataTotalStok;

      const kelolaUrl = `<?= base_url('Produk/updateProduk/') ?>${id}`;
      kelolaForm.action = kelolaUrl
    });
  });

  function inputStok(){
    const dataTotalStok = totalStok;
    let stokTerjual = terjual.value;
    let totalNominal = stokTerjual * harga;
 
    NominalElement.textContent = totalNominal; // Set sisa tidak kelola

  }



</script>