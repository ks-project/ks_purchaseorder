<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// f99aecef3d12e02dcbb6260bbdd35189c89e6e73

class Supplier extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_karyawan', '', TRUE);
	}

	public function index() {
		$this->load->view('daftar_harga_supplier');
	}
}
