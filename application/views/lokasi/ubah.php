<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Ubah Lokasi</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('lokasi/tampil') ?>">Lokasi</a></li>
    <li class="breadcrumb-item active">Ubah</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
   <form action="" method="POST">
    <div class="card-header">
      Ubah Lokasi
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>Nama Lokasi <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="nama_lokasi" value="<?php echo $lokasi['nama_lokasi'] ?>" required>
      </div>
        <div class="form-group">
        <label>Deskripsi <small class="text-danger">[opsional]</small></label>
        <textarea class="form-control" name="deskripsi_lokasi"><?php echo $lokasi['deskripsi_lokasi'] ?></textarea>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
      <a href="<?php echo base_url('lokasi/tampil') ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
<!-- END KONTEN -->
</div>