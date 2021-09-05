<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean', ['required' => 'Username cannot be empty!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean', ['required' => 'Password cannot be empty!']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$isUser = $this->M_auth->check_user();
			if ($isUser->num_rows() > 0) {
				$data = $isUser->row_array();
				if (password_verify($this->input->post('password'), $data['password'])) {
					$setdata = [
						"id" => $data["id_user"],
						"name" => $data["name"],
						"username" => $data["username"],
						"name" => $data["name"],
						"email" => $data["email"],
						"nohp" => $data["nohp"],
						"gender" => $data["gender"],
						"role" => $data["role"],
						"pn_asset98371" => true,
					];
					$this->session->set_userdata($setdata);
					redirect("dashboard");
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<i class="fa fa-times-circle"></i> Password is wrong!
					</div>');
					redirect("auth");
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-times-circle"></i> Username is not registered!
                </div>');
				redirect('auth');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		session_destroy();
		redirect('auth');
	}
}