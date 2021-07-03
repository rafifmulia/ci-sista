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
                  <?php $i = 0;
                  foreach ($daftar_seminar as $s) { ?>
                    <tr>
                      <td data-id="<?= $s->id ?>"><?= ++$i ?></td>
                      <td><?= $s->nim ?></td>
                      <td data-name="<?= $s->nama_mahasiswa ?>"><?= $s->nama_mahasiswa ?></td>
                      <td><?= $s->kategori_seminar ?></td>
                      <td><?= substr($s->jam, 0, -3) ?> <?= $s->tanggal ?></td>
                      <td><?= $s->lokasi ?></td>
                      <td>
                        <a href="#" class="text-info viewPeserta"><?= ($s->total_peserta) ? $s->total_peserta : 0 ?> (view)</a>
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
                  <?php } ?>
                </tbody>
                <!-- <tbody>
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
  <!-- Modal Add Seminar -->
  <div class="modal fade" id="modalTambahSeminar" tabindex="-1" role="dialog" aria-labelledby="modalTambahSeminarTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="<?= base_url('admin/save_seminar') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Seminar Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                  <div class="col-sm-12 col-md-3 col-lg-2">
                    <label style="font-size:15px;font-weight:bold;">NIM</label>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-10">
                    <input id="nim" name="nim" type="number" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-3 col-lg-2">
                    <label style="font-size:15px;font-weight:bold;">Nama</label>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-10">
                    <input id="nama" name="nama" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-3 col-lg-2">
                    <label style="font-size:15px;font-weight:bold;">Prodi</label>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-10">
                    <select id="prodi" name="prodi" class="form-control">
                      <option value="0">Pilih Prodi</option>
                      <option value="si">Sistem Informasi</option>
                      <option value="ti">Teknik Informatika</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-3 col-lg-2">
                    <label style="font-size:15px;font-weight:bold;">Semester</label>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-10">
                    <select name="semester" class="form-control">
                      <?php for ($i = 1; $i < 11; $i++) { ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-5 col-lg-4">
                    <label style="font-size:15px;font-weight:bold;">Tanggal Seminar</label>
                  </div>
                  <div class="col-sm-12 col-md-7 col-lg-8">
                    <input id="tglSeminar" name="tgl" type="date" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-5 col-lg-4">
                    <label style="font-size:15px;font-weight:bold;">Jam Seminar</label>
                  </div>
                  <div class="col-sm-12 col-md-7 col-lg-8">
                    <input id="jamSeminar" name="jam" type="time" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Ruangan</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <input type="text" name="ruangan" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Judul TA</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <textarea id="judulTA" name="judul" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Seminar</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <select name="kategori_seminar" class="form-control">
                      <option value="0">Pilih Kategori</option>
                      <?php foreach ($get_kategori_seminar as $ks) { ?>
                        <option value="<?php echo $ks['id'] ?>"><?php echo $ks['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label style="font-size:15px;font-weight:bold;">Pembimbing</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-8">
                    <select name="pembimbing" class="form-control">
                      <option value="0">Pilih Pembimbing</option>
                      <?php foreach ($get_dosen as $p) { ?>
                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Penguji1</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <select name="penguji1" class="form-control">
                      <option value="0">Pilih Penguji1</option>
                      <?php foreach ($get_dosen as $p) { ?>
                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Penguji2</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <select name="penguji2" class="form-control">
                      <option value="0">Pilih Penguji2</option>
                      <?php foreach ($get_dosen as $p) { ?>
                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
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
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="edit_seminar" action="<?= base_url('admin/edit_seminar') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Edit Seminar <span id="namaPesertaSeminar" class="font-weight-bold"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                  <div class="col-sm-12 col-md-3 col-lg-2">
                    <label style="font-size:15px;font-weight:bold;">NIM</label>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-10">
                    <input id="ed_id" name="id" type="number" class="form-control" hidden required>
                    <input id="ed_nim" name="nim" type="number" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-3 col-lg-2">
                    <label style="font-size:15px;font-weight:bold;">Nama</label>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-10">
                    <input id="ed_nama" name="nama" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-3 col-lg-2">
                    <label style="font-size:15px;font-weight:bold;">Prodi</label>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-10">
                    <select id="ed_prodi" name="prodi" class="form-control">
                      <option value="0">Pilih Prodi</option>
                      <option value="si">Sistem Informasi</option>
                      <option value="ti">Teknik Informatika</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-3 col-lg-2">
                    <label style="font-size:15px;font-weight:bold;">Semester</label>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-10">
                    <select id="ed_semester" name="semester" class="form-control">
                      <?php for ($i = 1; $i < 11; $i++) { ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-5 col-lg-4">
                    <label style="font-size:15px;font-weight:bold;">Tanggal Seminar</label>
                  </div>
                  <div class="col-sm-12 col-md-7 col-lg-8">
                    <input id="ed_tglSeminar" name="tgl" type="date" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-5 col-lg-4">
                    <label style="font-size:15px;font-weight:bold;">Jam Seminar</label>
                  </div>
                  <div class="col-sm-12 col-md-7 col-lg-8">
                    <input id="ed_jamSeminar" name="jam" type="time" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Ruangan</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <input id="ed_ruangan" type="text" name="ruangan" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Judul TA</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <textarea id="ed_judulTA" name="judul" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Seminar</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <select id="ed_kategori_seminar" name="kategori_seminar" class="form-control">
                      <option value="0">Pilih Kategori</option>
                      <?php foreach ($get_kategori_seminar as $ks) { ?>
                        <option value="<?php echo $ks['id'] ?>"><?php echo $ks['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <label style="font-size:15px;font-weight:bold;">Pembimbing</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-8">
                    <select id="ed_pembimbing" name="pembimbing" class="form-control">
                      <option value="0">Pilih Pembimbing</option>
                      <?php foreach ($get_dosen as $p) { ?>
                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Penguji1</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <select id="ed_penguji1" name="penguji1" class="form-control">
                      <option value="0">Pilih Penguji1</option>
                      <?php foreach ($get_dosen as $p) { ?>
                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-4 col-lg-3">
                    <label style="font-size:15px;font-weight:bold;">Penguji2</label>
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-9">
                    <select id="ed_penguji2" name="penguji2" class="form-control">
                      <option value="0">Pilih Penguji2</option>
                      <?php foreach ($get_dosen as $p) { ?>
                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" id="sendEdSeminar" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>