<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#daftarUser').DataTable();

  $('#daftarUser').on('click', '.editUser', function(e) {
    let tr = $(e.target).closest('tr');
    let username = tr.find('td[data-username]').data('username');
    let email = tr.find('td[data-email]').data('email');
    let role = tr.find('td[data-role]').data('role');
    let status = tr.find('td[data-status]').data('status');

    $('#lblEdtUsername').html(username);
    $('#edtUsername').val(username)
    $('#edtEmail').val(email)
    $('#edtRole').val(role)
    if (status == "1") {
      $('#edtswitchStatus').prop('checked', true)
      $('#lblEdtSwitchStatus').html('Aktif')
    } else {
      $('#edtswitchStatus').prop('checked', false)
      $('#lblEdtSwitchStatus').html('Tidak Aktif')
    }

    $('#modalEditUser').modal('show');
  });

  $('#edtswitchStatus').on('change', function(e) {
    if ($('#edtswitchStatus').prop('checked')) {
      $('#lblEdtSwitchStatus').html('Aktif')
    } else {
      $('#lblEdtSwitchStatus').html('Tidak Aktif')
    }
  });

  $('#daftarUser').on('click', '.delUser', function(e) {
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
          'User tidak jadi dihapus :)',
          'error'
        )
      }
    })
  });
</script>