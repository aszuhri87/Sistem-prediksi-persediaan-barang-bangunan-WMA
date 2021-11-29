<?php 

$tgl_mulai = $this->input->get('tgl_mulai');
$tgl_selesai = $this->input->get('tgl_selesai');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Laporan Pembelian</title>
   <link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet" />
</head>
<body>

    <div class="container-fluid">
       <!-- JUDUL -->
       <h1 class="mt-4 mb-3 text-center">Laporan Pembelian</h1>
       <?php if (!empty($tgl_mulai) && !empty($tgl_selesai)): ?>
       <div class="text-center mb-4">Tanggal: <?php echo tanggal($tgl_mulai, 'd/m/Y') ?> s/d <?php echo tanggal($tgl_selesai, 'd/m/Y') ?></div>
   <?php endif ?>
   <!-- MULAI KONTEN -->
   <div class=" mb-4">
    <div class="-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0"  id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Ref</th>
                        <th>Tanggal</th>
                        <th>Nama Obat</th>
                        <th>Nama Pemasok</th>
                        <th>Harga</th>
                        <th>Penanggung Jawab</th>
                        <th>Jumlah Beli</th>
                        <th>Total Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_dibeli = 0; $total_pembelian = 0; ?>
                    <?php foreach ($pembelian as $key => $value): ?>
                     <tr>
                         <td><?php echo $key+1 ?></td>
                         <td><?php echo $value['kode_pembelian'] ?></td>
                         <td><?php echo tanggal($value['tanggal_pembelian'], 'd/m/Y') ?></td>
                         <td><?php echo $value['nama_barang'] ?></td>
                         <td><?php echo $value['nama_pemasok'] ?></td>
                         <td><?php echo $value['harga_beli_barang'] ?></td>
                         <td><i class="fas fa-pencil-alt"></i> <?php echo $value['username_pengguna'] ?></td>
                         <td><?php echo $value['jumlah_pembelian'] ?> </td>
                         <td>Rp <?php echo rupiah($value['total_pembelian']) ?></td>
                     </tr>
                      <?php 
                         $total_dibeli += $value['jumlah_pembelian'];
                         $total_pembelian += $value['total_pembelian'];
                     ?>
                 <?php endforeach ?>

                 <!-- JIKA DATA $SATUAN KOSONG, TAMPILKAN TR DIBAWAH-->
                 <?php if (empty($pembelian)): ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data masih kosong.
                        </td>
                    </tr>
                <?php endif ?>

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="7" class="text-right">Total</th>
                    <th><?php echo $total_dibeli ?> </th>
                    <th>Rp <?php echo rupiah($total_pembelian) ?></th>
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