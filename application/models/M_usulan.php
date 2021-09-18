<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_usulan extends CI_Model
{
	public function list_usulan()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;
		$role = $this->session->userdata('role');
		$id = $this->session->userdata('id');
		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			if ($this->session->userdata('role') == '1') {
				$query = "SELECT * FROM usulan
				WHERE id_user = '$id' AND (nama_asset LIKE '%$keyword%' 
				OR merk LIKE '%$keyword%' 
				OR type LIKE '%$keyword%' 
				OR deskripsi LIKE '%$keyword%')
				ORDER BY id_usulan DESC";
			} else {
				$query = "SELECT * FROM usulan
				WHERE nama_asset LIKE '%$keyword%' 
				OR merk LIKE '%$keyword%' 
				OR type LIKE '%$keyword%' 
				OR deskripsi LIKE '%$keyword%'
				ORDER BY id_usulan DESC";
			}
		} else {
			if ($this->session->userdata('role') == '1') {
				$query = "SELECT * FROM usulan 
				WHERE id_user = '$id'
				ORDER BY id_usulan DESC";
			} else {
				$query = "SELECT * FROM usulan
				ORDER BY id_usulan DESC";
			}
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$row = array();
			if ($hasil->status == "Dikirim") {
				$status = '<label class="label label-inverse-warning">' . $hasil->status . '</label>';
			} else if ($hasil->status == "Diterima") {
				$status = '<label class="label label-inverse-success">' . $hasil->status . '</label>';
			} else {
				$status = '<label class="label label-inverse-danger">' . $hasil->status . '</label>';
			}
			$row[] = $no++;
			$row[] = strlen($hasil->nama_usulan) >= 20 ? substr($hasil->nama_usulan, 0, 20) . "..." : $hasil->nama_usulan;

			$row[] = $hasil->merk;
			$row[] = $hasil->type;
			$row[] = strlen($hasil->deskripsi) >= 20 ? substr($hasil->deskripsi, 0, 20) . "..." : $hasil->deskripsi;
			$row[] = $status;
			$row[] = '<center>
			<a class="btn waves-effect waves-light btn-success btn-icon" href="' . base_url() . 'usulan/tampil/' . $hasil->id_usulan . '">&nbsp;&nbsp;<i class="icofont icofont-eye-alt"></i></a><center>';
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
		$id = $this->session->userdata('id');
		$nama_asset = $this->input->post("nama_asset", true);
		$merk = $this->input->post("merk", true);
		$type = $this->input->post("type", true);
		$deskripsi = $this->input->post("deskripsi", true);

		$data = [
			'id_user' => $id,
			'nama_usulan' => $nama_asset,
			'merk' => $merk,
			'type' => $type,
			'deskripsi' => $deskripsi,
		];
		return $this->db->insert('usulan', $data);
	}

	public function getAllData()
	{
		return $this->db->get('usulan')->result();
	}

	public function getDetail($id)
	{

		$this->db->join('user', 'user.id_user = usulan.id_user', 'left');
		$this->db->where('usulan.id_usulan', $id);
		return $this->db->get('usulan')->row();
	}

	public function ubah($id)
	{
		$nama_asset = $this->input->post("nama_asset", true);
		$merk = $this->input->post("merk", true);
		$type = $this->input->post("type", true);
		$jumlah = $this->input->post("jumlah", true);
		$satuan = $this->input->post("satuan", true);
		$deskripsi = $this->input->post("deskripsi", true);
		$data = [
			'nama_asset' => $nama_asset,
			'merk' => $merk,
			'type' => $type,
			'jml' => $jumlah,
			'id_satuan' => $satuan,
			'deskripsi' => $deskripsi,
		];
		$this->db->where('id_asset', $id);
		return $this->db->update('assets', $data);
	}
	
	public function confirm($id)
	{
		$data['status']='Ditolak';
		$this->db->where('id_usulan', $id);
		return $this->db->update('usulan', $data);
		
	}
	
	public function terima($id)
	{
		$nama_asset = $this->input->post("nama_asset", true);
		$merk = $this->input->post("merk", true);
		$type = $this->input->post("type", true);
		$jumlah = $this->input->post("jumlah", true);
		$satuan = $this->input->post("satuan", true);
		$deskripsi = $this->input->post("deskripsi", true);
		$data = [
			'nama_asset' => $nama_asset,
			'merk' => $merk,
			'type' => $type,
			'jml' => $jumlah,
			'id_satuan' => $satuan,
			'deskripsi' => $deskripsi,
		];
		if($this->db->insert('assets', $data)){
			$data1['status']="Diterima";
			$this->db->where('id_usulan', $id);
			return $this->db->update('usulan', $data1);
		}else{
			return false;
		}
	}
}