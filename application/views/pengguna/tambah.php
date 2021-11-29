<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Tambah Pengguna</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('pengguna/tampil') ?>">Pengguna</a></li>
    <li class="breadcrumb-item active">Tambah</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
   <form action="" method="POST">
    <div class="card-header">
      Tambah Pengguna
    </div>
    <div class="card-body">
      <!-- <div class="form-group">
        <label>Nama <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="nama_pengguna" required>
      </div> -->
      <div class="form-group">
        <label>Username <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="username_pengguna" required>
      </div>
     <div class="form-group">
    <label for="exampleFormControlSelect1">HaK Akses</label>
      <select class="form-control" name="level_pengguna">
        <option>Pilih</option>
        <option value="Inventori">Admin Gudang</option>
        <option value="Admin"> Admin</option>
        <option value="Kasir">Kasir</option>
      </select>
    </div>
       <div class="form-group">
        <label>Password <small class="text-danger">*</small></label>
        <input type="password" class="form-control" name="password_pengguna" required>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-1"></i> Kirim</button>
      <a href="<?php echo base_url('pengguna/tampil') ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
<!-- END KONTEN -->
</div>