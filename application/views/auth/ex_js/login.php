<script>
  let email = $('#email');
  let password = $('#password');

  $('#btnLogin').on('click', function() {
    email.removeClass('border border-danger');
    password.removeClass('border border-danger');

    if (email.val() == '') {
      email.addClass('border border-danger');
      Swal.fire({
        title: 'Email Kosong',
        text: 'Isi dulu dong!',
        icon: 'warning',
        confirmButtonText: 'Oke'
      })
      return false;
    } else if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email.val())) {
      email.addClass('border border-danger');
      Swal.fire({
        title: 'Email Tidak Valid',
        text: 'Perbaikin dulu dong!',
        icon: 'warning',
        confirmButtonText: 'Oke'
      })
      return false;
    }
    if (password.val() == '') {
      password.addClass('border border-danger');
      Swal.fire({
        title: 'Password Kosong',
        text: 'Isi dulu dong!',
        icon: 'warning',
        confirmButtonText: 'Oke'
      })
      return false;
    }

    if (email.val() == 'admin@xyz.com' && password.val() == 'admin') {

      Swal.fire({
        title: 'Login Berhasil',
        html: 'Kami akan meredirect ke dashboard kamu',
        icon: 'success',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          timerInterval = setInterval(() => {
            const content = Swal.getContent()
            if (content) {
              const b = content.querySelector('b')
              if (b) {
                b.textContent = Swal.getTimerLeft()
              }
            }
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
          window.location.href = '<?= base_url('admin/dashboard') ?>';
        }
      })
      return true;
    } else {
      email.addClass('border border-danger');
      password.addClass('border border-danger');
      Swal.fire({
        title: 'Akun Tidak Ditemukan',
        text: 'Email atau Password salah',
        icon: 'error'
      })
      return false;
    }

  });
</script>