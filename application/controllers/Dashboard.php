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
		} elseif ($this->session->userdata('role')=='2') {
			redirect('supplier','location');
		}
	}

	public function index() {
		$this->load->view('admin/dashboard');
	}

	public function daftar_harga() {
		$data['barangs'] = $this->m_harga->get_barangs();
        $this->load->view('admin/daftar_harga', $data);
    }

    public function pemesanan() {
		$data['proposal'] = $this->m_karyawan->get_proposal();
        $this->load->view('admin/pemesanan', $data);
    }
	
	public function submitproposal($id = NULL) {
		$barang = $this->m_karyawan->get_proposal_by_id($id);
		$this->session->set_flashdata('submit_id', $id);
		if ($barang) {
			$data['status'] = $this->input->post('status');
			$this->m_karyawan->submit_proposal($data, $id);
			$this->session->set_flashdata('submit_berhasil', TRUE);
		}
		redirect('dashboard/pemesanan', 'location');
	}

	public function daftar_pesanan() {
		$data['proposal'] = $this->m_karyawan->get_proposal();
        $this->load->view('admin/daftar_pesanan', $data);
    }
}
