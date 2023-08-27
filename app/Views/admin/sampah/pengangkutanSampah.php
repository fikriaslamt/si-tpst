

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
          
     
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="flex justify-center connectedSortable">


      <div class="card px-5 lg:w-1/2 sm:w-full">
        <div class="card-header">
          <h3 class="card-title text-center"> Grafik Data Total Pengangkutan Sampah per Bulan</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <select id="yearSelect" class="float-right rounded-lg lg:w-1/10 sm:lg-2/5 pl-2">
              <?php  foreach($year as $index => $y):?>
                  <option value="<?= $index;?>" selected><?= $index;?></option>
                <?php endforeach;?>
          </select>
          <div>
            <canvas class="h-max" id="barChart"></canvas>
          </div>
        </div>
        
      </div>

    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="card justify-center">
          <div class="card-header">
            <!-- Tambah Data toggle -->
            <button data-modal-target="tambah-modal" data-modal-toggle="tambah-modal" class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
              Tambah Data Pengangkutan
            </button>
          </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped text-center mb-2">
                  <thead>
                  <tr>
                    <th class="w-1/6">No</th>              
                    <th>Tanggal</th>        
                    <th class="w-1/6">Aksi</th>                         
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($data as $data) : ?>
                    <tr>
                      <td class="text-center"><?= $i;$i++;?></td>
                      <td><?= $data["tanggal"] ?></td>
                      <td> 
                        <ul class="flex flex-row items-center justify-center">  
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
                          </ul></td>
                    </tr>
                    <?php endforeach;?>
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


<!-- Tambah Data modal -->
<div id="tambah-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="tambah-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
       
            </button>
       

            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-5 text-lg font-normal text-blue-900 ">Tambah Data</h3>
                <form class="space-y-6" action="<?= base_url('PengangkutanSampah/tambahPengangkutanSampah')?>" method="POST">
                    <div>
                        <label for="tanggal" class="block mb-2 text-sm font-medium text-blue-900 ">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                    </div>
          
                    <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 

<div id="delete-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this?</h3>
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

    chartData = <?= json_encode($chart) ?>;
    lastYear = <?= json_encode($lastYear)?>;
    yearSelect = document.getElementById('yearSelect');

    const ctx = document.getElementById('barChart');

    const chart =  new Chart(ctx, {
      type: 'bar',
      data: {
        labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                  'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [ {
            label               : 'Total Pengangkutan',
            backgroundColor     : '#00c0ef',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : []
          }]
      },
      options: {

        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    function updateChart (selectedYear){
      const selectedChart = chartData[selectedYear] || {}; // Use empty object if no Chart available
    
      
      // Fill in missing months with zero values
      for (let i = 1; i <= 12; i++) {
          if (!selectedChart[i]) {
              selectedChart[i] = 0;
          }
      }
      
      // Update the chart Chart for each dataset
      chart.data.datasets[0].data = Object.values(selectedChart);
      
      // Update the chart
      chart.update();
    }

  yearSelect.addEventListener('change', function () {
      const selectedYear = yearSelect.value;

      updateChart(selectedYear);
  });

  document.addEventListener('DOMContentLoaded',function () {
      const selectedYear = lastYear;
      updateChart(selectedYear);
    });
</script>



<script>
    const deleteButtons = document.querySelectorAll('[data-modal-toggle="delete-modal"]');
    const deleteLink = document.getElementById('delete-link');
    

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const dataId = this.getAttribute('data-id');
            const deleteUrl = `<?= base_url('PengangkutanSampah/deleteDataPengangkutan/') ?>${dataId}`;
            deleteLink.href = deleteUrl;
        });
    });
</script>
