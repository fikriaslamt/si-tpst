

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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabungan Nasabah</h1>
          </div><!-- /.col -->
     
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-center">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <p>TIMBULAN SAMPAH</p>
                <h3>19<sup style="font-size: 20px">(ton / bulan)</sup></h3>
              </div>
       
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>77.89<sup style="font-size: 20px">%</sup></h3>

                <p>SAMPAH TERKELOLA</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>22.11<sup style="font-size: 20px">%</sup></h3>


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
          <div class="card-header flex flex-row">
            <!-- setoran toggle -->
            <button data-modal-target="setoran-modal" data-modal-toggle="setoran-modal" class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-large rounded-lg text-sm px-5 py-2.5 text-center w-1/2" type="button">
              Tambah Setoran
            </button>
            <!--penarikan toggle -->
            <button data-modal-target="tambah-modal" data-modal-toggle="tambah-modal" class="block ml-2 text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-large rounded-lg text-sm px-5 py-2.5 text-center w-1/2" type="button">
              Tambah Penarikan
            </button>
          </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                  
                    <th>Saldo</th>        
                    <th>Penarikan</th>        
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data as $index => $data) : ?>
                    <tr>
                      <td><?= $data["nasabah_id"]; ?></td>
                      <td><?= $data["nama"];?></td>
                     
                      <td><?= $data["saldo"]; ?></td>
                      <td><?= $data["penarikan"]; ?></td>

                      <td>
                          <!-- Call to action buttons -->
                          <ul class="flex flex-row items-center justify-center">  
                              <li class="mx-1">
                                  <button data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="bg-yellow-500 btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                              </li>
                              <li class="mx-1">
                                  <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="bg-red-500 btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                              </li>
                          </ul>

                          <!-- Edit Data modal -->
                      

                          <!-- delete Data modal -->
               
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


<!-- Setoran Data modal -->

<div id="setoran-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="setoran-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
       
            </button>
       

            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-5 text-lg font-normal text-blue-900 ">Tambah Data</h3>
                <form name="add_more" class="space-y-6" action="<?= base_url('Tabungan/tambahSetoran')?>" method="POST">
                    <div>
                        <label for="nomor" class="block mb-2 text-sm font-medium text-blue-900">Nomor Tabungan</label>
                        <input type="number" name="nomor" id="nomor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                    </div>

                    <table id="dynamic_field">
                            <div class="flex flex-row items-center">
                                <br> <h4 class ="block  text-md font-bold text-black-900">JENIS SAMPAH</h4>
                                <button type="button" name="add" id="add" class=" ml-2 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add</button>
                            </div>
                            <tr>  

                                <div class="flex flex-row items-center">
                                <td>
                                    <div class="flex flex-col">
                                        <div class="flex flex-row items-center">

                                        
                                            <select id="input" name="addmore[][input]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                <?php foreach ($dataSampah as $dataSampah) : ?>
                                                    <option value="<?= $dataSampah["jenis"]; ?>"><?= $dataSampah["jenis"]; ?></option>
                                                <?php endforeach; ?>  
                                                  
                                            </select>                               
                              
                                            <input type="number" id="sampah" name="add[][sampah]"  class=" ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >   
                                            
                                            <p id="satuan" class="block mb-2 text-sm font-bold text-blue-900 ml-2">Jumlah</p>
                                         
                                            
                                        </div>
                                    </div>
                                </td>  
                                </div>

                            </tr>  
                           
               
               
                    </table>

                   



                 
                   
               
                    <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 

<script type="text/javascript">



var dataSampah = <?php echo json_encode($sampah); ?>;
$(document).ready(function(){      
  var counter = 1;  // Use a different variable name for the loop counter
   
  $('#add').click(function(){  
        counter++;  // Increment the counter
        var options = '';
        for (var i = 0; i < dataSampah.length; i++) {
          options += '<option>' + dataSampah[i].jenis + '</option>';
          
        }
        // $('#satuan').append(dataSampah[i].satuan);
        $('#dynamic_field').append('<tr id="row'+counter+'" class="dynamic-added"><td> <div class="mt-2 flex flex-col"><div class="flex flex-row items-center"><select id="input" name="addmore[][input]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">' + options + '</select><input type="number" name="add[][sampah]" id="sampah" class=" ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" ><p class="block mb-2 text-sm font-bold text-blue-900 ml-2">Jumlah</p></div></div></td><td><button type="button" name="remove" id="'+counter+'" class="btn btn-danger btn_remove bg-red-700 hover:bg-red-500 ml-2">X</button></td></tr>');
    });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
    });  
</script>



