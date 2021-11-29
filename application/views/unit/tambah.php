<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Tambah Unit</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('unit/tampil') ?>">Unit</a></li>
    <li class="breadcrumb-item active">Tambah</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
  <form action="" method="POST">
    <div class="card-header">
      Tambah Unit
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>Nama Unit <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="nama_unit" required>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-1"></i> Kirim</button>
      <a href="<?php echo base_url('unit/tampil') ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
<!-- END KONTEN -->
</div>