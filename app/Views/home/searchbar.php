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
    <button id="searchBtn"  type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <span class="sr-only">Search</span>
    </button>
</form>
</div>

<div class="p-10 text-lg border border-gray-300 mt-20 mb-20">
<table id="searchResultsTable">
    <thead>
        <tr class="mb-5">
            <th>Nama    </th>
            <td>    : </th>
        </tr>
        <tr >
    
            <th>Saldo   </th>
            <td>    :</th>
        </tr>
  
    </thead>
   
  </table>
</div>
    <h2 class="font-bold text-green-900 text-2xl lg:w-2/3 md:w-2/3 mb-5">Belum Bergabung Menjadi Nasabah ? <span><a href="https://www.instagram.com/direct/t/17849222612945190"><button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">DAFTAR</button></a>
    </span></h2>
</div>

<div id="formModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="formModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      
            </button>
      
            <div class="px-6 py-6 lg:px-8">
             
                <form class="space-y-6"  method="POST">
                  <div>
                      <label for="kode" class="block mb-2 text-sm font-medium text-blue-900 ">Kode Akses</label>
                      <input type="number" name="kdoe" id="kdoe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                      <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Lihat Data</button> 
                </form>
            </div>
        </div>
    </div>
</div> 





</div>

<script>
$(document).ready(function(){
    var searchValue = document.getElementById("searchInput").value;

    $('#searchBtn').click(function(){
    if (searchValue.trim() !== "") {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Tabungan/searchNasabah')?>",
            data: { searchValue: searchValue },
            success: function(response) {
                var resultHtml = "";
                if (response.length > 0) {
                    $("#setoranForm").removeClass("hidden");
                } else {
                    resultHtml = "<p class ='text-red-700 text-xs'>No Tabungan not found.</p>";
                }
                // document.getElementById("searchResult").innerHTML = resultHtml;
            }
        });
    } else {
        // document.getElementById("searchResult").innerHTML = "";

    }
    }); 
});

  

  

</script>

