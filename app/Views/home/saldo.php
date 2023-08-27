<div id="formWarning" tabindex="-1" aria-hidden="true" class="hidden">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
    <strong class="font-bold">No Tabungan</strong>
    <span class="block sm:inline">Nasabah Tidak Ditemukan.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 ml-2"  data-modal-hide="formWarning">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
    </div>
</div> 

<div id="formWarning2" tabindex="-1" aria-hidden="true" class="hidden">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
    <strong class="font-bold">Kode</strong>
    <span class="block sm:inline">Nasabah Salah.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 ml-2"  data-modal-hide="formWarning2">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
    </div>
</div> 

<div id="saldo" class="w-2xl lg:w-7/12 lg:mx-auto  mx-10 mt-20 ">


<div class="lg:flex md:flex">
<h2 class="font-bold text-2xl lg:w-2/3 md:w-2/3 mb-5">Cek Saldo Dengan Nomor Tabungan</h2>
 
<form class="flex items-center lg:w-1/3 md:w-1/3 " id="searchForm"">   
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="searchInput" name="input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " placeholder="No Tabungan" required>
    </div>
    <button id="searchBtn" type="button" class="p-2.5 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <span class="sr-only">Search</span>
    </button>
</form>
</div>

<div id="formModal" tabindex="-1" aria-hidden="true" class="hidden w-full flex justify-center">
    <div class="relative w-full max-w-md max-h-full">

      
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow border-2 mt-5">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="formModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="grid grid-flow-col  mt-12 ml-2 mr-8">
                <p class="mt-2 font-bold text-center">Kode Akses : </p>
                <input id="kodeAkses" class=" w-1/2 mr-2  appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"  type="text" required>
            </div>
            <button id="searchkode" type="button" class=" w-full p-2.5 mt-7 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
                   Lihat Saldo
            </button>
        </div>
    </div>
</div> 



<div class="p-10 text-lg border rounded-lg border-gray-300 mt-10 mb-10">
    <table id="searchResultsTable" class="hidden">

        <tr class="mb-5 font-bold">
            <td class="text-left">Nama</td>
            <td id="nama" class="text-left ml-4"></td>
        </tr>
        <tr class="mb-5 font-bold">
            <td class="text-left">Alamat</td>
            <td id="alamat" class="text-left ml-4"></td>
        </tr>
        <tr class="mb-5 font-bold">
    
            <td class="text-left">Saldo</span></td>
            <td id="hasilsaldo" class="text-left ml-4"></td>
        </tr>


   
  </table>
</div>
    <h2 class="font-bold text-green-900 lg:text-xl sm:text-l mb-12">Belum Bergabung Menjadi Nasabah ? 
        <span>
            <a href="https://www.instagram.com/direct/t/17849222612945190" target="_blank" class="ml-2 relative inline-block px-4 py-2 font-medium group">
                <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-gray-700 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span class="absolute inset-0 w-full h-full bg-white border-2 border-gray-500 group-hover:bg-gray-700"></span>
                <span class="relative text-gray-500 group-hover:text-white">Daftar</span>
            </a>
        </span>
    </h2>
</div>






</div>

<script>
$(document).ready(function(){
    $('#searchBtn').click(function(){
        var searchValue = $('#searchInput').val().trim(); // Get the search value from the input field

        if (searchValue !== "") {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Tabungan/searchNasabah')?>",
                data: { searchValue: searchValue },
                success: function(response) {

                    if (response.length > 0) {
                        $("#formModal").removeClass("hidden");
                      
                    } else {
                        $("#formWarning").removeClass("hidden");
                    }
                }
            });
        } else {
            $("#formWarning").removeClass("hidden");
        }
    });

    $('[data-modal-hide]').click(function() {
        var targetModalId = $(this).attr('data-modal-hide');
        $('#' + targetModalId).addClass('hidden');
    });

    $('[data-modal-hide]').click(function() {
        var targetModalId = $(this).attr('data-modal-hide');
        $('#' + targetModalId).addClass('hidden');
    });

    $('#searchkode').click(function(){
       
        var searchValue = $('#kodeAkses').val().trim(); // Get the search value from the input field

        if (searchValue !== "") {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Tabungan/verifyKode')?>",
                data: { searchValue: searchValue },
                statusCode: {
                    500: function() {
           
                        $("#formWarning2").removeClass("hidden");
                    }
                },
                success: function(response) {
                    console.log(response);
                    if (response.length > 0) {
                        $("#searchResultsTable").removeClass("hidden");
                        document.getElementById("nama").innerHTML = ": "+response[0].nama;
                        document.getElementById("alamat").innerHTML = ": "+response[0].alamat;
                        document.getElementById("hasilsaldo").innerHTML = ": "+response[0].saldo;
                        $("#formModal").addClass("hidden");
                    } else {
                        $("#formWarning2").removeClass("hidden");
                    }
                }
            });
        } else {
            $("#formWarning2").removeClass("hidden");
        }
    });
});
</script>

