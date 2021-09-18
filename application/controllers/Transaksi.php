<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model('M_assets');
		$this->load->model('M_ruangan');
		$this->load->model('M_transaksi');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Transaksi";
		$this->template->load('template', 'transaksi/list', $data);
	}

	public function list_transaksi()
	{
		$data = $this->M_transaksi->list_transaksi();
		echo json_encode($data);
	}

	public function pengajuan()
	{
		$this->form_validation->set_rules('id_asset', 'Asset', 'required|trim|xss_clean', ['required' => 'Asset cannot be empty!']);
		$this->form_validation->set_rules('id_ruangan', 'Ruangan', 'required|trim|xss_clean', ['required' => 'Ruangan cannot be empty!']);
		$this->form_validation->set_rules('jml_pengajuan', 'Jumlah Pengajuan', 'required|trim|xss_clean', ['required' => 'Jumlah Pengajuan cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Transaksi";
			$data['asset'] = $this->M_assets->getAllData();
			$data['ruangan'] = $this->M_ruangan->getAllData();
			$this->template->load('template', 'transaksi/pengajuan', $data);
		} else {
			if ($this->M_transaksi->pengajuan()) {
				$this->session->set_flashdata('info', 'Permintaan asset berhasil diajukan!');
				redirect('transaksi');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('transaksi');
			}
		}
	}
	public function laporan()
	{

		$data['tgl'] = $this->input->post('tgl');
		$data['tgl1'] = $this->input->post('tgl1');
		// $this->session->set_userdata('tgl', $tgl);
		// $tgl = $this->session->userdata('tgl');
		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'setAutoTopMargin' => 'stretch',
			'orientation' => 'P'
		]);
		$data['laporan'] = $this->M_transaksi->laporan();
		// $mpdf->SetHTMLHeader('<h4 align="center">LAPORAN BARANG  (' . strtoupper($tgl) . ')</h4>');
		$mpdf->SetHTMLFooter('<h5 align="left">{DATE j-M-Y H:i:s} - </h5>');
		$html = $this->load->view('transaksi/laporan', $data, true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}

	public function get_stok()
	{
		$data = $this->M_transaksi->get_stok();
		echo json_encode($data);
	}

	public function detail($id = null)
	{
		$data['title'] = "Transaksi";
		$data['detail'] = $this->M_transaksi->getDetail($id);
		// var_dump($data);
		$this->template->load('template', 'transaksi/konfirmasi', $data);
	}

	public function confirm($confirm = null, $id = null, $jml = null)
	{
		if ($this->M_transaksi->konfirmasi($confirm, $id, $jml)) {
			$this->session->set_flashdata('info', 'Pengajuan telah dikonfirmasi');
			redirect('transaksi');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('transaksi');
		}
	}

	public function konfirmasi()
	{
		$data = $this->M_transaksi->konfirmasi();
		echo json_encode($data);
	}

	public function hapus($id = null)
	{
		if ($this->M_transaksi->hapus($id)) {
			$this->session->set_flashdata('info', 'Pengajuan berhasil dihapus!');
			redirect('transaksi');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('transaksi');
		}
	}
}