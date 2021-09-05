<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assets extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model("M_assets");
		$this->load->model("M_satuan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Assets";
		$this->template->load('template', 'assets/list', $data);
	}

	public function list_assets()
	{
		$data = $this->M_assets->list_assets();
		echo json_encode($data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_asset', 'Nama Asset', 'required|trim|xss_clean', ['required' => 'Nama Asset cannot be empty!']);
		$this->form_validation->set_rules('merk', 'Merk', 'trim|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|xss_clean');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|xss_clean', ['required' => 'Jumlah cannot be empty!']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Assets";
			$data['satuan'] = $this->M_satuan->getAllData();
			$this->template->load('template', 'assets/tambah', $data);
		} else {
			if ($this->M_assets->tambah()) {
				$this->session->set_flashdata('info', 'Asset berhasil ditambahkan!');
				redirect('assets');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('assets');
			}
		}
	}
	public function ubah($id = null)
	{
		$this->form_validation->set_rules('nama_asset', 'Nama Asset', 'required|trim|xss_clean', ['required' => 'Nama Asset cannot be empty!']);
		$this->form_validation->set_rules('merk', 'Merk', 'trim|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|xss_clean');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|xss_clean', ['required' => 'Jumlah cannot be empty!']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Assets";
			$data['satuan'] = $this->M_satuan->getAllData();
			$data['detail'] = $this->M_assets->getDetail($id);
			$this->template->load('template', 'assets/ubah', $data);
		} else {
			if ($this->M_assets->ubah($id)) {
				$this->session->set_flashdata('info', 'Asset berhasil diubah!');
				redirect('assets');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('assets');
			}
		}
	}
	public function tampil($id = null)
	{
		$data['title'] = "Assets";
		$data['detail'] = $this->M_assets->getDetail($id);
		$this->template->load('template', 'assets/tampil', $data);
	}

	public function hapus($id = null)
	{
		if ($this->M_assets->hapus($id)) {
			$this->session->set_flashdata('info', 'Data berhasil dihapus!');
			redirect('assets');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('assets');
		}
	}
}