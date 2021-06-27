<script>
  let username = $('#username');
  let email = $('#email');
  let password = $('#password');
  let password2 = $('#password2');

  function pwcek() {
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
    if (password2.val() == '') {
      password2.addClass('border border-danger');
      Swal.fire({
        title: 'Pengulangan Password Kosong',
        text: 'Isi dulu dong!',
        icon: 'warning',
        confirmButtonText: 'Oke'
      })
      return false;
    }
    if (password.val() != password2.val()) {
      password2.addClass('border border-danger');
      Swal.fire({
        title: 'Password Tidak Sama',
        text: 'Samain dulu dong!',
        icon: 'warning',
        confirmButtonText: 'Oke'
      })
      return false;
    }
  }

  $('#createAccountComment').on('click', function(e) {
    e.preventDefault();

    username.removeClass('border border-danger');
    email.removeClass('border border-danger');
    password.removeClass('border border-danger');
    password2.removeClass('border border-danger');

    if (username.val() == '') {
      username.addClass('border border-danger');
      Swal.fire({
        title: 'Username Kosong',
        text: 'Isi dulu dong!',
        icon: 'warning',
        confirmButtonText: 'Oke'
      })
      return false;
    }
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
    if (password2.val() == '') {
      password2.addClass('border border-danger');
      Swal.fire({
        title: 'Pengulangan Password Kosong',
        text: 'Isi dulu dong!',
        icon: 'warning',
        confirmButtonText: 'Oke'
      })
      return false;
    }
    if (password.val() != password2.val()) {
      password2.addClass('border border-danger');
      Swal.fire({
        title: 'Password Tidak Sama',
        text: 'Samain dulu dong!',
        icon: 'warning',
        confirmButtonText: 'Oke'
      })
      return false;
    }

    Swal.fire({
      title: 'Registrasi Akun Berhasil',
      text: 'Akun kamu akan diverifikasi oleh admin, selebihnya akan diinfokan melalui email :)',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
    return true;
  });
</script>