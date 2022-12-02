<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">SMA N 1 TIGA PANAH</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ session()->get('username') }}</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/admin" class="nav-link">
            <i class="nav-icon fas fa-circle text-danger"></i>
            <p class="text">Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/data_request" class="nav-link">
            <i class="nav-icon fas fa-user text-danger"></i>
            <p class="text">Data Siswa Lulus Tes</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/data_pendaftar" class="nav-link">
            <i class="nav-icon fas fa-user text-danger"></i>
            <p class="text">Data Akun Siswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/data_siswa" class="nav-link">
            <i class="nav-icon fas fa-user text-danger"></i>
            <p class="text">Data Formulir Siswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/halaman-report" class="nav-link">
            <i class="nav-icon fas fa-file text-danger"></i>
            <p class="text">Report Data Siswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/data_pengumuman" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Data Pengumuman</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
