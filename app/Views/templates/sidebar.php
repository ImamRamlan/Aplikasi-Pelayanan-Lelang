<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin" class="brand-link text-center">

    <span class="brand-text font-weight-light"><i class="fas fa-shopping-cart"> Lelang Online</i></span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="/admin" class="d-block">Admin - <?= session()->get('nama'); ?></a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MAIN NAVIGASI</li>
        <li class="nav-item">
          <a href="/admin" class="nav-link <?php echo ($activePage == 'admin') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-home"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a href="/datauser" class="nav-link <?php echo ($activePage == 'datauser') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user"></i>
            Data User
          </a>
        </li>
        <li class="nav-item">
          <a href="/kategori" class="nav-link <?php echo ($activePage == 'kategori') ? 'active' : ''; ?>">
            <i class="nav-icon fab fa-product-hunt"></i>
            Kategori Produk
          </a>
        </li>
        <li class="nav-item">
          <a href="/datakendaraan" class="nav-link <?php echo ($activePage == 'datakendaraan') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-car"></i>
            Data Kendaraan
          </a>
        </li>
        <li class="nav-header">MAIN FEATURES.</li>
        <li class="nav-item">
          <a href="/datalelang" class="nav-link <?php echo ($activePage == 'datalelang') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-th-large"></i>
            Lelang
          </a>
        </li>
        <li class="nav-item">
          <a href="/daftarpenawaran" class="nav-link <?php echo ($activePage == 'daftarpenawaran') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-list-alt"></i>
            Daftar Penawaran
          </a>
        </li>
        <li class="nav-header">LAINNYA</li>
        <li class="nav-item">
          <a href="/login/logout" class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            Keluar
          </a>
        </li>
      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>