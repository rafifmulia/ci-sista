<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#daftarSeminar').DataTable();

  $('#daftarSeminar').on('click', '.viewPeserta', function(e) {
    // let name = $(e.target).closest('tr').find('td[data-name]').data('name');
    // $('#namaPeserta').html(name);
    // $('#modalViewSeminar').modal('show');
    window.open('<?= base_url('admin/daftar_peserta') ?>');
  });

  // get detail seminar
  $('#daftarSeminar').on('click', '.editSeminar', function(e) {
    let id = $(e.target).closest('tr').find('td[data-id]').data('id');
    // let name = $(e.target).closest('tr').find('td[data-name]').data('name');

    $.ajax({
      url: '<?= base_url('admin/detail_seminar') ?>?id=' + id,
      method: 'get',
      crossDomain: true,
      processData: true,
      success: (data, textStatus, jqXHR) => {
        if (data.meta.code != 200) {
          swalWithBootstrapButtons.fire(
            'Seminar tidak ditemukan',
            'Gagal mendapatkan data seminar',
            'warning'
          )
          return false;
        }
        let seminar = data.data;

        $('#namaPesertaSeminar').html(seminar.nama_mahasiswa);
        $('#ed_id').val(seminar.id);
        $('#ed_nim').val(seminar.nim);
        $('#ed_nama').val(seminar.nama_mahasiswa);
        $('#ed_prodi').val(seminar.prodi).select();
        $('#ed_semester').val(seminar.semester).select();
        $('#ed_tglSeminar').val(seminar.tanggal);
        $('#ed_jamSeminar').val(seminar.jam);
        $('#ed_ruangan').val(seminar.lokasi);
        $('#ed_judulTA').val(seminar.judul);
        $('#ed_kategori_seminar').val(seminar.kategori_seminar_id).select();
        $('#ed_pembimbing').val(seminar.pembimbing_id).select();
        $('#ed_penguji1').val(seminar.penguji1_id).select();
        $('#ed_penguji2').val(seminar.penguji2_id).select();
        $('#modalEditSeminar').data('id', seminar.id);
        $('#modalEditSeminar').modal('show');
      },
      error: (jqXHR, textStatus, error) => {
        swalWithBootstrapButtons.fire(
          'Terjadi kesalahan',
          'Gagal mendapatkan data seminar',
          'error'
        )
      }
    })
  });

  // simpan data seminar
  $('#sendEdSeminar').on('click', function(e) {
    e.preventDefault()
    let clicked = $(e.target)

    if ($('#ed_id').val() != $('#modalEditSeminar').data('id')) {
      swalWithBootstrapButtons.fire({
        title: 'Mau Ngapain ?',
        text: "Jangan dirubah-rubah ya :)",
        icon: 'warning',
        confirmButtonText: 'Dimengerti',
      })
      return false;
    }

    swalWithBootstrapButtons.fire({
      title: 'Kamu yakin?',
      text: "Data seminar akan dirubah ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $('#edit_seminar').submit()
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'Seminar tidak jadi dirubah :)',
          'info'
        )
      }
    })
  });

  // hapus seminar
  $('#daftarSeminar').on('click', '.delSeminar', function(e) {
    swalWithBootstrapButtons.fire({
      title: 'Kamu yakin?',
      text: "Data akan dihapus secara permanent!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        let id = $(e.target).closest('tr').find('td[data-id]').data('id');

        $.ajax({
          url: '<?= base_url('admin/del_seminar') ?>',
          method: 'post',
          data: {
            id
          },
          crossDomain: true,
          processData: true,
          success: (data, textStatus, jqXHR) => {
            swalWithBootstrapButtons.fire(
              'Terhapus!',
              'Data terhapus secara permanent.',
              'success'
            ).then((result) => {
              if (result.isConfirmed) {
                window.location.reload()
              }
            })
          },
          error: (jqXHR, textStatus, error) => {
            swalWithBootstrapButtons.fire(
              'Error',
              'Seminar gagal dihapus :)',
              'error'
            )
          }
        })
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'Seminar tidak jadi dihapus :)',
          'error'
        )
      }
    })
  });
</script>