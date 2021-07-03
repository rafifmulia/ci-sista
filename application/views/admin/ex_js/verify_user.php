<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#daftarUser').DataTable();

  // get detail user
  $('#daftarUser').on('click', '.editUser', function(e) {
    let id = $(e.target).closest('tr').find('td[data-id]').data('id');

    $.ajax({
      url: '<?= base_url('admin/detail_user') ?>?id=' + id,
      method: 'get',
      crossDomain: true,
      processData: true,
      success: (data, textStatus, jqXHR) => {
        if (data.meta.code != 200) {
          swalWithBootstrapButtons.fire(
            'User tidak ditemukan',
            'Gagal mendapatkan data user',
            'warning'
          )
          return false;
        }
        let user = data.data;

        $('#lblEdtUsername').html(user.username);
        $('#ed_id').val(user.id_user);
        $('#username').val(user.username)
        $('#email').val(user.email)
        if (user.is_verif == "yes") {
          $('#verifswitchStatus').prop('checked', true)
          $('#lblVerifSwitchStatus').html('Verif')
        } else {
          $('#verifswitchStatus').prop('checked', false)
          $('#lblVerifSwitchStatus').html('Belum Verif')
        }

        $('#modalEditUser').data('id', user.id_user);
        $('#modalEditUser').modal('show');
      },
      error: (jqXHR, textStatus, error) => {
        swalWithBootstrapButtons.fire(
          'Terjadi kesalahan',
          'Gagal mendapatkan data user',
          'error'
        )
      }
    })
  });

  // verify user
  $('#btnVerify').on('click', function(e) {
    e.preventDefault()
    let clicked = $(e.target)

    if ($('#ed_id').val() != $('#modalEditUser').data('id')) {
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
      text: "Verfikasi data user ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $('#verify_user').submit()
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'User tidak jadi diverifikasi :)',
          'info'
        )
      }
    })
  });

  $('#verifswitchStatus').on('change', function(e) {
    if ($('#verifswitchStatus').prop('checked')) {
      $('#lblVerifSwitchStatus').html('Verif')
    } else {
      $('#lblVerifSwitchStatus').html('Belum Verif')
    }
  });
</script>