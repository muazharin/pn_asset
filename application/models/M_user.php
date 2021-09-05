<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function list_user()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;

		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			$query = "SELECT * FROM user 
				WHERE role='1' AND (name LIKE '%$keyword%' 
				OR email LIKE '%$keyword%' 
				OR nohp LIKE '%$keyword%' 
				OR username LIKE '%$keyword%')
				ORDER BY id_user DESC";
		} else {
			$query = "SELECT * FROM user WHERE role='1' ORDER BY id_user DESC";
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$row = array();
			$row[] = $no++;
			$row[] = $hasil->username;
			$row[] = strlen($hasil->name) >= 20 ? substr($hasil->name, 0, 20) . "..." : $hasil->name;
			$row[] = strlen($hasil->email) >= 20 ? substr($hasil->email, 0, 20) . "..." : $hasil->email;
			$row[] = $hasil->nohp;
			$row[] = strlen($hasil->password) >= 20 ? substr($hasil->password, 0, 20) . "..." : $hasil->password;
			$row[] = $hasil->gender;
			$row[] = '<center>
			<a class="btn waves-effect waves-light btn-success btn-icon" href="' . base_url() . 'user/tampil/' . $hasil->id_user . '">&nbsp;&nbsp;<i class="icofont icofont-eye-alt"></i></a>
			<a class="btn waves-effect waves-light btn-warning btn-icon" href="' . base_url() . 'user/ubah/' . $hasil->id_user . '">&nbsp;&nbsp;<i class="icofont icofont-edit"></i></a>
			<button class="btn waves-effect waves-light btn-primary btn-icon" onclick="buttonReset(' . $hasil->id_user . ');">&nbsp;&nbsp;<i class="icofont icofont-refresh"></i></button>
			<button class="btn waves-effect waves-light btn-danger btn-icon" onclick="buttonDelete(' . $hasil->id_user . ');">&nbsp;&nbsp;<i class="icofont icofont-bin"></i></button><center>';
			$data[] = $row;
		}
		$output = array(
			"draw"              => $_POST['draw'],
			"recordsTotal"      => $count_all,
			"recordsFiltered"   => $count_all,
			"data"              => $data,
		);
		return $output;
	}

	public function tambah()
	{
		$name = $this->input->post("name", true);
		$username = $this->input->post("username", true);
		$email = $this->input->post("email", true);
		$nohp = $this->input->post("nohp", true);
		$password =  password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
		$gender = $this->input->post("gender", true);
		$data = [
			'name' => $name,
			'username' => $username,
			'email' => $email,
			'nohp' => $nohp,
			'password' => $password,
			'gender' => $gender,
			'role' => '1',
		];
		return $this->db->insert('user', $data);
	}

	public function getDetail($id)
	{
		$this->db->where('id_user', $id);
		$this->db->where('role', '1');
		return $this->db->get('user')->row();
	}

	public function ubah($id)
	{
		$name = $this->input->post("name", true);
		$username = $this->input->post("username", true);
		$email = $this->input->post("email", true);
		$nohp = $this->input->post("nohp", true);
		$gender = $this->input->post("gender", true);
		$data = [
			'name' => $name,
			'username' => $username,
			'email' => $email,
			'nohp' => $nohp,
			'gender' => $gender,
			'role' => '1',
		];
		$this->db->where('id_user', $id);
		return $this->db->update('user', $data);
	}

	public function reset($id)
	{
		$data['password'] = password_hash('123456', PASSWORD_DEFAULT);
		$this->db->where('id_user', $id);
		return $this->db->update('user', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->delete('user');
	}
}