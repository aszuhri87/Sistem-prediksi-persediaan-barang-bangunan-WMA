<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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

	public function tampil()
	{
		$data['penjualan'] = $this->model->tampil_penjualan();

		$this->load->view('header');
		$this->load->view('penjualan/tampil', $data);
		$this->load->view('footer');
	}

	public function detail($id_penjualan)
	{
		$data['penjualan'] = $this->model->detail_penjualan($id_penjualan);
		$data['barang'] = $this->model->ambil_barang_penjualan($id_penjualan);

		$this->load->view('header');
		$this->load->view('penjualan/detail', $data);
		$this->load->view('footer');
	}

	public function grafik()
	{
		$this->load->view('header');
		$this->load->view('penjualan/grafik');
		$this->load->view('footer');
	}

	public function input()
	{
		$inputan = $this->input->post();

		// jika ada inputan
		if ($this->input->post()) {

			// echo "<pre>";
			// print_r($inputan);
			// echo "</pre>";
			// die;

			$id_penjualan = $this->model->simpan_penjualan($inputan);

			if ($id_penjualan !== FALSE) {
				$this->model->update_total_stok();
				
				redirect("penjualan/detail/$id_penjualan");
			} else {
				$this->session->set_flashdata('pesan_gagal', '<b>Ups!</b> Ada masalah.');
				redirect("penjualan/input");
			}

		}

		$this->load->view('header');
		$this->load->view('penjualan/input');
		$this->load->view('footer');
	}

	public function hapus($id_penjualan)
	{
		$this->model->hapus_penjualan($id_penjualan);
		$this->session->set_flashdata('pesan_gagal', 'Penjualan berhasil dihapus!');
		redirect("penjualan/tampil");
	}

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */