<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb mb-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item"><a href="#">Kelola User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar User</li>
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
          <div class="row">
            <div class="col-12">
              <button id="btnTambahSeminar" class="btn btn-primary" data-toggle="modal" data-target="#modalNewUser">Tambah</button>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <h2>Kelola User</h2>
            </div>
            <div class="col-12">
              <table id="daftarUser" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($get_user as $u) { ?>
                    <tr>
                      <td data-id="<?= $u['id_user'] ?>"><?= ++$i ?></td>
                      <td data-username="<?= $u['username'] ?>"><?= $u['username'] ?></td>
                      <td data-email="<?= $u['email'] ?>"><?= $u['email'] ?></td>
                      <td data-status="<?= $u['status'] ?>">
                        <?php
                        if ($u['status'] == 'active') {
                          echo '<span class="badge badge-info p-2">Aktif</span>';
                        } else {
                          echo '<span class="badge badge-danger p-2">Nonaktif</span>';
                        }
                        ?>
                      </td>
                      <td>
                        <button class="btn btn-info editUser">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger delUser">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <!-- <tbody>
                  <tr>
                    <td data-id="1">1</td>
                    <td data-username="admin">admin</td>
                    <td data-role="1">Super Admin</td>
                    <td data-email="admin@xyz.com">admin@xyz.com</td>
                    <td data-status="1">
                      <span class="badge badge-info p-2">Aktif</span>
                    </td>
                    <td>
                      <button class="btn btn-info editUser">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delUser">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td data-id="2">2</td>
                    <td data-username="rafif">rafif</td>
                    <td data-email="rafif@xyz.com">rafif@xyz.com</td>
                    <td data-role="2">Reguler</td>
                    <td data-status="2">
                      <span class="badge badge-danger p-2">Tidak Aktif</span>
                    </td>
                    <td>
                      <button class="btn btn-info editUser">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delUser">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td data-id="3">3</td>
                    <td data-username="raka">raka</td>
                    <td data-email="raka@xyz.com">raka@xyz.com</td>
                    <td data-role="2">Reguler</td>
                    <td data-status="2">
                      <span class="badge badge-danger p-2">Tidak Aktif</span>
                    </td>
                    <td>
                      <button class="btn btn-info editUser">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delUser">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                </tbody> -->
              </table>
            </div>
          </div>
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
            <form action="#">
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
            </form>
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