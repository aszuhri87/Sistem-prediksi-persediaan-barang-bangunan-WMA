<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Tambah Pemasok</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('pemasok/tampil') ?>">Pemasok</a></li>
    <li class="breadcrumb-item active">Tambah</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
   <form action="" method="POST">
    <div class="card-header">
      Tambah Pemasok
    </div>
    <div class="card-body">
      <div class="form-group row">
       <div class="col-md-6">
        <label>Nama Pemasok <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="nama_pemasok" required>
      </div>
      <div class="col-md-6">
         <label>Telp / No. HP Pemasok <small class="text-danger">*</small></label>
        <input type="number" class="form-control" name="telepon_pemasok" required>
      </div>
    </div>
    <div class="form-group">
      <label>Alamat Pemasok <small class="text-danger">*</small></label>
      <textarea class="form-control" name="alamat_pemasok" required></textarea>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-1"></i> Kirim</button>
    <a href="<?php echo base_url('pemasok/tampil') ?>" class="btn btn-secondary">Kembali</a>
  </div>
</form>
</div>
<!-- END KONTEN -->
</div>