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
		$data['jml_pengajuan'] = $this->db->count_all_results('transaksi');
		$this->db->where('status', 'Disetujui');
		$data['jml_disetujui'] = $this->db->count_all_results('transaksi');
		$this->db->where('status', 'Ditolak');
		$data['jml_ditolak'] = $this->db->count_all_results('transaksi');
		if ($this->session->userdata('role') == '1') {
			$this->db->where('id_user_request', $this->session->userdata('id'));
			$data['jml_pengajuan'] = $this->db->count_all_results('transaksi');
			$this->db->where('status', 'Disetujui');
			$this->db->where('id_user_request', $this->session->userdata('id'));
			$data['jml_disetujui'] = $this->db->count_all_results('transaksi');
			$this->db->where('status', 'Ditolak');
			$this->db->where('id_user_request', $this->session->userdata('id'));
			$data['jml_ditolak'] = $this->db->count_all_results('transaksi');
		}
		$this->template->load('template', 'dashboard', $data);
	}
}