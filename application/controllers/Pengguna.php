<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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

		$data['pengguna'] = $this->model->tampil_pengguna();

		$this->load->view('header');
		$this->load->view('pengguna/tampil', $data);
		$this->load->view('footer');
	}

	function tambah()
	{
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form tambah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi tambah_pengguna dengan melempar data $inputan
			$this->model->tambah_pengguna($inputan);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil ditambahkan!');

			// setelah itu, alihkan user ke halaman pengguna/tampil
			redirect('pengguna/tampil');
		}

		$this->load->view('header');
		$this->load->view('pengguna/tambah');
		$this->load->view('footer');
	}

	function hapus($id_pengguna)
	{
		// jalankan fungsi hapus_pengguna() pada model, dengan melemparkan $id_pengguna yang mau dihapus 
		$this->model->hapus_pengguna($id_pengguna);

		// buat pesan flashdata bernama pesan_sukses
		$this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus!');

		// setelah itu, alihkan user ke halaman pengguna/tampil
		redirect('pengguna/tampil');
	}

	function ubah($id_pengguna)
	{	
		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan atau form ubah men-submit data..
		if ($inputan) {
			// maka..
			// jalankan fungsi ubah_pengguna dengan melempar data $inputan dan $id_pengguna yg mau di ubah
			$this->model->ubah_pengguna($inputan, $id_pengguna);

			// buat pesan flashdata bernama pesan_sukses
			$this->session->set_flashdata('pesan_sukses', 'Data berhasil diperbarui!');

			// setelah itu, alihkan user ke halaman pengguna/tampil
			redirect('pengguna/tampil');
		} 

		// ambil data pengguna yang sedang di ubah
		$data['pengguna'] = $this->model->ambil_pengguna($id_pengguna);

		$this->load->view('header');
		$this->load->view('pengguna/ubah', $data);
		$this->load->view('footer');
		
	}

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */