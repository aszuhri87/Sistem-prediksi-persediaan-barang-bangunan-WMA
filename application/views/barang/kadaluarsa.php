<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Data Obat Kadaluarsa</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Laporan</li>
    <li class="breadcrumb-item active">Obat Kadaluarsa</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
    <div class="card-header">
      Data Obat Kadaluarsa
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
              <th>Nama Obat</th>
              <th>Kode Pembelian</th>
              <th>Kadaluarsa</th>
              <th>Stok</th>
              <th>Kategori</th>
              <th>Penyimpanan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($barang as $key => $value): ?>
             <tr>
               <td><?php echo $key+1 ?></td>
               <td><?php echo $value['nama_barang'] ?> </td>
               <td>
                 <?php if ($value['referensi']): ?>
                   <a href="<?php echo base_url("pembelian/detailref/". $value['referensi']) ?>"><span class="text-muted">Ref: <?php echo $value['referensi'] ?></span></a>
                   <?php else: ?>
                    -
                 <?php endif ?>
               </td>
               <td class="text-danger"><?php echo tanggal($value['kadaluarsa']) ?></td>
               <td><?php echo $value['stok'] . " " . $value['nama_unit'] ?></td>
               <td><?php echo $value['nama_kategori'] ?></td>
               <td><?php echo $value['nama_lokasi'] ?></td>
             </tr>
           <?php endforeach ?>

           <!-- JIKA DATA $SATUAN KOSONG, TAMPILKAN TR DIBAWAH-->
           <?php if (empty($barang)): ?>
            <tr>
              <td colspan="7" class="text-center">
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