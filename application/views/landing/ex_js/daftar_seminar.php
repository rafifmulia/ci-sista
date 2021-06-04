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
  let tglSeminar = $('#tglSeminar');
  let jamSeminar = $('#jamSeminar');
  let ruangan = $('#ruangan');
  let judulTA = $('#judulTA');
  let seminar = $('#seminar');
  let pembimbing = $('#pembimbing');
  let penguji1 = $('#penguji1');
  let penguji2 = $('#penguji2');

  $('#btnDaftar').on('click', function(e) {
    e.preventDefault()
    nim.removeClass('border border-danger')
    nama.removeClass('border border-danger')
    prodi.removeClass('border border-danger')
    tglSeminar.removeClass('border border-danger')
    jamSeminar.removeClass('border border-danger')
    ruangan.removeClass('border border-danger')
    judulTA.removeClass('border border-danger')
    seminar.removeClass('border border-danger')
    pembimbing.removeClass('border border-danger')
    penguji1.removeClass('border border-danger')
    penguji2.removeClass('border border-danger')

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
    } else if (tglSeminar.val() == '') {
      swalMix.fire({
        title: 'Pilih tgl seminar kamu dulu',
        text: '',
        icon: 'warning'
      })
      tglSeminar.addClass('border border-danger')
      return false;
    } else if (jamSeminar.val() == '') {
      swalMix.fire({
        title: 'Pilih jam seminar kamu dulu',
        text: '',
        icon: 'warning'
      })
      jamSeminar.addClass('border border-danger')
      return false;
    } else if (ruangan.val() == '0') {
      swalMix.fire({
        title: 'Pilih ruangan kamu dulu',
        text: '',
        icon: 'warning'
      })
      ruangan.addClass('border border-danger')
      return false;
    } else if (judulTA.val() == '') {
      swalMix.fire({
        title: 'Pilih judul TA kamu dulu',
        text: '',
        icon: 'warning'
      })
      judulTA.addClass('border border-danger')
      return false;
    } else if (seminar.val() == '0') {
      swalMix.fire({
        title: 'Pilih seminar kamu dulu',
        text: '',
        icon: 'warning'
      })
      seminar.addClass('border border-danger')
      return false;
    } else if (pembimbing.val() == '0') {
      swalMix.fire({
        title: 'Pilih pembimbing kamu dulu',
        text: '',
        icon: 'warning'
      })
      pembimbing.addClass('border border-danger')
      return false;
    } else if (penguji1.val() == '0') {
      swalMix.fire({
        title: 'Pilih penguji1 kamu dulu',
        text: '',
        icon: 'warning'
      })
      penguji1.addClass('border border-danger')
      return false;
    } else if (penguji2.val() == '0') {
      swalMix.fire({
        title: 'Pilih penguji2 kamu dulu',
        text: '',
        icon: 'warning'
      })
      penguji2.addClass('border border-danger')
      return false;
    }

    swalMix.fire({
      title: 'Berhasil mendaftarkan seminar baru',
      text: 'Silahkan cek email kamu, untuk konfirmasi dan informasi selanjutnya',
      icon: 'success'
    });
  });
</script>