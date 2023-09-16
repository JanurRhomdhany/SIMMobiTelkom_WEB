<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan_mobil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Anda Belum Login
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
			$url = base_url('');
			redirect($url);
		}
	}
	public function index()
	{
		$data['sales'] = $this->sales_model->get_data('sales')->result();
		$data['mobil'] = $this->mobil_model->get_data('mobil')->result();
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi')->result();
		$data['agency'] = $this->agency_model->get_data('agency')->result();

		$data['penggunaan'] = $this->penggunaan_model->tampil_data()->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_penggunaan_mobil', $data);
		$this->load->view('templates_admin/footer');		
	}

	    public function getUserName()
    {
        return $this->session->userdata('username'); // Assuming 'username' is the session key for storing the user's name
    }



}