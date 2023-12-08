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
       
              <a href="<?=base_url('Admin/dataSampah')?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
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
              <a href="<?=base_url('Admin/riwayatTransaksi')?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
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
              <a href="<?=base_url('Admin/konten')?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
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
              <a href="<?=base_url('Admin/dataNasabah')?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-5 connectedSortable">

      
                      


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grafik Pengelolaan Sampah Masuk</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <select id="yearSelectSampah" class="float-right rounded-lg lg:w-1/5 sm:lg-2/5 pl-2">
                  <?php  foreach($yearSampah as $index => $y):?>
                    <option value="<?= $index;?>" selected><?= $index;?></option>
                  <?php endforeach;?>
                </select>
                <div>
                  <canvas id="lineChart"></canvas>
                </div>
              
              </div>
            
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grafik Kumulatif Pengelolaan Sampah Masuk</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <select id="kumulatifyearSelectSampah" class="float-right rounded-lg lg:w-1/5 sm:lg-2/5 pl-2">
                  <?php  foreach($kumulatifyearSampah as $index => $y):?>
                    <option value="<?= $index;?>" selected><?= $index;?></option>
                  <?php endforeach;?>
                </select>
                <div>
                  <canvas id="lineChart2"></canvas>
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

    
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script>
  const ctx2 = document.getElementById('pieChart');
  const ctx3 = document.getElementById('lineChart');
  const ctx4 = document.getElementById('lineChart2');

  timbulan = <?= json_encode($timbulan) ?>;



  terkelola = <?= json_encode($Terkelola)?>;
  tidakTerkelola = <?= json_encode($tidakTerkelola)?>;

  sampahMasukChart = <?= json_encode($sampahMasukChart) ?>;
  komposChart = <?= json_encode($komposChart) ?>;
  maggotChart = <?= json_encode($maggotChart) ?>;
  tidakTerkelolaChart = <?= json_encode($tidakTerkelolaChart) ?>;
  lastYearSampah = <?= json_encode($lastYearSampah)?>;
  
  kumulatifsampahMasukChart = <?= json_encode($kumulatifsampahMasukChart) ?>;
  kumulatifkomposChart = <?= json_encode($kumulatifkomposChart) ?>;
  kumulatifmaggotChart = <?= json_encode($kumulatifmaggotChart) ?>;
  kumulatiftidakTerkelolaChart = <?= json_encode($kumulatiftidakTerkelolaChart) ?>;
  kumulatiflastYearSampah = <?= json_encode($kumulatiflastYearSampah)?>;

  yearSelectSampah = document.getElementById('yearSelectSampah');
  kumulatifyearSelectSampah = document.getElementById('kumulatifyearSelectSampah');




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
        title: {
                display: true,
                text: 'Total Timbulan : ' + timbulan + ' ton',
                color: '#000000',
                position: 'bottom',
                align : 'end',
                font: {
                	family: 'Arial',
                	size: 12,
                }
            },
        legend: {
          position: 'top',
        }
      }
    }
  });


  const chart3 =  new Chart(ctx3, {
    type: 'line',
    data: {
      options : [],
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul',
                'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
        {
           
          label               : 'Sampah Masuk',
          backgroundColor     : 'rgba(54, 162, 235, 0.2)',
          borderColor         : 'rgb(54, 162, 235)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension             : 0.4,
          fill                : true,
          data                : []
        },

        {
          label               : 'Kompos',
          backgroundColor     : 'rgba(255, 205, 86, 0.2)',
          borderColor         : 'rgb(255, 205, 86)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },
        {
          label               : 'Maggot',
          backgroundColor     : 'rgba(75, 192, 192, 0.2)',
          borderColor         : 'rgb(75, 192, 192)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },

        {
          label               : 'Sampah Tidak Terkelola',
          backgroundColor     : 'rgba(255, 99, 132, 0.2)',
          borderColor         : 'rgb(255, 99, 132)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4, 
          fill                : true,
          data                : []
        },
       ]
    },
    options: {
      plugins: {
            title: {
                display: true,
                text: '( Ton )',
                color: '#000000',
                position: 'left',
                font: {
                	family: 'Arial',
                	size: 12,
                    weight: 'bold',
                }
            }
        },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const chart4 =  new Chart(ctx4, {
    type: 'line',
    data: {
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul',
                'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
        {
           
          label               : 'Sampah Masuk',
          backgroundColor     : 'rgba(54, 162, 235, 0.2)',
          borderColor         : 'rgb(54, 162, 235)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },

        {
          label               : 'Kompos',
          backgroundColor     : 'rgba(255, 205, 86, 0.2)',
          borderColor         : 'rgb(255, 205, 86)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },
        {
          label               : 'Maggot',
          backgroundColor     : 'rgba(75, 192, 192, 0.2)',
          borderColor         : 'rgb(75, 192, 192)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4,
          fill                : true,
          data                : []
        },

        {
          label               : 'Sampah Tidak Terkelola',
          backgroundColor     : 'rgba(255, 99, 132, 0.2)',
          borderColor         : 'rgb(255, 99, 132)',
          pointRadius         : 2,
          borderWidth         : 2,
          tension: 0.4, 
          fill                : true,
          data                : []
        },
       ]
    },
    options: {
      plugins: {
            title: {
                display: true,
                text: '( Ton )',
                color: '#000000',
                position: 'left',
                font: {
                	family: 'Arial',
                	size: 12,
                    weight: 'bold',
                }
            }
        },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });





  function updateChartSampah (selectedYear){
    const selectedSampahMasukChart = sampahMasukChart[selectedYear] || {}; // Use empty object if no Chart available
    const selectedKomposChart = komposChart[selectedYear] || {};
    const selectedMaggotChart = maggotChart[selectedYear] || {};
    const selectedTidakTerkelolaChart = tidakTerkelolaChart[selectedYear] || {};
    
    // Fill in missing months with zero values
    for (let i = 1; i <= 12; i++) {
        if (!selectedSampahMasukChart[i]) {
            selectedSampahMasukChart[i] = 0;
        }
        if (!selectedKomposChart[i]) {
            selectedKomposChart[i] = 0;
        }
        if (!selectedMaggotChart[i]) {
            selectedMaggotChart[i] = 0;
        }
    
        if (!selectedTidakTerkelolaChart[i]) {
            selectedTidakTerkelolaChart[i] = 0;
        }
    }
    
    // Update the chart Chart for each dataset
    chart3.data.datasets[0].data = Object.values(selectedSampahMasukChart);
    chart3.data.datasets[1].data = Object.values(selectedKomposChart);
    chart3.data.datasets[2].data = Object.values(selectedMaggotChart);
    chart3.data.datasets[3].data = Object.values(selectedTidakTerkelolaChart);
    
    // Update the chart
    chart3.update();
  };

  function updateChartSampahKumulatif (selectedYear){
    const selectedSampahMasukChart = kumulatifsampahMasukChart[selectedYear] || {}; // Use empty object if no Chart available
    const selectedKomposChart = kumulatifkomposChart[selectedYear] || {};
    const selectedMaggotChart = kumulatifmaggotChart[selectedYear] || {};
    const selectedTidakTerkelolaChart = kumulatiftidakTerkelolaChart[selectedYear] || {};
    
    // Fill in missing months with zero values
    for (let i = 1; i <= 12; i++) {
        if (!selectedSampahMasukChart[i]) {
            selectedSampahMasukChart[i] = 0;
        }
        if (!selectedKomposChart[i]) {
            selectedKomposChart[i] = 0;
        }
        if (!selectedMaggotChart[i]) {
            selectedMaggotChart[i] = 0;
        }
    
        if (!selectedTidakTerkelolaChart[i]) {
            selectedTidakTerkelolaChart[i] = 0;
        }
    }
    
    // Update the chart Chart for each dataset
    chart4.data.datasets[0].data = Object.values(selectedSampahMasukChart);
    chart4.data.datasets[1].data = Object.values(selectedKomposChart);
    chart4.data.datasets[2].data = Object.values(selectedMaggotChart);
    chart4.data.datasets[3].data = Object.values(selectedTidakTerkelolaChart);
    
    // Update the chart
    chart4.update();
  };




  yearSelectSampah.addEventListener('change', function () {
      const selectedYear = yearSelectSampah.value;

      updateChartSampah(selectedYear);
  });

  kumulatifyearSelectSampah.addEventListener('change', function () {
      const selectedYear = kumulatifyearSelectSampah.value;

      updateChartSampahKumulatif(selectedYear);
  });

  document.addEventListener('DOMContentLoaded',function () {
    
      const selectedYearSampah = lastYearSampah;
      const selectedYearSampahKumulatif = kumulatiflastYearSampah;

      updateChartSampah(selectedYearSampah);
      updateChartSampahKumulatif(selectedYearSampahKumulatif);


    });
</script>
