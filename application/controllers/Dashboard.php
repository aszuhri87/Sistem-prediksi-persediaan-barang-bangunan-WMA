<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$tahun = $this->input->get('tahun');
		$data['jumlah_barang'] = $this->model->jumlah_barang();
		$data['jumlah_stok'] = $this->model->jumlah_stok();
		$data['jumlah_penjualan'] = $this->model->jumlah_penjualan();
		$data['jumlah_pembelian'] = $this->model->jumlah_pembelian();
	

		// table
		$data['barang_habis'] = $this->model->tampil_barang('habis', 0, 6);
		$data['barang_hampir_habis'] = $this->model->tampil_barang('hampir-habis', 0, 6);
	



		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}



}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */