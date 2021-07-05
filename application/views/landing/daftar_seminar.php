<div class="row d-flex justify-content-center">

  <div class="col-sm-12 col-md-10 col-lg-9 mb-5">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-center">
            <h2>Pendaftaran Seminar TA Baru</h2>
          </div>
          <div class="col-12 text-center">Pendaftaran Seminar berlaku untuk mahasiswa yang telah mendapat
            persetujuan dari Pembimbing TA
          </div>
          <div class="col-12 mt-2">
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
          <div class="container-fluid">
            <div class="content mt-4">
              <div class="row mt-3">
                <div class="col-12">
                  <form action="<?= base_url('landing/save_seminar') ?>" method="POST">
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-3 col-lg-2">
                            <label style="font-size:15px;font-weight:bold;">NIM</label>
                          </div>
                          <div class="col-sm-12 col-md-9 col-lg-10">
                            <input id="nim" name="nim" type="number" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-3 col-lg-2">
                            <label style="font-size:15px;font-weight:bold;">Nama</label>
                          </div>
                          <div class="col-sm-12 col-md-9 col-lg-10">
                            <input id="nama" name="nama" type="text" class="form-control">
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
                            <input id="tglSeminar" name="tgl" type="date" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-5 col-lg-4">
                            <label style="font-size:15px;font-weight:bold;">Jam Seminar</label>
                          </div>
                          <div class="col-sm-12 col-md-7 col-lg-8">
                            <input id="jamSeminar" name="jam" type="time" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-4 col-lg-3">
                            <label style="font-size:15px;font-weight:bold;">Ruangan</label>
                          </div>
                          <div class="col-sm-12 col-md-8 col-lg-9">
                            <input type="text" id="ruangan" name="ruangan" class="form-control">
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
                            <select id="seminar" name="kategori_seminar" class="form-control">
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
                            <select id="pembimbing" name="pembimbing" class="form-control">
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
                            <select id="penguji1" name="penguji1" class="form-control">
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
                            <select id="penguji2" name="penguji2" class="form-control">
                              <option value="0">Pilih Penguji2</option>
                              <?php foreach ($get_dosen as $p) { ?>
                                <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary" id="btnDaftar">Daftar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>