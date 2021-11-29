<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Tambah Obat</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('barang/tampil') ?>">Obat</a></li>
    <li class="breadcrumb-item active">Tambah</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
   <form action="" method="POST" enctype="multipart/form-data">
    <div class="card-header">
      Tambah Obat
    </div>
    <div class="card-body">
      <!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_ERROR, MAKA TAMPILKAN PESANNYA -->
      <?php if ($this->session->flashdata('pesan_error')): ?>
        <div class="alert alert-success">
          <?php echo $this->session->flashdata('pesan_error') ?>
        </div>
      <?php endif ?>
      <div class="form-group row">
        <div class="col-md-4">
          <label>Nama Obat <small class="text-danger">*</small></label>
          <input type="text" class="form-control" name="nama_barang" required>
        </div>
        <div class="col-md-4">
          <label>Harga Beli <small class="text-danger">*</small></label>
          <input type="text" class="form-control" min="1" name="harga_beli_barang" required>
        </div>
        <div class="col-md-4">
          <label>Harga Jual <small class="text-danger">*</small></label>
          <input type="text" class="form-control" min="1" name="harga_jual_barang" required>
        </div>
        <!-- <div class="col-md-4">
          <label>Foto Obat <small class="text-danger">*</small></label>
          <input type="file" class="form-control" name="foto_barang" required>
        </div> -->
      </div>
      <div class="form-group row">
        <!-- <div class="col-md-3">
          <label>Tanggal Kadaluarsa <small class="text-danger">*</small></label>
          <input type="date" class="form-control" name="kadaluarsa_barang" min="<?php echo date("Y-m-d") ?>" required>
        </div> -->
       <!--  <div class="col-md-4">
          <label>Stok Obat <small class="text-danger">*</small></label>
          <input type="text" class="form-control" name="stok_barang" min="0" required>
        </div> -->
        <div class="col-md-4">
         <label>Unit <small class="text-danger">*</small></label>
         <select name="id_unit" class="form-control" required>
          <option value="">--Pilih--</option>
          <?php foreach ($unit as $key => $value): ?>
            <option value="<?php echo $value['id_unit'] ?>"><?php echo $value['nama_unit'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <!-- KATEGORI -->
    <div class="col-md-4">
      <label>Kategori <small class="text-danger">*</small></label>
      <select name="id_kategori" class="form-control" required>
        <option value="">--Pilih--</option>
        <?php foreach ($kategori as $key => $value): ?>
          <option value="<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <!-- ./KATEGORI -->
    <!-- PEMASOK -->
        <!-- <div class="col-md-4">
          <label>Pemasok <small class="text-danger">*</small></label>
          <select name="id_pemasok" class="form-control" required>
            <option value="">--Pilih--</option>
            <?php foreach ($pemasok as $key => $value): ?>
              <option value="<?php echo $value['id_pemasok'] ?>"><?php echo $value['nama_pemasok'] ?></option>
            <?php endforeach ?>
          </select>
        </div> -->
        <!-- ./PEMASOK -->
        <!-- Lokasi -->
        <div class="col-md-4">
          <label>Lokasi Penyimpanan <small class="text-danger">*</small></label>
          <select name="id_lokasi" class="form-control" required>
            <option value="">--Pilih--</option>
            <?php foreach ($lokasi as $key => $value): ?>
              <option value="<?php echo $value['id_lokasi'] ?>"><?php echo $value['nama_lokasi'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <!-- ./Lokasi -->
    </div>
    <div class="form-group">
      <label>Deskripsi Obat</label>
      <textarea class="form-control" name="deskripsi_barang"></textarea>
    </div>
    <div class="form-group row">

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