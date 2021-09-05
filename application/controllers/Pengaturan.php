<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
		$this->load->model('M_pengaturan');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('password', 'Password Baru', 'required|trim|xss_clean', ['required' => 'Password Baru cannot be empty!']);
		$this->form_validation->set_rules('newpassword', 'Konfirmasi Password Baru', 'required|trim|xss_clean', ['required' => 'Konfirmasi Password Baru cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Pengaturan";
			$this->template->load('template', 'pengaturan/tabs', $data);
		} else {
			$pass = $this->input->post('password', true);
			$newpass = $this->input->post('newpassword', true);
			if ($pass != $newpass) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-times-circle"></i> Password dan Konfirmasi Password tidak sama!
				</div>');
				$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
				redirect("pengaturan");
			} else {
				if ($this->M_pengaturan->ubah_password()) {
					$this->session->set_flashdata('info', 'Password berhasil diubah!');
					redirect('pengaturan');
				} else {
					$this->session->set_flashdata('danger', 'Maaf, Terjadi kesalahan!');
					redirect('pengaturan');
				}
			}
		}
	}
}