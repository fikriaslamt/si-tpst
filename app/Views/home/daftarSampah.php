<div id="daftarSampah" class="w-2xl lg:w-7/12 lg:mx-auto  mx-10 mt-20 ">
    <h2 class="font-bold text-2xl">Daftar Sampah</h2>






<div class="relative overflow-x-auto mt-20">
    <table class="w-full text-sm text-left  ">
        <thead class="text-xs text-white uppercase border-b border-gray-700 bg-gray-700">
            <tr>
              
                <th scope="col" class="px-6 py-3">
                    Jenis Sampah
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
               
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $data) : ?>
            <tr class="bg-white border-b  border-gray-700">
          
                <td class="px-6 py-4">
                <?= $data['jenis'];?>
                </td>
                <td class="px-6 py-4">
                <?= $data['harga_nasabah'];?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>






