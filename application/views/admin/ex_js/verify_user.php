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

    $('#lblEdtUsername').html(username);
    $('#verifUsername').val(username)
    $('#verifEmail').val(email)
    $('#verifRole').val(role)
    if (status == "1") {
      $('#verifswitchStatus').prop('checked', true)
      $('#lblVerifSwitchStatus').html('Verif')
    } else {
      $('#verifswitchStatus').prop('checked', false)
      $('#lblVerifSwitchStatus').html('Belum Verif')
    }
    $('#modalEditUser').modal('show');
  });

  $('#verifswitchStatus').on('change', function(e) {
    if ($('#verifswitchStatus').prop('checked')) {
      $('#lblVerifSwitchStatus').html('Verif')
    } else {
      $('#lblVerifSwitchStatus').html('Belum Verif')
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