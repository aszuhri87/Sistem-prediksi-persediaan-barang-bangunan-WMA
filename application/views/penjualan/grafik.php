<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Statistik Penjualan</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Transaksi</li>
    <li class="breadcrumb-item active">Statistik Penjualan</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <div class="input-group date" id='tahun'>
        <input type="text" name="tahun_beli" id="tahun_beli" class="form-control tahun_beli" required="required" placeholder="Pilih Tahun">
        <div class="input-group-append">
          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        </div>
      </div>
      <h5 class="mb-0">Grafik Penjualan</h5>
    </div>
    <div class="card-body">
      <canvas id="grafik_penjualan" width="900" height="280"></canvas>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Penjualan Tertinggi</h5>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th width="25%">Total Terjual</th>
              </tr>
            </thead>
            <tbody id="penjualan_tertinggi">
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Penjualan Terendah</h5>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th width="25%">Total Terjual</th>
              </tr>
            </thead>
            <tbody id="penjualan_terendah">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- END KONTEN -->
</div>