<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Data Barang Habis</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Laporan</li>
    <li class="breadcrumb-item active">Barang Habis</li>
  </ol>

  <!-- MULAI KONTEN -->
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          Data Barang <b>Habis</b>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>Harga Beli</th>
                  <th>Stok</th>
                  <th>Kategori</th>
                
                </tr>
              </thead>
              <tbody>
                <?php foreach ($barang_habis as $key => $value): ?>
                 <tr>
                   <td><?php echo $key+1 ?></td>
                   <td><?php echo $value['nama_barang'] ?></td>
                   <td><?php echo $value['harga_beli_barang'] ?></td>
                   <td><strong class="text-danger"><?php echo $value['stok_barang'] ?></strong> <?php echo $value['nama_unit'] ?></td>
                   <td><?php echo $value['nama_kategori'] ?></td>
                 
                 </tr>
               <?php endforeach ?>

               <?php if (empty($barang_habis)): ?>
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
</div>

<!-- END KONTEN -->
</div>