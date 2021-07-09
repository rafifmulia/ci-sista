<div class="row d-flex justify-content-center">

  <div class="col-sm-12 col-md-10 col-lg-10 mb-5">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-center">
            <h2>Daftar Sebagai Peserta</h2>
          </div>
          <div class="container-fluid">
            <div class="content mt-4">
              <div class="row mt-3">
                <div class="col-12">
                  <form action="<?= base_url('landing/save_peserta') ?>" method="POST">

                    <div class="d-sm-flex align-items-center justify-content-end mb-4">
                      <nav aria-label="breadcrumb mb-0">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="<?= base_url('landing/home') ?>">Home</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('landing/jadwal') ?>">Jadwal</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('landing/detail_jadwal_seminar') ?>">Seminar Proposal</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Daftar Peserta</li>
                        </ol>
                      </nav>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label><b style="font-size: 20px">Pembicara :</b></label>
                          <label style="font-size: 20px"><?= $detail[0]->nama_mahasiswa ?></label>
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Waktu :</b></label>
                          <label style="font-size: 20px"><?= substr($detail[0]->jam, 0, -3) ?> <?= $detail[0]->tanggal ?></label>
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Judul :</b></label>
                          <label style="font-size: 20px"><?= $detail[0]->judul ?></label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
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
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label><b style="font-size: 20px">NIM :</b></label>
                          <input id="nim" name="nim" type="number" class="form-control" required>
                          <input id="seminar_id" name="seminar_id" type="number" value="<?= $seminar_id ?>" class="form-control" hidden readonly required>
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Nama :</b></label>
                          <input id="nama" name="nama" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Prodi :</b></label>
                          <select id="prodi" name="prodi" class="form-control" required>
                            <option value="0">Pilih Prodi</option>
                            <option value="ti">Tekhnik Informatika</option>
                            <option value="si">Sistem Informasi</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Program :</b></label><br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="program" value="d3" id="program1" checked>
                            <label class="form-check-label" for="program1">D3</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="program" value="s1" id="program2">
                            <label class="form-check-label" for="program2">S1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="program" value="s1_fast" id="program2">
                            <label class="form-check-label" for="program2">S1 Fast Track1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="program" value="s3" id="program2">
                            <label class="form-check-label" for="program2">S2</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <button id="btnDaftar" type="submit" class="btn btn-primary">Daftar Peserta</button>
                        </div>
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