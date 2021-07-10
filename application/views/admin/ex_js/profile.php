<script>
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-1',
      cancelButton: 'btn btn-danger mx-1'
    },
    buttonsStyling: false
  });

  $('#btnChangeAvatar').on('click', function (e) {
    $('#ed_avatar').trigger('click')
  })

  $('#ed_avatar').on('change', function (e) {
    let file = this.files[0]
    let reader = new FileReader()
    reader.onload = function (e) {
      $('#avatar').attr('src', e.target.result);
    }
    reader.readAsDataURL(file);
  });

  $('#isChangePassword').on('change', function(e) {
    if ($('#isChangePassword').prop('checked')) {
      $('#password').removeAttr('disabled')
      $('#password2').removeAttr('disabled')
    } else {
      $('#password').attr('disabled', true)
      $('#password2').attr('disabled', true)
    }
  });
</script>