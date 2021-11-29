 <div class="container-fluid">
   <div class="d-md-flex d-block justify-content-between align-items-end">
     <h1 class="mt-4">Dashboard </h1>
     <div>
      <?php if (data_login('level_pengguna')=='Admin'): ?>
       <a href="<?php echo base_url('penjualan/input') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Input Penjualan</a>
       <a href="<?php echo base_url('pembelian/input') ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Input Pembelian</a>
       <a href="<?php echo base_url('prediksi') ?>" class="btn btn-danger btn-sm"><i class="fas fa-chart-line"></i> Prediksi Penjualan</a>
       <?php endif ?>
     </div>
 
   </div>
   <!--  <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol> -->
   <hr>
   <div class="row">
     <div class="col-xl-3 col-md-6 col-6">
       <div class="card text-white mb-4">
         <div class="card-header bg-dark ">Total Barang</div>
         <div class="card-body text-dark">
           <h4><?php echo $jumlah_barang ?> <small>barang</small></h4>
         </div>
         <div class="card-footer d-flex align-items-center justify-content-between">
           <a class="small text-dark stretched-link" href="<?php echo base_url('barang/tampil') ?>">Lihat Detail</a>
           <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
         </div>
       </div>
     </div>

     <div class="col-xl-3 col-md-6 col-6">
       <div class="card text-white mb-4">
         <div class="card-header bg-dark">Total Stok</div>
         <div class="card-body text-dark">
           <h4><?php echo $jumlah_stok ?> <small></small></h4>
         </div>
         <div class="card-footer d-flex align-items-center justify-content-between">
           <a class="small text-dark stretched-link" href="<?php echo base_url('barang/tampil') ?>">Lihat Detail</a>
           <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
         </div>
       </div>
     </div>
     <div class="col-xl-3 col-md-6 col-6">
       <div class="card text-white mb-4">
         <div class="card-header bg-dark">Total Penjualan</div>
         <div class="card-body text-dark">
           <h4><?php echo $jumlah_penjualan ?> <small>transaksi</small></h4>
         </div>
         <div class="card-footer d-flex align-items-center justify-content-between">
           <a class="small text-dark stretched-link" href="<?php echo base_url('penjualan/tampil') ?>">Lihat Detail</a>
           <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
         </div>
       </div>
     </div>
     <div class="col-xl-3 col-md-6 col-6">
       <div class="card text-white mb-4">
         <div class="card-header bg-dark">Total Pembelian</div>
         <div class="card-body text-dark">
           <h4><?php echo $jumlah_pembelian ?> <small>transaksi</small></h4>
         </div>
         <div class="card-footer d-flex align-items-center justify-content-between">
           <a class="small text-dark stretched-link" href="<?php echo base_url('pembelian/tampil') ?>">Lihat Detail</a>
           <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
         </div>
       </div>
     </div>
   </div>

<div class="row">
   <div class="col-6 col-md-12">
       <div class="card mb-4">
         <div class="card-header bg-dark">
          <h6 class="text-white">Grafik</h6>
         </div>
         <div class="card-body">


   <div class="row">
    <div class="col-md-3"> 
       <div class="input-group date" id='tahun'>
              <input type="text" name="tahun_beli" id="tahun_beli" class="form-control tahun_beli" required="required" placeholder="Pilih Tahun">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              </div>
            </div> 
    </div>
     
   </div>
   <br>
    <div class="row">

      <div class="col-md-6">

          <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
          
            <h6 class="mb-0">Penjualan</h6>
          </div>
          <div class="card-body">
            <canvas id="grafik_penjualan" width="900" height="280"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
          <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
     
      <h6 class="mb-0">Pembelian</h6>
    </div>
    <div class="card-body">
      <canvas id="grafik_pembelian" width="900" height="280"></canvas>
    </div>
  </div>
        
      </div>
   
</div>
</div>
</div>
<div class="row">
     <div class="col-md-12">
       <div class="card mb-4">
         <div class="card-header bg-dark">
           <div class="card-title text-white">Stok Habis</div>
         </div>
         <div class="card-body">
           <div class="table-responsive">
             <table class="table">
               <thead>
                 <tr>
                   <th>#</th>
                   <th>Nama Barang</th>
                   <th>Stok</th>
                 </tr>
               </thead>
               <tbody>
                 <?php foreach ($barang_habis as $key => $value) : ?>
                   <tr>
                     <td><?php echo $key + 1 ?></td>
                     <td><?php echo $value['nama_barang'] ?></td>
                     <td><strong class="text-danger"><?php echo $value['stok_barang'] ?></strong> <?php echo $value['nama_unit'] ?></td>
                   </tr>
                 <?php endforeach ?>
                 <?php if (empty($barang_habis)) : ?>
                   <tr>
                     <td colspan="3" class="text-center">Belum ada data.</td>
                   </tr>
                 <?php endif ?>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
     
   </div>

