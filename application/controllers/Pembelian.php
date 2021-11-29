<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

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
		$data['pembelian'] = $this->model->tampil_pembelian();

		$this->load->view('header');
		$this->load->view('pembelian/tampil', $data);
		$this->load->view('footer');
	}

	public function detail($id_pembelian)
	{
		$data['pembelian'] = $this->model->detail_pembelian($id_pembelian);
		$data['barang'] = $this->model->ambil_barang_pembelian($id_pembelian);

		$this->load->view('header');
		$this->load->view('pembelian/detail', $data);
		$this->load->view('footer');
	}

	public function detailref($kode_pembelian)
	{
		$data['pembelian'] = $this->model->detail_pembelian($kode_pembelian);
		$data['barang'] = $this->model->ambil_barang_pembelian($kode_pembelian);

		$this->load->view('header');
		$this->load->view('pembelian/detail', $data);
		$this->load->view('footer');
	}

	public function grafik()
	{
		$this->load->view('header');
		$this->load->view('pembelian/grafik');
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

			$id_pembelian = $this->model->simpan_pembelian($inputan);

			if ($id_pembelian !== FALSE) {
				$this->model->update_total_stok();
				
				redirect("pembelian/detail/$id_pembelian");
			} else {
				$this->session->set_flashdata('pesan_gagal', '<b>Ups!</b> Ada masalah.');
				redirect("pembelian/input");
			}

		}

		$this->load->view('header');
		$this->load->view('pembelian/input');
		$this->load->view('footer');
	}

	public function hapus($id_pembelian)
	{
		$this->model->hapus_pembelian($id_pembelian);
		$this->session->set_flashdata('pesan_gagal', 'Pembelian berhasil dihapus!');
		redirect("pembelian/tampil");
	}

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */