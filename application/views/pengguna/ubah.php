<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Ubah Pengguna</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('pengguna/tampil') ?>">Pengguna</a></li>
    <li class="breadcrumb-item active">Ubah</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
   <form action="" method="POST">
    <div class="card-header">
      Ubah Pengguna
    </div>
    <div class="card-body">
      <!-- <div class="form-group">
        <label>Nama <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="nama_pengguna" value="<?php echo $pengguna['nama_pengguna'] ?>" required>
      </div> -->
      <div class="form-group">
        <label>Username <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="username_pengguna" value="<?php echo $pengguna['username_pengguna'] ?>" required>
      </div>
      <div class="form-group">
      <label for="exampleFormControlSelect1">HaK Akses</label>
        <select class="form-control" name="level_pengguna">
          <option selected> -- Pilih -- </option>
          <option value="Inventori" <?=$pengguna['level_pengguna']== 'Inventori'?'selected':''?>>Admin Gudang</option>
          <option value="Admin" <?=$pengguna['level_pengguna']== 'Admin'?'selected':''?>>Admin</option>
          <option value="Kasir" <?=$pengguna['level_pengguna']== 'Kasir'?'selected':''?>>Kasir</option>
        </select>
      </div>
       <div class="form-group">
        <label>Password <small class="text-danger">**</small></label>
        <input type="password" class="form-control" name="password_pengguna">
        <div class="small text-danger">**) Kosongkan jika tidak diubah</div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-1"></i> Simpan</button>
      <a href="<?php echo base_url('pengguna/tampil') ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
<!-- END KONTEN -->
</div>