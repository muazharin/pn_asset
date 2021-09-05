<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_satuan extends CI_Model
{
	public function list_satuan()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;

		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			$query = "SELECT * FROM satuan 
				WHERE nama_satuan LIKE '%$keyword%'
				ORDER BY id_satuan DESC";
		} else {
			$query = "SELECT * FROM satuan ORDER BY id_satuan DESC";
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$row = array();
			$row[] = $no++;
			$row[] = $hasil->nama_satuan;
			$row[] = '<center><a class="btn waves-effect waves-light btn-warning btn-icon" href="' . base_url() . 'satuan/ubah/' . $hasil->id_satuan . '">&nbsp;&nbsp;<i class="icofont icofont-edit"></i></a>
			<button class="btn waves-effect waves-light btn-danger btn-icon" onclick="buttonDelete(' . $hasil->id_satuan . ');">&nbsp;&nbsp;<i class="icofont icofont-bin"></i></button><center>';
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
		$nama_satuan = $this->input->post("nama_satuan", true);
		$data = [
			'nama_satuan' => $nama_satuan,
		];
		return $this->db->insert('satuan', $data);
	}

	public function getAllData()
	{
		return $this->db->get('satuan')->result();
	}
	public function getDetail($id)
	{
		$this->db->where('id_satuan', $id);
		return $this->db->get('satuan')->row();
	}

	public function ubah($id)
	{
		$nama_satuan = $this->input->post("nama_satuan", true);
		$data = [
			'nama_satuan' => $nama_satuan,
		];
		$this->db->where('id_satuan', $id);
		return $this->db->update('satuan', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_satuan', $id);
		return $this->db->delete('satuan');
	}
}