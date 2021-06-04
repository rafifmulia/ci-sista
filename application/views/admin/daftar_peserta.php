<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb mb-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Seminar</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('admin/daftar_seminar') ?>">Daftar Seminar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar Peserta</li>
      </ol>
    </nav>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <div class="row font-weight-bold">
            <div class="col-12">
              <p>
                Seminar Mahasiswa: Dieogo Armando (01020002) - Teknik Informatika
              </p>
              <p>
                Judul: Rancang Bangun Aplikasi Seminar Tugas Akhir Menggunakan MVC Framework
              </p>
              <p>
                Waktu Seminar: Senin, 4 Januari 2020, Jam: 10:10
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-12 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <div class="row">
            <div class="col-12 text-center">
              <h2>Daftar Peserta Seminar</h2>
            </div>
            <div class="col-12">
              <table id="daftarPeserta" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Mahasiswa/i</th>
                    <th>Prodi</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>0102041</td>
                    <td>Wati</td>
                    <td>Sistem Informasi</td>
                    <td>S1</td>
                    <td><span class="badge badge-info p-2">Diterima</span></td>
                    <td>
                      <button class="btn btn-info editSeminar">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delSeminar">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>0102042</td>
                    <td>Wawan</td>
                    <td>Teknik Informatika</td>
                    <td>S1</td>
                    <td><span class="badge badge-info p-2">Diterima</span></td>
                    <td>
                      <button class="btn btn-info editSeminar">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delSeminar">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>0102043</td>
                    <td>Ali</td>
                    <td>Teknik Informatika</td>
                    <td>S1</td>
                    <td><span class="badge badge-danger p-2">Ditolak</span></td>
                    <td>
                      <button class="btn btn-info editSeminar">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delSeminar">
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
  <!-- Modal Edit Seminar -->
  <div class="modal fade" id="modalEditSeminar" tabindex="-1" role="dialog" aria-labelledby="modalEditSeminarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Seminar <span id="namaPesertaSeminar" class="font-weight-bold"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <label>NIM</label>
              <input type="number" class="form-control">
            </div>
            <div class="form-group">
              <label>Mahasiswa/i</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Prodi</label>
              <select class="form-control">
                <option value="0">Pilih Prodi</option>
                <option value="1">Teknik Informatika</option>
                <option value="2">Sistem Informasi</option>
              </select>
            </div>
            <div class="form-group">
              <label>Waktu</label>
              <div class="form-row">
                <div class="col">
                  <input type="date" class="form-control">
                </div>
                <div class="col">
                  <input type="time" class="form-control">
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