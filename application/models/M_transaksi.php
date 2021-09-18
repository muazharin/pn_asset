<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
	public function list_transaksi()
	{
		$data = array();
		$start = $_POST['start'];
		$length = $_POST['length'];
		$no = $start + 1;

		$id = $this->session->userdata('id');
		if (!empty($_POST['search']['value'])) {
			$keyword = $_POST['search']['value'];
			if ($this->session->userdata('role') == '1') {
				$query = "SELECT * FROM transaksi tr
				LEFT JOIN assets a ON tr.id_asset = a.id_asset
				LEFT JOIN satuan s ON a.id_satuan = s.id_satuan
				LEFT JOIN ruangan r ON tr.id_ruangan = r.id_ruangan
				LEFT JOIN user u ON tr.id_user_request = u.id_user
				WHERE u.id_user = $id AND ( a.nama_asset LIKE '%$keyword%'
				OR r.nama_ruangan LIKE '%$keyword%'
				OR s.nama_satuan LIKE '%$keyword%'
				OR tr.date_request LIKE '%$keyword%'
				OR u.name LIKE '%$keyword%')
				ORDER BY id_transaksi DESC";
			} else {
				$query = "SELECT * FROM transaksi tr
				LEFT JOIN assets a ON tr.id_asset = a.id_asset
				LEFT JOIN satuan s ON a.id_satuan = s.id_satuan
				LEFT JOIN ruangan r ON tr.id_ruangan = r.id_ruangan
				LEFT JOIN user u ON tr.id_user_request = u.id_user
				WHERE a.nama_asset LIKE '%$keyword%'
				OR r.nama_ruangan LIKE '%$keyword%'
				OR s.nama_satuan LIKE '%$keyword%'
				OR tr.date_request LIKE '%$keyword%'
				OR tr.status LIKE '%$keyword%'
				OR u.name LIKE '%$keyword%'
				ORDER BY id_transaksi DESC";
			}
		} else {
			if ($this->session->userdata('role') == '1') {
				$query = "SELECT * FROM transaksi tr
				LEFT JOIN assets a ON tr.id_asset = a.id_asset
				LEFT JOIN satuan s ON a.id_satuan = s.id_satuan
				LEFT JOIN ruangan r ON tr.id_ruangan = r.id_ruangan
				LEFT JOIN user u ON tr.id_user_request = u.id_user
				WHERE u.id_user = $id
				ORDER BY id_transaksi DESC";
			} else {
				$query = "SELECT * FROM transaksi tr
				LEFT JOIN assets a ON tr.id_asset = a.id_asset
				LEFT JOIN satuan s ON a.id_satuan = s.id_satuan
				LEFT JOIN ruangan r ON tr.id_ruangan = r.id_ruangan
				LEFT JOIN user u ON tr.id_user_request = u.id_user
				ORDER BY id_transaksi DESC";
			}
		}
		$count_all = $this->db->query($query)->num_rows();
		$data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
		foreach ($data_tabel as $hasil) {
			$opsi = '<center><a class="btn waves-effect waves-light btn-info btn-icon" href="' . base_url() . 'transaksi/detail/' . $hasil->id_transaksi . '">&nbsp;&nbsp;<i class="icofont icofont-eye-alt"></i></a><center>';
			if ($hasil->status == "Menunggu") {
				$status = '<label class="label label-inverse-warning">' . $hasil->status . '</label>';
			} else if ($hasil->status == "Disetujui") {
				$status = '<label class="label label-inverse-success">' . $hasil->status . '</label>';
			} else {
				$status = '<label class="label label-inverse-danger">' . $hasil->status . '</label>';
			}
			$delete = '<center><button class="btn waves-effect waves-light btn-danger btn-icon" onclick="buttonDelete(' . $hasil->id_transaksi . ');">&nbsp;&nbsp;<i class="icofont icofont-bin"></i></button></center>';
			$row = array();
			$row[] = $no++;
			$row[] = strlen($hasil->nama_asset) >= 20 ? substr($hasil->nama_asset, 0, 20) . "..." : $hasil->nama_asset;
			$row[] = strlen($hasil->nama_ruangan) >= 20 ? substr($hasil->nama_ruangan, 0, 20) . "..." : $hasil->nama_ruangan;
			$row[] = $hasil->jml == 0 && $hasil->status == 'Menunggu' ? $hasil->jml_pengajuan . '&nbsp;<label class="label label-inverse-danger">Stok Habis</label>' : $hasil->jml_pengajuan;
			$row[] = $hasil->nama_satuan;
			$row[] = date_format(date_create($hasil->date_request), 'd M Y');
			$row[] = $hasil->name;
			$row[] = $status;
			$row[] = $hasil->jml == 0 && $hasil->status == 'Menunggu' ? $delete : $opsi;
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

	public function get_stok()
	{
		$this->db->where('id_asset', $this->input->post('id_asset', true));
		$data = $this->db->get('assets')->row();
		return $data->jml;
	}

	public function pengajuan()
	{
		$id_asset = $this->input->post('id_asset', true);
		$id_ruangan = $this->input->post('id_ruangan', true);
		$jml_pengajuan = $this->input->post('jml_pengajuan', true);
		$date_request = date('Y-m-d H:i:s');
		$id_user_request = $this->session->userdata('id');
		$status = "Menunggu";

		$data = [
			'id_asset' => $id_asset,
			'id_ruangan' => $id_ruangan,
			'id_user_request' => $id_user_request,
			'jml_pengajuan' => $jml_pengajuan,
			'date_request' => $date_request,
			'status' => $status,
		];
		return $this->db->insert('transaksi', $data);
	}

	public function laporan()
	{
		$tgl = $this->input->post('tgl');
		$tgl1 = $this->input->post('tgl1');
		$tgl1 = date_create($tgl1);	
		$tgl1->modify('+1 day');
		$format_tgl = date_format(date_create($tgl), 'Y-m-d');
		$format_tgl1 = date_format($tgl1, 'Y-m-d');
		$query = "SELECT *, SUM(transaksi.jml_pengajuan) as jml_pengajuan, SUM(transaksi.jml_disetujui) as jml_disetujui 
		FROM transaksi 
		LEFT JOIN assets ON transaksi.id_asset = assets.id_asset 
		LEFT JOIN satuan ON assets.id_satuan = satuan.id_satuan 
		WHERE (transaksi.date_request BETWEEN '$format_tgl' AND '$format_tgl1')
		GROUP BY transaksi.id_asset 
		ORDER BY jml_pengajuan DESC";
		return $this->db->query($query)->result();
		// var_dump($query);
		// die;
	}

	public function getDetail($id)
	{
		$this->db->join('assets', 'transaksi.id_asset = assets.id_asset', 'left');
		$this->db->join('satuan', 'assets.id_satuan = satuan.id_satuan', 'left');
		$this->db->join('ruangan', 'transaksi.id_ruangan = ruangan.id_ruangan', 'left');
		$this->db->join('user', 'transaksi.id_user_request = user.id_user', 'left');
		$this->db->where('transaksi.id_transaksi', $id);
		return $this->db->get('transaksi')->row();
	}

	public function konfirmasi()
	{
		$id_transaksi = $this->input->post('id_transaksi', true);
		$id_asset = $this->input->post('id_asset', true);
		$status = $this->input->post('status', true);
		$jml = $this->input->post('jml', true);
		if ($status == 'Disetujui') {
			$data = [
				'jml_disetujui' => $jml,
				'date_confirm' => date('Y-m-d H:i:s'),
				'status' => $status,
			];
		} else {
			$data = [
				'date_confirm' => date('Y-m-d H:i:s'),
				'status' => $status,
			];
		}
		$this->db->where('id_transaksi', $id_transaksi);
		$up = $this->db->update('transaksi', $data);
		if ($up) {
			if ($status == 'Disetujui') {
				$this->db->set('jml', 'jml-' . $jml, FALSE);
				$this->db->where('id_asset', $id_asset);
				return $this->db->update('assets');
			} else {
				return $up;
			}
		} else {
			return false;
		}
	}

	public function hapus($id)
	{
		$this->db->where('id_transaksi', $id);
		return $this->db->delete('transaksi');
	}
}