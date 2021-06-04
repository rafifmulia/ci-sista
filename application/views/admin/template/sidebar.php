<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard') ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fab fa-redhat"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SISTA</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php if (strpos(current_url(), 'admin/dashboard')) { echo 'active'; } ?>">
    <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu Utama
  </div>

  <!-- Nav Item - Seminar Menu -->
  <li class="nav-item <?php if (strpos(current_url(), 'admin/daftar_seminar')) { echo 'active'; } else if (strpos(current_url(), 'admin/daftar_peserta')) { echo 'active'; } ?>">
    <a class="nav-link <?php if (!strpos(current_url(), 'admin/daftar_seminar')) { echo 'collapsed'; } else if (!strpos(current_url(), 'admin/daftar_peserta')) { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-calendar"></i>
      <span>Seminar</span>
    </a>
    <div id="collapseTwo" class="collapse <?php if (strpos(current_url(), 'admin/daftar_seminar')) { echo 'show'; } else if (strpos(current_url(), 'admin/daftar_peserta')) { echo 'show'; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kelola Seminar:</h6>
        <a class="collapse-item <?php if (strpos(current_url(), 'admin/daftar_seminar')) { echo 'active'; } else if (strpos(current_url(), 'admin/daftar_peserta')) { echo 'active'; } ?>" href="<?= base_url('admin/daftar_seminar') ?>">Daftar Seminar</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - User Menu -->
  <li class="nav-item <?php if (strpos(current_url(), 'admin/daftar_user')) { echo 'active'; } else if (strpos(current_url(), 'admin/verify_user')) { echo 'active'; } ?>">
    <a class="nav-link <?php if (!strpos(current_url(), 'admin/daftar_user')) { echo 'collapsed'; } else if (!strpos(current_url(), 'admin/verify_user')) { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
      <i class="fas fa-calendar"></i>
      <span>User</span>
    </a>
    <div id="collapseUser" class="collapse <?php if (strpos(current_url(), 'admin/daftar_user')) { echo 'show'; } else if (strpos(current_url(), 'admin/verify_user')) { echo 'show'; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kelola User:</h6>
        <a class="collapse-item <?php if (strpos(current_url(), 'admin/daftar_user')) { echo 'active'; } ?>" href="<?= base_url('admin/daftar_user') ?>">Daftar User</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Verifikasi User:</h6>
        <a class="collapse-item <?php if (strpos(current_url(), 'admin/verify_user')) { echo 'active'; } ?>" href="<?= base_url('admin/verify_user') ?>">Verifikasi User</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Pelengkap
  </div>

  <!-- Nav Item -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMahasiswa" aria-expanded="true" aria-controls="collapseMahasiswa">
      <i class="fas fa-fw fa-folder"></i>
      <span>Mahasiswa</span>
    </a>
    <div id="collapseMahasiswa" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kelola Mahasiswa:</h6>
        <a class="collapse-item" href="#">Daftar Mahasiswa</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePemakalah" aria-expanded="true" aria-controls="collapsePemakalah">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pemakalah</span>
    </a>
    <div id="collapsePemakalah" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kelola Pemakalah:</h6>
        <a class="collapse-item" href="#">Daftar Pemakalah</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRuangan" aria-expanded="true" aria-controls="collapseRuangan">
      <i class="fas fa-fw fa-folder"></i>
      <span>Ruangan</span>
    </a>
    <div id="collapseRuangan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kelola Ruangan:</h6>
        <a class="collapse-item" href="#">Daftar Ruangan</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProdi" aria-expanded="true" aria-controls="collapseProdi">
      <i class="fas fa-fw fa-folder"></i>
      <span>Prodi</span>
    </a>
    <div id="collapseProdi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Kelola Prodi:</h6>
        <a class="collapse-item" href="#">Daftar Prodi</a>
      </div>
    </div>
  </li>


  <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="<?php // echo base_url('auth/login'); ?>">Login</a>
            <a class="collapse-item" href="<?php // echo base_url('auth/register'); ?>">Register</a>
            <a class="collapse-item" href="<?php // echo base_url('auth/forgot_password'); ?>">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>