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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $timbulan;?> ton</h3>

                <p>TIMBULAN SAMPAH</p>
              </div>
       
              <a hhref="<?=base_url('Admin/dataSampah')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $totalTransaksi;?></h3>

                <p>TRANSAKSI NASABAH</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url('Admin/riwayatTransaksi')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $totalKonten;?></h3>


                <p>KONTEN PUBLIKASI</p>
              </div>
              <div class="icon">
              <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=base_url('Admin/konten')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $totalNasabah;?></h3>

                <p>NASABAH</p>
              </div>
              <div class="icon">
              <i class="ion ion-person-add"></i>
                
              </div>
              <a href="<?=base_url('Admin/dataNasabah')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-clock mr-1"></i>
                  Riwayat Transaksi
                </h3>
              
              </div><!-- /.card-header -->
              <div class="card-body overflow-auto">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="text-center">
                  <tr >
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jenis Transaksi</th>
                    <th>Jumlah Transaksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach ($riwayat as $data) : ?>
                  <tr>
                    <td class="text-center"><?= $i;$i++;?></td>
                    <td><?= $data["tanggal"] ?></td>
                    <td><?= $data["jenis_transaksi"] ?></td>
                    <td>Rp. <?= $data["jumlah"] ?></td>
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
            </div>
         
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total Transaksi Berdasarkan Jenis Transaksi</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <select id="yearSelect" class="float-right rounded-lg lg:w-1/5 sm:lg-2/5 pl-2">
                  <?php  foreach($year as $index => $y):?>
                    <option value="<?= $index;?>" selected><?= $index;?></option>
                  <?php endforeach;?>
                </select>
                <div>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
             
            </div>
      
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Timbulan Sampah Berdasarkan Status Pengelolaan </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <canvas id="pieChart"></canvas>
              </div>
             
            </div>
          
          </section>
    
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script>
  const ctx = document.getElementById('barChart');  
  const ctx2 = document.getElementById('pieChart');  

  setoranChart = <?= json_encode($setoranChart) ?>;
  penarikanChart = <?= json_encode($penarikanChart) ?>;
  limbahChart = <?= json_encode($limbahChart) ?>;
  lastYear = <?= json_encode($lastYear)?>;
  terkelola = <?= json_encode($Terkelola)?>;
  tidakTerkelola = <?= json_encode($tidakTerkelola)?>;
  yearSelect = document.getElementById('yearSelect');


  const chart =  new Chart(ctx, {
    type: 'bar',
    data: {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [ {
          label               : 'Setoran',
          backgroundColor     : '#00c0ef',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : []
        },
        {
          label               : 'Penarikan',
          backgroundColor     : '#f56954',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : []
        },
        {
          label               : 'Limbah',
          backgroundColor     : '#00a65a',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : []
        },]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const chart2 =  new Chart(ctx2, {
    type: 'pie',
    data:{      
      labels: [
          'Terkelola',
          'Tidak Terkelola',
      ],
      datasets: [
        {
          data: [terkelola,tidakTerkelola],
          backgroundColor : [ '#00c0ef','#f56954' ],
        }
      ]},
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        }
      }
    }
  });



  function updateChart (selectedYear){
    const selectedSetoranChart = setoranChart[selectedYear] || {}; // Use empty object if no Chart available
    const selectedPenarikanChart = penarikanChart[selectedYear] || {};
    const selectedLimbahChart = limbahChart[selectedYear] || {};
    
    // Fill in missing months with zero values
    for (let i = 1; i <= 12; i++) {
        if (!selectedSetoranChart[i]) {
            selectedSetoranChart[i] = 0;
        }
        if (!selectedPenarikanChart[i]) {
            selectedPenarikanChart[i] = 0;
        }
        if (!selectedLimbahChart[i]) {
            selectedLimbahChart[i] = 0;
        }
    }
    
    // Update the chart Chart for each dataset
    chart.data.datasets[0].data = Object.values(selectedSetoranChart);
    chart.data.datasets[1].data = Object.values(selectedPenarikanChart);
    chart.data.datasets[2].data = Object.values(selectedLimbahChart);
    
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
