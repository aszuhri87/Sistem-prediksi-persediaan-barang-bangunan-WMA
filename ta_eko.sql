/*
SQLyog Ultimate v8.4 
MySQL - 5.5.5-10.4.19-MariaDB : Database - ta_eko
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ta_eko` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ta_eko`;

/*Table structure for table `bulan` */

DROP TABLE IF EXISTS `bulan`;

CREATE TABLE `bulan` (
  `nomor_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `bulan` */

insert  into `bulan`(`nomor_bulan`,`nama_bulan`) values (1,'Januari'),(2,'Februari'),(3,'Maret'),(4,'April'),(5,'Mei'),(6,'Juni'),(7,'Juli'),(8,'Agustus'),(9,'September'),(10,'Oktober'),(11,'November'),(12,'Desember');

/*Table structure for table `td_obat_stok` */

DROP TABLE IF EXISTS `td_obat_stok`;

CREATE TABLE `td_obat_stok` (
  `id_obat_stok` int(11) NOT NULL AUTO_INCREMENT,
  `referensi` varchar(50) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `id_obat` int(11) NOT NULL,
  PRIMARY KEY (`id_obat_stok`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `td_obat_stok_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tm_obat` (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `td_obat_stok` */

insert  into `td_obat_stok`(`id_obat_stok`,`referensi`,`stok`,`kadaluarsa`,`id_obat`) values (8,'PB202105001',1,'2021-05-19',1),(9,'PB202105001',0,'2021-05-28',2),(10,'PB202105007',2,'2021-06-24',1),(11,'PB202105008',12,'2021-04-04',1),(12,'PB202105008',0,'2021-06-25',2),(13,'PB202106009',1,'2024-09-08',3),(14,'PB2021060010',0,'2023-02-01',4),(15,'PB2021070011',0,'2023-01-07',2),(16,'PB2021070011',100,'2024-02-02',5),(17,'PB2021070013',60,'2023-01-07',2),(18,'PB2021070014',32,'2024-02-01',6),(19,'PB2021070015',50,'2024-02-01',7),(20,'PB2021070016',25,'2024-09-09',8),(21,'PB2021070017',21,'2024-01-20',9),(22,'PB2021070018',25,'2025-03-12',10),(23,'PB2021070019',30,'2024-04-20',11),(24,'PB2021070020',3,'2024-03-20',12),(25,'PB2021070021',19,'2025-03-21',14),(26,'PB2021070022',21,'2023-02-20',15),(27,'PB2021070023',14,'2024-02-01',16),(28,'PB2021070024',22,'2025-02-02',17),(29,'PB2021070025',15,'2023-10-10',18),(30,'PB2021070026',27,'2024-10-05',12);

/*Table structure for table `td_pembelian_obat` */

DROP TABLE IF EXISTS `td_pembelian_obat`;

CREATE TABLE `td_pembelian_obat` (
  `id_pembelian_obat` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `harga_beli_obat` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `subharga_beli_obat` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian_obat`),
  KEY `id_pembelian` (`id_pembelian`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `td_pembelian_obat_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `tt_pembelian` (`id_pembelian`) ON DELETE CASCADE,
  CONSTRAINT `td_pembelian_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tm_obat` (`id_obat`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `td_pembelian_obat` */

insert  into `td_pembelian_obat`(`id_pembelian_obat`,`id_pembelian`,`id_obat`,`nama_obat`,`harga_beli_obat`,`jumlah_obat`,`subharga_beli_obat`) values (13,7,1,'Obat X',45000,5,225000),(14,8,1,'Obat X',45000,50,2250000),(15,8,2,'Obat ABC',20000,50,1000000),(16,9,3,'tolak angin',2500,1,2500),(17,10,4,'Bodrex',4500,1,4500),(20,13,2,'Paratusin',13000,200,2600000),(21,14,6,'Paracetamol',2500,250,625000),(22,15,7,'Acetylcysteine 200 MG Indofarm',21000,50,1050000),(23,16,8,'Acitral Syrup 120 ML Botol Int',39000,25,975000),(24,17,9,'Acyclovir 5% Salep Indofarma ',34500,21,724500),(25,18,10,'Alcohol Swabs 2 PLY 70% Box On',13000,25,325000),(26,19,11,'Ambeven Kapsul Medikon Prima',2500,30,75000),(27,20,12,'Ambroxol HCl 15 MG/ 5 ML Syrup',13200,300,3960000),(28,21,14,'Acitral Syrup 120 ML Botol Int',22500,19,427500),(29,22,15,'Acyclovir 5% Salep Indofarma',42500,21,892500),(30,23,16,'Amoxicillin 125 MG/5 ML Syrup ',4500,14,63000),(31,24,17,'Balsem Otot Geliga 40 GR Botol',3500,22,77000),(32,25,18,'Betadine Solution 30 ML Botol ',22500,15,337500),(33,26,12,'Ambroxol HCl 15 MG/ 5 ML Syrup',13200,50,660000);

/*Table structure for table `td_penjualan_obat` */

DROP TABLE IF EXISTS `td_penjualan_obat`;

CREATE TABLE `td_penjualan_obat` (
  `id_penjualan_obat` int(11) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(11) NOT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `id_obat_stok` int(11) DEFAULT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `harga_jual_obat` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `subharga_jual_obat` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan_obat`),
  KEY `id_penjualan` (`id_penjualan`),
  KEY `id_obat_stok` (`id_obat_stok`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `td_penjualan_obat_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `tt_penjualan` (`id_penjualan`) ON DELETE CASCADE,
  CONSTRAINT `td_penjualan_obat_ibfk_2` FOREIGN KEY (`id_obat_stok`) REFERENCES `td_obat_stok` (`id_obat_stok`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

/*Data for the table `td_penjualan_obat` */

insert  into `td_penjualan_obat`(`id_penjualan_obat`,`id_penjualan`,`id_obat`,`id_obat_stok`,`nama_obat`,`harga_jual_obat`,`jumlah_obat`,`subharga_jual_obat`) values (25,17,NULL,8,'Obat X - Exp: 19/05/2021',50000,5,250000),(26,17,NULL,9,'Obat ABC - Exp: 28/05/2021',25000,3,75000),(27,18,NULL,8,'Obat X - Exp: 19/05/2021',50000,3,150000),(28,18,NULL,9,'Obat ABC - Exp: 28/05/2021',25000,5,125000),(29,19,NULL,8,'Obat X - Exp: 19/05/2021',50000,2,100000),(30,19,NULL,9,'Obat ABC - Exp: 28/05/2021',25000,3,75000),(31,20,NULL,8,'Obat X - Exp: 19/05/2021',50000,4,200000),(32,20,NULL,9,'Obat ABC - Exp: 28/05/2021',25000,3,75000),(33,21,NULL,10,'Obat X - Exp: 24/06/2021',50000,3,150000),(34,21,NULL,9,'Obat ABC - Exp: 28/05/2021',25000,3,75000),(35,22,NULL,11,'Obat X - Exp: 30/06/2021',50000,5,250000),(36,22,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,3,75000),(37,23,NULL,11,'Obat X - Exp: 30/06/2021',50000,4,200000),(38,23,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,5,125000),(39,24,NULL,11,'Obat X - Exp: 30/06/2021',50000,5,250000),(40,24,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,4,100000),(41,25,NULL,11,'Obat X - Exp: 30/06/2021',50000,5,250000),(42,25,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,6,150000),(43,26,NULL,11,'Obat X - Exp: 30/06/2021',50000,6,300000),(44,26,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,5,125000),(45,27,NULL,11,'Obat X - Exp: 30/06/2021',50000,5,250000),(46,27,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,3,75000),(47,28,NULL,11,'Obat X - Exp: 30/06/2021',50000,3,150000),(48,28,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,6,150000),(49,29,NULL,11,'Obat X - Exp: 30/06/2021',50000,5,250000),(50,29,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,4,100000),(51,30,NULL,12,'Obat ABC - Exp: 25/06/2021',25000,1,25000),(52,31,NULL,14,'Bodrex - Exp: 01/02/2023',6000,1,6000),(53,32,NULL,9,'Paratusin - Exp: 28/05/2021',18000,2,36000),(54,33,NULL,9,'Paratusin - Exp: 28/05/2021',18000,1,18000),(55,34,NULL,12,'Paratusin - Exp: 25/06/2021',18000,10,180000),(56,35,NULL,12,'Paratusin - Exp: 25/06/2021',18000,3,54000),(57,36,NULL,15,'Paratusin - Exp: 07/01/2023',18000,14,252000),(58,37,NULL,15,'Paratusin - Exp: 07/01/2023',18000,19,342000),(60,39,NULL,15,'Paratusin - Exp: 07/01/2023',18000,12,216000),(61,40,NULL,15,'Paratusin - Exp: 07/01/2023',18000,10,180000),(62,41,NULL,15,'Paratusin - Exp: 07/01/2023',18000,21,378000),(63,42,NULL,17,'Paratusin - Exp: 07/01/2023',18000,26,468000),(64,43,NULL,17,'Paratusin - Exp: 07/01/2023',18000,20,360000),(65,44,NULL,17,'Paratusin - Exp: 07/01/2023',18000,15,270000),(66,45,NULL,17,'Paratusin - Exp: 07/01/2023',18000,17,306000),(67,46,NULL,17,'Paratusin - Exp: 07/01/2023',18000,14,252000),(68,47,NULL,17,'Paratusin - Exp: 07/01/2023',18000,18,324000),(69,48,NULL,17,'Paratusin - Exp: 07/01/2023',18000,30,540000),(70,49,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,11,55000),(71,50,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,8,40000),(72,51,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,19,95000),(73,52,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,19,95000),(74,53,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,16,80000),(75,54,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,14,70000),(76,55,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,14,70000),(77,56,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,24,120000),(78,57,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,16,80000),(79,58,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,30,150000),(80,59,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,22,110000),(81,60,NULL,18,'Paracetamol - Exp: 01/02/2024',5000,25,125000),(82,61,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,10,160000),(83,62,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,12,192000),(84,63,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,17,272000),(85,64,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,19,304000),(86,65,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,14,224000),(87,66,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,22,352000),(91,70,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,11,176000),(92,71,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,18,288000),(93,72,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,16,256000),(96,75,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,2,32000),(98,77,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,25,400000),(113,92,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,17,272000),(114,93,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,25,400000),(115,94,NULL,24,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 20/03/2024',16000,17,272000),(116,95,NULL,30,'Ambroxol HCl 15 MG/ 5 ML Syrup - Exp: 05/10/2024',16000,23,368000);

/*Table structure for table `tm_kategori` */

DROP TABLE IF EXISTS `tm_kategori`;

CREATE TABLE `tm_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi_kategori` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tm_kategori` */

insert  into `tm_kategori`(`id_kategori`,`nama_kategori`,`deskripsi_kategori`) values (1,'Obat Bebas','Obat bebas adalah obat yang dapat dijual bebas kepada umum tanpa resep dokter, tidak termasuk dalam daftar narkotika, psikotropika, obat keras, obat bebas terbatas dan sudah terdaftar di Depkes RI. '),(2,'Obat bebas terbatas (OBT)','Obat bebas terbatas adalah obat yang dapat dibeli bebas tanpa resep dokter di toko obat berizin. Obat bebas terbatas digunakan untuk mengobati penyakit ringan yang dapat dikenali oleh penderita sendir'),(3,'Obat Keras','Obat keras adalah obat yang hanya boleh diserahkan dengan resep dokter.'),(4,'Obat Herbal','Obat herbal adalah obat yang diramu dari tanaman-tanaman tradisonal berkhasiat yang digunakan untuk pengobatan penyakit-penyakit tertentu.'),(5,'Obat Luar','Obat yang pemakaiannya dilakukan diluar, tidak diminum dan biasanya digunakan dengan cara dioleskan'),(6,'Suplemen dan susu','Suplemen dan susu'),(7,'Obat fitomormaka','Obat bahan alam yang telah dibuktikan keamanan dan khasiatnya secara ilmiah dengan uji praklinik (pada hewan percobaan) dan uji klinik (pada manusia) serta bahan baku dan produk jadinya sudah distand');

/*Table structure for table `tm_lokasi` */

DROP TABLE IF EXISTS `tm_lokasi`;

CREATE TABLE `tm_lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(50) NOT NULL,
  `deskripsi_lokasi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tm_lokasi` */

insert  into `tm_lokasi`(`id_lokasi`,`nama_lokasi`,`deskripsi_lokasi`) values (1,'Gudang','sdwd'),(2,'Rak No. 1','penyimpanan obat bebas'),(3,'Rak No. 2','penyimpanan obat bebas terbatas'),(4,'Rak No. 3','penyimpanan obat keras'),(5,'Rak No. 4','Suplemen dan susu'),(6,'Rak No. 5','Obat Luar'),(7,'Rak No. 6','Obat herbal'),(8,'Rak No. 7','Obat fitomormaka');

/*Table structure for table `tm_obat` */

DROP TABLE IF EXISTS `tm_obat`;

CREATE TABLE `tm_obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(100) NOT NULL,
  `deskripsi_obat` text NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `kadaluarsa_obat` date NOT NULL,
  `harga_beli_obat` int(11) NOT NULL,
  `harga_jual_obat` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  PRIMARY KEY (`id_obat`),
  KEY `id_unit` (`id_unit`),
  KEY `id_lokasi` (`id_lokasi`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `tm_obat_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `tm_unit` (`id_unit`),
  CONSTRAINT `tm_obat_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tm_kategori` (`id_kategori`),
  CONSTRAINT `tm_obat_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `tm_lokasi` (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tm_obat` */

insert  into `tm_obat`(`id_obat`,`nama_obat`,`deskripsi_obat`,`stok_obat`,`kadaluarsa_obat`,`harga_beli_obat`,`harga_jual_obat`,`id_unit`,`id_kategori`,`id_lokasi`) values (1,'Ultraflu','Obat sakit kepala dan flu.',15,'2021-05-04',2500,5000,7,1,1),(2,'Paratusin','obat flu dan batuk',60,'2021-09-01',13000,18000,7,2,2),(3,'tolak angin','Obat masuk angin',1,'0000-00-00',2500,3000,6,1,2),(4,'Bodrex','obat sakit kepala',0,'0000-00-00',4500,6000,7,1,3),(5,'Decolgen','Obat flu dan batuk',100,'0000-00-00',2000,5000,7,1,2),(6,'Paracetamol 500MG','obat flu dan demam',32,'0000-00-00',2500,5000,7,2,2),(7,'Acetylcysteine 200 MG Indofarm','Indikasi Kegunaan :PernafasanKategori Golongan :Obat Keras Logo MerahKategori :Batuk dan FluObat GenerikKomposisi :Acetylcysteine 200 mgDosis :PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER.Sebagai mukolitik : 3 x sehari 1 kapsul.Aturan Pakai :Dikonsumsi setelah makanKemasan :BOXISI 100 KAPSULKontra Indikasi :Hipersensitivitas.Perhatian :HARUS DENGAN RESEP DOKTER.Hati-hati penggunaan obat ini pada :Penderita denga riwayat penyakit asma, bronkospasme, tukak lambung, varises esofagus.Anak-anak, wanita hamil dan menyusui.Kategori Kehamilan :Kategori B: Mungkin dapat digunakan oleh wanita hamil.Penelitian pada hewan uji tidak memperlihatkan ada nya risiko terhadap janin, namun belum ada bukti penelitian langsung terhadap wanita hamil.Segmentasi :RedManufaktur :INDOFARMA',50,'0000-00-00',21000,25000,1,3,4),(8,'Acitral Syrup 120 ML Botol Int','Mengatasi gejala akibat kelebihan asam lambung, gastritis, tukak lambung, usus dua belas jari, dengan gejala seperti mual dan nyeri ulu hati',25,'0000-00-00',39000,45000,6,1,2),(9,'Acyclovir 5% Salep Indofarma ','Kategori :KulitKomposisi :Acyclovir 5%Dosis :PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER.Oleskan 5 kali per hari tiap 4 jam tanpa dosis malam.Lanjutkan pengobatan setidaknya selama 5 hari, dalam beberapa kasus pengobatan dilanjutkan hingga 10 hari.Aturan Pakai :Dioleskan pada area infeksi/yang sakit setelah kulit dibersihkan dan dikeringkan.Kemasan :Isi 25 TubeTube @ 5 gKontra Indikasi :HipersensitivitasPerhatian :HARUS DENGAN RESEP DOKTER.Jangan digunakan pada selaput lendir, seperti: mulut, mata, atau vaginal. Bukan untuk pencegahan infeksi herpes simples rekuren.Hati-hati penggunaan pada wanita hamil dan/atau menyusui, serta anak-anak.Kategori Kehamilan :Kategori B: Mungkin dapat digunakan oleh wanita hamil.Penelitian pada hewan uji tidak memperlihatkan ada nya risiko terhadap janin, namun belum ada bukti penelitian langsung terhadap wanita hamil.SegmentasiRedManufakturGeneric Manufacturer',21,'0000-00-00',34500,40000,4,3,4),(10,'Alcohol Swabs 2 PLY 70% Box On','ALCOHOL SWABS 2 PLY 70% ONEMEDDigunakan untuk antiseptik pre-injeksi, pemasangan IV, pengambilan darah, melepas jahitan, atau tindakan lainnya yang memerlukan antisepsi.Tissue sangat lembut, lebih tebal dan tidak melepaskan serabut.Volume alkohol pas terserap sempurna pada tisu sehingga tidak perlu menunggu lama untuk melepaskan injeksi.Kemasan satuan menggunakan aluminium foil, kedap udara dan tahan bocor, untuk menjaga tetap steril dan mencegah kering.Didesain dapat disobek dari sisi manapun untuk memudahkan pemakaian.-70% ethyl alcohol-Non woven tissue 2 ply, lebih lembut dan tebal-Tidak melepaskan serabut-Hanya untuk pemakaian luar dan sekali pakai-kemasan Sachet aluminium foilSatuan:Isi 1 BOX 100 LEMBARNOMOR IZIN EDAR: 10903010280',25,'0000-00-00',13000,18000,5,7,8),(11,'Ambeven Kapsul Medikon Prima','Indikasi Kegunaan :Genetik Imun AlergiKategori Golongan :Obat Bebas Logo HerbalKategori :Saluran PencernaanObat PatenKomposisi :Graphtophyllum picatum 30%,Sophora jamponica 15%,Rubia cordifolia 15%,Coleus atropurpureus 10%,Saguisorba officinalis 10%,Kaemferiae angustifoliae 10%,Curcuma heynaenae 10%Dosis :Dewasa (Anak > 12 ml) : 2 kaplet, 3 kali per hari .Pemeliharaan :Dosis diturunkan sampai 3 kali per hari 1 kaplet.Aturan Pakai :Sesudah makanKemasan :BOXISI 100 KAPSULSegmentasi :HerbalManufaktur :Medikon Prima Laboratories',30,'0000-00-00',2500,5000,1,4,7),(12,'Ambroxol HCl 15 MG/ 5 ML Syrup','Indikasi Kegunaan :Telinga, Hidung, TenggorokanKategori Golongan :Obat Keras Logo MerahKategori :Batuk dan FluObat GenerikKomposisi :Tiap 5 ml sirup mengandung: 15 mg ambroxol hydrochlorideDosis :PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER.Anak usia 6-12 tahun: 5 ml ( 1 sendok takar) 2-3 kali sehari.Anak usia 2-6 tahun: 2.5 ml (0.5 sendok takar) 3 kali sehari.Anak usia dibawah 2 tahun: 2.5 ml (0.5 sendok takar) 2 kali sehari.Aturan Pakai :Dikonsumsi bersama atau tanpa makananKemasan :KARTONISI 50 BOTOLKontra Indikasi :HipersensitivitasPerhatian :HARUS DENGAN RESEP DOKTER.Tidak dianjurkan untuk digunakan pada pederita gangguan fungsi ginjal atau penyakit liver berat.Hindari penggunaan pada penderita penyakit herediter langka intoleransi galaktosa, defisiensi laktase atau malabsorpsi glukosa-galaktosa.Hindari penggunaan penderita penyakit herediter langka intoleransi fruktosa.Hindari pada penderita gangguan motilitas dan sekresi bronkial berlebihan.Reaksi alergi berat seperti erythema multiforme, Steven-johnsonSegmentasi :RedManufaktur :PROMED',30,'0000-00-00',13200,16000,6,3,4),(13,'Ambroxol HCL Tablet 30 MG Nove','Indikasi Kegunaan :PernafasanKategori Golongan :Obat Keras Logo MerahKategori :Batuk dan FluObat GenerikKomposisi :Ambroxol 30 mgDosis :PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER.Dewasa : 1 tablet, 2-3 x per hari.Anak 6-12 tahun : 0.5 tablet, 2-3 x per hari.Aturan Pakai :Sesudah makanKemasan :BOXISI 100 TABLETKontra Indikasi :Hipersensitif atau alergi terhadap ambroxol.Perhatian :HARUS DENGAN RESEP DOKTER.Disfungsi hati dan ginjal.Kehamilan, laktasiKategori Kehamilan : CSegmentasi :RedManufaktur :NOVEL',0,'0000-00-00',14500,21500,7,3,4),(14,'Acitral Syrup 120 ML Botol Int','Mengatasi gejala akibat kelebihan asam lambung, gastritis, tukak lambung, usus dua belas jari, dengan gejala seperti mual dan nyeri ulu hati',19,'0000-00-00',22500,27500,6,1,4),(15,'Acyclovir 5% Salep Indofarma','Kategori :KulitKomposisi :Acyclovir 5%Dosis :PENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER.Oleskan 5 kali per hari tiap 4 jam tanpa dosis malam.Lanjutkan pengobatan setidaknya selama 5 hari, dalam beberapa kasus pengobatan dilanjutkan hingga 10 hari.Aturan Pakai :Dioleskan pada area infeksi/yang sakit setelah kulit dibersihkan dan dikeringkan.Kemasan :Isi 25 TubeTube @ 5 gKontra Indikasi :HipersensitivitasPerhatian :HARUS DENGAN RESEP DOKTER.Jangan digunakan pada selaput lendir, seperti: mulut, mata, atau vaginal. Bukan untuk pencegahan infeksi herpes simples rekuren.Hati-hati penggunaan pada wanita hamil dan/atau menyusui, serta anak-anak.Kategori Kehamilan :Kategori B: Mungkin dapat digunakan oleh wanita hamil.Penelitian pada hewan uji tidak memperlihatkan ada nya risiko terhadap janin, namun belum ada bukti penelitian langsung terhadap wanita hamil.SegmentasiRedManufakturGeneric Manufacturer',21,'0000-00-00',42500,50000,4,3,4),(16,'Amoxicillin 125 MG/5 ML Syrup ','Indikasi / Manfaat / Kegunaan :- Infeksi yang di sebabkan oleh strain-strain bakteri yang peka : - Infeksi kulit dan jaringan lunak: Stafilococcus bukan penghasil penicillinase, Strepctococcus, E.coli. - Infeksi saluran pernapasan : H. Influenza, Streptococcus, Streptococcus pneumonia, Stafilococcus bukan penghasil penicillinase, E.coli - Infeksi saluran genitourinary: E. coli, P.mirabilis dan Streptococcus faecalis. Gonore : N. gonorrhea (bukan penghasil penicillinase )Sub Kategori :PenisilinTag :antibiotik , antiinfeksi , infeksi kulit , infeksi saluran pernafasan , dry syrupKomposisi :Tiap 5 ml suspensi mengandung : Amoksisilin trihidrat setara dengan Amoksisilin 125 mgDosis :dewasa dan anak-anak dengan berat badan diatas 20 kg : sehari 250 – 500 mg tiap 8 jam. Anak-anak dengan berat badan kurang dari 20 kg : 20 – 40 mg/kg berat badan sehari dalam dosis terbagi, diberikan tiap 8 jam.Penyajian :Tambahkan aqua destillata sebanyak 51 ml kedalam botol. Kocok baik-baik hingga diperoleh suspense yang baik dan homogeny. Setelah ditambahkan aqua destillata, suspensi tidak boleh di simpan sampai 7 hari. Kocok dulu sebelum diminum.Cara Penyimpanan :Simpan ditempat sejuk, kering dan terlindung dari cahaya matahariPerhatian :Leukimia, hamil, menyusui, gagal ginjalEfek Samping :Reaksi kepekaan seperti erythemamatous maculopapular rashes, urtikaria, serum sickness. Reaksi kepekaan yang serius dan fatal adalah anaphylaxis terutama terjadi pada penderita yang hipersensitif terhadap penicillin. Gangguan saluran pencernaan seperti mual, muntah, diare. Reaksi-reaksi hematological ( biasanya bersifat reversibel )Kemasan :1 KARTON ISI 50 BOTOLNama Standar MIMS :AMOXICILLIN IF 125ML/5ML DRY SYR 60MLPabrik :EritaGolongan Obat :obat keras Obat Keras',14,'0000-00-00',4500,7500,6,1,2),(17,'Balsem Otot Geliga 40 GR Botol','Obat gosok yang digunakan untuk membantu meredakan nyeri otot dan sendi seperti nyeri akibat pukulan/memar, keseleo dan nyeri otot punggung',22,'0000-00-00',3500,7000,4,1,2),(18,'Betadine Solution 30 ML Botol ','Merupakan antiseptik luka dengan kandungan Povidone Iodine 10% untuk membunuh kuman penyebab infeksi',15,'0000-00-00',22500,27000,10,1,6),(19,'Ultraflu','obat flu dan batuk',0,'0000-00-00',2500,4000,7,1,2);

/*Table structure for table `tm_pemasok` */

DROP TABLE IF EXISTS `tm_pemasok`;

CREATE TABLE `tm_pemasok` (
  `id_pemasok` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemasok` varchar(100) NOT NULL,
  `alamat_pemasok` varchar(200) NOT NULL,
  `telepon_pemasok` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pemasok`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tm_pemasok` */

insert  into `tm_pemasok`(`id_pemasok`,`nama_pemasok`,`alamat_pemasok`,`telepon_pemasok`) values (1,'Jaya Mandiri Apotek','Jalan Godean KM 10','085757656522'),(2,'CV Karsa Mandiri','Jl Lampersari 12 Semarang','0248415540'),(3,'Berkah Farma','Jln Wahid hasyim KM 5','087755445455'),(4,'CV Eka jaya sakti','Jl Berdikari Raya 1 Semarang','0247471786'),(5,'PT Daya Sembada','Jl Simpang Lima 1 Mal Ciputra 66 Lt UG Semarang','0248449568'),(6,'	PT Berlico Mulia Farma','Jl. Juwangen Kalasan Km 10.6 Tromol Pos No. 8 Yogyakarta','0274496446'),(7,'PT Parit Padang Global','Jl. Nitipuran No.9 Kadipuro Baru Bantul, Yogyakarta 56182','02742813011');

/*Table structure for table `tm_pengguna` */

DROP TABLE IF EXISTS `tm_pengguna`;

CREATE TABLE `tm_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username_pengguna` varchar(50) NOT NULL,
  `password_pengguna` varchar(100) NOT NULL,
  `level_pengguna` enum('Pemilik','Admin','Kasir') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tm_pengguna` */

insert  into `tm_pengguna`(`id_pengguna`,`username_pengguna`,`password_pengguna`,`level_pengguna`) values (1,'pemilik','7c4a8d09ca3762af61e59520943dc26494f8941b','Pemilik'),(2,'apoteker','7c4a8d09ca3762af61e59520943dc26494f8941b','Admin'),(3,'kasir','7c4a8d09ca3762af61e59520943dc26494f8941b','Kasir');

/*Table structure for table `tm_unit` */

DROP TABLE IF EXISTS `tm_unit`;

CREATE TABLE `tm_unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(50) NOT NULL,
  `deskripsi_unit` varchar(200) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tm_unit` */

insert  into `tm_unit`(`id_unit`,`nama_unit`,`deskripsi_unit`) values (1,'Kapsul',''),(2,'saset',''),(4,'Salep (unguenta)',''),(5,'Semprot',''),(6,'Sirup',''),(7,'Tablet',''),(9,'Strip',''),(10,'Tetes','');

/*Table structure for table `tt_pembelian` */

DROP TABLE IF EXISTS `tt_pembelian`;

CREATE TABLE `tt_pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pembelian` varchar(50) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `id_pemasok` (`id_pemasok`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `tt_pembelian_ibfk_1` FOREIGN KEY (`id_pemasok`) REFERENCES `tm_pemasok` (`id_pemasok`),
  CONSTRAINT `tt_pembelian_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tm_pengguna` (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `tt_pembelian` */

insert  into `tt_pembelian`(`id_pembelian`,`kode_pembelian`,`tanggal_pembelian`,`jumlah_pembelian`,`total_pembelian`,`id_pemasok`,`id_pengguna`) values (7,'PB202105007','2021-05-04',5,225000,2,1),(8,'PB202105008','2020-05-30',100,3250000,1,1),(9,'PB202106009','2021-06-28',1,2500,1,2),(10,'PB2021060010','2021-06-28',1,4500,2,2),(13,'PB2021070013','2020-06-04',200,2600000,1,2),(14,'PB2021070014','2020-06-04',250,625000,2,2),(15,'PB2021070015','2021-07-05',50,1050000,3,2),(16,'PB2021070016','2021-07-05',25,975000,6,2),(17,'PB2021070017','2021-07-05',21,724500,3,2),(18,'PB2021070018','2021-07-05',25,325000,5,2),(19,'PB2021070019','2021-07-05',30,75000,7,2),(20,'PB2021070020','2021-07-05',300,3960000,6,2),(21,'PB2021070021','2021-07-05',19,427500,4,2),(22,'PB2021070022','2021-07-05',21,892500,3,2),(23,'PB2021070023','2021-07-05',14,63000,3,2),(24,'PB2021070024','2021-07-05',22,77000,6,2),(25,'PB2021070025','2021-07-05',15,337500,6,2),(26,'PB2021070026','2021-07-06',50,660000,6,2);

/*Table structure for table `tt_penjualan` */

DROP TABLE IF EXISTS `tt_penjualan`;

CREATE TABLE `tt_penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penjualan` varchar(50) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `jumlah_penjualan` int(11) NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `tt_penjualan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tm_pengguna` (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

/*Data for the table `tt_penjualan` */

insert  into `tt_penjualan`(`id_penjualan`,`kode_penjualan`,`tanggal_penjualan`,`jumlah_penjualan`,`total_penjualan`,`nama_pembeli`,`id_pengguna`) values (17,'PJ202105001','2021-05-04',8,325000,'Umum',1),(18,'PJ2021050018','2021-04-01',8,275000,'Umum',1),(19,'PJ2021050019','2021-03-17',5,175000,'Umum',1),(20,'PJ2021050020','2021-02-10',7,275000,'Umum',1),(21,'PJ2021050021','2021-01-13',6,225000,'Umum',1),(22,'PJ2021050022','2020-12-26',8,325000,'Umum',1),(23,'PJ2021050023','2020-11-18',9,325000,'Umum',1),(24,'PJ2021050024','2020-10-21',9,350000,'Umum',1),(25,'PJ2021050025','2020-09-04',11,400000,'Umum',1),(26,'PJ2021050026','2020-08-01',11,425000,'Umum',1),(27,'PJ2021050027','2020-07-05',8,325000,'Umum',1),(28,'PJ2021050028','2020-06-01',9,300000,'Umum',1),(29,'PJ2021050029','2020-05-04',9,350000,'Umum',1),(30,'PJ2021060030','2021-06-28',1,25000,'Umum',2),(31,'PJ2021060031','2021-06-28',1,6000,'Umum',2),(32,'PJ2021070032','2020-11-04',2,36000,'Umum',2),(33,'PJ2021070033','2020-11-04',1,18000,'Umum',2),(34,'PJ2021070034','2020-11-04',10,180000,'Umum',2),(35,'PJ2021070035','2020-12-05',3,54000,'Umum',2),(36,'PJ2021070036','2020-12-19',14,252000,'Umum',2),(37,'PJ2021070037','2021-07-04',19,342000,'Umum',2),(39,'PJ2021070039','2021-01-06',12,216000,'Umum',2),(40,'PJ2021070040','2021-02-20',10,180000,'Umum',2),(41,'PJ2021070041','2021-03-16',21,378000,'Umum',2),(42,'PJ2021070042','2021-04-23',26,468000,'Umum',2),(43,'PJ2021070043','2020-10-03',20,360000,'Umum',2),(44,'PJ2021070044','2020-09-11',15,270000,'Umum',2),(45,'PJ2021070045','2020-08-20',17,306000,'Umum',2),(46,'PJ2021070046','2020-07-06',14,252000,'Umum',2),(47,'PJ2021070047','2021-06-02',18,324000,'Umum',2),(48,'PJ2021070048','2021-05-18',30,540000,'Umum',2),(49,'PJ2021070049','2020-07-04',11,55000,'Umum',2),(50,'PJ2021070050','2020-08-05',8,40000,'Umum',2),(51,'PJ2021070051','2020-09-10',19,95000,'Umum',2),(52,'PJ2021070051','2020-10-14',19,95000,'Umum',2),(53,'PJ2021070053','2020-11-25',16,80000,'Umum',2),(54,'PJ2021070054','2020-12-22',14,70000,'Umum',2),(55,'PJ2021070054','2021-01-04',14,70000,'Umum',2),(56,'PJ2021070056','2021-02-12',24,120000,'Umum',2),(57,'PJ2021070057','2021-03-09',16,80000,'Umum',2),(58,'PJ2021070058','2021-04-18',30,150000,'Umum',2),(59,'PJ2021070059','2021-05-17',22,110000,'Umum',2),(60,'PJ2021070060','2021-06-26',25,125000,'Umum',2),(61,'PJ2021070061','2020-07-05',10,160000,'Umum',2),(62,'PJ2021070062','2020-08-07',12,192000,'Umum',2),(63,'PJ2021070063','2020-09-11',17,272000,'Umum',2),(64,'PJ2021070064','2020-10-05',19,304000,'Umum',2),(65,'PJ2021070065','2020-11-15',14,224000,'Umum',2),(66,'PJ2021070066','2020-12-02',22,352000,'Umum',2),(70,'PJ2021070070','2021-02-10',11,176000,'Umum',2),(71,'PJ2021070071','2021-03-21',18,288000,'Umum',2),(72,'PJ2021070072','2021-05-09',16,256000,'Umum',2),(75,'PJ2021070075','2021-05-14',2,32000,'Umum',2),(77,'PJ2021070077','2021-04-13',25,400000,'Umum',2),(92,'PJ2021070092','2021-08-05',17,272000,'Umum',2),(93,'PJ2021070093','2021-07-06',25,400000,'andi',2),(94,'PJ2021070094','2021-06-03',17,272000,'ani',2),(95,'PJ2021070095','2021-01-08',23,368000,'feri',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
