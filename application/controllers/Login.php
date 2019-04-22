<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_karyawan', '', TRUE);
	}

	public function index() {
		// cek $_SESSION
		if ($this->session->userdata('id_karyawan') && $this->session->userdata('jabatan')) {
			redirect(strtolower(pages), 'location');
		}
		$this->load->view('login');
    }
    
	public function logout() {
		$this->session->sess_destroy();
		redirect('login', 'location');
	}
}
