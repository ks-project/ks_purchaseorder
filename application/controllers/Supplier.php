<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// f99aecef3d12e02dcbb6260bbdd35189c89e6e73

class Supplier extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_harga', '', TRUE);
		if (!$this->session->userdata('iduser')) {
			redirect('login', 'location');
		} elseif ($this->session->userdata('role')!='2') {
			redirect('dashboard', 'location');
		}
	}

	public function index() {
		$data['barangs'] = $this->m_harga->get_barangs();
		$this->load->view('daftar_harga_supplier', $data);
	}

	public function update_harga($id = NULL) {
		$barang = $this->m_harga->get_barang_by_id($id);
		$this->session->set_flashdata('update_id', $id);
		if ($barang) {
			$data['harga'] = $this->input->post('harga');
			$this->m_harga->update_barang($data, $id);
			$this->session->set_flashdata('update_berhasil', TRUE);
		}
		redirect('supplier/index', 'location');
	}
}
