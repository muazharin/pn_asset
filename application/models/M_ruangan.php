<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ruangan extends CI_Model
{
	public function list_ruangan()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;

		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			$query = "SELECT * FROM ruangan 
				WHERE nama_ruangan LIKE '%$keyword%'
				OR deskripsi LIKE '%$keyword%'
				ORDER BY id_ruangan DESC";
		} else {
			$query = "SELECT * FROM ruangan ORDER BY id_ruangan DESC";
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$row = array();
			$row[] = $no++;
			$row[] = $hasil->nama_ruangan;
			$row[] = strlen($hasil->deskripsi) >= 20 ? substr($hasil->deskripsi, 0, 20) . "..." : $hasil->deskripsi;
			$row[] = '<center><a class="btn waves-effect waves-light btn-warning btn-icon" href="' . base_url() . 'ruangan/ubah/' . $hasil->id_ruangan . '">&nbsp;&nbsp;<i class="icofont icofont-edit"></i></a>
			<button class="btn waves-effect waves-light btn-danger btn-icon" onclick="buttonDelete(' . $hasil->id_ruangan . ');">&nbsp;&nbsp;<i class="icofont icofont-bin"></i></button><center>';
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
		$nama_ruangan = $this->input->post("nama_ruangan", true);
		$deskripsi = $this->input->post("deskripsi", true);
		$data = [
			'nama_ruangan' => $nama_ruangan,
			'deskripsi' => $deskripsi,
		];
		return $this->db->insert('ruangan', $data);
	}

	public function getDetail($id)
	{
		$this->db->where('id_ruangan', $id);
		return $this->db->get('ruangan')->row();
	}

	public function ubah($id)
	{
		$nama_ruangan = $this->input->post("nama_ruangan", true);
		$deskripsi = $this->input->post("deskripsi", true);
		$data = [
			'nama_ruangan' => $nama_ruangan,
			'deskripsi' => $deskripsi,
		];
		$this->db->where('id_ruangan', $id);
		return $this->db->update('ruangan', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_ruangan', $id);
		return $this->db->delete('ruangan');
	}
}