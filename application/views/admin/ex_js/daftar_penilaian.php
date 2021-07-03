<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#daftarPenilaian').DataTable();

  $('#add_switchStatus').on('change', function(e) {
    if ($('#add_switchStatus').prop('checked')) {
      $('#add_lblSwitchStatus').html('Aktif')
    } else {
      $('#add_lblSwitchStatus').html('Nonaktif')
    }
  });
  $('#ed_switchStatus').on('change', function(e) {
    if ($('#ed_switchStatus').prop('checked')) {
      $('#ed_lblSwitchStatus').html('Aktif')
    } else {
      $('#ed_lblSwitchStatus').html('Nonaktif')
    }
  });

  // get detail Penilaian
  $('#daftarPenilaian').on('click', '.editPenilaian', function(e) {
    let id = $(e.target).closest('tr').find('td[data-id]').data('id');

    $.ajax({
      url: '<?= base_url('admin/detail_penilaian') ?>?id=' + id,
      method: 'get',
      crossDomain: true,
      processData: true,
      success: (data, textStatus, jqXHR) => {
        if (data.meta.code != 200) {
          swalWithBootstrapButtons.fire(
            'Penilaian tidak ditemukan',
            'Gagal mendapatkan data Penilaian',
            'warning'
          )
          return false;
        }
        let Penilaian = data.data;

        $('#namaPenilaian').html(Penilaian.nama);
        $('#ed_id').val(Penilaian.id);
        $('#ed_keterangan').val(Penilaian.keterangan)
        $('#ed_nama').val(Penilaian.nama)
        if (Penilaian.is_active == "yes") {
          $('#ed_switchStatus').prop('checked', true)
          $('#ed_lblSwitchStatus').html('Aktif')
        } else {
          $('#ed_switchStatus').prop('checked', false)
          $('#ed_lblSwitchStatus').html('Nonaktif')
        }

        $('#modalEditPenilaian').data('id', Penilaian.id);
        $('#modalEditPenilaian').modal('show');
      },
      error: (jqXHR, textStatus, error) => {
        swalWithBootstrapButtons.fire(
          'Terjadi kesalahan',
          'Gagal mendapatkan data Penilaian',
          'error'
        )
      }
    })

    $('#modalEditPenilaian').modal('show');
  });

  // edit penilaian
  $('#btnEdit').on('click', function(e) {
    e.preventDefault()
    let clicked = $(e.target)

    if ($('#ed_id').val() != $('#modalEditPenilaian').data('id')) {
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
      text: "Data penilaian akan dirubah ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $('#edit_penilaian').submit()
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'Penilaian tidak jadi dirubah :)',
          'info'
        )
      }
    })
  });

  // hapus penilaian
  $('#daftarPenilaian').on('click', '.delPenilaian', function(e) {
    let name = $(e.target).closest('tr').find('td[data-name]').data('name');

    swalWithBootstrapButtons.fire({
      title: 'Hapus penilaian ' + name + ' ?',
      text: "Data akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        let id = $(e.target).closest('tr').find('td[data-id]').data('id');

        $.ajax({
          url: '<?= base_url('admin/del_penilaian') ?>',
          method: 'post',
          data: {
            id
          },
          crossDomain: true,
          processData: true,
          success: (data, textStatus, jqXHR) => {
            swalWithBootstrapButtons.fire(
              'Terhapus!',
              'Data terhapus.',
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
              'Penilaian gagal dihapus :)',
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
          'Penilaian tidak jadi dihapus :)',
          'error'
        )
      }
    })
  });
</script>