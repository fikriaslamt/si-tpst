<div id="daftarSampah" class="w-2xl lg:w-7/12 lg:mx-auto  mx-10 mt-20 ">
    <h2 class="font-bold text-2xl">Daftar Sampah</h2>



<div class="relative overflow-x-auto mt-12 ">
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
          
                <td class="px-6 py-3">
                <?= $data['jenis'];?>
                </td>
                <td class="px-6 py-3"> 
                    Rp. <?= number_format($data['harga_nasabah'],2,',','.'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="mt-2 float-left">
    <i>Total entries :  <?= $pager->getTotal(); ?> Data</i>
</div> 

<div class="mt-2 float-right">
    <?= $pager->links('default','pagination')?>
</div>

</div>






