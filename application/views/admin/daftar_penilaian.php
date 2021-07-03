<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb mb-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Penilaian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar Penilaian</li>
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
              <button id="btnTambahPenilaian" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPenilaian">Tambah</button>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <h2>Daftar Penilaian</h2>
            </div>
            <div class="col-12">
              <table id="daftarPenilaian" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($penilaian as $d) { ?>
                    <tr>
                      <td data-id="<?= $d['id'] ?>"><?= ++$i ?></td>
                      <td data-name="<?= $d['nama'] ?>"><?= $d['nama'] ?></td>
                      <td data-name="<?= $d['keterangan'] ?>"><?= $d['keterangan'] ?></td>
                      <td data-status="<?= $d['is_active'] ?>">
                        <?php
                        if ($d['is_active'] == 'yes') {
                          echo '<span class="badge badge-info p-2">Aktif</span>';
                        } else {
                          echo '<span class="badge badge-danger p-2">Nonaktif</span>';
                        }
                        ?>
                      </td>
                      <td>
                        <button class="btn btn-info editPenilaian">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger delPenilaian">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                  <?php } ?>
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
  <!-- Modal Add Penilaian -->
  <div class="modal fade" id="modalTambahPenilaian" tabindex="-1" role="dialog" aria-labelledby="modalTambahPenilaianTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="<?= base_url('admin/save_penilaian') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Penilaian Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" id="add_nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" id="add_keterangan" name="keterangan" class="form-control" required>
            </div>
            <div class="form-group row">
              <div class="col-2">
                <label>Status :</label>
              </div>
              <div class="col-10">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="is_active" class="custom-control-input" id="add_switchStatus">
                  <label id="add_lblSwitchStatus" class="custom-control-label" for="add_switchStatus">Nonaktif</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" id="btnAdd" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Penilaian -->
  <div class="modal fade" id="modalEditPenilaian" tabindex="-1" role="dialog" aria-labelledby="modalEditPenilaianTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="edit_penilaian" action="<?= base_url('admin/edit_penilaian') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Edit Penilaian <span id="namaPenilaian" class="font-weight-bold"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" id="ed_id" name="id" class="form-control" hidden readonly>
              <input type="text" id="ed_nama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" id="ed_keterangan" name="keterangan" class="form-control" required>
            </div>
            <div class="form-group row">
              <div class="col-2">
                <label>Status :</label>
              </div>
              <div class="col-10">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="is_active" class="custom-control-input" id="ed_switchStatus" required>
                  <label id="ed_lblSwitchStatus" class="custom-control-label" for="ed_switchStatus">Nonaktif</label>
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