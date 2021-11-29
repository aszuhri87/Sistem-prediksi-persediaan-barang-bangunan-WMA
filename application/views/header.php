<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Informasi Toko Bangunan Dengan Metode WMA </title>
    <link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/sendiri.css') ?>" rel="stylesheet" />

    <script>
        var BASE_URL = "<?= base_url() ?>";
        var MODULE_URL = BASE_URL + "<?php echo $this->uri->segment(1) ?>";
        var CURRENT_URL = "<?= current_url() ?>";
    </script>   

    <?php 

    $notif = data_notif();

    $notif_count = 0;
    if ($notif['barang_habis'] > 0) {
      $notif_count+=1;
  } 
  if ($notif['barang_kritis'] > 0) {
      $notif_count+=1;
  } 
 

  ?>

  <style type="text/css">

      .circle-image {
     border: 3px solid #808080;
     width:50%; 
     height:50%; 
     margin-left: 25%;
     overflow: hidden;
     border-radius: 50%; /* Tambahkan baris berikut */
}

  </style>

</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url() ?>"> <i class="fa fa-university" aria-hidden="true"></i>
ADM PUTRA TABIR</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa-fw fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
        <!-- Navbar-->  
        <ul class="navbar-nav ml-auto ml-md-0">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="notif" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-fw fas fa-bell fa-fw"></i> <span class="badge badge-primary"><?php echo $notif_count ?></span></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notif">
                  <?php if ($notif['barang_habis'] > 0): ?>
                    <a class="dropdown-item" href="<?php echo base_url('barang/habis') ?>">Ada <b><?php echo $notif['barang_habis'] ?></b> stok habis!</a>
                <?php endif ?>
                <?php if ($notif['barang_kritis'] > 0): ?>
                    <a class="dropdown-item" href="<?php echo base_url('barang/habis') ?>">Ada <b><?php echo $notif['barang_kritis'] ?></b> stok kritis!</a>
                <?php endif ?>
              
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-fw fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item " href="<?php echo base_url('profil') ?>">
                     <img class="circle-image" style="" src="<?php echo base_url('assets/gambar/profile-6.png') ?>">
                </a>
                <a class="dropdown-item" href="<?php echo base_url('profil') ?>">
                   
            <?php echo data_login('username_pengguna') . " (" . data_login('level_pengguna') . ")" ?>
                </a>
         
            <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('profil') ?>">Profil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>">Logout</a>
            </div>
        </li>

           <li class="nav-item">

                
            </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div   class="sb-sidenav-menu">
                <div class="nav">
                    <div  class="sb-sidenav-menu-heading mt-0 pt-2"></div>
                    <a class="nav-link " href="<?php echo base_url('dashboard') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Data</div>
                    <?php if (data_login('level_pengguna')!='Kasir' && data_login('level_pengguna')!='Pemilik'): ?>
                    <a class="nav-link collapsed" href="<?php echo base_url('#') ?>" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-box"></i></div>
                        Master
                        <div class="sb-sidenav-collapse-arrow"><i class="fa-fw fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapse1" aria-labelledby="collapse1" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url('unit/tampil') ?>">Unit</a>
                            <a class="nav-link" href="<?php echo base_url('kategori/tampil') ?>">Kategori</a>
                    <!--         <a class="nav-link" href="<?php echo base_url('lokasi/tampil') ?>">Lokasi</a> -->

                            <a class="nav-link" href="<?php echo base_url('pemasok/tampil') ?>">Pemasok</a>
                              <?php if (data_login('level_pengguna')=='Pemilik'): ?>
                             <a class="nav-link" href="<?php echo base_url('pengguna/tampil') ?>">Pengguna</a>
                         <?php endif ?>
                            <!-- <a class="nav-link" href="<?php echo base_url('barang/tampil') ?>">Obat</a> -->
                        </nav>
                    </div>
                <?php endif ?>
                <a class="nav-link collapsed" href="<?php echo base_url('#') ?>" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    <div class="sb-nav-link-icon"><i class="fa-fw fas fa-box"></i></div>
                    Barang
                    <div class="sb-sidenav-collapse-arrow"><i class="fa-fw fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapse2" aria-labelledby="collapse2" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo base_url('barang/tampil') ?>">Daftar Barang</a>
                        <a class="nav-link" href="<?php echo base_url('barang/habis') ?>">Stock Habis</a>
                       <!--  <a class="nav-link" href="<?php echo base_url('barang/hampir_habis') ?>">Obat Hampir Habis</a>
                        <a class="nav-link" href="<?php echo base_url('barang/kadaluarsa') ?>">Obat Kadaluarsa</a> -->
                    </nav>
                </div>
                <?php if (data_login('level_pengguna')!='Kasir' && data_login('level_pengguna')!='Inventori'): ?>
                <a class="nav-link" href="<?php echo base_url('pengguna/tampil') ?>">
                    <div class="sb-nav-link-icon"><i class="fa-fw fas fa-users"></i></div>
                    Pengguna
                </a>
            <?php endif ?>
            <div class="sb-sidenav-menu-heading">Transaksi</div>
             <?php if (data_login('level_pengguna')!='Inventori'): ?>
            <a class="nav-link collapsed" href="<?php echo base_url('#') ?>" data-toggle="collapse" data-target="#penjualan" aria-expanded="false" aria-controls="penjualan">
                <div class="sb-nav-link-icon"><i class="fa-fw fas fa-shopping-cart"></i></div>
                Kasir
                <div class="sb-sidenav-collapse-arrow"><i class="fa-fw fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="penjualan" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                         <a class="nav-link" href="<?php echo base_url('penjualan/input') ?>">Tambah Penjualan</a>
                    <a class="nav-link" href="<?php echo base_url('penjualan/tampil') ?>">Riwayat Penjualan</a>
                </nav>
            </div>
        <?php endif ?>
                <?php if (data_login('level_pengguna')!='Kasir'): ?> 
            <a class="nav-link collapsed" href="<?php echo base_url('#') ?>" data-toggle="collapse" data-target="#pembelian" aria-expanded="false" aria-controls="pembelian">
                <div class="sb-nav-link-icon"><i class="fa-fw fas fa-cash-register"></i></div>
                Re-Stock
                <div class="sb-sidenav-collapse-arrow"><i class="fa-fw fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="pembelian" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?php echo base_url('pembelian/input') ?>">Tambah Barang</a>
                    <a class="nav-link" href="<?php echo base_url('pembelian/tampil') ?>">Riwayat Re-Stock</a>
                
                </nav>
            </div>

        <?php endif ?>

          <?php if (data_login('level_pengguna')=='Kasir' || data_login('level_pengguna')=='Pemilik'|| data_login('level_pengguna')=='Inventori'): ?> 
                <div class="sb-sidenav-menu-heading">Laporan</div>
                <a class="nav-link collapsed" href="<?php echo base_url('#') ?>" data-toggle="collapse" data-target="#laporan" aria-expanded="false" aria-controls="laporan">
                    <div class="sb-nav-link-icon"><i class="fa-fw fas fa-file-alt"></i></div>
                    Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fa-fw fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="laporan" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo base_url('laporan/penjualan') ?>">Laporan Penjualan</a>
                        <a class="nav-link" href="<?php echo base_url('laporan/pembelian') ?>">Laporan Pembelian</a>
                        <!-- <a class="nav-link" href="<?php echo base_url('laporan') ?>">Laporan Pendapatan</a> -->
                    </nav>
                </div>
              
            <?php endif ?>
             <?php if (data_login('level_pengguna')!='Kasir'): ?> 
                    <a class="nav-link" href="<?php echo base_url('prediksi') ?>">
                    <div class="sb-nav-link-icon"><i class="fa-fw fas fa-chart-line"></i></div>
                    Prediksi
                </a>
                  <?php endif ?> 
























































        </div>
        <div class="my-2">&nbsp;</div>
    </div>
   <!--  <div class="sb-sidenav-footer">
        <div class="small">Login sebagai:</div>
        <?php echo data_login('username_pengguna') . " (" . data_login('level_pengguna') . ")" ?>
    </div> -->
</nav>
</div>
<div id="layoutSidenav_content">
    <main>

