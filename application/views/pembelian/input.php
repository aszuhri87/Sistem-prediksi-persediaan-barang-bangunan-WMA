<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Input Pembelian</h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Transaksi</li>
    <li class="breadcrumb-item active">Input Pembelian</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
    <form action="" method="POST">
      <div class="card-header d-flex justify-content-between">
        Input Pembelian
      </div>
      <div class="card-body">
        <?php if ($this->session->flashdata('pesan_sukses')): ?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('pesan_sukses') ?>
          </div>
        <?php endif ?>

        <div id="app-pb">
          <div class="row justify-content-center align-items-start">
            <div class="col-md-2">
              <label>Kode Pembelian</label>
              <input type="text" name="kode_pembelian" v-model="dataForm.kode_pembelian" class="form-control" value="" readonly>
            </div>
            <div class="col-md-3">
             <div class="form-group text-center">
              <label for="pemasok">Pemasok</label>
               <select name="id_pemasok" id="pemasok" class="form-control" v-model="dataForm.id_pemasok" :disabled="loading" required>
                 <option :value="null">--Pilih--</option>
                 <option :value="item.id_pemasok" v-for="item in pemasok" :key="item.id_pemasok">{{item.nama_pemasok}}) </option>
               </select>
             </div>
           </div>
         </div>
         <hr>
         <div class="text-right my-2">
          <button type="button" class="btn btn-outline-primary btn-sm" @click="add_barang()"><i class="fas fa-plus fa-fw"></i> Tambah Barang</button>
        </div>
        <div class="form-group row justify-content-start align-items-end" v-for="(ob, index) in dataForm.barang" :key="index">
          
          <div class="col-md-5">
            <label for="barang">Barang</label>
            <select name="id_barang[]" id="barang" class="form-control" v-model="dataForm.barang[index].id_barang" :disabled="loading || dataForm.id_pemasok == null" required @change="calc_subharga(index)">
             <option :value="null">--Pilih--</option>
             <option :value="item.id_barang" v-for="item in barang" :key="item.id_barang">{{item.nama_barang}} - Rp {{item.harga_beli_barang}} (Stok: {{item.stok_barang}}) </option>
           </select>
         </div>
         <div class="col-md-3">
          <label for="jumlah">Jumlah</label>
          <input name="jumlah[]" id="jumlah" type="number" min="1" v-model="dataForm.barang[index].jumlah" class="form-control" :disabled="loading || dataForm.id_pemasok == null" required  @change="calc_subharga(index)">
        </div>
        <div class="col-md-1" v-if="index > 0">
          <button type="button" class="btn btn-sm btn-danger" @click="delete_barang(index)"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <input type="hidden" :value="total_pembelian" name="total_pembelian">
    </div>
  </div>
  <div class="card-footer d-flex justify-content-end">
    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan Pembelian</button>
  </div>
</form>
</div>
<!-- END KONTEN -->
</div>

<?php $this->load->view('includes/js-pembelian') ?>