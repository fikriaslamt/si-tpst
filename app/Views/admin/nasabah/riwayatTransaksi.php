<div class="content-wrapper">
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
            <button id="setoranButton"  class="block text-white bg-blue-300   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2" type="button">
              SETORAN
            </button>
            <!--penarikan toggle -->
            <button id="penarikanButton" class="block ml-2 text-white bg-amber-300  focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2 " type="button">
              PEANARIKAN
            </button>
          </div>

          <div class="card" id="setoranTable" >
            <div class="card-header flex flex-row">
              <h1 class="m-0 text-bold">Riwayat Setoran</h1>
            </div>

                <!-- /.card-header -->
                <div class="card-body overflow-auto">
                  <table  class="table  table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>No Tabungan</th>
                      <th>Jenis Sampah</th>
                      <th>Berat Total (kg)</th>        
                      <th>Total Harga</th>        
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $index => $data) : ?>
                    <tr>
                      <td><?= $data["id"]; ?></td>
                      <td><?= $data["tanggal"]; ?></td>
                      <td class="w-1/6"><?= $data["nasabah_id"];?></td>
                      <td class="w-1/6"><?= $data["jenis"];?></td>
                      <td class="w-1/6"><?= $data["total_berat"]; echo "\t";echo $data["satuan"];?></td>
                      <td><?= $data["total_harga"]; ?></td>

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

          <div id="penarikanTable" class="card" >
          <div class="card-header flex flex-row">
            <h1 class="m-0">Riwayat Penarikan</h1>
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
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data2 as $index => $data) : ?>
                    <tr>
                      <td><?= $data["id"]; ?></td>
                      <td><?= $data["tanggal"]; ?></td>
                      <td class="w-1/6"><?= $data["nasabah_id"];?></td>
                      <td class="w-1/6"><?= $data["total_penarikan"];?></td>

                    </tr>
                    
                 
                  <?php endforeach; ?>
                  </tbody>
                 
                </table>

                <div class="mt-2 float-left">
                  <i>Total entries :  <?= $pager2->getTotal(); ?> Data</i>
                </div> 

                <div class="mt-2 float-right">
                  <?= $pager2->links('default','pagination')?>
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




    // Show setoran table and hide penarikan table on setoran button click
    $("#setoranButton").click(function() {
      $("#setoranTable").show();
      $("#penarikanTable").hide();
      $(this).addClass("focus:bg-blue-700");
      $("#penarikanButton").removeClass("focus:bg-amber-700");
    });

    // Hide setoran table and show penarikan table on penarikan button click
    $("#penarikanButton").click(function() {
      $("#setoranTable").hide();
      $("#penarikanTable").show();
      $(this).addClass("focus:bg-amber-700");
      $("#setoranButton").removeClass("focus:bg-blue-700 bg-blue-700 ring-4 ring-blue-300 4");
    });

    $("#setoranButton").addClass("bg-blue-700 ring-4 ring-blue-300");
    $("#setoranTable").show();
    $("#penarikanTable").hide();
  
  });
</script>