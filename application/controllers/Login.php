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
	
	public function login() {
		// cek $_POST
		if ($this->input->post()) {
			$id = $this->input->post('id_karyawan');
			$pwd = $this->input->post('password');

			$data = $this->m_karyawan->get_karyawan($id, $pwd);
			if (!$data) {
				$this->session->set_flashdata('login-gagal', "GAGAL");
				redirect('login/index', 'location');
			} else {
					$this->session->set_userdata('id_karyawan', $data[0]['id_karyawan']);
					$this->session->set_userdata('jabatan', $data[0]['jabatan']);
					$this->session->set_userdata('nama', $data[0]['nama']);

					redirect('dashboard', 'location');
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('login', 'location');
	}
}
