<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model("M_ruangan");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Ruangan";
		$this->template->load('template', 'ruangan/list', $data);
	}

	public function list_ruangan()
	{
		$data = $this->M_ruangan->list_ruangan();
		echo json_encode($data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_ruangan', 'Nama ruangan', 'required|trim|xss_clean', ['required' => 'Nama ruangan cannot be empty!']);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|xss_clean', ['required' => 'Deskripsi cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Ruangan";
			$this->template->load('template', 'ruangan/tambah', $data);
		} else {
			if ($this->M_ruangan->tambah()) {
				$this->session->set_flashdata('info', 'Ruangan berhasil ditambahkan!');
				redirect('ruangan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('ruangan');
			}
		}
	}

	public function ubah($id = null)
	{
		$this->form_validation->set_rules('nama_ruangan', 'Nama ruangan', 'required|trim|xss_clean', ['required' => 'Nama ruangan cannot be empty!']);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|xss_clean', ['required' => 'Deskripsi cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Ruangan";
			$data['detail'] = $this->M_ruangan->getDetail($id);
			$this->template->load('template', 'ruangan/ubah', $data);
		} else {
			if ($this->M_ruangan->ubah($id)) {
				$this->session->set_flashdata('info', 'Ruangan berhasil diubah!');
				redirect('ruangan');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('ruangan');
			}
		}
	}

	public function hapus($id = null)
	{
		if ($this->M_ruangan->hapus($id)) {
			$this->session->set_flashdata('info', 'Ruangan berhasil dihapus!');
			redirect('ruangan');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('ruangan');
		}
	}
}