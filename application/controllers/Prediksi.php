<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prediksi extends CI_Controller {

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
		$data['barang'] = $this->model->tampil_barang();
		$data['bulan'] = $this->model->tampil_bulan();

		$inputan = $this->input->get();

		if ($inputan) {
			$hasil = $this->model->hitung($inputan);
			if ($hasil == 'gagal') {
				$this->session->set_flashdata('gagal', '<b>Ups!</b> Sepertinya data yang Anda miliki kurang banyak atau mungkin filter yang ada pilih tidak valid. Mohon periksa kembali.');
				return redirect('prediksi');
			} else {
				$barang = $this->model->ambil_barang($inputan['id_barang']);
				$this->session->set_flashdata('sukses', "Berikut adalah hasil perhitungan untuk memprediksi volume penjualan dari <b>$barang[nama_barang]</b> pada bulan <b>".bulan(date("M", strtotime($inputan['tanggal'])))."</b> tahun <b> ".tanggal($inputan['tanggal'], "Y")."</b>.");
				$data['hasil'] = $hasil;
				$data['detail'] = $barang;
			}
		} else {
			$data['hasil'] = array();
		}

		$this->load->view('header');
		$this->load->view('prediksi/tampil', $data);
		$this->load->view('footer');
	}

}

/* End of file Prediksi.php */
/* Location: ./application/controllers/Prediksi.php */