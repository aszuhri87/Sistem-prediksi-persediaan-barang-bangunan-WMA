<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Data Obat Habis</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Laporan</li>
    <li class="breadcrumb-item active">Obat Habis</li>
  </ol>

  <!-- MULAI KONTEN -->
  <div class="row">
   <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-header">
        Data Obat <b>Hampir Habis (Kritis)</b>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Obat</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Penyimpanan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($barang_hampir_habis as $key => $value): ?>
               <tr>
                 <td><?php echo $key+1 ?></td>
                 <td><?php echo $value['nama_barang'] ?></td>
                 <td><?php echo $value['harga_beli_barang'] ?></td>
                 <td><strong class="text-danger"><?php echo $value['stok_barang'] ?></strong> <?php echo $value['nama_unit'] ?></td>
                 <td><?php echo $value['nama_kategori'] ?></td>
                 <td><?php echo $value['nama_lokasi'] ?></td>
               </tr>
             <?php endforeach ?>

             <!-- JIKA DATA $SATUAN KOSONG, TAMPILKAN TR DIBAWAH-->
             <?php if (empty($barang_hampir_habis)): ?>
              <tr>
                <td colspan="7" class="text-center">
                  Data kosong.
                </td>
              </tr>
            <?php endif ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- END KONTEN -->
</div>