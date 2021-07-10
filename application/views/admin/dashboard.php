<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Total Dosen</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_dosen_total ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Penilaian</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_penilaian_total ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Total User</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_user_verif ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Total User Belum Diverifikasi</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_user_notverif ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <!-- Pie Chart -->
    <div class="col-6">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Grafik Seminar Tugas Akhir</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div> -->
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="mt-4 text-center small">
            <span class="mr-2">
              <i class="fas fa-circle text-info"></i> Seminar Terjadwal
            </span> <br>
            <span class="mr-2">
              <i class="fas fa-circle text-warning"></i> Seminar Sedang Berlangsung (Hari ini)
            </span> <br>
            <span class="mr-2">
              <i class="fas fa-circle text-success"></i> Seminar Telah Selesai
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- Color System -->
    <div class="col-6 font-weight-bold">
      <div class="row">
        <div class="col-12">
          <div class="card bg-info text-white shadow">
            <div class="card-body">
              Seminar Terjadwal
              <div><?= $count_seminar_schedule ?></div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <div class="card bg-warning text-white shadow">
            <div class="card-body">
              Seminar Sedang Berlangsung (Hari ini)
              <div><?= $count_seminar_today ?></div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <div class="card bg-success text-white shadow">
            <div class="card-body">
              Seminar Telah Selesai
              <div><?= $count_seminar_finish ?></div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <div class="card bg-primary text-white shadow">
            <div class="card-body">
              Total Seminar
              <div><?= $count_seminar_total ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>