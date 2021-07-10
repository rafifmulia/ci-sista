<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb mb-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
      </ol>
    </nav>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-12">
      <?php
      if ($this->session->flashdata('danger')) {
        echo '<div id="danger" class="alert alert-danger">' . $this->session->flashdata('danger') . '</div>';
      }
      if ($this->session->flashdata('warning')) {
        echo '<div id="warning" class="alert alert-warning">' . $this->session->flashdata('warning') . '</div>';
      }
      if ($this->session->flashdata('info')) {
        echo '<div id="info" class="alert alert-info">' . $this->session->flashdata('info') . '</div>';
      }
      ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <form action="<?= base_url('admin/change_profile') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-4 text-center">
                <div class="form-group">
                  <img id="avatar" style="border-radius:50%;" src="<?= ($profile[0]['avatar'] == null) ? base_url('assets/img/undraw_profile.svg') : base_url($profile[0]['avatar']) ?>" width="128" height="128" alt="avatar">
                </div>
                <div class="form-group">
                  <button type="button" id="btnChangeAvatar" class="btn btn-primary">Ganti Foto</button>
                  <input type="file" name="avatar" id="ed_avatar" class="custom-file-input" hidden>
                  <!-- <div class="custom-file">
                  <input type="file" name="avatar" id="ed_avatar" class="custom-file-input">
                  <label class="custom-file-label" for="customFile">Upload foto</label>
                </div> -->
                </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                  <label class="font-weight-bold">Username </label>
                  <input type="text" name="username" class="form-control" value="<?= $profile[0]['username'] ?>" required readonly>
                </div>
                <div class="form-group">
                  <label class="font-weight-bold">Email </label>
                  <input type="text" name="email" class="form-control" value="<?= $profile[0]['email'] ?>" required readonly>
                </div>
                <div class="form-group">
                  <label class="font-weight-bold">Level</label>
                  <input type="text" class="form-control" value="<?= $profile[0]['lvl'] ?>" required disabled>
                </div>
                <div class="form-group">
                  <label class="font-weight-bold mr-2">Status</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" disabled value="active" <?= ($profile[0]['status'] == 'active') ? 'checked' : '' ?>>
                    <label class="form-check-label">Aktif</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" disabled value="not">
                    <label class="form-check-label">Nonaktif</label>
                  </div>
                </div>
                <hr>
                <div class="form-group d-flex">
                  <label class="font-weight-bold mr-3">Change Password</label>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="isChangePassword">
                    <label class="custom-control-label" for="isChangePassword"></label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="font-weight-bold">Password</label>
                  <input type="password" id="password" name="password" class="form-control" required disabled>
                </div>
                <div class="form-group">
                  <label class="font-weight-bold">Confirm Password</label>
                  <input type="password" id="password2" name="password2" class="form-control" required disabled>
                </div>
                <div class="form-group text-right mt-4">
                  <button id="changeProfile" type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  <button id="cancelChange" type="button" class="btn btn-danger">Tidak Jadi</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Modals -->
<div>
  <!-- Modal New User -->
  <div class="modal fade" id="modalNewUser" tabindex="-1" role="dialog" aria-labelledby="modalNewUserTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="<?= base_url('admin/save_user') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Buat User Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" name="password2" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit User -->
  <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="edit_user" action="<?= base_url('admin/edit_user') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Edit User <span id="lblEdtUsername" class="font-weight-bold"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Username</label>
              <input type="text" id="ed_id" name="id" class="form-control" hidden readonly>
              <input type="text" id="edtUsername" name="username" class="form-control" disabled required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" id="edtEmail" name="email" class="form-control" disabled required>
            </div>
            <div class="form-group row">
              <div class="col-2">
                <label>Status :</label>
              </div>
              <div class="col-10">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="status" class="custom-control-input" id="edtswitchStatus" required>
                  <label id="lblEdtSwitchStatus" class="custom-control-label" for="edtswitchStatus">-</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" id="btnEdit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>