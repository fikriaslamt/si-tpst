<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">



          <div class="card" id="" >
            <div class="card-header flex flex-row">
              <h1 class="m-0 text-bold">Riwayat Penjualan</h1>
            </div>

            <div class="card-header lg:flex lg:flex-row w-full ">

              <form class="lg:flex md:flex mb-2 mt-2 lg:m-0 " action="<?= base_url('Admin/transaksiProduk'); ?>" method="POST">
                <input class="rounded-lg "  name="start_date" type="date" required>
                <h2 class="my-auto mx-2 " >s/d</h2>
                <input class="rounded-lg"  name="end_date" type="date" required>
                <button type="submit" class="p-2.5 ml-2 mr-4 text-sm font-medium text-white bg-amber-400 rounded-lg border hover:bg-amber-600" >
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" > <path d="M6 8C6 7.44772 6.44772 7 7 7H17C17.5523 7 18 7.44772 18 8C18 8.55228 17.5523 9 17 9H7C6.44772 9 6 8.55228 6 8Z" fill="currentColor" /> <path d="M8 12C8 11.4477 8.44772 11 9 11H15C15.5523 11 16 11.4477 16 12C16 12.5523 15.5523 13 15 13H9C8.44772 13 8 12.5523 8 12Z" fill="currentColor" /> <path d="M11 15C10.4477 15 10 15.4477 10 16C10 16.5523 10.4477 17 11 17H13C13.5523 17 14 16.5523 14 16C14 15.4477 13.5523 15 13 15H11Z" fill="currentColor" /> </svg>
                </button>            
              </form>          
              <a href="<?=base_url('Export/exportRiwayatPenjualan')?>" class=" float-left lg:mb-0 mb-2 mr-4 sm:mx-auto sm:my-auto rounded px-2 py-2 overflow-hidden group bg-green-500 relative hover:bg-gradient-to-r hover:from-green-500 hover:to-green-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-green-400 transition-all ease-out duration-300">
                  <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                  <i class="fa fa-file-excel"></i>
                  <span class="relative"> Export</span>
              </a>

            </div>

                <!-- /.card-header -->
                <div class="card-body overflow-auto">
                  <table  class="table  table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Produk</th>
                      <th>Admin</th>
                      <th>Total</th>
                      <th>Nominal</th>        
                      <th>Bukti</th>        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($data as $index => $data) : ?>
                    <tr>
                      <td><?= $i;$i++;?></td>
                      <td><?= $data["tanggal"]; ?></td>
                      <td><?= $data["jenis_produk"]; ?></td>
                      <td><?= $data["nama"];?></td>
                      <td><?= $data["total_terjual"];?> pcs</td>
                      <td>Rp. <?= number_format($data["nominal_penjualan"],2,',','.'); ?></td>
                      <td>
                        <a href="#">
                          <img id="popup-image" src="<?=base_url('uploads/buktiPenjualan/'.$data["image_bukti"])?>" alt="Bukti" height="20" width="20" onclick="window.open(this.src)" >
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

