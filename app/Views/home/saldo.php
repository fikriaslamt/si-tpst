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
    <strong class="font-bold">Kode Akses</strong>
    <span class="block sm:inline">Nasabah Salah.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 ml-2"  data-modal-hide="formWarning2">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
    </div>
</div> 

<div id="formWarning3" tabindex="-1" aria-hidden="true" class="hidden">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
    <strong class="font-bold">Server</strong>
    <span class="block sm:inline">Error</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 ml-2"  data-modal-hide="formWarning3">
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
        <input type="number" id="searchInput" name="input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " placeholder="No Tabungan" required>
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
                <input id="kodeAkses" name="input" class=" w-1/2 mr-2  appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"  type="number" required>
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
    <div id="detailTransaksi" class="hidden mt-4 flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
            <div  class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-800 space-y-6">
                <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Detail Tabungan (Debit)</h3>
                <div id="detailSetoran" class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                    <div class="flex justify-between w-full">
                        <p class="font-bold text-sm leading-4 text-white">Jenis Sampah</p>
                        <p class="font-bold text-sm leading-4 text-white">Total Berat/Harga</p>
                    </div>
                   
                </div>
                <div class="flex justify-between items-center w-full">
                    <p class="text-sm text-white font-bold leading-4">Total</p>
                    <p id="totalSetoran" class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600"></p>
                </div>
            </div>
            <div  class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-800 space-y-6">
                <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">History Penarikan (Kredit)</h3>
                <div id="detailPenarikan" class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                    <div class="flex justify-between w-full">
                        <p class="font-bold text-sm leading-4 text-white">Tanggal</p>
                        <p class="font-bold text-sm leading-4 text-white">Nominal</p>
                    </div>
                   

                </div>
                <div class="flex justify-between items-center w-full">
                    <p class="text-sm text-white font-bold leading-4">Total</p>
                    <p id="totalPenarikan" class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600"></p>
                </div>
            </div>
    </div>             
</div>
    <h2 class="font-bold text-green-900 lg:text-xl sm:text-l mb-12">Belum Bergabung Menjadi Nasabah ? 
        <span>
            <a href="https://api.whatsapp.com/send/?phone=62<?=substr($profil[0]['whatsapp'],1);?>" target="_blank" class="ml-2 relative inline-block px-4 py-2 font-medium group">
                <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-gray-700 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span class="absolute inset-0 w-full h-full bg-white border-2 border-gray-500 group-hover:bg-gray-700"></span>
                <span class="relative text-gray-500 group-hover:text-white">Daftar</span>
            </a>
        </span>
    </h2>
</div>



<div id="loadingIndicator" class="hidden">
    <div role="status" class="flex items-center justify-center h-screen bg-black bg-opacity-50 fixed top-0 left-0 w-full z-50">
    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin  fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
    </div>
</div>




</div>

<script>
$(document).ready(function(){
    $('#searchBtn').click(function(){
        var searchValue = $('#searchInput').val().trim(); // Get the search value from the input field
        $('#loadingIndicator').removeClass('hidden');
        if (searchValue !== "") {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Tabungan/searchNasabah')?>",
                data: { searchValue: searchValue },
                success: function(response) {

                    if (response.length > 0) {
                        $("#formModal").removeClass("hidden");
                        $('#loadingIndicator').addClass('hidden');
                    } else {
                        $("#formWarning").removeClass("hidden");
                        $('#loadingIndicator').addClass('hidden');
                    }
                }
            });
        } else {
            $("#formWarning").removeClass("hidden");
            $('#loadingIndicator').addClass('hidden');
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
        $('#loadingIndicator').removeClass('hidden');
        var searchValue = $('#kodeAkses').val().trim(); // Get the search value from the input field
        
        if (searchValue !== "") {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Tabungan/verifyKode')?>",
                data: { searchValue: searchValue },
                statusCode: {
                    500: function() {
                        
                        $("#formWarning3").removeClass("hidden");
                        $('#loadingIndicator').addClass('hidden');
                    }
                },
                success: function(response) {
                  

                    console.log("Response:", response);
                    console.log("Response length:", response.length);
                    if (response.length > 0) {
                      
                        $("#searchResultsTable").removeClass("hidden");
                        $("#detailTransaksi").removeClass("hidden");

                        document.getElementById("nama").innerHTML = ": "+response[0].nama;
                        document.getElementById("alamat").innerHTML = ": "+response[0].alamat;
                        document.getElementById("hasilsaldo").innerHTML =": " + new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(response[0].saldo);


                        const setoranArray = response[0].setoran || [];
                        const penarikanArray = response[0].penarikan || [];

                        // if (setoranArray.length === 0) {
                        // setoranArray = [];
                        // }
                        // if (penarikanArray.length === 0) {
                        //     penarikanArray = [];
                        // }
                      
                        const setoranContainer = document.getElementById("detailSetoran"); // Assuming this is the ID of the container where you want to append the setoran data.
                        const penarikanContainer = document.getElementById("detailPenarikan"); // Assuming this is the ID of the container where you want to append the setoran data.

                        let totalSetoran = 0;
                        let totalPenarikan = 0;

                        setoranArray.forEach((item) => {
                            const setoranEntry = document.createElement('div');
                            setoranEntry.className = 'flex justify-between w-full';
                            // Create and set content for each element in the setoran entry
                            const jenisElement = document.createElement('p');
                            jenisElement.className = 'text-base  leading-4 text-gray-300';
                            jenisElement.textContent = item.jenis;

                            const total_beratElement = document.createElement('p');
                            total_beratElement.className = 'text-base  leading-4 text-gray-300';
                            total_beratElement.textContent =  Math.round(item.total_berat*100)/100 +' ' + item.satuan +' / '+ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.total_harga);

                            totalSetoran += Number(item.total_harga);
                            
                            // Append the elements to the setoran entry
                            setoranEntry.appendChild(jenisElement);
                            setoranEntry.appendChild(total_beratElement);
                            // Append the setoran entry to the container
                            setoranContainer.appendChild(setoranEntry);

                        });

                        penarikanArray.forEach((item) => {
                        //penarikan    
                            const penarikanEntry = document.createElement('div');
                            penarikanEntry.className = 'flex justify-between w-full';
                            // Create and set content for each element in the penarikan entry
                            const tanggalElement = document.createElement('p');
                            tanggalElement.className = 'text-base  leading-4 text-gray-300';
                            tanggalElement.textContent = item.tanggal;

                            const totalElement = document.createElement('p');
                            totalElement.className = 'text-base  leading-4 text-gray-300';
                            totalElement.textContent =  new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.total_penarikan);

                            totalPenarikan += Number(item.total_penarikan);
                            
                            // Append the elements to the penarikan entry
                            penarikanEntry.appendChild(tanggalElement);
                            penarikanEntry.appendChild(totalElement);
                         
                            
                            // Append the penarikan entry to the container
                            penarikanContainer.appendChild(penarikanEntry);
                        });

                        document.getElementById("totalSetoran").innerHTML = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalSetoran);
                        document.getElementById("totalPenarikan").innerHTML = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalPenarikan);
                        $("#formModal").addClass("hidden");
                        $('#loadingIndicator').addClass('hidden');
                        
                    } else {
                        console.log("No data found in response");
                        $("#formWarning2").removeClass("hidden");
                        $('#loadingIndicator').addClass('hidden');
                    }
                }
            });
        } else {
            console.log("No data found in response");
            $("#formWarning2").removeClass("hidden");
            $('#loadingIndicator').addClass('hidden');
        }
    });
});
</script>

