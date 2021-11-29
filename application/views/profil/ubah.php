<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Profil</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Profil</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
   <form action="" method="POST">
    <div class="card-header">
      Ubah Profil
    </div>
    <div class="card-body">
      <!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_SUKSES, MAKA TAMPILKAN PESANNYA -->
      <?php if ($this->session->flashdata('pesan_sukses')): ?>
        <div class="alert alert-success">
          <?php echo $this->session->flashdata('pesan_sukses') ?>
        </div>
      <?php endif ?>
      <div class="form-group">
        <label>Username <small class="text-danger">*</small></label>
        <input type="text" class="form-control" name="username_pengguna" value="<?php echo $profil['username_pengguna'] ?>" required>
      </div>
      <div class="form-group">
        <label>Password <small class="text-danger">* kosongkan jika tidak diubah</small></label>
        <input type="text" class="form-control" name="password_pengguna">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
    </div>
  </form>
</div>
<!-- END KONTEN -->
</div>