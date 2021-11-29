<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasok extends CI_Controller {

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

		$data['pemasok'] = $this->model->tampil_pemasok();

		$this->load->view('header');
		$this->load->view('pemasok/tampil', $data);
		$this->load->view('footer');
	}

	function tambah()
	{
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form tambah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi tambah_pemasok dengan melempar data $inputan
			$this->model->tambah_pemasok($inputan);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil ditambahkan!');

			// setelah itu, alihkan user ke halaman pemasok/tampil
			redirect('pemasok/tampil');
		}

		$this->load->view('header');
		$this->load->view('pemasok/tambah');
		$this->load->view('footer');
	}

	function hapus($id_pemasok)
	{
		// jalankan fungsi hapus_pemasok() pada model, dengan melemparkan $id_pemasok yang mau dihapus 
		$this->model->hapus_pemasok($id_pemasok);

		// buat pesan flashdata bernama pesan_sukses
		$this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus!');

		// setelah itu, alihkan user ke halaman pemasok/tampil
		redirect('pemasok/tampil');
	}

	function ubah($id_pemasok)
	{	
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form ubah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi ubah_pemasok dengan melempar data $inputan dan $id_pemasok yg mau di ubah
			$this->model->ubah_pemasok($inputan, $id_pemasok);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil diperbarui!');

			// setelah itu, alihkan user ke halaman pemasok/tampil
			redirect('pemasok/tampil');
		} 

		// ambil data pemasok yang sedang di ubah
		$data['pemasok'] = $this->model->ambil_pemasok($id_pemasok);

		$this->load->view('header');
		$this->load->view('pemasok/ubah', $data);
		$this->load->view('footer');
		
	}

}

/* End of file Pemasok.php */
/* Location: ./application/controllers/Pemasok.php */