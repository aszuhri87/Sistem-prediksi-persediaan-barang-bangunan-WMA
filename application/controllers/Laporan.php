<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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

	public function index()
	{
		$this->load->view('header');
		$this->load->view('laporan/grafik_campuran');
		$this->load->view('footer');
	}

	function penjualan()
	{
		$tgl_mulai = $this->input->get('tgl_mulai');
		$tgl_selesai = $this->input->get('tgl_selesai');

		if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
			$data['penjualan'] = $this->model->tampil_penjualan('', $tgl_mulai, $tgl_selesai);
		} else {
			$data['penjualan'] = [];
		}

		$this->load->view('header');
		$this->load->view('laporan/laporan_penjualan', $data);
		$this->load->view('footer');
	}

	function cetak_penjualan()
	{
		$tgl_mulai = $this->input->get('tgl_mulai');
		$tgl_selesai = $this->input->get('tgl_selesai');

		if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
			$data['penjualan'] = $this->model->tampil_penjualan('', $tgl_mulai, $tgl_selesai);
		} else {
			$data['penjualan'] = [];
		}

		$this->load->view('laporan/cetak_penjualan', $data);
	}

	function pembelian()
	{
		$tgl_mulai = $this->input->get('tgl_mulai');
		$tgl_selesai = $this->input->get('tgl_selesai');

		if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
			$data['pembelian'] = $this->model->tampil_pembelian('', $tgl_mulai, $tgl_selesai);
		} else {
			$data['pembelian'] = [];
		}

		$this->load->view('header');
		$this->load->view('laporan/laporan_pembelian', $data);
		$this->load->view('footer');
	}

	function cetak_pembelian()
	{
		$tgl_mulai = $this->input->get('tgl_mulai');
		$tgl_selesai = $this->input->get('tgl_selesai');

		if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
			$data['pembelian'] = $this->model->tampil_pembelian('', $tgl_mulai, $tgl_selesai);
		} else {
			$data['pembelian'] = [];
		}

		$this->load->view('laporan/cetak_pembelian', $data);
	}
}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */