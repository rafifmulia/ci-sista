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

  $('#daftarSeminar').on('click', '.editSeminar', function(e) {
    let name = $(e.target).closest('tr').find('td[data-name]').data('name');
    $('#namaPesertaSeminar').html(name);
    $('#modalEditSeminar').modal('show');
  });

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
        swalWithBootstrapButtons.fire(
          'Terhapus!',
          'Data terhapus secara permanent.',
          'success'
        )
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