<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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

		$data['kategori'] = $this->model->tampil_kategori();

		$this->load->view('header');
		$this->load->view('kategori/tampil', $data);
		$this->load->view('footer');
	}

	function tambah()
	{
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form tambah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi tambah_kategori dengan melempar data $inputan
			$this->model->tambah_kategori($inputan);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil ditambahkan!');

			// setelah itu, alihkan user ke halaman kategori/tampil
			redirect('kategori/tampil');
		}

		$this->load->view('header');
		$this->load->view('kategori/tambah');
		$this->load->view('footer');
	}

	function hapus($id_kategori)
	{
		// jalankan fungsi hapus_kategori() pada model, dengan melemparkan $id_kategori yang mau dihapus 
		$this->model->hapus_kategori($id_kategori);

		// buat pesan flashdata bernama pesan_sukses
		$this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus!');

		// setelah itu, alihkan user ke halaman kategori/tampil
		redirect('kategori/tampil');
	}

	function ubah($id_kategori)
	{	
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form ubah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi ubah_kategori dengan melempar data $inputan dan $id_kategori yg mau di ubah
			$this->model->ubah_kategori($inputan, $id_kategori);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil diperbarui!');

			// setelah itu, alihkan user ke halaman kategori/tampil
			redirect('kategori/tampil');
		} 

		// ambil data kategori yang sedang di ubah
		$data['kategori'] = $this->model->ambil_kategori($id_kategori);

		$this->load->view('header');
		$this->load->view('kategori/ubah', $data);
		$this->load->view('footer');
		
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */