<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#daftarKategori').DataTable();

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

  // get detail Kategori
  $('#daftarKategori').on('click', '.editKategori', function(e) {
    let id = $(e.target).closest('tr').find('td[data-id]').data('id');

    $.ajax({
      url: '<?= base_url('admin/detail_kategori_seminar') ?>?id=' + id,
      method: 'get',
      crossDomain: true,
      processData: true,
      success: (data, textStatus, jqXHR) => {
        if (data.meta.code != 200) {
          swalWithBootstrapButtons.fire(
            'Kategori tidak ditemukan',
            'Gagal mendapatkan data Kategori',
            'warning'
          )
          return false;
        }
        let Kategori = data.data;

        $('#namaKategori').html(Kategori.nama);
        $('#ed_id').val(Kategori.id);
        $('#ed_nidn').val(Kategori.nidn)
        $('#ed_nama').val(Kategori.nama)
        if (Kategori.is_active == "yes") {
          $('#ed_switchStatus').prop('checked', true)
          $('#ed_lblSwitchStatus').html('Aktif')
        } else {
          $('#ed_switchStatus').prop('checked', false)
          $('#ed_lblSwitchStatus').html('Nonaktif')
        }

        $('#modalEditKategori').data('id', Kategori.id);
        $('#modalEditKategori').modal('show');
      },
      error: (jqXHR, textStatus, error) => {
        swalWithBootstrapButtons.fire(
          'Terjadi kesalahan',
          'Gagal mendapatkan data Kategori',
          'error'
        )
      }
    })

    $('#modalEditKategori').modal('show');
  });

  // edit kategori
  $('#btnEdit').on('click', function(e) {
    e.preventDefault()
    let clicked = $(e.target)

    if ($('#ed_id').val() != $('#modalEditKategori').data('id')) {
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
      text: "Data kategori akan dirubah ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $('#edit_kategori').submit()
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'Kategori tidak jadi dirubah :)',
          'info'
        )
      }
    })
  });

  // hapus kategori
  $('#daftarKategori').on('click', '.delKategori', function(e) {
    let name = $(e.target).closest('tr').find('td[data-name]').data('name');

    swalWithBootstrapButtons.fire({
      title: 'Hapus kategori ' + name + ' ?',
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
          url: '<?= base_url('admin/del_kategori_seminar') ?>',
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
              'Kategori gagal dihapus :)',
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
          'Kategori tidak jadi dihapus :)',
          'error'
        )
      }
    })
  });
</script>