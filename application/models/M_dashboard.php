<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
	function grafik_total(){
		$ruang = $this->input->post('ruang', true);
		if($ruang != '0' && $ruang != null){
			$this->db->where('transaksi.id_ruangan', $ruang);
		}
		$this->db->select('*');
		$this->db->select('SUM(transaksi.jml_pengajuan) as jml_pengajuan');
		$this->db->join('assets','transaksi.id_asset = assets.id_asset','left');
		$this->db->join('satuan','assets.id_satuan = satuan.id_satuan','left');
		$this->db->group_by('transaksi.id_asset');
		return $this->db->get('transaksi')->result();
		// var_dump( $ruang);
		// die;
	}

}
