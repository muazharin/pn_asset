<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_assets extends CI_Model
{
	public function list_assets()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;

		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			$query = "SELECT a.*, s.* FROM assets a
				LEFT JOIN satuan s ON a.id_satuan = s.id_satuan 
				WHERE a.nama_asset LIKE '%$keyword%' 
				OR a.merk LIKE '%$keyword%' 
				OR a.type LIKE '%$keyword%' 
				OR a.deskripsi LIKE '%$keyword%' 
				OR s.nama_satuan LIKE '%$keyword%' 
				ORDER BY id_asset DESC";
		} else {
			$query = "SELECT a.*, s.* FROM assets a
			LEFT JOIN satuan s ON a.id_satuan = s.id_satuan
			ORDER BY a.id_asset DESC";
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$row = array();
			$row[] = $no++;
			$row[] = strlen($hasil->nama_asset) >= 20 ? substr($hasil->nama_asset, 0, 20) . "..." : $hasil->nama_asset;
			$row[] = $hasil->merk;
			$row[] = $hasil->type;
			$row[] = $hasil->jml;
			$row[] = $hasil->nama_satuan;
			$row[] = strlen($hasil->deskripsi) >= 20 ? substr($hasil->deskripsi, 0, 20) . "..." : $hasil->deskripsi;
			$row[] = '<center>
			<a class="btn waves-effect waves-light btn-success btn-icon" href="' . base_url() . 'assets/tampil/' . $hasil->id_asset . '">&nbsp;&nbsp;<i class="icofont icofont-eye-alt"></i></a>
			<a class="btn waves-effect waves-light btn-warning btn-icon" href="' . base_url() . 'assets/ubah/' . $hasil->id_asset . '">&nbsp;&nbsp;<i class="icofont icofont-edit"></i></a>
			<button class="btn waves-effect waves-light btn-danger btn-icon" onclick="buttonDelete(' . $hasil->id_asset . ');">&nbsp;&nbsp;<i class="icofont icofont-bin"></i></button><center>';
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
		return $this->db->insert('assets', $data);
	}

	public function getAllData()
	{
		return $this->db->get('assets')->result();
	}
	public function getDetail($id)
	{

		$this->db->join('satuan', 'assets.id_satuan = satuan.id_satuan', 'left');
		$this->db->where('assets.id_asset', $id);
		return $this->db->get('assets')->row();
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

	public function hapus($id)
	{
		$this->db->where('id_asset', $id);
		return $this->db->delete('assets');
	}
}