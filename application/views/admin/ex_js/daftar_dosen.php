<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#daftarDosen').DataTable();

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

  // get detail Dosen
  $('#daftarDosen').on('click', '.editDosen', function(e) {
    let id = $(e.target).closest('tr').find('td[data-id]').data('id');

    $.ajax({
      url: '<?= base_url('admin/detail_dosen') ?>?id=' + id,
      method: 'get',
      crossDomain: true,
      processData: true,
      success: (data, textStatus, jqXHR) => {
        if (data.meta.code != 200) {
          swalWithBootstrapButtons.fire(
            'Dosen tidak ditemukan',
            'Gagal mendapatkan data Dosen',
            'warning'
          )
          return false;
        }
        let Dosen = data.data;

        $('#namaDosen').html(Dosen.nama);
        $('#ed_id').val(Dosen.id);
        $('#ed_nidn').val(Dosen.nidn)
        $('#ed_nama').val(Dosen.nama)
        if (Dosen.is_active == "yes") {
          $('#ed_switchStatus').prop('checked', true)
          $('#ed_lblSwitchStatus').html('Aktif')
        } else {
          $('#ed_switchStatus').prop('checked', false)
          $('#ed_lblSwitchStatus').html('Nonaktif')
        }

        $('#modalEditDosen').data('id', Dosen.id);
        $('#modalEditDosen').modal('show');
      },
      error: (jqXHR, textStatus, error) => {
        swalWithBootstrapButtons.fire(
          'Terjadi kesalahan',
          'Gagal mendapatkan data Dosen',
          'error'
        )
      }
    })

    $('#modalEditDosen').modal('show');
  });

  // edit dosen
  $('#btnEdit').on('click', function(e) {
    e.preventDefault()
    let clicked = $(e.target)

    if ($('#ed_id').val() != $('#modalEditDosen').data('id')) {
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
      text: "Data dosen akan dirubah ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $('#edit_dosen').submit()
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'Dosen tidak jadi dirubah :)',
          'info'
        )
      }
    })
  });
</script>