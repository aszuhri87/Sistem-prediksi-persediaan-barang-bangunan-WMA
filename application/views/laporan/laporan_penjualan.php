<?php

$tgl_mulai = $this->input->get('tgl_mulai');
$tgl_selesai = $this->input->get('tgl_selesai');

?>

<div class="container-fluid">
    <!-- JUDUL -->
    <h1 class="mt-4">Laporan Penjualan </h1>
    <!-- BREADCRUMB -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Laporan</li>
        <li class="breadcrumb-item active">Penjualan</li>
    </ol>
    <!-- MULAI KONTEN -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="" method="GET">
                <div class="row mb-3">
                    <div class="col-6">
                        <input type="date" class="form-control" name="tgl_mulai" value="<?php echo $tgl_mulai ?>" required>
                    </div>
                    <div class="col-6">
                        <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $tgl_selesai ?>" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Filter</button>
                <?php if (!empty($tgl_mulai) && !empty($tgl_selesai && !empty($penjualan))) : ?>
                    <a target="_blank" href="<?php echo base_url('laporan/cetak_penjualan?tgl_mulai=' . $tgl_mulai . '&tgl_selesai=' . $tgl_selesai . '') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i> Cetak</a>
                <?php endif ?>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_SUKSES, MAKA TAMPILKAN PESANNYA -->
            <?php if ($this->session->flashdata('pesan_sukses')) : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('pesan_sukses') ?>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('pesan_gagal')) : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('pesan_gagal') ?>
                </div>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="example4">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Ref</th>
                            <th>Tanggal</th>
                            <th>Nama Obat</th>
                            <th>Unit</th>
                            <th>Nama Pembeli</th>
                            <th>Jumlah Terjual</th>
                            <th>Total Penjualan</th>
                            <th>Penanggung Jawab</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_terjual = 0;
                        $total_penjualan = 0; ?>
                        <?php foreach ($penjualan as $key => $value) : ?>


                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $value['kode_penjualan'] ?></td>
                                <td><?php echo tanggal($value['tanggal_penjualan']) ?></td>
                                <td><?php echo $value['nama_barang'] ?></td>
                                <td><?php echo $value['nama_unit'] ?></td>
                                <td><?php echo $value['nama_pembeli'] ?></td>
                                <td><?php echo $value['jumlah_penjualan'] ?> </td>
                                <td>Rp <?php echo rupiah($value['total_penjualan']) ?></td>
                                <td><i class="fas fa-pencil-alt"></i> <?php echo $value['username_pengguna'] ?></td>
                            </tr>

                        <?php endforeach ?>

                        <!-- JIKA DATA $SATUAN KOSONG, TAMPILKAN TR DIBAWAH-->
                        <?php if (empty($penjualan)) : ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <?php if (!empty($tgl_mulai)) : ?>
                                        Data yang anda cari tidak ditemukan.
                                    <?php else : ?>
                                        Mohon filter terlebih dahulu.
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endif ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6" class="text-right">Total</th>

                            <th id="total_order2"> </th>
                            <th id="total_order3"> </th>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- END KONTEN -->
</div>