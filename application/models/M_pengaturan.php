<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{
	public function ubah_password()
	{
		$id = $this->session->userdata('id');
		$pass = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
		$data['password'] = $pass;
		$this->db->where('id_user', $id);
		return $this->db->update('user', $data);
	}
}