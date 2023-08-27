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

      <!-- /.row -->
      <!-- Main row -->
      <div class="card">
        <div class="card-header flex flex-row">
          <!-- setoran toggle -->
          <button id="setoranButton" class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-large rounded-lg text-sm px-5 py-2.5 text-center w-1/2" type="button">
            Tambah Setoran
          </button>
          <!--penarikan toggle -->
          <button id="penarikanButton" class="block ml-2 text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-large rounded-lg text-sm px-5 py-2.5 text-center w-1/2" type="button">
            Tambah Penarikan
          </button>
        </div>

        <div id="setoranForm" class=" flex items-center justify-center border-2 rounded-md my-3 hidden">

          <div class="place-content-center lg:w-1/2 md:w-3/5 sm:w-full p-4 ">
            <button id="setoranExitButton" type="button" class="float-right text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5" id="closeSetoranForm">
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
            <div class="px-6 py-6 lg:px-8">
              <h3 class="mb-5 text-lg font-normal text-blue-900 ">Tambah Data</h3>
              <form name="add_more" class="space-y-6" action="<?= base_url('Tabungan/tambahSetoran') ?>" method="POST">
                <div>
                  <label for="nomor" class="block mb-2 text-sm font-medium text-blue-900">Nomor Tabungan <span>
                      <div id="searchResult"></div>
                    </span></label>
                  <input type="number" name="nomor" id="nomor" onkeyup="searchDatabase()" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                </div>

                <table id="dynamic_field">
                  <div class="flex flex-row items-center">
                    <br>
                    <h4 class="block  text-md font-bold text-black-900">JENIS SAMPAH</h4>
                    <button type="button" name="add" id="add" class=" ml-2 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add</button>
                  </div>
                  <tr>

                    <div class="flex flex-row items-center">
                      <td>
                        <div class="flex flex-col">
                          <div class="flex flex-row items-center">


                            <select id="input" name="addmore[][input]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                              <?php foreach ($dataSampah as $dataSampah) : ?>
                                <option value="<?= $dataSampah["id"]; ?>"><?= $dataSampah["jenis"]; ?></option>
                              <?php endforeach; ?>

                            </select>

                            <input type="number" step="0.01" id="sampah" name="add[][sampah]" min="0" onkeyup="if(this.value<0)this.value=0" class=" ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>

                            <p id="satuan" class="block mb-2 text-sm font-bold text-blue-900 ml-2">Jumlah</p>


                          </div>
                        </div>
                      </td>
                    </div>
                  </tr>

                </table>

                <div class="flex items-center">
                  <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 " required>
                  <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900">saya bertanggung jawab atas <a class="text-blue-600  hover:underline">tindakan yang saya lakukan</a>.</label>
                </div>

                <button type="submit" class="disable-on-no-tabungan w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah</button>

              </form>
            </div>
          </div>
        </div>

        <div id="penarikanForm" class=" flex items-center justify-center border-2 rounded-md my-3 hidden">

          <div class="place-content-center lg:w-1/2 md:w-3/5 sm:w-full p-4">
            <button id="penarikanExitButton" type="button" class="float-right text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5" id="closeSetoranForm">
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
            <div class="px-6 py-6 lg:px-8">
              <h3 class="mb-5 text-lg font-normal text-blue-900 ">Tarik Saldo</h3>
              <form name="add_more" class="space-y-6" action="<?= base_url('Tabungan/tambahPenarikan') ?>" method="POST">
                <div>
                  <label for="nomor2" class="block mb-2 text-sm font-medium text-blue-900">Nomor Tabungan </label>
                  <input type="number" name="nomor" id="nomor2" onkeyup="searchDatabase2()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                </div>
                <div id="searchResult2"></div>
                <div>
                  <label for="saldo" class="block mb-2 text-sm font-medium text-blue-900">Jumlah</label>
                  <input type="number" name="saldo" id="saldo" min="0" onkeyup="if(this.value<0)this.value=0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                </div>

                <div class="flex items-center">
                  <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 " required>
                  <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900">saya bertanggung jawab atas <a class="text-blue-600  hover:underline">tindakan yang saya lakukan</a>.</label>
                </div>

                <button type="submit" class="disable-on-no-tabungan2 w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Tambah</button>

              </form>
            </div>
          </div>
        </div>


        <!-- /.card-header -->
        <div class="card-body overflow-auto">
          <form class="flex items-center lg:w-1/4 md:w-1/3  float-right" id="searchForm" action="" method="get">
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
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
              <span class="sr-only">Search</span>
            </button>
          </form>
          <table id="example1" class="table table-striped">
            <thead>
              <tr>
                <th>No Tabungan</th>
                <th>Nama</th>
                <th>Saldo</th>
                <th>Penarikan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $index => $data) : ?>
                <tr>
                  <td><?= $data["no_tabungan"]; ?></td>
                  <td><?= $data["nama"]; ?></td>

                  <td><?= $data["saldo"]; ?></td>
                  <td><?= $data["penarikan"]; ?></td>


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


<!-- Setoran Data modal -->



<script>
  function searchDatabase() {
    var searchValue = document.getElementById("nomor").value;
    var submitButton = document.querySelector(".disable-on-no-tabungan[type='submit']");

    if (searchValue.trim() !== "") {
      $.ajax({
        type: "POST",
        url: "<?= base_url('Tabungan/searchNasabah') ?>",
        data: {
          searchValue: searchValue
        },
        success: function(response) {
          var resultHtml = "";
          if (response.length > 0) {
            resultHtml += "<p class ='text-blue-700 text-xs'>Found nama : " + response[0].nama + "</p>";

            submitButton.removeAttribute("disabled"); // Enable the submit button
          } else {
            resultHtml = "<p class ='text-red-700 text-xs'>No Tabungan not found.</p>";
            submitButton.setAttribute("disabled", "disabled"); // Disable the submit button
          }
          document.getElementById("searchResult").innerHTML = resultHtml;
        }
      });
    } else {
      document.getElementById("searchResult").innerHTML = "";
      submitButton.removeAttribute("disabled"); // Enable the submit button
    }
  }

  function searchDatabase2() {
    var searchValue = document.getElementById("nomor2").value;
    var submitButton = document.querySelector(".disable-on-no-tabungan2[type='submit']");

    if (searchValue.trim() !== "") {
      $.ajax({
        type: "POST",
        url: "<?= base_url('Tabungan/searchNasabah') ?>",
        data: {
          searchValue: searchValue
        },
        success: function(response) {
          var resultHtml = "";
          if (response.length > 0) {
            resultHtml += "<table class ='text-blue-700 text-xs'><tr><td>Nama Nasabah</td><td> : " + response[0].nama + "</td></tr><tr><td>Total Saldo</td><td> : Rp. " + response[0].saldo + "</td></tr></table>";

            submitButton.removeAttribute("disabled"); // Enable the submit button
          } else {
            resultHtml = "<p class ='text-red-700 text-xs'>No Tabungan not found.</p>";
            submitButton.setAttribute("disabled", "disabled"); // Disable the submit button
          }
          document.getElementById("searchResult2").innerHTML = resultHtml;
        }
      });
    } else {
      document.getElementById("searchResult2").innerHTML = "";
      submitButton.removeAttribute("disabled"); // Enable the submit button
    }
  }
</script>



<script type="text/javascript">
  var dataSampah = <?php echo json_encode($sampah); ?>;
  $(document).ready(function() {
    var counter = 1; // Use a different variable name for the loop counter

    $('#add').click(function() {
      counter++; // Increment the counter
      var options = '';
      for (var i = 0; i < dataSampah.length; i++) {
        options += '<option value="'+dataSampah[i].id+'">' + dataSampah[i].jenis + '</option>';

      }
      // $('#satuan').append(dataSampah[i].satuan);
      $('#dynamic_field').append('<tr id="row' + counter + '" class="dynamic-added"><td> <div class="mt-2 flex flex-col"><div class="flex flex-row items-center"><select id="input" name="addmore[][input]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">' + options + '</select><input type="number" name="add[][sampah]" id="sampah" min="0" onkeyup="if(this.value<0)this.value=0" class=" ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" ><p class="block mb-2 text-sm font-bold text-blue-900 ml-2">Jumlah</p></div></div></td><td><button type="button" name="remove" id="' + counter + '" class="btn btn-danger btn_remove bg-red-700 hover:bg-red-500 ml-2 rounded-lg"><svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

  });
</script>

<script>
  // jQuery code to handle button click events
  $(document).ready(function() {

    // Show setoran table and hide penarikan table on setoran button click
    $("#setoranButton").click(function() {
      $("#setoranForm").removeClass("hidden");
      $("#penarikanForm").addClass("hidden");
      $(this).addClass("focus:bg-blue-700");
      $("#penarikanButton").removeClass("focus:bg-amber-700");
    });

    // Hide setoran Form and show penarikan Form on penarikan button click
    $("#penarikanButton").click(function() {
      $("#penarikanForm").removeClass("hidden");
      $("#setoranForm").addClass("hidden");
      $(this).addClass("focus:bg-amber-700");
      $("#setoranButton").removeClass("focus:bg-blue-700 bg-blue-700 ring-4 ring-blue-300 4");
    });

    $("#setoranExitButton").click(function() {
      $("#setoranForm").addClass("hidden");
      $("#setoranButton").removeClass("focus:bg-blue-700 bg-blue-700 ring-4 ring-blue-300 4");
    });

    $("#penarikanExitButton").click(function() {
      $("#penarikanForm").addClass("hidden");
      $("#penarikanButton").removeClass("focus:bg-blue-700 bg-blue-700 ring-4 ring-blue-300 4");
    });




  });
</script>