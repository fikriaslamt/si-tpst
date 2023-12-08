<div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Total Transaksi</span>
                <span class="info-box-number text-l"><?= $totalTransaksi;?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-handshake"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Setoran</span>
                <span class="info-box-number text-l"><?= $setoran;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-handshake-slash"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Penarikan</span>
                <span class="info-box-number"><?= $penarikan;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
       
        <!-- /.row -->
        <!-- Main row -->
          <div class=" flex flex-row w-full mb-3 mt-3">
               <!-- setoran toggle -->
              <a href="<?=base_url("Admin/riwayatSetoran")?>" id="setoranButton" class="block text-white bg-blue-300  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2">
                <button type="button">SETORAN</button>
              </a>
              <!--penarikan toggle -->
              <a href="<?=base_url("Admin/riwayatPenarikan")?>" id="penarikanButton" class="block ml-2 text-white bg-amber-300  focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2 ">
                <button type="button">PENARIKAN</button>
              </a>

          </div>


          <div id="penarikanTable" class="card" >
            <div class="card-header lg:flex lg:flex-row w-full ">

              <h1 class="m-auto text-bold">Riwayat Penarikan</h1>
              <form class="lg:flex md:flex mb-2 mt-2 lg:m-0" action="<?= base_url('Admin/riwayatPenarikan'); ?>" method="POST">
                <input class="rounded-lg "  name="start_date" type="date" required>
                <h2 class="my-auto mx-2 " >s/d</h2>
                <input class="rounded-lg "  name="end_date" type="date" required>
                <button type="submit" class="p-2.5 ml-2 mr-4 text-sm font-medium text-white bg-amber-400 rounded-lg border hover:bg-amber-600" >
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" > <path d="M6 8C6 7.44772 6.44772 7 7 7H17C17.5523 7 18 7.44772 18 8C18 8.55228 17.5523 9 17 9H7C6.44772 9 6 8.55228 6 8Z" fill="currentColor" /> <path d="M8 12C8 11.4477 8.44772 11 9 11H15C15.5523 11 16 11.4477 16 12C16 12.5523 15.5523 13 15 13H9C8.44772 13 8 12.5523 8 12Z" fill="currentColor" /> <path d="M11 15C10.4477 15 10 15.4477 10 16C10 16.5523 10.4477 17 11 17H13C13.5523 17 14 16.5523 14 16C14 15.4477 13.5523 15 13 15H11Z" fill="currentColor" /> </svg>
                </button>            
              </form>          
              <a href="<?=base_url('Export/exportRiwayatPenarikan')?>" class=" float-left lg:mb-0 mb-2 mr-4 sm:mx-auto sm:my-auto rounded px-2 py-2 overflow-hidden group bg-green-500 relative hover:bg-gradient-to-r hover:from-green-500 hover:to-green-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-green-400 transition-all ease-out duration-300">
                  <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                  <i class="fa fa-file-excel"></i>
                  <span class="relative"> Export</span>
                </a>
              <form class="flex items-center lg:mt-0 mt-2 lg:w-1/4 md:w-1/3  float-right" id="searchForm" action="" method="get">
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
                <table  class="table table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Tabungan</th>
                    <th>Total Penarikan</th>             
                    <th>Admin</th>             
                    <th>Bukti</th>             
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach ($data2 as $index => $data) : ?>
                    <tr>
                      <td><?= $i;$i++;?></td>
                      <td><?= $data["tanggal"]; ?></td>
                      <td class="w-1/6"><?= $data["no_tabungan"];?></td>
                      <td class="w-1/6">Rp. <?= number_format($data["total_penarikan"],2,',','.');?></td>
                      <td class="w-1/6"><?= $data["nama"];?></td>
                      <td>
                        <a href="#">
                          <img id="popup-image" src="<?=base_url('uploads/buktiPenarikan/'.$data["image_bukti"])?>" alt="Bukti" height="20" width="20" onclick="window.open(this.src)" >
                        </a>
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

  <script>
  // jQuery code to handle button click events
  $(document).ready(function() {


    $("#penarikanButton").addClass("bg-amber-700 ring-4 ring-amber-300");

  
  });
</script>