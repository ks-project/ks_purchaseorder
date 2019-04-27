<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// f99aecef3d12e02dcbb6260bbdd35189c89e6e73

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_karyawan', '', TRUE);
		if (!$this->session->userdata('id_karyawan')) {
			redirect('login', 'location');
		}
	}

	public function index() {
		$this->load->view('dashboard');
	}

    public function pembelian() {
        $this->load->view('pembelian');
    }
}
