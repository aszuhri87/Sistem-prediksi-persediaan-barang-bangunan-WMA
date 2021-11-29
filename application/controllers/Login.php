<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function index()
	{

		// cek apakah sudah login
		if ($this->session->userdata('pengguna'))
		{
			// jika sudah langsung alihkan ke dashboard
			redirect('dashboard','refresh');
		}

		// ambil inputan 
		$inputan = $this->input->post();

		// jika ada inputan...
		if ($inputan) {
			// jalankan fungsi login_pengguna, dengan melemparkan data $inputan
			$login = $this->model->login_pengguna($inputan);

			// jika login sukses..
			if ($login == 'sukses') {
				// alihkan ke dashboard
				redirect('dashboard');
			} else {
				// jika login gagal
				// tetap di halaman login sambil membawa pesan_gagal
				$this->session->set_flashdata('pesan_gagal', 'Username/password salah!');
				redirect('login', 'refresh');
			}
		}

		$this->load->view('login');
	}

	function logout()
	{	
		// hapus data login pengguna dari session
		$this->session->unset_userdata('pengguna');
		$this->session->sess_destroy();

		// kasih pesan sukses juga boleh
		$this->session->set_flashdata('pesan_sukses', 'Logout berhasil!');

		// bawa ke halaman login
		redirect('login');
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */