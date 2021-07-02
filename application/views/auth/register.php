<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
          </div>
          <?php 
            if ($this->session->flashdata('warning')) {
              echo '<div id="warning" class="alert alert-warning">'.$this->session->flashdata('warning').'</div>';
            }
            if ($this->session->flashdata('info')) {
              echo '<div id="info" class="alert alert-info">'.$this->session->flashdata('info').'</div>';
            }
          ?>
          <form action="<?= base_url('auth/save_register'); ?>" method="POST" class="user">
            <div class="form-group">
              <input name="username" type="text" class="form-control form-control-user" id="username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <input name="email" type="email" class="form-control form-control-user" id="email" placeholder="Email Address" required>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input name="password" type="password" class="form-control form-control-user" id="password" placeholder="Password" required>
              </div>
              <div class="col-sm-6">
                <input name="password2" type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" required>
              </div>
            </div>
            <button type="submit" id="createAccount" class="btn btn-primary btn-user btn-block">
              Buat Akun
            </button>
          </form>
          <hr>
          <div class="text-center">
            <a class="small" href="<?= base_url('auth/forgot_password') ?>">Lupa Password?</a>
          </div>
          <div class="text-center">
            <a class="small" href="<?= base_url('auth/login') ?>">Sudah Punya Akun? Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>