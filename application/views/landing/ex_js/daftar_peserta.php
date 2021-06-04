<script>
  const swalMix = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  let nim = $('#nim');
  let nama = $('#nama');
  let prodi = $('#prodi');
  let program = $('input[name="program"]');

  $('#btnDaftar').on('click', function(e) {
    e.preventDefault()
    nim.removeClass('border border-danger')
    nama.removeClass('border border-danger')
    prodi.removeClass('border border-danger')
    program.removeClass('border border-danger')

    if (nim.val() == '') {
      nim.addClass('border border-danger')
      swalMix.fire({
        title: 'Isi NIM kamu dulu',
        text: '',
        icon: 'warning'
      })
      return false;
    } else if (nama.val() == '') {
      nama.addClass('border border-danger')
      swalMix.fire({
        title: 'Isi nama kamu dulu',
        text: '',
        icon: 'warning'
      })
      return false;
    } else if (prodi.val() == '0') {
      prodi.addClass('border border-danger')
      swalMix.fire({
        title: 'Pilih prodi kamu dulu',
        text: '',
        icon: 'warning'
      })
      return false;
    } else if (program.val() == '') {
      swalMix.fire({
        title: 'Pilih program kamu dulu',
        text: '',
        icon: 'warning'
      })
      program.addClass('border border-danger')
      return false;
    }

    swalMix.fire({
      title: 'Berhasil daftar sebagai peserta',
      text: 'Silahkan cek email kamu, untuk konfirmasi dan informasi selanjutnya',
      icon: 'success'
    });
  });
</script>