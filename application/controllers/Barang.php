<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// cek apakah sudah login
		if (!$this->session->userdata('pengguna'))
		{
			// jika belum usir ke halaman login
			$this->session->set_flashdata('pesan_gagal', 'Anda harus login!');
			redirect('login','refresh');
		}
	}

	function tampil()
	{
		$data['barang'] = $this->model->tampil_barang();

		$this->load->view('header');
		$this->load->view('barang/tampil', $data);
		$this->load->view('footer');
	}

	function habis()
	{
		$data['barang_habis'] = $this->model->tampil_barang('habis');

		$this->load->view('header');
		$this->load->view('barang/habis', $data);
		$this->load->view('footer');
	}

	function hampir_habis()
	{
		$data['barang_hampir_habis'] = $this->model->tampil_barang('hampir-habis');

		$this->load->view('header');
		$this->load->view('barang/hampir-habis', $data);
		$this->load->view('footer');
	}

	function kadaluarsa()
	{
		$data['barang'] = $this->model->tampil_barang_kadaluarsa();

		$this->load->view('header');
		$this->load->view('barang/kadaluarsa', $data);
		$this->load->view('footer');
	}

	function stok($id_barang) 
	{
		$data['barang_stok'] = $this->model->tampil_barang_stok_perbarang($id_barang);
		$data['barang'] = $this->model->ambil_barang($id_barang);

		$this->load->view('header');
		$this->load->view('barang/stok', $data);
		$this->load->view('footer');
	}

	function tambah()
	{
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form tambah men-submit data..
		if ($inputan) {
			// maka..

			// jalankan fungsi upload foto_barang
			// $nama_file = $this->model->upload_foto_barang();

			// masukan nama file ke dalam array $inputan agar ikut masuk saat proses insert pada fungsi tambah_barang dibawah
			// $inputan['foto_barang'] = $nama_file;

			// jalankan fungsi tambah_barang dengan melempar data $inputan
			$this->model->tambah_barang($inputan);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil ditambahkan!');

			// setelah itu, alihkan user ke halaman barang/tampil
			redirect('barang/tampil');
		}

		// ambil semua data pemasok yang ada, untuk dilemparkan ke view tambah barang
		$data['pemasok'] = $this->model->tampil_pemasok();
		// ambil semua data unit yang ada, untuk dilemparkan ke view tambah barang
		$data['unit'] = $this->model->tampil_unit();
		// ambil semua data kategori yang ada, untuk dilemparkan ke view tambah barang
		$data['kategori'] = $this->model->tampil_kategori();
		// ambil semua data lokasi yang ada, untuk dilemparkan ke view tambah barang
		$data['lokasi'] = $this->model->tampil_lokasi();

		$this->load->view('header');
		$this->load->view('barang/tambah', $data);
		$this->load->view('footer');
	}

	function hapus($id_barang)
	{
		// jalankan fungsi hapus_barang() pada model, dengan melemparkan $id_barang yang mau dihapus 
		$this->model->hapus_barang($id_barang);

		// buat pesan flashdata bernama pesan_sukses
		$this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus!');

		// setelah itu, alihkan user ke halaman barang/tampil
		redirect('barang/tampil');
	}

	function ubah($id_barang)
	{	
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form ubah men-submit data..
		if ($inputan) {
			// maka..

			// jika ada file yang di upload...
			// if ($_FILES['foto_barang']['error'] == 0) {

			// 	// jalankan fungsi upload foto_barang
			// 	$nama_file = $this->model->upload_foto_barang($id_barang);

			// 	// masukan nama file ke dalam array $inputan agar ikut masuk saat proses insert pada fungsi tambah_barang dibawah
			// 	$inputan['foto_barang'] = $nama_file;
			// }

			// jalankan fungsi ubah_barang dengan melempar data $inputan dan $id_barang yg mau di ubah
			$this->model->ubah_barang($inputan, $id_barang);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil diperbarui!');

			// setelah itu, reload halaman 
			redirect("barang/ubah/$id_barang");
		} 

		// ambil data barang yang sedang di ubah
		$data['barang'] = $this->model->ambil_barang($id_barang);

		// ambil semua data pemasok yang ada, untuk dilemparkan ke view tambah barang
		$data['pemasok'] = $this->model->tampil_pemasok();
		// ambil semua data unit yang ada, untuk dilemparkan ke view tambah barang
		$data['unit'] = $this->model->tampil_unit();
		// ambil semua data kategori yang ada, untuk dilemparkan ke view tambah barang
		$data['kategori'] = $this->model->tampil_kategori();
		// ambil semua data lokasi yang ada, untuk dilemparkan ke view tambah barang
		$data['lokasi'] = $this->model->tampil_lokasi();

		$this->load->view('header');
		$this->load->view('barang/ubah', $data);
		$this->load->view('footer');
		
	}

}

/* End of file Obat.php */
/* Location: ./application/controllers/Obat.php */