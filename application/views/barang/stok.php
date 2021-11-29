<div class="container-fluid">
  <!-- JUDUL -->
  <h2 class="mt-4"><small>Stok Obat : </small> <?php echo $barang['nama_barang'] ?></h2>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Master</li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('barang/tampil') ?>">Obat</a></li>
    <li class="breadcrumb-item active">Stok</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
    <div class="card-header">
      Stok Obat : <?php echo $barang['nama_barang'] ?>
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
              <th>Ref</th>
              <th>Stok</th>
              <?php if (data_login('level_pengguna')!='Pemilik' && data_login('level_pengguna')!='Kasir'): ?>
              <!-- <th width="180">Aksi</th> -->
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($barang_stok as $key => $value): ?>
           <tr>
             <td><?php echo $key+1 ?></td>
             <td><?php echo $value['referensi'] ? $value['referensi'] : "-" ?></td>
             <td><?php echo $value['stok'] ?></td>
             <?php if (data_login('level_pengguna')!='Pemilik' && data_login('level_pengguna')!='Kasir'): ?>
            <!--  <td>
               <a href="<?php echo base_url('barang/ubah/' . $value['id_barang']) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
               <a href="<?php echo base_url('barang/hapus/' . $value['id_barang']) ?>" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              </td> -->
            <?php endif ?>
          </tr>
        <?php endforeach ?>

        <!-- JIKA DATA $SATUAN KOSONG, TAMPILKAN TR DIBAWAH-->
        <?php if (empty($barang_stok)): ?>
          <tr>
            <td colspan="7" class="text-center">
              Data masih kosong.
            </td>
          </tr>
        <?php endif ?>

      </tbody>
    </table>
    <?php if (data_login('level_pengguna')!='Pemilik' && data_login('level_pengguna')!='Kasir'): ?>
    <!-- <a href="<?php echo base_url('barang/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i> Tambah</a> -->
  <?php endif ?>
  <a href="<?php echo base_url('barang/tampil') ?>" class="btn btn-secondary">Kembali</a>
</div>
</div>
</div>
<!-- END KONTEN -->
</div>