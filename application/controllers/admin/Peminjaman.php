<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Peminjaman extends CI_Controller {

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

		$data['peminjaman'] = $this->peminjaman_model->tampil_data()->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_peminjaman', $data);
		$this->load->view('templates_admin/footer');
	}

	public function accept($id){

		$this->peminjaman_model->accept_data($id);

    	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Peminjaman Diterima!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/peminjaman');		
	}

	public function reject($id){

		$this->peminjaman_model->reject_data($id);

    	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Peminjaman Ditolak!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/peminjaman');		
	}

	public function pending($id){

		$this->peminjaman_model->pending_data($id);

    	$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                              Peminjaman Dipending!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/peminjaman');		
	}

    public function update($id){

    	$where = array('id_peminjaman' => $id);
    	$data['peminjaman'] = $this->peminjaman_model->edit_data($where,'peminjaman')->result();

		$data['agency'] = $this->agency_model->get_data('agency')->result();
		$data['mobil'] = $this->mobil_model->get_data('mobil')->result();
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_peminjaman', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi(){

    	$id = $this->input->post('id_peminjaman');
    	$tanggal = $this->input->post('tanggal');
    	$id_sales = $this->input->post('id_sales');
    	$id_mobil = $this->input->post('id_mobil');
    	$id_lokasi = $this->input->post('id_lokasi');
    	$jam_peminjaman = $this->input->post('jam_peminjaman');
    	$status_peminjaman = $this->input->post('status_peminjaman');
    	$ket = $this->input->post('ket');

    	$data = array(
    		'id_peminjaman' => $id,
    		'tanggal' => $tanggal,
 			'id_sales' => $id_sales,
    		'id_mobil' => $id_mobil,
    		'id_lokasi' => $id_lokasi,
    		'jam_peminjaman' => $jam_peminjaman,
    		'status_peminjaman' => $status_peminjaman,
    		'ket' => $ket
    	);

    	$where = array(
    		'id_peminjaman' => $id
    	);

    	$this->peminjaman_model->update_data($where, $data, 'peminjaman');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Peminjaman Berhasil Update!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/peminjaman');
    }

    public function delete($id){

      $where = array('id_peminjaman' => $id);
      $this->peminjaman_model->hapus_data($where,'peminjaman');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Peminjaman Berhasil Dihapus!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
      redirect('admin/peminjaman');
    }

}
