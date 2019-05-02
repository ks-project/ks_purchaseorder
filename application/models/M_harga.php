<?php

class M_harga extends CI_Model 
{
	private $table_name = 'bahanbaku';
	public function get_barangs() {
		$this->db->select('idbarang, nama, kodebarang, url, barang.idbarang, bahanbaku.harga, bahanbaku.qty');
		$this->db->from('barang');
		$this->db->join('bahanbaku', 'barang.idbarang = bahanbaku.idbahanbaku');
		return $this->db->get()->result_array();
	}
	public function get_barang_by_id($id) {
		return $this->db->get_where($this->table_name, array('idbahanbaku' => $id))->result_array();
	}
	public function update_barang($data, $id) {
		$this->db->where('idbahanbaku', $id);
		return $this->db->update($this->table_name, $data);
	}
}