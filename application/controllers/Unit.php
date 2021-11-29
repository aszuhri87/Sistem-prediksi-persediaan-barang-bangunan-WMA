<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// cek apakah sudah login
		if (!$this->session->userdata('pengguna')) {
			// jika belum usir ke halaman login
			$this->session->set_flashdata('pesan_gagal', 'Anda harus login!');
			redirect('login', 'refresh');
		}
	}

	function tampil()
	{
		$data['unit'] = $this->model->tampil_unit();

		$this->load->view('header');
		$this->load->view('unit/tampil', $data);
		$this->load->view('footer');
	}

	function tambah()
	{
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form tambah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi tambah_unit dengan melempar data $inputan
			$this->model->tambah_unit($inputan);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil ditambahkan!');

			// setelah itu, alihkan user ke halaman unit/tampil
			redirect('unit/tampil');
		}

		$this->load->view('header');
		$this->load->view('unit/tambah');
		$this->load->view('footer');
	}

	function hapus($id_unit)
	{
		// jalankan fungsi hapus_unit() pada model, dengan melemparkan $id_unit yang mau dihapus 
		$this->model->hapus_unit($id_unit);

		// buat pesan flashdata bernama pesan_sukses
		$this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus!');

		// setelah itu, alihkan user ke halaman unit/tampil
		redirect('unit/tampil');
	}

	function ubah($id_unit)
	{
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form ubah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi ubah_unit dengan melempar data $inputan dan $id_unit yg mau di ubah
			$this->model->ubah_unit($inputan, $id_unit);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil diperbarui!');

			// setelah itu, alihkan user ke halaman unit/tampil
			redirect('unit/tampil');
		}

		// ambil data unit yang sedang di ubah
		$data['unit'] = $this->model->ambil_unit($id_unit);

		$this->load->view('header');
		$this->load->view('unit/ubah', $data);
		$this->load->view('footer');
	}
}

/* End of file Unit.php */
/* Location: ./application/controllers/Unit.php */