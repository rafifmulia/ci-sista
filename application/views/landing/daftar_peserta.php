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
                  <form action="#">

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
                          <label style="font-size: 20px">Raga Murtadha</label>
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Waktu :</b></label>
                          <label style="font-size: 20px">Senin, 04 Januari 2020 10:10</label>
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Judul :</b></label>
                          <label style="font-size: 20px">Bangun Aplikasi Seminar Tugas Akhir Berbasis Web
                            Menggunakan MVC Framework</label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label><b style="font-size: 20px">NIM :</b></label>
                          <input id="nim" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Nama :</b></label>
                          <input id="nama" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Prodi :</b></label>
                          <select id="prodi" class="form-control">
                            <option value="0">Pilih Prodi</option>
                            <option value="1">Tekhnik Informatika</option>
                            <option value="2">Sistem Informasi</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label><b style="font-size: 20px">Program :</b></label><br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="program" id="program1" checked>
                            <label class="form-check-label" for="program1">D3</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="program" id="program2">
                            <label class="form-check-label" for="program2">S1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="program" id="program2">
                            <label class="form-check-label" for="program2">S1 Fast Track1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="program" id="program2">
                            <label class="form-check-label" for="program2">S2</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <button id="btnDaftar" class="btn btn-primary"><a href="#" class="nav-link" style="color: white">Daftar Peserta</a></button>
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