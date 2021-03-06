<div class="row d-flex justify-content-center">
  <div class="col-sm-12 col-md-10 col-lg-9 mb-4">
    <div class="card shadow h-100 py-2">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-center">
            <h2>Jadwal Seminar</h2>
          </div>
          <div class="col-12">
            <div class="table-responsive" style="width:100%;">
              <table id="daftarSeminar" class="table table-striped table-bordered table-hover no-wrap" style="width:100%;">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Mahasiswa/i</th>
                    <th>Seminar</th>
                    <th>Waktu</th>
                    <th>Ruangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($daftar_seminar as $s) { ?>
                    <tr>
                      <td data-id="<?= $s->id ?>"><?= ++$i ?></td>
                      <td><?= $s->nim ?></td>
                      <td data-name="<?= $s->nama_mahasiswa ?>">
                        <a href="<?= base_url('landing/detail_jadwal_seminar').'?id='.$s->id ?>" class="text-info">
                          <?= $s->nama_mahasiswa ?>
                        </a>
                      </td>
                      <td><?= $s->kategori_seminar ?></td>
                      <td><?= substr($s->jam, 0, -3) ?> <?= $s->tanggal ?></td>
                      <td><?= $s->lokasi ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <!-- <tbody>
                  <tr>
                    <td data-id="1">1</td>
                    <td>0102041</td>
                    <td data-name="Diego Armando"><a href="#">Diego Armando</a></td>
                    <td>Proposal</td>
                    <td>10.00 04-01-2021</td>
                    <td>Google Meet</td>
                  </tr>
                  <tr>
                    <td data-id="2">2</td>
                    <td>0102042</td>
                    <td data-name="Ahmad Budiman"><a href="#">Ahmad Budiman</a></td>
                    <td>Seminar Hasil</td>
                    <td>10.00 04-01-2021</td>
                    <td>Zoom</td>
                  </tr>
                  <tr>
                    <td data-id="3">3</td>
                    <td>0102043</td>
                    <td data-name="Fredelina Putri"><a href="#">Fredelina Putri</a></td>
                    <td>Seminar Akhir</td>
                    <td>10.00 04-01-2021</td>
                    <td>B2034</td>
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