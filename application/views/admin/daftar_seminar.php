<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb mb-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Seminar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar Seminar</li>
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
              <button id="btnTambahSeminar" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahSeminar">Tambah</button>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <h2>Kelola Daftar Seminar</h2>
            </div>
            <div class="col-12">
              <table id="daftarSeminar" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Mahasiswa/i</th>
                    <th>Seminar</th>
                    <th>Waktu</th>
                    <th>Ruangan</th>
                    <th>Peserta</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-id="1">1</td>
                    <td>0102041</td>
                    <td data-name="Diego Armando">Diego Armando</td>
                    <td>Proposal</td>
                    <td>10.00 04-01-2021</td>
                    <td>Google Meet</td>
                    <td>
                      <a href="#" class="text-info viewPeserta">10 (view)</a>
                    </td>
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
                    <td data-id="2">2</td>
                    <td>0102042</td>
                    <td data-name="Ahmad Budiman">Ahmad Budiman</td>
                    <td>Seminar Hasil</td>
                    <td>10.00 04-01-2021</td>
                    <td>Zoom</td>
                    <td>
                      <a href="#" class="text-info viewPeserta">10 (view)</a>
                    </td>
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
                    <td data-id="3">3</td>
                    <td>0102043</td>
                    <td data-name="Fredelina Putri">Fredelina Putri</td>
                    <td>Seminar Akhir</td>
                    <td>10.00 04-01-2021</td>
                    <td>B2034</td>
                    <td>
                      <a href="#" class="text-info viewPeserta">0 (view)</a>
                    </td>
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
  <!-- Modal Add Seminar -->
  <div class="modal fade" id="modalTambahSeminar" tabindex="-1" role="dialog" aria-labelledby="modalTambahSeminarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Seminar Baru</h5>
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
              <label>Seminar</label>
              <select class="form-control">
                <option value="0">Pilih Seminar</option>
                <option value="1">Proposal</option>
                <option value="2">Seminar Hasil</option>
                <option value="3">Seminar Akhir</option>
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
            <div class="form-group">
              <label>Ruangan</label>
              <select class="form-control">
                <option value="0">Pilih Ruangan</option>
                <option value="1">Zoom</option>
                <option value="2">Google Meet</option>
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

  <!-- Modal View Seminar -->
  <div class="modal fade" id="modalViewSeminar" tabindex="-1" role="dialog" aria-labelledby="modalViewSeminarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Peserta Seminar <span id="namaPeserta" class="font-weight-bold"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Mahasiswa/i</th>
                <th>Prodi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>0102041</td>
                <td>Wati</td>
                <td>Sistem Informasi</td>
              </tr>
              <tr>
                <td>2</td>
                <td>0102042</td>
                <td>Wawan</td>
                <td>Teknik Informatika</td>
              </tr>
              <tr>
                <td>3</td>
                <td>0102043</td>
                <td>Ali</td>
                <td>Teknik Informatika</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

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
              <label>Seminar</label>
              <select class="form-control">
                <option value="0">Pilih Seminar</option>
                <option value="1">Proposal</option>
                <option value="2">Seminar Hasil</option>
                <option value="3">Seminar Akhir</option>
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
            <div class="form-group">
              <label>Ruangan</label>
              <select class="form-control">
                <option value="0">Pilih Ruangan</option>
                <option value="1">Zoom</option>
                <option value="2">Google Meet</option>
              </select>
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