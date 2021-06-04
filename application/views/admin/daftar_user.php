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
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
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
                </tbody>
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
        <div class="modal-header">
          <h5 class="modal-title">Buat User Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="form-group">
              <label>Role</label>
              <select class="form-control">
                <option value="0">Pilih Role</option>
                <option value="1">Reguler</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit User -->
  <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
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
              <input type="text" id="edtUsername" class="form-control">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" id="edtEmail" class="form-control">
            </div>
            <div class="form-group">
              <label>Role</label>
              <select id="edtRole" class="form-control">
                <option value="0">Pilih Role</option>
                <option value="1">Super Admin</option>
                <option value="2">Reguler</option>
              </select>
            </div>
            <div class="form-group row">
              <div class="col-2">
                <label>Status :</label>
              </div>
              <div class="col-10">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="edtswitchStatus">
                  <label id="lblEdtSwitchStatus" class="custom-control-label" for="edtswitchStatus">-</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>
</div>