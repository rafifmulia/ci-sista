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
          <div class="container-fluid">
            <div class="content mt-4">
              <div class="row mt-3">
                <div class="col-12">
                  <form action="#">
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-3 col-lg-2">
                            <label style="font-size:15px;font-weight:bold;">NIM</label>
                          </div>
                          <div class="col-sm-12 col-md-9 col-lg-10">
                            <input id="nim" type="number" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-3 col-lg-2">
                            <label style="font-size:15px;font-weight:bold;">Nama</label>
                          </div>
                          <div class="col-sm-12 col-md-9 col-lg-10">
                            <input id="nama" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-3 col-lg-2">
                            <label style="font-size:15px;font-weight:bold;">Prodi</label>
                          </div>
                          <div class="col-sm-12 col-md-9 col-lg-10">
                            <select id="prodi" class="form-control">
                              <option value="0">Pilih Prodi</option>
                              <option value="si">Sistem Informasi</option>
                              <option value="ti">Teknik Informatika</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-5 col-lg-4">
                            <label style="font-size:15px;font-weight:bold;">Tanggal Seminar</label>
                          </div>
                          <div class="col-sm-12 col-md-7 col-lg-8">
                            <input id="tglSeminar" type="date" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-5 col-lg-4">
                            <label style="font-size:15px;font-weight:bold;">Jam Seminar</label>
                          </div>
                          <div class="col-sm-12 col-md-7 col-lg-8">
                            <input id="jamSeminar" type="time" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-4 col-lg-3">
                            <label style="font-size:15px;font-weight:bold;">Ruangan</label>
                          </div>
                          <div class="col-sm-12 col-md-8 col-lg-9">
                            <select id="ruangan" class="form-control">
                              <option value="0">Pilih Ruangan</option>
                              <option value="zoom">Zoom</option>
                              <option value="gmets">Google Meets</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-4 col-lg-3">
                            <label style="font-size:15px;font-weight:bold;">Judul TA</label>
                          </div>
                          <div class="col-sm-12 col-md-8 col-lg-9">
                            <textarea id="judulTA" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-4 col-lg-3">
                            <label style="font-size:15px;font-weight:bold;">Seminar</label>
                          </div>
                          <div class="col-sm-12 col-md-8 col-lg-9">
                            <select id="seminar" class="form-control">
                              <option value="0">Pilih Jenis Seminar</option>
                              <option value="1">Proposal</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-4 col-lg-4">
                            <label style="font-size:15px;font-weight:bold;">Pembimbing</label>
                          </div>
                          <div class="col-sm-12 col-md-8 col-lg-8">
                            <select id="pembimbing" class="form-control">
                              <option value="0">Pilih Pembimbing</option>
                              <option value="dosen123">Sirojul Munir S.SI, M.KOM</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-4 col-lg-3">
                            <label style="font-size:15px;font-weight:bold;">Penguji1</label>
                          </div>
                          <div class="col-sm-12 col-md-8 col-lg-9">
                            <select id="penguji1" class="form-control">
                              <option value="0">Pilih Penguji1</option>
                              <option value="dosen234">Ahmad Rio M.SI</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 col-md-4 col-lg-3">
                            <label style="font-size:15px;font-weight:bold;">Penguji2</label>
                          </div>
                          <div class="col-sm-12 col-md-8 col-lg-9">
                            <select id="penguji2" class="form-control">
                              <option value="0">Pilih Penguji2</option>
                              <option value="dosen765">Amalia Rahmah M.T</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary" id="btnDaftar">Daftar</button>
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