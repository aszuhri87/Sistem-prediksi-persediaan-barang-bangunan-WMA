<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Tambah Kategori</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kategori/tampil') ?>">Kategori</a></li>
    <li class="breadcrumb-item active">Tambah</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
   <form action="" method="POST">
    <div class="card-header">
      Tambah Kategori
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>Nama Kategori <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="nama_kategori" required>
      </div>
       <div class="form-group">
        <label>Deskripsi Kategori <small class="text-danger">[opsional]</small></label>
        <textarea class="form-control" name="deskripsi_kategori" required></textarea>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-1"></i> Kirim</button>
      <a href="<?php echo base_url('barang/tampil') ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
<!-- END KONTEN -->
</div>