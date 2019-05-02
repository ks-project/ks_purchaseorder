<?php

class M_karyawan extends CI_Model 
{
	private $table_name = 'user';
	public function get_karyawan($username, $pwd) {
		return $this->db->get_where($this->table_name, array('username' => $username, 'password' => $pwd))->result_array();
	}
	public function get_karyawan_level($id) {
		return $this->db->get_where('karyawan', array('idkaryawan' => $id, 'level' => '2'))->result_array();
	}
	public function get_karyawan_by_id($id) {
		return $this->db->get_where($this->table_name, array('iduser' => $id))->result_array();
	}
	public function insert_karyawan($data) {
		return $this->db->insert($this->table_name, $data);
	}
	public function update_karyawan($data, $id) {
		$this->db->where('id_karyawan', $id);
		return $this->db->update($this->table_name, $data);
	}
	public function get_proposal($num = 500) {
		return $this->db->get('proposal', $num)->result_array();
	}
	public function get_proposal_by_id($id) {
		return $this->db->get_where('proposal', array('idproposal' => $id))->result_array();
	}
	public function submit_proposal($data, $id) {
		$this->db->where('idproposal', $id);
		return $this->db->update('proposal', $data);
	}
}