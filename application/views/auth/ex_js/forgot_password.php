<script>
  let email = $('#email');

  $('#resetPw').on('click', function() {
    email.removeClass('border border-danger');

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

    Swal.fire({
      title: 'Reset Password Berhasil',
      text: 'Silahkan cek email kamu, kami telah mengirimkan link untuk reset password',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
    return true;
  });
</script>