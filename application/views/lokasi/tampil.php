<div class="container-fluid">
    <!-- JUDUL -->
    <h1 class="mt-4">Data Lokasi</h1>
    <!-- BREADCRUMB -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item active">Lokasi</li>
    </ol>
    <!-- MULAI KONTEN -->
    <div class="card mb-4">
        <div class="card-header">
            Data Lokasi
        </div>
        <div class="card-body">
          <!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_SUKSES, MAKA TAMPILKAN PESANNYA -->
          <?php if ($this->session->flashdata('pesan_sukses')): ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('pesan_sukses') ?>
            </div>
          <?php endif ?>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                   <tbody>
                    <?php foreach ($lokasi as $key => $value): ?>
                       <tr>
                           <td><?php echo $key+1 ?></td>
                           <td><?php echo $value['nama_lokasi'] ?></td>
                           <td><?php echo $value['deskripsi_lokasi'] ?></td>
                           <td>
                               <a href="<?php echo base_url('lokasi/ubah/' . $value['id_lokasi']) ?>" class="btn btn-sm btn-info">Ubah</a>
                               <a href="<?php echo base_url('lokasi/hapus/' . $value['id_lokasi']) ?>" 
                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                class="btn btn-sm btn-danger">Hapus</a>
                           </td>
                       </tr>
                    <?php endforeach ?>

                    <!-- JIKA DATA $SATUAN KOSONG, TAMPILKAN TR DIBAWAH-->
                    <?php if (empty($lokasi)): ?>
                        <tr>
                            <td colspan="4" class="text-center">
                                Data masih kosong.
                            </td>
                        </tr>
                    <?php endif ?>

                   </tbody>
                </table>
                <a href="<?php echo base_url('lokasi/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus fa-fw"></i> Tambah</a>
            </div>
        </div>
    </div>
     <!-- END KONTEN -->
</div>