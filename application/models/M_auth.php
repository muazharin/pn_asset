<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function check_user()
	{
		$chatwa = 'Sukses Login';
		sendWA('082243309590', $chatwa);
		$username = $this->input->post('username', true);
		return $this->db->get_where('user', ['username' => $username]);
	}
}