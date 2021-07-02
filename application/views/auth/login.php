<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
              </div>
              <?php
              if ($this->session->flashdata('warning')) {
                echo '<div id="warning" class="alert alert-warning">' . $this->session->flashdata('warning') . '</div>';
              }
              if ($this->session->flashdata('info')) {
                echo '<div id="info" class="alert alert-info">' . $this->session->flashdata('info') . '</div>';
              }
              ?>
              <form class="user" action="<?= base_url('auth/check_login') ?>" method="POST">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter email...">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                </div>
                <!-- <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                  </div>
                </div> -->
                <button type="submit" id="btnLogin" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/forgot_password') ?>">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/register') ?>">Buat Akun Baru!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>