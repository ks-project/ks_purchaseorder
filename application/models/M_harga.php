<?php

class M_harga extends CI_Model 
{
	private $table_name = 'harga_barang';
	public function get_barangs($num = 50) {
		return $this->db->get($this->table_name, $num)->result_array();	
	}
	public function get_barang_by_id($id) {
		return $this->db->get_where($this->table_name, array('id' => $id))->result_array();
	}
	public function insert_barang($data) {
		return $this->db->insert($this->table_name, $data);
	}
	public function delete_barang($id) {
		return $this->db->delete($this->table_name, array('id' => $id));
	}
	public function update_barang($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update($this->table_name, $data);
	}
}