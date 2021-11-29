<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Data Pengguna</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item active">Pengguna</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
    <div class="card-header">
      Data Pengguna

      <div class="float-right"> 
                <a href="<?php echo base_url('pengguna/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i> Tambah</a>
      </div>
    </div>
    <div class="card-body">
      <!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_SUKSES, MAKA TAMPILKAN PESANNYA -->
      <?php if ($this->session->flashdata('pesan_sukses')): ?>
        <div class="alert alert-success">
          <?php echo $this->session->flashdata('pesan_sukses') ?>
        </div>
      <?php endif ?>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
          <thead>
            <tr>
              <th>No.</th>
              <th>Username</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $nomor=1; ?>
            <?php foreach ($pengguna as $key => $value): ?>
              <?php if ($value['id_pengguna'] != data_login('id_pengguna')): ?>
               <tr>
                 <td><?php echo $nomor ?></td>
                 <td><?php echo $value['username_pengguna'] ?></td>
                 <td><?php echo $value['level_pengguna'] ?></td>
                 <td>
                   <a href="<?php echo base_url('pengguna/ubah/' . $value['id_pengguna']) ?>" class="btn btn-sm btn-info">Ubah</a>
                   <a href="<?php echo base_url('pengguna/hapus/' . $value['id_pengguna']) ?>" 
                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                    class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                  <?php $nomor++ ?>
                <?php endif ?>
              </tr>
            <?php endforeach ?>

            <!-- JIKA DATA $SATUAN KOSONG, TAMPILKAN TR DIBAWAH-->
            <?php if (empty($pengguna)): ?>
              <tr>
                <td colspan="3" class="text-center">
                  Data masih kosong.
                </td>
              </tr>
            <?php endif ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
  <!-- END KONTEN -->
</div>