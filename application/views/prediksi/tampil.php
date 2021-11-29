<div class="container-fluid">
  <!-- JUDUL -->
  <h1 class="mt-4">Prediksi </h1>
  <!-- BREADCRUMB -->
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Laporan</li>
    <li class="breadcrumb-item active">Peramalan</li>
  </ol>
  <!-- MULAI KONTEN -->
  <div class="card mb-4">
    <!-- JIKA ADA PESAN FLASHDATA BERNAMA GAGAL, MAKA TAMPILKAN PESANNYA -->
    <?php if ($this->session->flashdata('gagal')) : ?>
      <div class="alert alert-danger">
        <?php echo $this->session->flashdata('gagal') ?>
      </div>
    <?php endif ?>
    <!-- JIKA ADA PESAN FLASHDATA BERNAMA SUKSES, MAKA TAMPILKAN PESANNYA -->
    <!--  <?php if ($this->session->flashdata('sukses')) : ?>
    <div class="alert alert-success">
      <?php echo $this->session->flashdata('sukses') ?>
    </div>
  <?php endif ?> -->
    <div class="card-header">
      Filter Data untuk Mulai Perhitungan Prediksi
    </div>
    <div class="card-body">
      <form action="" method="GET">
        <div class="row align-items-end">
          <div class="col-md-4">
            <label>Barang</label>
            <select name="id_barang" class="form-control" required>
              <option value="">--Pilih--</option>
              <?php foreach ($barang as $key => $value) : ?>
                <option <?php if ($this->input->get('id_barang') == $value['id_barang']) {
                          echo "selected";
                        } ?> value="<?php echo $value['id_barang'] ?>"><?php echo $value['nama_barang'] ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <!-- GANTI PERIODE DISINI -->
          <input type="hidden" name="periode" value="5">
          <input type="hidden" name="periode_dua" value="3">
          <!-- GANTI PERIODE DIATAS SINI -->

          <!--  <div class="col-md-3">
         <input type="date" name="tanggal" class="form-control" required>
       </div> -->
          <div class="col-md-3">
            <!-- <label>Bulan</label>
        <select name="bulan" class="form-control" required>
         <option value="">--Pilih--</option>
         <?php foreach ($bulan as $key => $value) : ?>
           <option
           <?php if ($this->input->get('bulan') == $value['no']) {
              echo "selected";
            } ?>
            value="<?php echo $value['no'] ?>"><?php echo $value['bulan'] ?></option>
         <?php endforeach ?>
       </select>  -->
            <label>Bulan & Tahun</label>
            <input type="date" name="tanggal" class="form-control" required="" value="<?php echo $this->input->get('tanggal') ?>">
          </div>
          <!-- <div class="col-md-2">
      <label>Tahun</label>
      <input type="text" name="tahun" class="form-control" required value="<?php echo $this->input->get('tahun') ?>" placeholder="Misal. <?php date("Y", strtotime(date("Y-m-d") . " + 0 years")) ?>">
    </div> -->
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Lakukan Prediksi</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php
  // $jumlah = (14*6) + (24*5) + (16*4) + (30*3) + (22*2)  + (25*1);

  // echo $jumlah / 21;

  ?>

  <?php if (!empty($hasil)) : ?>


    <div class="card mb-4">
      <div class="card-header">
        Hasil Prediksi
      </div>
      <div class="card-body">
        <!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_SUKSES, MAKA TAMPILKAN PESANNYA -->
        <?php if ($this->session->flashdata('pesan_sukses')) : ?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('pesan_sukses') ?>
          </div>
        <?php endif ?>
        <?php
        // echo "<pre>";
        // print_r($hasil);
        // echo "</pre>";
        ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable">

            <thead class="thead-dark">
              <tr>
                <th rowspan="2" class="text-center" style="vertical-align: middle;">#</th>
                <th rowspan="2" class="text-center" style="vertical-align: middle;">Bulan</th>
                <th rowspan="2" class="text-center" style="vertical-align: middle;">Penjualan</th>
                <th colspan="5" class="text-center"><?php echo $this->input->get('periode_dua') ?> Periode</th>
                <!-- <th colspan="5" class="text-center"><?php echo $this->input->get('periode') ?> Periode</th> -->
              </tr>
              <tr>
                <th>WMA</th>
                <th>Error</th>
                <th>MAD</th>
                <th>MSE</th>
                <th>MAPE</th>
              <!--   <th>WMA</th>
                <th>Error</th>
                <th>MAD</th>
                <th>MSE</th>
                <th>MAPE</th> -->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($hasil['hitung'] as $key => $value) : ?>
                <tr>
                  <td><?php echo $key + 1 ?></td>
                  <td><?php echo $value['bulan'] . " " . $value['tahun'] ?></td>
                  <td><?php echo $value['penjualan'] ?></td>
                  <td><?php echo $value['peramalan_dua'] ? round($value['peramalan_dua'], 1) : "-" ?></td>
                  <td><?php echo $value['error_dua'] ? round($value['error_dua'], 1) : "-" ?></td>
                  <td><?php echo $value['mad_dua'] ? round($value['mad_dua'], 1) : "-" ?></td>
                  <td><?php echo $value['mse_dua'] ? round($value['mse_dua'], 1) : "-" ?></td>
                  <td><?php echo $value['mape_dua'] ? round($value['mape_dua'], 1) : "-" ?></td>
                  <!-- <td><?php echo $value['peramalan'] ? round($value['peramalan'], 1) : "-" ?></td>
                  <td><?php echo $value['error'] ? round($value['error'], 1) : "-" ?></td>
                  <td><?php echo $value['mad'] ? round($value['mad'], 1) : "-" ?></td>
                  <td><?php echo $value['mse'] ? round($value['mse'], 1) : "-" ?></td>
                  <td><?php echo $value['mape'] ? round($value['mape'], 1) : "-" ?></td> -->
                </tr>
              <?php endforeach ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2">Total</th>
                <th><?php echo round($hasil['t_penjualan'], 1) ?></th>
                <th><?php echo round($hasil['t_peramalan_dua'], 1) ?></th>
                <th><?php echo round($hasil['t_error_dua'], 1) ?></th>
                <th><?php echo round($hasil['t_mad_dua'], 1) ?></th>
                <th><?php echo round($hasil['t_mse_dua'], 1) ?></th>
                <th><?php echo round($hasil['t_mape_dua'], 1) ?></th>
               <!--  <th><?php echo round($hasil['t_peramalan'], 1) ?></th>
                <th><?php echo round($hasil['t_error'], 1) ?></th>
                <th><?php echo round($hasil['t_mad'], 1) ?></th>
                <th><?php echo round($hasil['t_mse'], 1) ?></th>
                <th><?php echo round($hasil['t_mape'], 1) ?></th> -->
              </tr>
              <!--  <tr>
            <th colspan="4">Rata-rata</th>
            <th><?php echo round($hasil['r_error_dua'], 1) ?></th>
            <th><?php echo round($hasil['r_mad_dua'], 1) ?></th>
            <th><?php echo round($hasil['r_mse_dua'], 1) ?></th>
            <th><?php echo round($hasil['r_mape_dua'], 1) ?> %</th>
            <th></th>
            <th><?php echo round($hasil['r_error'], 1) ?></th>
            <th><?php echo round($hasil['r_mad'], 1) ?></th>
            <th><?php echo round($hasil['r_mse'], 1) ?></th>
            <th><?php echo round($hasil['r_mape'], 1) ?> %</th>
          </tr> -->
              <!--  <tr>
            <th colspan="3">Hasil Prediksi</th>
            <td colspan="5" class="text-center font-weight-bold h5 " style="background-color: rgba(255, 255, 150, 0.6)"><?php echo round($hasil['ramalan_akhir_dua'], 3) ?></td>
            <td colspan="5" class="text-center font-weight-bold h5 " style="background-color: rgba(255, 255, 150, 0.6)"><?php echo round($hasil['ramalan_akhir'], 3) ?></td>
          </tr> -->
            </tfoot>
          </table>
          <table class="table table-bordered" id="dataTable">
            <thead class="thead-dark">
              <tr>
                <th>Rata-rata</th>
                <th>Prediksi <?= $this->input->get('periode_dua') ?> periode</th>
                <!-- <th>Prediksi <?= $this->input->get('periode') ?> periode</th> -->
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Error</th>
                <th><?php echo round($hasil['r_error_dua'], 1) ?></th>
                <!-- <th><?php echo round($hasil['r_error'], 1) ?></th> -->
              </tr>
              <tr>
                <th>MAD</th>
                <th><?php echo round($hasil['r_mad_dua'], 1) ?></th>
                <!-- <th><?php echo round($hasil['r_mad'], 1) ?></th> -->
              </tr>
              <tr>
                <th>MAPE</th>
                <th><?php echo round($hasil['r_mape_dua'], 1) ?></th>
                <!-- <th><?php echo round($hasil['r_mape'], 1) ?></th> -->
              </tr>
              <tr>
                <th>MSE</th>
                <th><?php echo round($hasil['r_mse_dua'], 1) ?></th>
                <!-- <th><?php echo round($hasil['r_mse'], 1) ?></th> -->
              </tr>
              <tr>
                <th>Hasil Prediksi</th>
                <th class="font-weight-bold h5 " style="background-color: rgba(255, 255, 150, 0.6)"><?php echo round($hasil['ramalan_akhir_dua'], 1) ?></th>
               <!--  <th class="font-weight-bold h5 " style="background-color: rgba(255, 255, 150, 0.6)"><?php echo round($hasil['ramalan_akhir'], 1) ?></th> -->
              </tr>
            </tbody>
          </table>
          <div class="alert alert-success">
            Hasil prediksi penjualan <b><?php echo $detail['nama_barang'] ?></b> pada bulan <b><?php echo bulan(date("m", strtotime($this->input->get('tanggal')))) . "</b> tahun <b>" . tanggal($this->input->get('tanggal'), "Y") ?></b> adalah <b><?php echo round($hasil['ramalan_akhir'], 1) ?></b> unit pada prediksi <b><?= $this->input->get('periode_dua') ?></b> periode.
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
  <!-- END KONTEN -->
</div>