<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php echo $judul;?></h1>
</div>
<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Terakhir</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($pendapatan,2,',','.');?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div> &nbsp Total Pemasukan: Rp.<?=number_format($total,2,',','.');?>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran Terakhir</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($pengeluaran,2,',','.');?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div> &nbsp Total Pengeluaran: Rp.<?=number_format($total2,2,',','.');?>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sisa Uang</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.<?=number_format(($total-$total2),2,',','.');?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aktivitas Terakhir</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$aktif?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>&nbsp Keterangan: <?=$keterangan;?>
    </div>
  </div>
</div>
<!-- Content Row -->
<div class="row">
  <!-- Pie Chart -->
  <div class="col-xl-12 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Perbandingan</h6>
        <div class="dropdown no-arrow">
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="myPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">
          <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Pendapatan
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-danger"></i> Pengeluaran
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-info"></i> Sisa
          </span>
        </div>
      </div>
    </div>
  </div>
</div>