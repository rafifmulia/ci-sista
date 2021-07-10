<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb mb-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Peserta</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('admin/daftar_seminar') ?>">Daftar Peserta</a></li>
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
                Peserta Mahasiswa: <?= $detail_seminar[0]->nama_mahasiswa ?> <span>(<?= $detail_seminar[0]->nim ?>)</span> - <?= ($detail_seminar[0]->prodi == 'ti') ? 'Teknik Informatika' : 'Sistem Informasi' ?>
              </p>
              <p>
                Judul: <?= $detail_seminar[0]->judul ?>
              </p>
              <p>
                Waktu Peserta: <?= substr($detail_seminar[0]->jam, 0, -3) ?> <?= $detail_seminar[0]->tanggal ?>
              </p>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalFormPenilaian">Form Penilaian</button>
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
              <h2>Daftar Peserta</h2>
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
                  <?php $i = 0;
                  foreach ($daftar_peserta as $p) { ?>
                    <tr>
                      <td data-id="<?= $p->id ?>"><?= ++$i ?></td>
                      <td><?= $p->nim ?></td>
                      <td data-name="<?= $p->nama ?>"><?= $p->nama ?></td>
                      <td><?= ($p->prodi == 'ti') ? 'Teknik Informatika' : 'Sistem Informasi' ?></td>
                      <td><?= $p->created_at ?></td>
                      <td><?php if ($p->status == 'acc') {
                            echo '<span class="badge badge-info p-2">Diterima</span>';
                          } else if ($p->status == 'reject') {
                            echo '<span class="badge badge-danger p-2">Ditolak</span>';
                          } else {
                            echo '<span class="badge badge-warning p-2 font-weight-bold">Pending</span>';
                          } ?></td>
                      <td>
                        <button class="btn btn-info editPeserta">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger delPeserta">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <!-- <tbody>
                  <tr>
                    <td>1</td>
                    <td>0102041</td>
                    <td>Wati</td>
                    <td>Sistem Informasi</td>
                    <td>S1</td>
                    <td><span class="badge badge-info p-2">Diterima</span></td>
                    <td>
                      <button class="btn btn-info editPeserta">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delPeserta">
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
                      <button class="btn btn-info editPeserta">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delPeserta">
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
                      <button class="btn btn-info editPeserta">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger delPeserta">
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
  <!-- Modal Edit Peserta -->
  <div class="modal fade" id="modalEditPeserta" tabindex="-1" role="dialog" aria-labelledby="modalEditPesertaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Peserta <span id="namaPesertaPeserta" class="font-weight-bold"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="edit_peserta" action="<?= base_url('admin/edit_peserta') ?>" method="POST">
            <div class="form-group">
              <label>NIM</label>
              <input id="ed_nim" type="number" class="form-control" disabled>
              <input id="ed_id" name="id" type="number" class="form-control" hidden readonly>
            </div>
            <div class="form-group">
              <label>Mahasiswa/i</label>
              <input id="ed_nama" type="text" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Prodi</label>
              <select id="ed_prodi" class="form-control" disabled>
                <option value="0">Pilih Prodi</option>
                <option value="ti">Teknik Informatika</option>
                <option value="si">Sistem Informasi</option>
              </select>
            </div>
            <div class="form-group">
              <label>Waktu</label>
              <div class="form-row">
                <div class="col">
                  <input id="ed_tgl" type="date" class="form-control" disabled>
                </div>
                <div class="col">
                  <input id="ed_waktu" type="time" class="form-control" disabled>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Status</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="acc" checked>
                <label class="form-check-label">Terima</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="reject">
                <label class="form-check-label">Tolak</label>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button id="sendEdPeserta" type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Form Penilaian -->
  <div class="modal fade" id="modalFormPenilaian" tabindex="-1" role="dialog" aria-labelledby="modalFormPenilaianTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id="form_penilaian" action="<?= base_url('admin/form_penilaian') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Form Penilaian <span id="namaMhs" class="font-weight-bold"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label>Nilai Penguji1: </label>
                  <div class="font-weight-bold mb-2"><?= $detail_seminar[0]->nama_penguji1 ?></div>
                  <input id="seminar_id" name="seminar_id" type="number" value="<?= $detail_seminar[0]->id ?>" class="form-control" hidden readonly>
                  <?php
                  if ($detail_seminar[0]->nilai_penguji1 == null) {
                    echo '<input name="nilai_penguji1" type="number" class="form-control" required>';
                  } else {
                    echo '<input type="number" class="form-control" value="' . $detail_seminar[0]->nilai_penguji1 . '" disabled>';
                  }
                  ?>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Nilai Penguji2: </label>
                  <div class="font-weight-bold mb-2"><?= $detail_seminar[0]->nama_penguji2 ?></div>
                  <?php
                  if ($detail_seminar[0]->nilai_penguji2 == null) {
                    echo '<input name="nilai_penguji2" type="number" class="form-control" required>';
                  } else {
                    echo '<input type="number" class="form-control" value="' . $detail_seminar[0]->nilai_penguji2 . '" disabled>';
                  }
                  ?>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Nilai Pembimbing: </label>
                  <div class="font-weight-bold mb-2"><?= $detail_seminar[0]->nama_pembimbing ?></div>
                  <?php
                  if ($detail_seminar[0]->nilai_pembimbing == null) {
                    echo '<input name="nilai_pembimbing" type="number" class="form-control" required>';
                  } else {
                    echo '<input type="number" class="form-control" value="' . $detail_seminar[0]->nilai_pembimbing . '" disabled>';
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="row" <?= ($detail_seminar[0]->nilai_akhir != null) ? '' : 'hidden' ?>>
              <div class="col-12">
                <div class="form-group">
                  <label class="font-weight-bold">Nilai Akhir: </label>
                  <input id="nilai_akhir" type="number" value="<?= $detail_seminar[0]->nilai_akhir ?>" class="form-control" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button id="sendNilai" type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>