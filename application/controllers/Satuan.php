<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model("M_satuan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Assets";
		$this->template->load('template', 'satuan/list', $data);
	}

	public function list_satuan()
	{
		$data = $this->M_satuan->list_satuan();
		echo json_encode($data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim|xss_clean', ['required' => 'Nama Satuan cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Assets";
			$this->template->load('template', 'satuan/tambah', $data);
		} else {
			if ($this->M_satuan->tambah()) {
				$this->session->set_flashdata('info', 'Satuan berhasil ditambahkan!');
				redirect('satuan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('satuan');
			}
		}
	}

	public function ubah($id = null)
	{
		$this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim|xss_clean', ['required' => 'Nama Satuan cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Assets";
			$data['detail'] = $this->M_satuan->getDetail($id);
			$this->template->load('template', 'satuan/ubah', $data);
		} else {
			if ($this->M_satuan->ubah($id)) {
				$this->session->set_flashdata('info', 'Satuan berhasil diubah!');
				redirect('satuan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('satuan');
			}
		}
	}

	public function hapus($id = null)
	{
		if ($this->M_satuan->hapus($id)) {
			$this->session->set_flashdata('info', 'Satuan berhasil dihapus!');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('satuan');
		}
	}
}