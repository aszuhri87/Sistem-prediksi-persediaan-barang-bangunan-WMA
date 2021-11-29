<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Input Penjualan</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Transaksi</li>
    <li class="breadcrumb-item active">Input Penjualan</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
    <form action="" method="POST">
      <div class="card-header d-flex justify-content-between">
        Input Penjualan
      </div>
      <div class="card-body">
        <?php if ($this->session->flashdata('pesan_gagal')): ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('pesan_gagal') ?>
          </div>
        <?php endif ?>

        <div id="app-pj">
          <div class="row justify-content-center align-items-start">
            <div class="col-md-2">
              <label>Kode Penjualan</label>
              <input type="text" name="kode_penjualan" v-model="dataForm.kode_penjualan" class="form-control" value="" readonly>
            </div>
            <div class="col-md-3">
             <div class="form-group text-center">
              <label for="pembeli">Nama Pembeli</label>
              <input id="pembeli" type="text" name="nama_pembeli" v-model="dataForm.nama_pembeli" class="form-control">
            </div>
          </div>
        </div>
        <hr>
        <div class="text-right my-2">
          <button type="button" class="btn btn-outline-primary btn-sm" @click="add_barang()"><i class="fas fa-plus fa-fw"></i> Tambah Barang</button>
        </div>
        <div class="form-group row justify-content-start align-items-end" v-for="(ob, index) in dataForm.barang" :key="index">
          <div class="col-md-1"></div>
          <div class="col-md-6">
            <label for="barang">Barang</label>
            <select name="id_barang_stok[]" id="barang" class="form-control" v-model="dataForm.barang[index].id_barang_stok" :disabled="loading" required @change="calc_subharga(index)">
             <option :value="null">--Pilih--</option>
             <option :value="item.id_barang_stok" v-for="item in barang" :key="item.id_barang_stok">{{item.nama_barang}} | {{item.kadaluarsa}} (Stok: {{item.stok}}) </option>
           </select>
           <input type="hidden" name="id_barang[]" :value="dataForm.barang[index].id_barang">
         </div>
         <div class="col-md-3">
          <label for="jumlah">Jumlah</label>
          <input name="jumlah[]" id="jumlah" type="number" min="1" :max="get_max_stok(index)" v-model="dataForm.barang[index].jumlah" class="form-control" :disabled="loading" required  @change="calc_subharga(index)">
        </div>
        <div class="col-md-1" v-if="index > 0">
          <button type="button" class="btn btn-sm btn-danger" @click="delete_barang(index)"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <input type="hidden" :value="total_penjualan" name="total_penjualan">
    </div>
  </div>
  <div class="card-footer d-flex justify-content-end">
    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan Penjualan</button>
  </div>
</form>
</div>
<!-- END KONTEN -->
</div>

<?php $this->load->view('includes/js-penjualan') ?>