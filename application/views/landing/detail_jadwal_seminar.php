<div class="row d-flex justify-content-center">

  <div class="col-sm-12 col-md-10 col-lg-10 mb-5">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-center">
            <h2>Seminar Proposal</h2>
          </div>
          <div class="container-fluid">
            <div class="content mt-4">
              <div class="row mt-3">
                <div class="col-12">
                  <form action="#">

                    <div class="d-sm-flex align-items-center justify-content-end mb-4">
                      <nav aria-label="breadcrumb mb-0">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="<?= base_url('landing/home') ?>">Home</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('landing/jadwal') ?>">Jadwal</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Seminar Proposal</li>
                        </ol>
                      </nav>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 20px">NIM :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= $detail[0]->nim ?></label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 20px">Nama :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= $detail[0]->nama_mahasiswa ?></label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 20px">Prodi :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= ($detail[0]->prodi == 'ti') ? 'Teknik Informatika' : 'Sistem Informasi' ?></label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 20px">Judul :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= $detail[0]->judul ?></label>
                          </div>
                        </div>

                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 20px">Waktu :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= substr($detail[0]->jam, 0, -3) ?> <?= $detail[0]->tanggal ?></label>
                          </div>

                        </div>
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 20px">Ruang :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= $detail[0]->lokasi ?></label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 20px">Pembimbing :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= $detail[0]->nama_pembimbing ?></label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 19px">Penguji :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= $detail[0]->nama_penguji1 ?></label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-12">
                            <label><b style="font-size: 19px">Penguj2 :</b></label>
                          </div>
                          <div class="col-12">
                            <label style="font-size: 20px"><?= $detail[0]->nama_penguji2 ?></label>
                          </div>
                        </div>

                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary" id="btnDaftar"><a href="<?= base_url('landing/daftar_peserta') ?>" class="nav-link" style="color: white">Daftar Peserta</a></button>
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