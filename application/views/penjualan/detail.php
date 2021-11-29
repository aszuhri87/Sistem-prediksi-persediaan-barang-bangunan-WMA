<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4 d-print-none">Detail Penjualan <small>/ #<?php echo $penjualan['kode_penjualan'] ?></small> <button onclick="window.print()" class="btn btn-primary btn-sm float-right"><i class="fa fa-print mr-1"></i> Cetak</button></h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4 d-print-none">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Transaksi</li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('penjualan/tampil') ?>">Riwayat Penjualan</a></li>
    <li class="breadcrumb-item active">Detail</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
      <!--   <div class="card-header d-flex justify-content-between">
            Detail Penjualan <small>#<?php echo $penjualan['kode_penjualan'] ?></small>
          </div> -->
          <div class="card-body">

            <div class="d-none">
              <h3 class="text-center">Detail Penjualan <small>#<?php echo $penjualan['kode_penjualan'] ?></small></h3>

              <table class="table" style="width: 400px; margin: auto; border: none">
                <tr>
                  <th>Tanggal Penjualan</th>
                  <th>:</th>
                  <td><?php echo $penjualan ['tanggal_penjualan'] ?></td>
                </tr>
                <tr>
                  <th>Pembeli</th>
                  <th>:</th>
                  <td><?php echo $penjualan ['nama_pembeli'] ?></td>
                </tr>
                <tr>
                  <th>Jumlah Terjual</th>
                  <th>:</th>
                  <td><?php echo $penjualan ['jumlah_penjualan'] ?> </td>
                </tr>
                <tr>
                  <th>Total Penjualan</th>
                  <th>:</th>
                  <td>Rp <?php echo rupiah($penjualan ['total_penjualan']) ?></td>
                </tr>
                <tr>
                  <th>Penanggung Jawab</th>
                  <th>:</th>
                  <td><i class="fas fa-pencil-alt"></i> <?php echo $penjualan ['username_pengguna'] ?></td>
                </tr>
              </table>
            </div>

            <div class="d-block">
              <h3><i class="fa fa-file-alt"></i> Invoice Penjualan <small>#<?php echo $penjualan['kode_penjualan'] ?></small> <span class="float-right small" style="font-weight: 400"><?php echo tanggal($penjualan ['tanggal_penjualan'], "m/d/Y") ?></span></h3>
              <hr>
              <div class="row mb-4">
                <div class="col-md-4">
                  Dari <br>
                  <h5>Apotek Kronggahan Sleman</h5>
                  Jl.Kronggohan,Kec.Gamping <br>
                  Sleman 55291 <br>
                  Telp: (0274) 8569419
                </div>
                <div class="col-md-4">
                  Ke <br>
                  <h5><?php echo $penjualan['nama_pembeli'] ?></h5>
                  <div>Total Beli : <?php echo $penjualan ['jumlah_penjualan'] ?> </div>
                </div>
                <div class="col-md-4">
                  Detail <br>
                  <h5>Kode Ref: #<?php echo $penjualan['kode_penjualan'] ?></h5>
                  <div>Total Penjualan : Rp <?php echo rupiah($penjualan ['total_penjualan']) ?></div>
                </div>
              </div>
            </div>

            <h3>Daftar Barang Terjual</h3>

            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Jumlah Terjual</th>
                    <th>Unit</th>
                    <th>Subharga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    // echo "<pre>";
                    // print_r($barang);
                    // echo "</pre>";
                  ?>
                  <?php $total_jumlah_barang = 0; $subharga = 0; $total_subharga=0; ?>
                  <?php foreach ($barang as $key => $value): ?>
                    <?php 
                    $subharga = $value['harga_barang_saat_jual'] * $value['jumlah_barang']; 
                    $total_subharga += $subharga; 
                    ?>
                    <tr>
                     <td><?php echo $key+1 ?></td>
                     <td><?php echo $value['nama_barang_saat_jual'] ?></td>
                     <td><?php echo $value['nama_kategori'] ?></td>
                     <td>Rp <?php echo rupiah($value['harga_barang_saat_jual']) ?></td>
                     <td><?php echo $value['jumlah_barang'] ?> </td>
                     <td><?php echo $value['nama_unit'] ?></td>
                     <td>Rp <?php echo rupiah($subharga) ?></td>
                   </tr>
                   <?php @$total_jumlah_barang += $value['jumlah_barang']; ?>
                 <?php endforeach ?>
               </tbody>
               <tfoot>
                 <tr>
                   <th colspan="4" class="text-right">Total</th>
                   <th colspan="2"><?php echo rupiah($total_jumlah_barang) ?> </th>
                   <th>Rp <?php echo rupiah($total_subharga) ?></th>
                 </tr>
               </tfoot>
             </table>
           </div>
         </div>
       </div>
       <!-- END KONTEN -->
     </div>