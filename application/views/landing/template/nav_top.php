<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark align-items-center">
  <div class="container">
    <!-- LOGO -->
    <a class="logo mr-3" href="layout-one-1.html">
      <img src="<?= base_url('assets/img/nodify/sista.png') ?>" alt="" class="" height="26">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <i class="" data-feather="menu"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav navbar-center" id="mySidenav">
        <li class="nav-item <?php if (strpos(current_url(), 'landing/home')) echo 'active'; ?>">
          <a href="<?= base_url('landing/home') ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item <?php if (strpos(current_url(), 'landing/jadwal')) { echo 'active'; } else if (strpos(current_url(), 'landing/detail_jadwal_seminar')) { echo 'active'; } else if (strpos(current_url(), 'landing/daftar_peserta')) { echo 'active'; } ?>">
          <a href="<?= base_url('landing/jadwal') ?>" class="nav-link">Jadwal</a>
        </li>
        <li class="nav-item <?php if (strpos(current_url(), 'landing/daftar_seminar')) { echo 'active'; } ?>">
          <a href="<?= base_url('landing/daftar_seminar') ?>" class="nav-link">Daftar Seminar</a>
        </li>
        <!-- <li class="nav-item">
            <a href="#features" class="nav-link">Berita</a>
        </li> -->
        </li>
        <li class="nav-item <?php if (strpos(current_url(), 'landing/about')) echo 'active'; ?>">
          <a href="<?= base_url('landing/about') ?>" class="nav-link">About</a>
        </li>
      </ul>

      <ul class="list-inline ml-auto menu-social-icon mb-0 py-2 py-lg-0">
        <li class="list-inline-item ml-0">
          <button type="submit" id="submit" name="send" class="btn btn-primary" onClick="window.location.href='<?= base_url('auth/login');?>'">Login</button>
        </li>

      </ul>
    </div>
  </div>
</nav>