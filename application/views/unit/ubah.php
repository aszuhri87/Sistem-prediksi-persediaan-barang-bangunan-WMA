<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Ubah Satuan</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('unit/tampil') ?>">Satuan</a></li>
    <li class="breadcrumb-item active">Ubah</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
    <form action="" method="POST">
      <div class="card-header">
        Ubah Satuan
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Nama Satuan <small class="text-danger">*</small></label>
          <input type="text" class="form-control" name="nama_unit" value="<?php echo $unit['nama_unit'] ?>" required>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
        <a href="<?php echo base_url('unit/tampil') ?>" class="btn btn-secondary">Kembali</a>
      </div>
    </form>
  </div>
  <!-- END KONTEN -->
</div>