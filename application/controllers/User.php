<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model("M_user");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "User";
		$this->template->load('template', 'user/list', $data);
	}

	public function list_user()
	{
		$data = $this->M_user->list_user();
		echo json_encode($data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required|trim|xss_clean', ['required' => 'Nama cannot be empty!']);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean', ['required' => 'Username cannot be empty!']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean', ['required' => 'Email cannot be empty!']);
		$this->form_validation->set_rules('nohp', 'No Hp', 'required|trim|xss_clean', ['required' => 'No Hp cannot be empty!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean', ['required' => 'Password cannot be empty!']);
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim|xss_clean', ['required' => 'Gender cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "User";
			$this->template->load('template', 'user/tambah', $data);
		} else {
			if ($this->M_user->tambah()) {
				$this->session->set_flashdata('info', 'User berhasil ditambahkan!');
				redirect('user');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('user');
			}
		}
	}

	public function ubah($id = null)
	{
		$this->form_validation->set_rules('name', 'Nama', 'required|trim|xss_clean', ['required' => 'Nama cannot be empty!']);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean', ['required' => 'Username cannot be empty!']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean', ['required' => 'Email cannot be empty!']);
		$this->form_validation->set_rules('nohp', 'No Hp', 'required|trim|xss_clean', ['required' => 'No Hp cannot be empty!']);
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim|xss_clean', ['required' => 'Gender cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "User";
			$data['detail'] = $this->M_user->getDetail($id);
			$this->template->load('template', 'user/ubah', $data);
		} else {
			if ($this->M_user->ubah($id)) {
				$this->session->set_flashdata('info', 'User berhasil diubah!');
				redirect('user');
			} else {
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect('user');
			}
		}
	}

	public function tampil($id = null)
	{
		$data['title'] = "User";
		$data['detail'] = $this->M_user->getDetail($id);
		$this->template->load('template', 'user/tampil', $data);
	}

	public function reset($id = null)
	{
		if ($this->M_user->reset($id)) {
			$this->session->set_flashdata('info', 'User berhasil direset!');
			redirect('user');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('user');
		}
	}
	public function hapus($id = null)
	{
		if ($this->M_user->hapus($id)) {
			$this->session->set_flashdata('info', 'User berhasil dihapus!');
			redirect('user');
		} else {
			$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
			redirect('user');
		}
	}
}