<aside class="main-sidebar sidebar-dark-primary elevation-4">
  
     
 

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item my-2 py-0 border rounded-lg">
            <a  class="nav-link ">
              <i class="nav-icon far fa-user-circle"></i>
              <p>
                <?=$admin;?>
              </p>
            </a>
          
          </li>
    
          <li class="nav-item">
            <a href="<?=base_url('admin')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(2)=='dashboard'?'active':''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>


       
          <li class="nav-item <?=\Config\Services::request()->getUri()->getSegment(2)=='sampah'?'menu-open':''?>">
            <a href="#" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(2)=='sampah'?'active':''?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Sampah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?=base_url('admin/sampah/data-sampah')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='data-sampah'?'active':''?> ">
                <i class="far nav-icon"></i>

                  <p>Data Sampah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/sampah/daftar-sampah')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='daftar-sampah'?'active':''?>">
                <i class="far  nav-icon"></i>

                  <p>Daftar Sampah</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?=base_url('admin/sampah/pengangkutan-sampah')?>"  class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='pengangkutan-sampah'?'active':''?>">
                <i class="far  nav-icon"></i>

                  <p>Pengangkutan Sampah</p>
                </a>
              </li>
         
            </ul>
          </li>

          <li class="nav-item <?=\Config\Services::request()->getUri()->getSegment(2)=='limbah'?'menu-open':''?>">
            <a href="#" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(2)=='limbah'?'active':''?>">
              <i class="nav-icon fas fa-skull-crossbones"></i>
              <p>
                Limbah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?=base_url('admin/limbah/data-limbah')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='data-limbah'?'active':''?>">
                <i class="far  nav-icon"></i>

                  <p>Data Limbah</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="<?=base_url('admin/limbah/daftar-limbah')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='daftar-limbah'?'active':''?> ">
                <i class="far nav-icon"></i>

                  <p>Daftar Limbah</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item <?=\Config\Services::request()->getUri()->getSegment(2)=='nasabah'?'menu-open':''?>">
            <a href="#" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(2)=='nasabah'?'active':''?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Nasabah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?=base_url('admin/nasabah/riwayat-transaksi')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='riwayat-transaksi'?'active':''?> ">
                <i class="far nav-icon"></i>

                  <p>Riwayat Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/nasabah/data-nasabah')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='data-nasabah'?'active':''?>">
                <i class="far  nav-icon"></i>

                  <p>Data Nasabah</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="<?=base_url('admin/nasabah/tabungan')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='tabungan'?'active':''?> ">
                <i class="far nav-icon"></i>

                  <p>Tabungan</p>
                </a>
              </li>
         

            </ul>
          </li>

          <li class="nav-item <?=\Config\Services::request()->getUri()->getSegment(2)=='produk'?'menu-open':''?>">
            <a href="#" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(2)=='produk'?'active':''?>">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?=base_url('admin/produk/daftar-produk')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='daftar-produk'?'active':''?> ">
                <i class="far nav-icon"></i>

                  <p>Daftar Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/produk/data-produk')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='data-produk'?'active':''?>">
                <i class="far  nav-icon"></i>

                  <p>Data Produk</p>
                </a>
              </li>
             
         
            </ul>
          </li>

          <li class="nav-item <?=\Config\Services::request()->getUri()->getSegment(2)=='konten'?'menu-open':''?>">
            <a href="#" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(2)=='konten'?'active':''?>">
              <i class="nav-icon 	fas fa-file-image"></i>
              <p>
                Konten
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?=base_url('admin/konten/kegiatan')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='kegiatan'?'active':''?> ">
                <i class="far nav-icon"></i>

                  <p>Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/konten/publikasi')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(3)=='publikasi'?'active':''?>">
                <i class="far  nav-icon"></i>

                  <p>Publikasi</p>
                </a>
              </li>
             
         
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('admin/akun')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(2)=='akun'?'active':''?>">
              <i class="nav-icon 	far fa-user-circle"></i>
              <p>
                Kelola Akun
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="<?=base_url('admin/setting')?>" class="nav-link <?=\Config\Services::request()->getUri()->getSegment(2)=='setting'?'active':''?>">
              <i class="nav-icon 	fas fa-cog"></i>
              <p>
                Pengaturan
              </p>
            </a>
           
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


