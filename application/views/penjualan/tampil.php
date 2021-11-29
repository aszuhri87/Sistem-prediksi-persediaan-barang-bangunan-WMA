<div class="container-fluid">
    <!-- JUDUL -->
    <h1 class="mt-4">Riwayat Penjualan </h1>
    <!-- BREADCRUMB -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Transaksi</li>
        <li class="breadcrumb-item active">Riwayat Penjualan</li>
    </ol>
    <!-- MULAI KONTEN -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            Riwayat Penjualan
            <div class="float-right"> <a href="<?php echo base_url('penjualan/input') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Input Penjualan</a> </div>
        </div>
        <div class="card-body">
          <!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_SUKSES, MAKA TAMPILKAN PESANNYA -->
          <?php if ($this->session->flashdata('pesan_sukses')): ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('pesan_sukses') ?>
            </div>
          <?php endif ?>
           <?php if ($this->session->flashdata('pesan_gagal')): ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('pesan_gagal') ?>
            </div>
          <?php endif ?>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0"  id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Ref</th>
                            <th>Tanggal</th>
                            <th>Nama Pembeli</th>
                            <th>Jumlah Terjual</th>
                            <th>Total Penjualan</th>
                            <th>Penanggung Jawab</th>
                            <th width="50">Aksi</th>
                        </tr>
                    </thead>
                   <tbody>
                    <?php foreach ($penjualan as $key => $value): ?>
                       <tr>
                           <td><?php echo $key+1 ?></td>
                           <td><?php echo $value['kode_penjualan'] ?></td>
                           <td><?php echo tanggal($value['tanggal_penjualan']) ?></td>
                           <td><?php echo $value['nama_pembeli'] ?></td>
                           <td><?php echo $value['jumlah_penjualan'] ?> </td>
                           <td>Rp <?php echo rupiah($value['total_penjualan']) ?></td>
                           <td><i class="fas fa-pencil-alt"></i> <?php echo $value['username_pengguna'] ?></td>
                           <td>
                               <a href="<?php echo base_url('penjualan/detail/' . $value['id_penjualan']) ?>" class="btn btn-sm btn-info"><i class="fas fa-file-alt"></i></a>
                               <a href="<?php echo base_url('penjualan/hapus/' . $value['id_penjualan']) ?>" 
                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                           </td>
                       </tr>
                    <?php endforeach ?>

                    <!-- JIKA DATA $SATUAN KOSONG, TAMPILKAN TR DIBAWAH-->
                    <?php if (empty($penjualan)): ?>
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