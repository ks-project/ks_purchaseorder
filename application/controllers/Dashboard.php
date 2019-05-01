<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// f99aecef3d12e02dcbb6260bbdd35189c89e6e73

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_karyawan', '', TRUE);
		$this->load->model('m_harga', '', TRUE);
		if (!$this->session->userdata('iduser')) {
			redirect('login', 'location');
		}
	}

	public function index() {
		$this->load->view('dashboard');
	}

    public function pemesanan() {
        $this->load->view('pemesanan');
    }
    
    public function daftar_harga() {
		$data['barangs'] = $this->m_harga->get_barangs();
        $this->load->view('daftar_harga', $data);
    }
}
