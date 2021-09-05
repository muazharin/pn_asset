<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('pn_asset98371') != TRUE) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['jml_asset'] = $this->db->count_all_results('assets');
		$this->template->load('template', 'dashboard', $data);
	}
}