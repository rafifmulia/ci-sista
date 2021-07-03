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
        $('#edtUsername').val(user.username)
        $('#edtEmail').val(user.email)
        if (user.status == "active") {
          $('#edtswitchStatus').prop('checked', true)
          $('#lblEdtSwitchStatus').html('Aktif')
        } else {
          $('#edtswitchStatus').prop('checked', false)
          $('#lblEdtSwitchStatus').html('Tidak Aktif')
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

    $('#modalEditUser').modal('show');
  });

  $('#edtswitchStatus').on('change', function(e) {
    if ($('#edtswitchStatus').prop('checked')) {
      $('#lblEdtSwitchStatus').html('Aktif')
    } else {
      $('#lblEdtSwitchStatus').html('Tidak Aktif')
    }
  });

  // edit user
  $('#btnEdit').on('click', function(e) {
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
      text: "Data seminar akan dirubah ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $('#edit_user').submit()
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

  // delete user
  $('#daftarUser').on('click', '.delUser', function(e) {
    let username = $(e.target).closest('tr').find('td[data-username]').data('username');
    swalWithBootstrapButtons.fire({
      title: 'Hapus akun ' + username + ' ?',
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
          url: '<?= base_url('admin/del_user') ?>',
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
              'User gagal dihapus :)',
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
          'User tidak jadi dihapus :)',
          'error'
        )
      }
    })
  });
</script>