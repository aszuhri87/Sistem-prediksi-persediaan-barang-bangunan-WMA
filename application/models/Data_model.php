<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

	/*********************
	 ** MODULE DASHBOARD
	 *********************/

	function jumlah_barang()
	{
		$data = $this->db->get('tm_barang')->num_rows();

		return $data;
	}

	function jumlah_stok()
	{
		$data = $this->db->select('SUM(stok) AS stok')->get('td_barang_stok')->row_array();

		return $data['stok'] ? $data['stok'] : 0;
	}

	function jumlah_penjualan()
	{
		$data = $this->db->get('tt_penjualan')->num_rows();

		return $data;
	}

	function jumlah_pembelian()
	{
		$data = $this->db->get('tt_pembelian')->num_rows();

		return $data;
	}



	/*********************
	 ** MODULE PENGGUNA
	 *********************/

	function tampil_pengguna()
	{
		$data = $this->db->get('tm_pengguna')->result_array();

		return $data;
	}

	function tambah_pengguna($inputan)
	{
		// pastikan inputan username bersih dari spasi dan berhuruf kecil semua
		$inputan['username_pengguna'] = str_replace(" ", "", strtolower($inputan['username_pengguna']));
		$inputan['password_pengguna'] = sha1($inputan['password_pengguna']);

		// jalankan fungsi insert data $inputan yang berisi data baru ke tabel 'pengguna' 
		$this->db->insert('tm_pengguna', $inputan);
	}

	function hapus_pengguna($id_pengguna)
	{
		// jalankan fungsi delete berdasarkan id_pengguna yang mau dihapus
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->delete('tm_pengguna');
	}

	function ambil_pengguna($id_pengguna = null)
	{
		if (empty($id_pengguna)) {
			$id_pengguna =  data_login('id_pengguna');
		}

		$this->db->where('id_pengguna', $id_pengguna);
		$data = $this->db->get('tm_pengguna')->row_array();

		return $data;
	}

	function ubah_pengguna($inputan, $id_pengguna = null)
	{
		if (empty($id_pengguna)) {
			$id_pengguna =  data_login('id_pengguna');
		}

		// jika inputan password kosong, buang inputan password dari array $inputan agar tidak ikut masuk ke dalam query update di bawah (agar tidak ikut diubah) -> karena password memang tidak ingin diubah oleh user
		if (empty($inputan['password_pengguna'])) {
			unset($inputan['password_pengguna']);
		}

		$inputan['password_pengguna'] = sha1($inputan['password_pengguna']);

		// jalankan fungsi update data $inputan yang berisi data yang mau di ubah pada tabel 'pengguna', berdasarkan id_pengguna nya
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('tm_pengguna', $inputan);
	}

	function login_pengguna($inputan)
	{
		$username = $inputan['username_pengguna'];
		$password = $inputan['password_pengguna'];

		// cek apakah ada data pengguna yang username dan passwordnya seperti inputan diatas
		$this->db->where('username_pengguna', $username);
		$this->db->where('password_pengguna', sha1($password));
		$cek_pengguna = $this->db->get('tm_pengguna');

		// hitung jumlah pengguna yang di dapat dari pengecekan diatas
		$jumlah_pengguna = $cek_pengguna->num_rows();

		if ($jumlah_pengguna == 0) {
			// jika jumlah pengguna = 0, maka login gagal
			return 'gagal';
		} else {

			// sebalikanya, jika ada pengguna yang di maksud
			// maka login berhasil

			// simpan data pelogin ke dalam session pengguna
			$data_pengguna = $cek_pengguna->row_array();
			$this->session->set_userdata('pengguna', $data_pengguna);

			return 'sukses';
		}
	}

	/*********************
	 ** MODULE UNIT
	 *********************/

	function tampil_unit()
	{
		$data = $this->db->get('tm_unit')->result_array();

		return $data;
	}

	function tambah_unit($inputan)
	{
		// jalankan fungsi insert data $inputan yang berisi data baru ke tabel 'tm_unit' 
		$this->db->insert('tm_unit', $inputan);
	}

	function hapus_unit($id_unit)
	{
		// jalankan fungsi delete berdasarkan id_unit yang mau dihapus
		$this->db->where('id_unit', $id_unit);
		$this->db->delete('tm_unit');
	}

	function ambil_unit($id_unit)
	{
		$this->db->where('id_unit', $id_unit);
		$data = $this->db->get('tm_unit')->row_array();

		return $data;
	}

	function ubah_unit($inputan, $id_unit)
	{
		// jalankan fungsi update data $inputan yang berisi data yang mau di ubah pada tabel 'tm_unit', berdasarkan id_unit nya
		$this->db->where('id_unit', $id_unit);
		$this->db->update('tm_unit', $inputan);
	}

	/*********************
	 ** MODULE KATEGORI
	 *********************/

	function tampil_kategori()
	{
		$data = $this->db->get('tm_kategori')->result_array();

		return $data;
	}

	function tambah_kategori($inputan)
	{
		// jalankan fungsi insert data $inputan yang berisi data baru ke tabel 'tm_kategori' 
		$this->db->insert('tm_kategori', $inputan);
	}

	function hapus_kategori($id_kategori)
	{
		// jalankan fungsi delete berdasarkan id_kategori yang mau dihapus
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete('tm_kategori');
	}

	function ambil_kategori($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		$data = $this->db->get('tm_kategori')->row_array();

		return $data;
	}

	function ubah_kategori($inputan, $id_kategori)
	{
		// jalankan fungsi update data $inputan yang berisi data yang mau di ubah pada tabel 'kategori', berdasarkan id_kategori nya
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('tm_kategori', $inputan);
	}

	/*********************
	 ** MODULE LOKASI/GUDANG/RAK
	 *********************/

	function tampil_lokasi()
	{
		$data = $this->db->get('tm_lokasi')->result_array();

		return $data;
	}

	// function tambah_lokasi($inputan)
	// {
	// 	// jalankan fungsi insert data $inputan yang berisi data baru ke tabel 'tm_lokasi' 
	// 	$this->db->insert('tm_lokasi', $inputan);
	// }

	// function hapus_lokasi($id_lokasi)
	// {
	// 	// jalankan fungsi delete berdasarkan id_lokasi yang mau dihapus
	// 	$this->db->where('id_lokasi', $id_lokasi);
	// 	$this->db->delete('tm_lokasi');
	// }

	// function ambil_lokasi($id_lokasi)
	// {
	// 	$this->db->where('id_lokasi', $id_lokasi);
	// 	$data = $this->db->get('tm_lokasi')->row_array();

	// 	return $data;
	// }

	// function ubah_lokasi($inputan, $id_lokasi)
	// {
	// 	// jalankan fungsi update data $inputan yang berisi data yang mau di ubah pada tabel 'tm_lokasi', berdasarkan id_lokasi nya
	// 	$this->db->where('id_lokasi', $id_lokasi);
	// 	$this->db->update('tm_lokasi', $inputan);
	// }


	/*********************
	 ** MODULE PEMASOK/SUPPLIER
	 *********************/

	function tampil_pemasok()
	{
		$data = $this->db->get('tm_pemasok')->result_array();

		return $data;
	}

	function tambah_pemasok($inputan)
	{
		// jalankan fungsi insert data $inputan yang berisi data baru ke tabel 'tm_pemasok' 
		$this->db->insert('tm_pemasok', $inputan);
	}

	function hapus_pemasok($id_pemasok)
	{
		// jalankan fungsi delete berdasarkan id_pemasok yang mau dihapus
		$this->db->where('id_pemasok', $id_pemasok);
		$this->db->delete('tm_pemasok');
	}

	function ambil_pemasok($id_pemasok)
	{
		$this->db->where('id_pemasok', $id_pemasok);
		$data = $this->db->get('tm_pemasok')->row_array();

		return $data;
	}

	function ubah_pemasok($inputan, $id_pemasok)
	{
		// jalankan fungsi update data $inputan yang berisi data yang mau di ubah pada tabel 'tm_pemasok', berdasarkan id_pemasok nya
		$this->db->where('id_pemasok', $id_pemasok);
		$this->db->update('tm_pemasok', $inputan);
	}

	/*********************
	 ** MODULE OBAT
	 *********************/

	function tampil_barang($tipe = '', $posisi = 0, $batas = 99999)
	{
		// untuk mendapatka satuan & kategori, maka join/gabung tm_satuan & tm_kategori dengan tm_barang berdasarkan kunci masing-masing yang saling berkaitan
		$this->db->join('tm_unit', 'tm_unit.id_unit = tm_barang.id_unit', 'left');
		$this->db->join('tm_kategori', 'tm_kategori.id_kategori = tm_barang.id_kategori', 'left');


		if (!empty($tipe)) {
			if ($tipe == 'habis') {
				$this->db->where('tm_barang.stok_barang', 0);
			} elseif ($tipe == 'hampir-habis') {
				$this->db->where('tm_barang.stok_barang <= ', 10);
				$this->db->where('tm_barang.stok_barang >', 0);
			}
		}

		$barang = $this->db->get('tm_barang', $batas, $posisi)->result_array();

		$hasil = array();
		foreach ($barang as $key => $value) {
			$hasil[$key] = $value;

			$barang_stok = $this->tampil_barang_stok_perbarang($value['id_barang']);
			foreach ($barang_stok as $k => $v) {
				$hasil[$key]['detail'][$k]['stok'] = $v['stok'];
				
			}
		}

		return $hasil;
	}

	// function tampil_barang_kadaluarsa($posisi = 0, $batas = 99999)
	// {
	// 	$barang_stok = $this->tampil_barang_stok();

	// 	$barang_kadaluarsa = array();
	// 	foreach ($barang_stok as $key => $value) {
	// 		if ($value['kadaluarsa'] <= date("Y-m-d")) {
	// 			$barang_kadaluarsa[$key] =  $value;
	// 		}
	// 	}

	// 	$potong = array_slice($barang_kadaluarsa, $posisi, $batas);

	// 	return $potong;
	// }

	function tampil_barang_stok()
	{
		$ambil = $this->db
			->join('tm_barang o', 'o.id_barang = s.id_barang', 'left')
			->join('tm_unit u', 'u.id_unit = o.id_unit', 'left')
			->join('tm_kategori k', 'k.id_kategori = o.id_kategori', 'left')
			->order_by('o.id_barang', 'ASC')
			->get('td_barang_stok s');

		return $ambil->result_array();
	}

	function ambil_detail_barang_stok($id_barang_stok)
	{
		return $this->db->where('id_barang_stok', $id_barang_stok)
			->get('td_barang_stok')->row_array();
	}

	function tampil_barang_stok_perbarang($id_barang)
	{
		$ambil = $this->db->join('tm_barang o', 'o.id_barang = s.id_barang', 'left')
			->where('o.id_barang', $id_barang)
			->order_by('o.id_barang', 'ASC')
			->get('td_barang_stok s');

		return $ambil->result_array();
	}

	function detail_barang_stok($id_barang)
	{
		$ambil = $this->db->join('tm_barang o', 'o.id_barang = s.id_barang', 'left')
			->where('o.id_barang', $id_barang)
			->get('td_barang_stok s');

		return $ambil->row_array();
	}

	function tambah_barang($inputan)
	{
		// jalankan fungsi insert data $inputan yang berisi data baru ke tabel 'barang' 
		$this->db->insert('tm_barang', $inputan);
	}

	function hapus_barang($id_barang)
	{
		// jalankan fungsi delete berdasarkan id_barang yang mau dihapus
		$this->db->where('id_barang', $id_barang);
		$this->db->delete('tm_barang');
	}

	function ambil_barang($id_barang)
	{
		$this->db->where('id_barang', $id_barang);
		$data = $this->db->get('tm_barang')->row_array();

		return $data;
	}

	function ubah_barang($inputan, $id_barang)
	{
		// jalankan fungsi update data $inputan yang berisi data yang mau di ubah pada tabel 'barang', berdasarkan id_barang nya
		$this->db->where('id_barang', $id_barang);
		$this->db->update('tm_barang', $inputan);
	}

	function upload_foto_barang($id_barang = null)
	{
		// atur konfigurasi upload
		$config['upload_path'] = './assets/gambar/barang/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		// panggil library upload, dgn melemparkan konfigurasi kita
		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		// jalankan proses upload
		if (!$this->upload->do_upload('foto_barang')) {

			// jika gagal upload, ambil pesan errornya dan simpan di session flashdata
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('pesan_error', $error);

			// arahkan ke halaman tambah / ubah
			if ($id_barang == null) {
				return redirect('barang/tambah');
			} else {
				return redirect("barang/ubah/$id_barang");
			}
		} else {

			// jika upload berhasil, ambil nama file yang barusan di upload
			$nama_file = $this->upload->data('file_name');

			// jika ada id_barang
			if (!empty($id_barang)) {

				// ambil data barangnya, lalu ambil nama file foto lamanya
				$barang = $this->ambil_barang($id_barang);
				$foto_lama = $barang['foto_barang'];

				// hapus foto lama, jika ada
				if (file_exists(FCPATH . 'assets/gambar/barang/' . $foto_lama)) {
					unlink(FCPATH . 'assets/gambar/barang/' . $foto_lama);
				}
			}

			return $nama_file;
		}
	}

	/*********************
	 ** MODULE PENJUALAN
	 *********************/

	function detail_penjualan($id_penjualan)
	{
		// untuk mendapatkan nama pengguna/karyawan/penanggung jawab, join dengan tbl pengguna

		$this->db->join('tm_pengguna', 'tm_pengguna.id_pengguna = tt_penjualan.id_pengguna', 'left');

		// ambil berdasarkan id_penjualan
		$this->db->where('id_penjualan', $id_penjualan);

		$data = $this->db->get('tt_penjualan')->row_array();

		return $data;
	}

	function ambil_barang_penjualan($id_penjualan)
	{
		$this->db->select("*,
			po.nama_barang As nama_barang_saat_jual,
			po.harga_jual_barang As harga_barang_saat_jual
			");

		// untuk mendapatkan data barang & satuan & kategori, maka join/gabung barang & satuan & kategori dengan barang berdasarkan kunci masing-masing yang saling berkaitan
		$this->db->join('td_barang_stok os', 'os.id_barang_stok = po.id_barang_stok', 'left');
		$this->db->join('tm_barang o', 'o.id_barang = os.id_barang', 'left');
		$this->db->join('tm_unit u', 'u.id_unit = o.id_unit', 'left');
		$this->db->join('tm_kategori k', 'k.id_kategori = o.id_kategori', 'left');

		// ambil berdasarkan $id_penjualan
		$this->db->where('po.id_penjualan', $id_penjualan);

		$data = $this->db->get('td_penjualan_barang po')->result_array();

		return $data;
	}

	function tampil_penjualan_perbulan_setahun($tahun)
	{
		if (empty($tahun)) {
			$tahun = date("Y");
		}

		$ambil = $this->db->query("SELECT bulan.nomor_bulan AS no, bulan.nama_bulan as bulan, SUM(total_penjualan) as total FROM tt_penjualan p LEFT JOIN bulan ON bulan.nomor_bulan = MONTH(p.tanggal_penjualan) WHERE YEAR(tanggal_penjualan) = '$tahun' GROUP BY bulan.nama_bulan ORDER BY bulan.nomor_bulan ASC ");

		$hasil = $ambil->result_array();

		$bulan = $this->tampil_bulan();

		$data = array();

		foreach ($hasil as $key => $value) {
			$no =  $value['no'];
			$data[$no] = $value;
		}

		$wadah = array();

		foreach ($bulan as $index => $b) {
			$no = $b['no'];
			if (isset($data[$no])) {
				$wadah[$index]['bulan'] = $data[$no]['bulan'];
				$wadah[$index]['total'] = $data[$no]['total'] * 1;
			} else {
				$wadah[$index]['bulan'] = $b['bulan'];
				$wadah[$index]['total'] = 0;
			}
		}

		return $wadah;
	}

	function tampil_bulan()
	{
		$this->db->select('nomor_bulan as no, nama_bulan as bulan');
		$ambil = $this->db->get('bulan');

		return $ambil->result_array();
	}

	function tampil_penjualan_tertinggi($tahun)
	{
		if (empty($tahun)) {
			$tahun = date("Y");
		}

		$ambil = $this->db->query("SELECT tm_barang.nama_barang, SUM(jumlah_penjualan) AS total_terjual FROM tm_barang 
		JOIN td_barang_stok ON tm_barang.id_barang = td_barang_stok.id_barang
		JOIN td_penjualan_barang ON td_barang_stok.id_barang_stok = td_penjualan_barang.id_barang_stok
		JOIN tt_penjualan ON tt_penjualan.id_penjualan = td_penjualan_barang.id_penjualan WHERE YEAR (tanggal_penjualan) = '$tahun'
		GROUP BY tm_barang.id_barang ORDER BY total_terjual DESC LIMIT 10 OFFSET 0");

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tampil_penjualan_terendah($tahun)
	{
		if (empty($tahun)) {
			$tahun = date("Y");
		}

		$ambil = $this->db->query("SELECT tm_barang.nama_barang, SUM(jumlah_penjualan) AS total_terjual FROM tm_barang 
		JOIN td_barang_stok ON tm_barang.id_barang = td_barang_stok.id_barang
		JOIN td_penjualan_barang ON td_barang_stok.id_barang_stok = td_penjualan_barang.id_barang_stok
		JOIN tt_penjualan ON tt_penjualan.id_penjualan = td_penjualan_barang.id_penjualan WHERE YEAR (tanggal_penjualan) = '$tahun'
		GROUP BY tm_barang.id_barang ORDER BY total_terjual ASC LIMIT 10 OFFSET 0");

		$hasil = $ambil->result_array();

		return $hasil;
	}

	## TRANSAKSI PENJUALAN ##

	function simpan_penjualan($inputan)
	{
		$this->db->trans_start(); # Starting Transaction
		$this->db->trans_strict(FALSE);

		$data_penjualan = array();
		$data_penjualan['kode_penjualan'] = $inputan['kode_penjualan'];
		$data_penjualan['nama_pembeli'] = $inputan['nama_pembeli'];
		$data_penjualan['id_pengguna'] = data_login('id_pengguna');
		$data_penjualan['total_penjualan'] = $inputan['total_penjualan'];
		$data_penjualan['jumlah_penjualan'] = 0;
		foreach ($inputan['jumlah'] as $jumlah) {
			$data_penjualan['jumlah_penjualan'] += $jumlah;
		}
		$data_penjualan['tanggal_penjualan'] = date("Y-m-d");

		$this->db->insert('tt_penjualan', $data_penjualan);
		$id_penjualan_barusan =  $this->db->insert_id();

		$data_detail_penjualan = array();
		$data_update_stok = array();

		foreach ($inputan['id_barang'] as $key => $id_barang) {
			$barang = $this->ambil_barang($id_barang);
			$barang_stok = $this->ambil_detail_barang_stok($inputan['id_barang_stok'][$key]);

			// data penjualan detail
			$data_detail_penjualan[$key]['id_penjualan'] = $id_penjualan_barusan;
			// $data_detail_penjualan[$key]['id_barang'] = $id_barang;
			$data_detail_penjualan[$key]['id_barang_stok'] = $inputan['id_barang_stok'][$key];
			// 
			$data_detail_penjualan[$key]['harga_jual_barang'] = $barang['harga_jual_barang'];
			$data_detail_penjualan[$key]['subharga_jual_barang'] = $barang['harga_jual_barang'] * $inputan['jumlah'][$key];
			$data_detail_penjualan[$key]['jumlah_barang'] = $inputan['jumlah'][$key];


			// data update stok
			$data_update_stok[$key]['id_barang_stok'] = $inputan['id_barang_stok'][$key];
			$data_update_stok[$key]['stok'] = $barang_stok['stok'] - $inputan['jumlah'][$key];
		}

		$this->db->insert_batch('td_penjualan_barang', $data_detail_penjualan);
		$this->db->update_batch('td_barang_stok', $data_update_stok, 'id_barang_stok');
		// $this->update_total_stok();

		$this->db->trans_complete(); # Completing transaction

		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			return FALSE;
		} else {
			# Everything is Perfect. 
			# Committing data to the database.
			$this->db->trans_commit();
			return $id_penjualan_barusan;
		}
	}

	function hapus_penjualan($id_penjualan)
	{
		$this->db->where('id_penjualan', $id_penjualan)->delete('tt_penjualan');
	}

	function hapus_pembelian($id_pembelian)
	{
		$this->db->where('id_pembelian', $id_pembelian)->delete('tt_pembelian');
	}

	function update_total_stok()
	{
		$stok = $this->db
			->select('*, SUM(stok) as total_stok')
			->group_by('id_barang')
			->get('td_barang_stok')->result_array();

		// echo "<pre>";
		// print_r($stok);
		// echo "</pre>";
		// die;

		foreach ($stok as $key => $value) {
			$this->db
				->where('id_barang', $value['id_barang'])
				->set('stok_barang', $value['total_stok'])
				->update('tm_barang');
		}

		return TRUE;
	}

	/*********************
	 ** MODULE PEMBELIAN
	 *********************/

	function detail_pembelian($id_pembelian)
	{
		// untuk mendapatkan nama pemasok & nama gudang dan nama pengguna/karyawan/penanggung jawab, join dengan tbl pemasok dan pengguna
		$this->db->join('tm_pemasok', 'tm_pemasok.id_pemasok = tt_pembelian.id_pemasok', 'left');
		$this->db->join('tm_pengguna', 'tm_pengguna.id_pengguna = tt_pembelian.id_pengguna', 'left');

		// ambil berdasarkan id_pembelian
		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->or_where('kode_pembelian', $id_pembelian);

		$data = $this->db->get('tt_pembelian')->row_array();

		return $data;
	}

	function ambil_barang_pembelian($id_pembelian)
	{
		$this->db->select("*,
		 po.nama_barang As nama_barang_saat_beli,
			po.harga_beli_barang As harga_barang_saat_beli
                
			");


		// untuk mendapatkan data barang & pemasok & satuan & kategori, maka join/gabung barang & pemasok & satuan & kategori dengan barang berdasarkan kunci masing-masing yang saling berkaitan
		$this->db->join('tt_pembelian p', 'p.id_pembelian = po.id_pembelian', 'left');
		$this->db->join('tm_barang o', 'o.id_barang = po.id_barang', 'left');
		$this->db->join('tm_unit u', 'u.id_unit = o.id_unit', 'left');
		$this->db->join('tm_kategori k', 'k.id_kategori = o.id_kategori', 'left');

		// ambil berdasarkan $id_pembelian
		$this->db->where('po.id_pembelian', $id_pembelian);
		$this->db->or_where('p.kode_pembelian', $id_pembelian);

		$data = $this->db->get('td_pembelian_barang po')->result_array();

		return $data;
	}

	function tampil_pembelian_perbulan_setahun($tahun)
	{
		if (empty($tahun)) {
			$tahun = date("Y");
		}

		$ambil = $this->db->query("SELECT bulan.nomor_bulan AS no, bulan.nama_bulan as bulan, SUM(total_pembelian) as total FROM tt_pembelian p LEFT JOIN bulan ON bulan.nomor_bulan = MONTH(p.tanggal_pembelian) WHERE YEAR(tanggal_pembelian) = '$tahun' GROUP BY bulan.nama_bulan ORDER BY bulan.nomor_bulan ASC ");

		$hasil = $ambil->result_array();

		$bulan = $this->tampil_bulan();

		$data = array();

		foreach ($hasil as $key => $value) {
			$no =  $value['no'];
			$data[$no] = $value;
		}

		$wadah = array();

		foreach ($bulan as $index => $b) {
			$no = $b['no'];
			if (isset($data[$no])) {
				$wadah[$index]['bulan'] = $data[$no]['bulan'];
				$wadah[$index]['total'] = $data[$no]['total'] * 1;
			} else {
				$wadah[$index]['bulan'] = $b['bulan'];
				$wadah[$index]['total'] = 0;
			}
		}

		return $wadah;
	}

	function tampil_pembelian_tertinggi($tahun)
	{
		if (empty($tahun)) {
			$tahun = date("Y");
		}

		$ambil = $this->db->query("SELECT tm_barang.nama_barang, SUM(jumlah_pembelian) AS total_dibeli 
		FROM tm_barang 
		JOIN td_pembelian_barang ON tm_barang.id_barang = td_pembelian_barang.id_barang
		JOIN tt_pembelian ON tt_pembelian.id_pembelian = td_pembelian_barang.id_pembelian
		WHERE YEAR (tanggal_pembelian) = '$tahun'
		GROUP BY tm_barang.id_barang ORDER BY total_dibeli DESC LIMIT 10 OFFSET 0");

		$hasil = $ambil->result_array();

		return $hasil;
	}

	function tampil_pembelian_terendah($tahun)
	{
		if (empty($tahun)) {
			$tahun = date("Y");
		}

		$ambil = $this->db->query("SELECT tm_barang.nama_barang, SUM(jumlah_pembelian) AS total_dibeli 
		FROM tm_barang 
		JOIN td_pembelian_barang ON tm_barang.id_barang = td_pembelian_barang.id_barang
		JOIN tt_pembelian ON tt_pembelian.id_pembelian = td_pembelian_barang.id_pembelian
		WHERE YEAR (tanggal_pembelian) = '$tahun'
		GROUP BY tm_barang.id_barang ORDER BY total_dibeli ASC LIMIT 10 OFFSET 0");

		$hasil = $ambil->result_array();

		return $hasil;
	}

	## TRANSAKSI PEMBELIAN ##

	function simpan_pembelian($inputan)
	{
		$this->db->trans_start(); # Starting Transaction
		$this->db->trans_strict(FALSE);

		$data_pembelian = array();
		$data_pembelian['kode_pembelian'] = $inputan['kode_pembelian'];
		$data_pembelian['id_pemasok'] = $inputan['id_pemasok'];
		$data_pembelian['id_pengguna'] = data_login('id_pengguna');
		$data_pembelian['total_pembelian'] = $inputan['total_pembelian'];
		$data_pembelian['jumlah_pembelian'] = 0;
		foreach ($inputan['jumlah'] as $jumlah) {
			$data_pembelian['jumlah_pembelian'] += $jumlah;
		}
		$data_pembelian['tanggal_pembelian'] = date("Y-m-d");

		$this->db->insert('tt_pembelian', $data_pembelian);
		$id_pembelian_barusan =  $this->db->insert_id();

		$data_detail_pembelian = array();
		$data_barang_stok_baru = array();

		foreach ($inputan['id_barang'] as $key => $id_barang) {
			$barang = $this->ambil_barang($id_barang);
			$data_detail_pembelian[$key]['id_pembelian'] = $id_pembelian_barusan;
			$data_detail_pembelian[$key]['id_barang'] = $id_barang;
			$data_detail_pembelian[$key]['nama_barang'] = $barang['nama_barang'];
			$data_detail_pembelian[$key]['harga_beli_barang'] = $barang['harga_beli_barang'];
			$data_detail_pembelian[$key]['subharga_beli_barang'] = $barang['harga_beli_barang'] * $inputan['jumlah'][$key];
			$data_detail_pembelian[$key]['jumlah_barang'] = $inputan['jumlah'][$key];

			$data_barang_stok_baru[$key]['id_barang'] = $id_barang;
			$data_barang_stok_baru[$key]['referensi'] = $inputan['kode_pembelian'];
			
			$data_barang_stok_baru[$key]['stok'] = $inputan['jumlah'][$key];
		}

		$this->db->insert_batch('td_pembelian_barang', $data_detail_pembelian);
		$this->db->insert_batch('td_barang_stok', $data_barang_stok_baru);

		$this->db->trans_complete(); # Completing transaction

		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			return FALSE;
		} else {
			# Everything is Perfect. 
			# Committing data to the database.
			$this->db->trans_commit();
			return $id_pembelian_barusan;
		}
	}

	/*********************
	 ** MODULE LAPORAN
	 *********************/
	function tampil_penjualan($orderby = "", $tgl_mulai = '', $tgl_selesai = '')
	{
		// untuk mendapatkan nama pengguna/karyawan/penanggung jawab, join dengan tbl pengguna
		$this->db->select("
		tt_penjualan.id_penjualan, tt_penjualan.nama_pembeli, tt_penjualan.kode_penjualan, tt_penjualan.tanggal_penjualan, tm_barang.nama_barang, tm_unit.nama_unit, tm_pengguna.username_pengguna,
		tt_penjualan.jumlah_penjualan, tt_penjualan.total_penjualan
		");
		$this->db->join('tm_pengguna', 'tm_pengguna.id_pengguna = tt_penjualan.id_pengguna', 'left');
		$this->db->join('td_penjualan_barang', 'td_penjualan_barang.id_penjualan = tt_penjualan.id_penjualan', 'left');
		$this->db->join('td_barang_stok', 'td_barang_stok.id_barang_stok = td_penjualan_barang.id_barang_stok', 'left');
		$this->db->join('tm_barang', 'tm_barang.id_barang = td_barang_stok.id_barang', 'left');
		$this->db->join('tm_unit', 'tm_unit.id_unit = tm_barang.id_unit', 'left');

		if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
			$this->db->where("DATE(tt_penjualan.tanggal_penjualan) >= '$tgl_mulai'");
			$this->db->where("DATE(tt_penjualan.tanggal_penjualan) <= '$tgl_selesai'");
		}

		if ($orderby != 'no-order') {
			$this->db->order_by('tt_penjualan.tanggal_penjualan', 'DESC');
		}


		$data = $this->db->get('tt_penjualan')->result_array();

		return $data;
	}


	function tampil_pembelian($orderby = "", $tgl_mulai = "", $tgl_selesai = "")
	{
		// untuk mendapatkan nama pemasok & nama pengguna/karyawan/penanggung jawab, join dengan tbl pengguna & pemasok
		$this->db->select("
		tt_pembelian.id_pembelian, tm_barang.nama_barang, tt_pembelian.kode_pembelian, tt_pembelian.tanggal_pembelian, tm_pemasok.nama_pemasok,
		tt_pembelian.jumlah_pembelian, tt_pembelian.total_pembelian, tm_pengguna.username_pengguna, td_pembelian_barang.harga_beli_barang
		");

		$this->db->join('tm_pemasok', 'tm_pemasok.id_pemasok = tt_pembelian.id_pemasok', 'left');
		$this->db->join('tm_pengguna', 'tm_pengguna.id_pengguna = tt_pembelian.id_pengguna', 'left');
		$this->db->join('td_pembelian_barang', 'td_pembelian_barang.id_pembelian = tt_pembelian.id_pembelian', 'left');
		$this->db->join('tm_barang', 'tm_barang.id_barang = td_pembelian_barang.id_barang', 'left');


		if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
			$this->db->where("DATE(tt_pembelian.tanggal_pembelian) >= '$tgl_mulai'");
			$this->db->where("DATE(tt_pembelian.tanggal_pembelian) <= '$tgl_selesai'");
		}

		if ($orderby != 'no-order') {
			$this->db->order_by('tt_pembelian.tanggal_pembelian', 'DESC');
		}

		$data = $this->db->get('tt_pembelian')->result_array();

		return $data;
	}

	/*********************
	 ** MODULE PREDIKSI
	 *********************/

	// function tampil_data_hitung($id_barang, $bulan, $tahun)
	function tampil_data_hitung($id_barang, $tanggal_penjualan)
	{
		$ambil = $this->db->query("SELECT 
			ob.id_barang,
			p.tanggal_penjualan as tanggal, 
			MONTH(tanggal_penjualan) as no_bulan,
			bulan.nama_bulan as bulan,
			YEAR(tanggal_penjualan) as tahun,
			po.jumlah_barang as jumlah
			FROM tt_penjualan p 
			LEFT JOIN bulan ON bulan.nomor_bulan = MONTH(p.tanggal_penjualan)
			LEFT JOIN td_penjualan_barang po ON po.id_penjualan = p.id_penjualan
			LEFT JOIN td_barang_stok os ON os.id_barang_stok = po.id_barang_stok
			LEFT JOIN tm_barang ob ON ob.id_barang = os.id_barang
			WHERE DATE(tanggal_penjualan) < '$tanggal_penjualan' 
			AND ob.id_barang = '$id_barang'
			GROUP BY DATE_FORMAT(p.tanggal_penjualan, '%Y-%m')
			ORDER BY p.tanggal_penjualan ASC
			");
		// WHERE MONTH(tanggal_penjualan) <= '$bulan' 
		// AND YEAR(tanggal_penjualan) <= '$tahun'
		// GROUP BY MONTH(tanggal_penjualan), YEAR(tanggal_penjualan)

		$data = $ambil->result_array();


		$potong_data = array_slice($data, -12, 12);
		// echo "<pre>";
		// print_r ($potong_data);
		// echo "</pre>";
		// die;

		return $potong_data;
	}

	function hitung($input)
	{
		// $periode = $input['periode'];
		$id_barang = $input['id_barang'];
		// $bulan = $input['bulan'];
		$tanggal = $input['tanggal'];
		// $tahun = $input['tahun'];

		// echo "<pre>";
		// print_r ($tanggal);
		// echo "</pre>";
		// die;

		// $data = $this->tampil_data_hitung($id_barang, $bulan, $tahun);
		$data = $this->tampil_data_hitung($id_barang, $tanggal);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die;
		$periode = $input['periode'];
		$periode_dua = $input['periode_dua'];

		// echo count($data); die;

		if (count($data) <= $periode) {
			return "gagal";
		}

		// MENGHITUNG DISINI
		// Mengenalkan variabel untuk menampung data
		$t_penjualan = 0;
		$t_peramalan = 0;
		$t_peramalan_dua = 0;
		$t_error = 0;
		$t_error_dua = 0;
		$t_mad = 0;
		$t_mad_dua = 0;
		$t_mse = 0;
		$t_mse_dua = 0;
		$t_mape = 0;
		$t_mape_dua = 0;
		$r_error = 0;
		$r_error_dua = 0;
		$r_mad = 0;
		$r_mad_dua = 0;
		$r_mse = 0;
		$r_mse_dua = 0;
		$r_mape = 0;
		$r_mape_dua = 0;

		// MULAI
		foreach ($data as $key => $value) {
			$hitung[$key]['bulan'] = $value['bulan'];
			$hitung[$key]['tahun'] = $value['tahun'];
			$hitung[$key]['penjualan'] = $value['jumlah'];
			// JIka key kurang dari sejumlah periode, maka perhitungan masih kosong
			if ($key < $periode) {
				$hitung[$key]['peramalan'] = "";
				$hitung[$key]['error'] = "";
				$hitung[$key]['mad'] = "";
				$hitung[$key]['mse'] = "";
				$hitung[$key]['mape'] = "";
			} else {
				// Membuat data awal yaitu 0
				$total = 0;
				// Lalu membuat perulangan sejumlah periode data sebelumnya
				// echo $key . "=>";
				$x = $periode;
				$sum_x = 0;
				for ($i = ($key - 1); $i > (($key - 1) - $periode); $i--) {

					// echo  $data[$i]['jumlah'] . "<br>";
					// Menjumlahkan sejumlah periode data sebelumnya menggunakan tanda +=
					// $total += $data[$i]['jumlah'];
					$total += $x * $data[$i]['jumlah'];
					// if($i>-1) {
					// echo $data[$i]['jumlah'] . " - ";
					// }
					$sum_x += $x;
					$x--;
				}

				// Peramalam $total/sejumlah periode
				// $hitung[$key]['peramalan'] = $total/$periode;
				$hitung[$key]['peramalan'] = $total / $sum_x;
				// Error : pemeblian-peramalan
				$hitung[$key]['error'] = $hitung[$key]['penjualan'] - $hitung[$key]['peramalan'];
				// Menghilangkan minus dari hasil error dengan fungsi abs
				$hitung[$key]['mad'] = abs($hitung[$key]['error']);
				// mse : hasil error dipangkat 2 dengan fungsi pow
				$hitung[$key]['mse'] = pow($hitung[$key]['error'], 2);
				// map : hasil mad / penjualan
				// $hitung[$key]['mape'] = $hitung[$key]['mad']/$hitung[$key]['penjualan'];
				$hitung[$key]['mape'] = ($hitung[$key]['mad'] / $hitung[$key]['penjualan']) * 100;
			}

			// utk periode_dua
			if ($key < $periode_dua) {
				$hitung[$key]['peramalan_dua'] = "";
				$hitung[$key]['error_dua'] = "";
				$hitung[$key]['mad_dua'] = "";
				$hitung[$key]['mse_dua'] = "";
				$hitung[$key]['mape_dua'] = "";
			} else {
				// Membuat data awal yaitu 0
				$total_dua = 0;

				// echo $key . "=>";
				$x = $periode_dua;
				$sum_x = 0;
				for ($i = ($key - 1); $i > (($key - 1) - $periode_dua); $i--) {
					// echo  $data[$i]['jumlah'] . "<br>";
					// echo  $x . "<br>";
					// Menjumlahkan sejumlah periode data sebelumnya menggunakan tanda +=
					// $total_dua += $data[$i]['jumlah'];
					$total_dua += $x * $data[$i]['jumlah'];
					// if($i>-1) {
					// echo $data[$i]['jumlah'] . " - ";
					// }
					$sum_x += $x;
					$x--;
				}

				// echo $total_dua/$sum_x . "<br>";

				// Peramalam $total/sejumlah periode
				// $hitung[$key]['peramalan_dua'] = $total_dua/$periode_dua;
				$hitung[$key]['peramalan_dua'] = $total_dua / $sum_x;
				// Error : pemeblian-peramalan
				$hitung[$key]['error_dua'] = $hitung[$key]['penjualan'] - $hitung[$key]['peramalan_dua'];
				// Menghilangkan minus dari hasil error dengan fungsi abs
				$hitung[$key]['mad_dua'] = abs($hitung[$key]['error_dua']);
				// mse : hasil error dipangkat 2 dengan fungsi pow
				$hitung[$key]['mse_dua'] = pow($hitung[$key]['error_dua'], 2);
				// map : hasil mad / penjualan
				// $hitung[$key]['mape_dua'] = $hitung[$key]['mad_dua']/$hitung[$key]['penjualan'];
				$hitung[$key]['mape_dua'] = ($hitung[$key]['mad_dua'] / $hitung[$key]['penjualan']) * 100;
			}
			// Menjumlahkan semua data 
			$t_penjualan += floatval($hitung[$key]['penjualan']);
			$t_peramalan += floatval($hitung[$key]['peramalan']);
			$t_peramalan_dua += floatval($hitung[$key]['peramalan_dua']);
			$t_error += floatval($hitung[$key]['error']);
			$t_error_dua += floatval($hitung[$key]['error_dua']);
			$t_mad += floatval($hitung[$key]['mad']);
			$t_mad_dua += floatval($hitung[$key]['mad_dua']);
			$t_mse += floatval($hitung[$key]['mse']);
			$t_mse_dua += floatval($hitung[$key]['mse_dua']);
			$t_mape += floatval($hitung[$key]['mape']);
			$t_mape_dua += floatval($hitung[$key]['mape_dua']);
			// Menghitung rata rata
			$r_error = $t_error / (count($data) - $periode);
			$r_error_dua = $t_error_dua / (count($data) - $periode_dua);
			$r_mad = $t_mad / (count($data) - $periode);
			$r_mad_dua = $t_mad_dua / (count($data) - $periode_dua);
			$r_mse = $t_mse / (count($data) - $periode);
			$r_mse_dua = $t_mse_dua / (count($data) - $periode_dua);
			$r_mape = $t_mape / (count($data) - $periode);
			$r_mape_dua = $t_mape_dua / (count($data) - $periode_dua);
		}

		// Mengambil 6 atau 3 data terakhir menggunakan fungsi array_slice
		$data_akhir = array_slice($hitung, -$periode, $periode, true);
		// echo "<pre>";
		// print_r ($data_akhir);
		// echo "</pre>";
		$data_akhir_dua = array_slice($hitung, -$periode_dua, $periode_dua, true);
		// echo "<pre>";
		// print_r ($data_akhir_dua);
		// echo "</pre>";
		// Menjumlahkan 6 atau 3 data terakhir
		$total_akhir = 0;
		foreach ($data_akhir as $key => $value) {
			$total_akhir += $value['penjualan'];
		}
		$total_akhir_dua = 0;
		foreach ($data_akhir_dua as $key => $value) {
			$total_akhir_dua += $value['penjualan'];
		}
		// echo "<pre>";
		// print_r (array_keys($data_akhir));
		// echo "</pre>";

		$total_akhir2 = 0;
		$sum_periode = 0;
		$x = 0;
		for ($i = 1; $i <= count($data_akhir); $i++) {
			$key = array_keys($data_akhir)[$x];
			$sum_periode += $i;
			// echo $data_akhir[$key]['penjualan'] . "x";
			// echo $i . "<br>";
			$total_akhir2 += ($data_akhir[$key]['penjualan'] * $i);
			$x++;
		}
		// echo $total_akhir2;
		// echo $total_akhir2/$sum_periode;



		$total_akhir2_dua = 0;
		$sum_periode_dua = 0;
		$x = 0;
		for ($i = 1; $i <= count($data_akhir_dua); $i++) {
			$key = array_keys($data_akhir_dua)[$x];
			$sum_periode_dua += $i;
			$total_akhir2_dua += ($data_akhir_dua[$key]['penjualan'] * $i);
			$x++;
		}

		// Menghitung rata rata 5 data terakhir
		// $ramalan_akhir = $total_akhir/$periode;
		$ramalan_akhir = $total_akhir2 / $sum_periode;
		$ramalan_akhir_dua = $total_akhir2_dua / $sum_periode_dua;
		// Menaruh semua hasil perhitungan di dalam variabel hasil
		$hasil['hitung'] = $hitung;
		$hasil['hitung_dua'] = $hitung;
		$hasil['t_penjualan'] = $t_penjualan;
		$hasil['t_peramalan'] = $t_peramalan;
		$hasil['t_peramalan_dua'] = $t_peramalan_dua;
		$hasil['t_error'] = $t_error;
		$hasil['t_error_dua'] = $t_error_dua;
		$hasil['t_mad'] = $t_mad;
		$hasil['t_mad_dua'] = $t_mad_dua;
		$hasil['t_mse'] = $t_mse;
		$hasil['t_mse_dua'] = $t_mse_dua;
		$hasil['t_mape'] = $t_mape;
		$hasil['t_mape_dua'] = $t_mape_dua;
		$hasil['r_error'] = $r_error;
		$hasil['r_error_dua'] = $r_error_dua;
		$hasil['r_mad'] = $r_mad;
		$hasil['r_mad_dua'] = $r_mad_dua;
		$hasil['r_mse'] = $r_mse;
		$hasil['r_mse_dua'] = $r_mse_dua;
		$hasil['r_mape'] = $r_mape;
		$hasil['r_mape_dua'] = $r_mape_dua;
		$hasil['ramalan_akhir'] = $ramalan_akhir;
		$hasil['ramalan_akhir_dua'] = $ramalan_akhir_dua;


		// echo "<pre>";
		// print_r($hasil);
		// echo "</pre>";

		// Mengembalikan hasil perhitungan ke controller
		return $hasil;
	}
}

/* End of file Data_model.php */
/* Location: ./application/models/Data_model.php */
