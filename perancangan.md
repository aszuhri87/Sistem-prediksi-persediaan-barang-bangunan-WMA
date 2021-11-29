# Pengembangan Sistem Informasi Penjualan Obat Dengan Metode Weighted Moving Average 
(Studi Kasus : Apotek Kronggahan Sleman)

# hak akses
- admin -> bisa lihat semua & semua operasi CRUD
- pemilik -> bisa liat semua kecuali data master -> kecuali obat dan tidak ada operasi tambah ubah hapus
- kasir -> hanya lihat module beranda, obat, penjualan & pembelian (input)

# Keterangan:
* Primary Key => INT - PRIMARY - AI
* Foreign Key => INT - INDEX
tm => tabel master
tt => tabel transaksi 
td => tabel transaksi detail

# tm_pengguna
- id_pengguna *
- username_pengguna VARCHAR 20
- password_pengguna VARCHAR 100
- level_pengguna ENUM [Pemilik, Admin, Kasir]

# tm_kategori
- id_kategori *
- nama_kategori VARCHAR 50
- deskripsi_kategori VARCHAR 200

# tm_lokasi
- id_lokasi *
- nama_lokasi VARCHAR 50
- deskripsi_lokasi VARCHAR 200

# tm_unit
- id_unit *
- nama_unit VARCHAR 50
- deskripsi_unit VARCHAR 200

# tm_pemasok
- id_pemasok *
- nama_pemasok VARCHAR 100
- alamat_pemasok VARCHAR 200
- telepon_pemasok VARCHAR 20

# tm_obat
- id_obat *
- nama_obat VARCHAR 100
- deskripsi_obat TEXT
<!-- - stok_obat INT -->
- kadaluarsa_obat DATE
- harga_beli_obat INT
- harga_jual_obat INT
- id_unit **
- id_kategori **
- id_lokasi **
<!-- - id_pemasok ** -->

# td_obat_stok
- id_obat_stok *
- stok
- kadaluarsa
- id_obat **

# tt_pembelian
- id_pembelian *
- kode_pembelian CHAR 10
- tanggal_pembelian DATE
- jumlah_pembelian INT
- total_pembelian INT
- id_pemasok **
- id_pengguna ** -> siapa yang input transaksi

# td_pembelian_obat
- id_pembelian_obat *
- id_pembelian **
- id_obat INT NULLable
- nama_obat VARCHAR 100
- harga_beli_obat INT
- jumlah_obat INT
- subharga_beli_obat INT
 
# tt_penjualan
- id_penjualan *
- kode_penjualan CHAR 10
- tanggal_penjualan DATE
- jumlah_penjualan INT
- total_penjualan INT
- nama_pembeli VARCHAR 50
- id_pengguna ** -> siapa yang input transaksi

# td_penjualan_obat
- id_penjualan_obat *
- id_penjualan **
- id_obat INT NULLable
- nama_obat VARCHAR 100
- harga_jual_obat INT
- jumlah_obat INT
- subharga_jual_obat INT


