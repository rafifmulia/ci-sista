<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#daftarPeserta').DataTable();

  $('#daftarPeserta').on('click', '.editPeserta', function(e) {
    let id = $(e.target).closest('tr').find('td[data-id]').data('id');
    let name = $(e.target).closest('tr').find('td[data-name]').data('name');

    $.ajax({
      url: '<?= base_url('admin/detail_peserta') ?>?id=' + id,
      method: 'get',
      crossDomain: true,
      processData: true,
      success: (data, textStatus, jqXHR) => {
        if (data.meta.code != 200) {
          swalWithBootstrapButtons.fire(
            'Peserta tidak ditemukan',
            'Gagal mendapatkan data peserta',
            'warning'
          )
          return false;
        }
        let peserta = data.data;

        $('#ed_id').val(peserta.id);
        $('#ed_nim').val(peserta.nim);
        $('#ed_nama').val(peserta.nama);
        $('#ed_prodi').val(peserta.prodi).select();
        let created_at = peserta.created_at.split(' ')
        $('#ed_tgl').val(created_at[0]);
        $('#ed_waktu').val(created_at[1].substr(0, 5));
        $('#namaPesertaPeserta').html(peserta.nama);
        $('#modalEditPeserta').data('id', peserta.id);
        $('#modalEditPeserta').modal('show');
      },
      error: (jqXHR, textStatus, error) => {
        swalWithBootstrapButtons.fire(
          'Terjadi kesalahan',
          'Gagal mendapatkan data peserta',
          'error'
        )
      }
    })
  });

  // simpan data peserta
  $('#sendEdPeserta').on('click', function(e) {
    e.preventDefault()
    let clicked = $(e.target)

    if ($('#ed_id').val() != $('#modalEditPeserta').data('id')) {
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
      text: "Data peserta akan dirubah ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $('#edit_peserta').submit()
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          'Peserta tidak jadi dirubah :)',
          'info'
        )
      }
    })
  });

  $('#daftarPeserta').on('click', '.delPeserta', function(e) {
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
        let id = $(e.target).closest('tr').find('td[data-id]').data('id');

        $.ajax({
          url: '<?= base_url('admin/del_peserta') ?>',
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
              'Peserta gagal dihapus :)',
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
          'Peserta tidak jadi dihapus :)',
          'error'
        )
      }
    })
  });
</script>