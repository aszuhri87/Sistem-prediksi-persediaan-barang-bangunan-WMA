<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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

	public function index()
	{
		$data['profil'] = $this->model->ambil_pengguna();

		$inputan = $this->input->post();
		if ($inputan) {
			$this->model->ubah_pengguna($inputan);

			$this->session->set_flashdata('pesan_sukses', 'Profil berhasil diperbarui!');
			
			$this->session->set_userdata('pengguna', $this->model->ambil_pengguna());

			redirect('profil');
		}

		$this->load->view('header');
		$this->load->view('profil/ubah', $data);
		$this->load->view('footer');
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */