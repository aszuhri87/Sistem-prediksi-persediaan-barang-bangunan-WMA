<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

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

		$data['lokasi'] = $this->model->tampil_lokasi();

		$this->load->view('header');
		$this->load->view('lokasi/tampil', $data);
		$this->load->view('footer');
	}

	function tambah()
	{
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form tambah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi tambah_lokasi dengan melempar data $inputan
			$this->model->tambah_lokasi($inputan);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil ditambahkan!');

			// setelah itu, alihkan user ke halaman lokasi/tampil
			redirect('lokasi/tampil');
		}

		$this->load->view('header');
		$this->load->view('lokasi/tambah');
		$this->load->view('footer');
	}

	function hapus($id_lokasi)
	{
		// jalankan fungsi hapus_lokasi() pada model, dengan melemparkan $id_lokasi yang mau dihapus 
		$this->model->hapus_lokasi($id_lokasi);

		// buat pesan flashdata bernama pesan_sukses
		$this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus!');

		// setelah itu, alihkan user ke halaman lokasi/tampil
		redirect('lokasi/tampil');
	}

	function ubah($id_lokasi)
	{	
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form ubah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi ubah_lokasi dengan melempar data $inputan dan $id_lokasi yg mau di ubah
			$this->model->ubah_lokasi($inputan, $id_lokasi);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil diperbarui!');

			// setelah itu, alihkan user ke halaman lokasi/tampil
			redirect('lokasi/tampil');
		} 

		// ambil data lokasi yang sedang di ubah
		$data['lokasi'] = $this->model->ambil_lokasi($id_lokasi);

		$this->load->view('header');
		$this->load->view('lokasi/ubah', $data);
		$this->load->view('footer');
		
	}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/Lokasi.php */