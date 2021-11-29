<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	// PENJUALAN

	public function grafik_penjualan()
	{
		$tahun = $this->input->get('tahun');

		$data = $this->model->tampil_penjualan_perbulan_setahun($tahun);

		header('Content-type: application/json');
		echo json_encode($data);
	}

	public function penjualan_tertinggi()
	{
		$tahun = $this->input->get('tahun');

		$data = $this->model->tampil_penjualan_tertinggi($tahun);

		header('Content-type: application/json');
		echo json_encode($data);
	}

	public function penjualan_terendah()
	{
		$tahun = $this->input->get('tahun');

		$data = $this->model->tampil_penjualan_terendah($tahun);

		header('Content-type: application/json');
		echo json_encode($data);
	}

	// PEMBELIAN

	public function grafik_pembelian()
	{
		$tahun = $this->input->get('tahun');

		$data = $this->model->tampil_pembelian_perbulan_setahun($tahun);

		header('Content-type: application/json');
		echo json_encode($data);
	}

	public function pembelian_tertinggi()
	{
		$tahun = $this->input->get('tahun');

		$data = $this->model->tampil_pembelian_tertinggi($tahun);

		header('Content-type: application/json');
		echo json_encode($data);
	}

	public function pembelian_terendah()
	{
		$tahun = $this->input->get('tahun');

		$data = $this->model->tampil_pembelian_terendah($tahun);

		header('Content-type: application/json');
		echo json_encode($data);
	}

	// CAMPURAN

	public function grafik_campuran()
	{
		$tahun = $this->input->get('tahun');

		$data = $this->model->tampil_laporan_perbulan_setahun($tahun);

		header('Content-type: application/json');
		echo json_encode($data);
	}

	// INPUT TRANSAKSI

	public function ambil_kode($tipe = 'penjualan')
	{	
		if ($tipe == 'penjualan') {
			$inisial = "PJ";
			$data = $this->model->tampil_penjualan('no-order');
		} else {
			$inisial = "PB";
			$data = $this->model->tampil_pembelian('no-order');
		}

		if (empty($data)) {
			// return $this->output
			// ->set_content_type('application/json')
			// ->set_status_header(200)
			// ->set_output(json_encode(array(
			// 	'message' => 'Data empty!',
			// 	'success' => false,
			// 	'data' => [],
			// )));
		}
		$index_terakhir = count($data) ? count($data) - 1 : 1;
		// echo "<pre>";
		// print_r ($data[$index_terakhir]);
		// echo "</pre>";
		$id_terakhir = isset($data[$index_terakhir]) ? $data[$index_terakhir]['id_' . $tipe] + 1 : 1;
		// echo $id_terakhir;
		$hari_ini = $inisial.date("Ym"); // PB2021 04 28
		$kode = str_pad($hari_ini,10,"0",STR_PAD_RIGHT) . $id_terakhir;

		$this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'message' => 'Data found!',
			'success' => true,
			'data' => $kode,
		)));

	}

	public function tampil_barang_stok()
	{
		$barang = $this->model->tampil_barang_stok();

		$this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'message' => 'Data found!',
			'success' => true,
			'data' => $barang,
		)));
	}

	public function tampil_barang()
	{
		$barang = $this->model->tampil_barang();

		$this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'message' => 'Data found!',
			'success' => true,
			'data' => $barang,
		)));
	}

	public function tampil_pemasok()
	{
		$pemasok = $this->model->tampil_pemasok();

		$this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'message' => 'Data found!',
			'success' => true,
			'data' => $pemasok,
		)));
	}


}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */