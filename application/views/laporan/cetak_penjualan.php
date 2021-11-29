<?php

$tgl_mulai = $this->input->get('tgl_mulai');
$tgl_selesai = $this->input->get('tgl_selesai');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Penjualan</title>
    <link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet" />
</head>

<body>

    <div class="container-fluid">
        <!-- JUDUL -->
        <h1 class="mt-4 mb-3 text-center">Laporan Penjualan</h1>
        <?php if (!empty($tgl_mulai) && !empty($tgl_selesai)) : ?>
            <div class="text-center mb-4">Tanggal: <?php echo tanggal($tgl_mulai, 'd/m/Y') ?> s/d <?php echo tanggal($tgl_selesai, 'd/m/Y') ?></div>
        <?php endif ?>
        <div class=" mb-4">
            <div class="-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Ref</th>
                                <th>Tanggal</th>
                                <th>Nama Obat</th>
                                <th>Unit</th>
                                <th>Nama Pembeli</th>
                                <th>Penanggung Jawab</th>
                                <th>Jumlah Terjual</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_terjual = 0;
                            $total_penjualan = 0; ?>
                            <?php foreach ($penjualan as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $value['kode_penjualan'] ?></td>
                                    <td><?php echo tanggal($value['tanggal_penjualan'], 'd/m/Y') ?></td>
                                    <td><?php echo $value['nama_barang'] ?></td>
                                    <td><?php echo $value['nama_unit'] ?></td>
                                    <td><?php echo $value['nama_pembeli'] ?></td>
                                    <td><i class="fas fa-pencil-alt"></i> <?php echo $value['username_pengguna'] ?></td>
                                    <td><?php echo $value['jumlah_penjualan'] ?> </td>
                                    <td>Rp <?php echo rupiah($value['total_penjualan']) ?></td>
                                </tr>
                                <?php
                                $total_terjual += $value['jumlah_penjualan'];
                                $total_penjualan += $value['total_penjualan'];
                                ?>
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
                                <th colspan="7" class="text-right">Total</th>
                                <th><?php echo $total_terjual ?> </th>
                                <th>Rp <?php echo rupiah($total_penjualan) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Untuk Laporan -->
        <div class="fot" style="font-size: 17px;">
            <div class="kanan float-right">
                <div class="col-sm-12">
                    <p class="col-sm-6 float-right" style="margin-right: 80px; margin-top: 100px;">Yogyakarta,......................</p>
                </div>
                <div class="col-sm-12">
                    <p class="col-sm-6 float-right" style="margin-right: 80px; margin-top: 70px;">(................................................)</p>
                </div>
            </div>
        </div>

        <!-- END KONTEN -->
    </div>

    <script>
        window.print();
    </script>

</body>

</html>