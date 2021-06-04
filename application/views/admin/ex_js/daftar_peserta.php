<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#daftarPeserta').DataTable();

  $('#daftarPeserta').on('click', '.editSeminar', function(e) {
    let name = $(e.target).closest('tr').find('td[data-name]').data('name');
    $('#namaPesertaSeminar').html(name);
    $('#modalEditSeminar').modal('show');
  });

  $('#daftarPeserta').on('click', '.delSeminar', function(e) {
    swalWithBootstrapButtons.fire({
      title: 'Kamu yakin?',
      text: "Peserta akan dihapus dari seminar!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
          'Terhapus!',
          'Peserta telah dihapus dari seminar.',
          'success'
        )
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'Peserta tidak jadi dihapus :)',
          'error'
        )
      }
    })
  });
</script>