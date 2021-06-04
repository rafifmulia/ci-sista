<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Lupa Password?</h1>
                <p class="mb-4">Kami bisa membantu kamu. Hanya dengan menulis email kamu dibawah ini, dan kami akan mengirimkan link untuk mengubah password kamu melalui email!</p>
              </div>
              <form class="user">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                </div>
                <button type="button" id="resetPw" class="btn btn-primary btn-user btn-block">
                  Reset Password
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/register') ?>">Buat Akun Baru!</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/login') ?>">Sudah Punya Akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>