<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model("M_usulan");
		$this->load->model("M_satuan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Usulan";
		$this->template->load('template', 'usulan/list', $data);
	}

	public function list_usulan()
	{
		$data = $this->M_usulan->list_usulan();
		echo json_encode($data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_asset', 'Nama Asset', 'required|trim|xss_clean', ['required' => 'Nama Asset cannot be empty!']);
		$this->form_validation->set_rules('merk', 'Merk', 'trim|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Usulan";
			$this->template->load('template', 'usulan/tambah', $data);
		} else {
			if ($this->M_usulan->tambah()) {
				$this->session->set_flashdata('info', 'Usulan berhasil ditambahkan!');
				redirect('usulan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('usulan');
			}
		}
	}
	public function tampil($id = null)
	{
		$this->form_validation->set_rules('nama_asset', 'Nama Asset', 'required|trim|xss_clean', ['required' => 'Nama Asset cannot be empty!']);
		$this->form_validation->set_rules('merk', 'Merk', 'trim|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Usulan";
			$data['detail'] = $this->M_usulan->getDetail($id);
			$this->template->load('template', 'usulan/tampil', $data);
		} else {
			if ($this->M_usulan->tambah()) {
				$this->session->set_flashdata('info', 'Usulan berhasil ditambahkan!');
				redirect('usulan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('usulan');
			}
		}
	}

	public function confirm($id = null)
	{
		if ($this->M_usulan->confirm($id)) {
			$this->session->set_flashdata('info', 'Usulan berhasil ditolak!');
			redirect('usulan');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('usulan');
		}
	}

	public function terima($id=null){
		$this->form_validation->set_rules('nama_asset', 'Nama Asset', 'required|trim|xss_clean', ['required' => 'Nama Asset cannot be empty!']);
		$this->form_validation->set_rules('merk', 'Merk', 'trim|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|xss_clean');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|xss_clean', ['required' => 'Jumlah cannot be empty!']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Usulan";
			$data['satuan'] = $this->M_satuan->getAllData();
			$data['detail'] = $this->M_usulan->getDetail($id);
			$this->template->load('template', 'usulan/terima', $data);
		} else {
			if ($this->M_usulan->terima($id)) {
				$this->session->set_flashdata('info', 'Usulan berhasil diterima!');
				redirect('usulan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('usulan');
			}
		}
	}
}