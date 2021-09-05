<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function check_user()
	{
		$username = $this->input->post('username', true);
		return $this->db->get_where('user', ['username' => $username]);
	}
}