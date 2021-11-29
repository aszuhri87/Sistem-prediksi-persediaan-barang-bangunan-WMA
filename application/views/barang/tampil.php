<div class="container-fluid">
    <!-- JUDUL -->
    <h1 class="mt-4">Data Barang</h1>
    <!-- BREADCRUMB -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item active">Barang</li>
    </ol>
    <!-- MULAI KONTEN -->
    <div class="card mb-4">
        <div class="card-header">
            Data Barang
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
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Kategori</th>
           
                    <th>Stok</th>
                    <th>Unit</th>
                 
                    <?php if (data_login('level_pengguna')!='Pemilik' && data_login('level_pengguna')!='Kasir'): ?>
                    <th width="120">Aksi</th>
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $key => $value): ?>
               <tr>
                   <td><?php echo $key+1 ?></td>
                   <td><?php echo $value['nama_barang'] ?></td>
                   <td><?php echo $value['harga_beli_barang'] ?></td>
                   <td><?php echo $value['harga_jual_barang'] ?></td>
                   <td><?php echo $value['nama_kategori'] ?></td>
                   <td><?php echo $value['stok_barang']?></td>
                   <td><?php echo $value['nama_unit'] ?></td>
                  <!--  <td>
                    <?php if (!empty($value['detail'])): ?>
                        <ul class="pl-3 small">
                         <?php foreach ($value['detail'] as $k => $v): ?>
                            <?php if ($v['stok']!=0): ?>
                              <li><?php echo tanggal($v['kadaluarsa'], "d/m/Y") . " - Stok (" . $v['stok'] . ")" ?></li>
                          <?php endif ?>
                      <?php endforeach ?>
                  <?php endif ?>
              </ul>
          </td> -->
          <?php if (data_login('level_pengguna')!='Pemilik' && data_login('level_pengguna')!='Kasir'): ?>
          <td>
           <a href="<?php echo base_url('barang/stok/' . $value['id_barang']) ?>" class="btn btn-sm btn-success"><i class="fa fa-box"></i> Stok</a>
           <a href="<?php echo base_url('barang/ubah/' . $value['id_barang']) ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
           <a href="<?php echo base_url('barang/hapus/' . $value['id_barang']) ?>" 
            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
        </td>
    <?php endif ?>
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
<?php if (data_login('level_pengguna')!='Pemilik' && data_login('level_pengguna')!='Kasir'): ?>
<a href="<?php echo base_url('barang/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i> Tambah</a>
<?php endif ?>
</div>
</div>
</div>
<!-- END KONTEN -->
</div>