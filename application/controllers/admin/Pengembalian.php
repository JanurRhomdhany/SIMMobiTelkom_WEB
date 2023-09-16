<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    
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

		$data['pengembalian'] = $this->pengembalian_model->tampil_data()->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_pengembalian', $data);
		$this->load->view('templates_admin/footer');		
	}

	public function accept($id){

		$this->pengembalian_model->accept_data($id);

    	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Pengembalian Berhasil!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/pengembalian');		
	}

	public function reject($id){

		$this->pengembalian_model->reject_data($id);

    	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Pengembalian Gagal!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/pengembalian');		
	}

	public function pending($id){

		$this->pengembalian_model->pending_data($id);

    	$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                              Pengembalian Dipending!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/pengembalian');		
	}

    public function update($id){

    	$where = array('id_pengembalian' => $id);
    	$data['pengembalian'] = $this->pengembalian_model->edit_data($where,'pengembalian')->result();

		$data['agency'] = $this->agency_model->get_data('agency')->result();
		$data['mobil'] = $this->mobil_model->get_data('mobil')->result();
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_pengembalian', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi(){

    	$id = $this->input->post('id_pengembalian');
    	$tanggal = $this->input->post('tanggal');
    	$id_sales = $this->input->post('id_sales');
    	$id_mobil = $this->input->post('id_mobil');
    	$id_lokasi = $this->input->post('id_lokasi');
    	$bukti_kondisi_mobil = $this->input->post('bukti_kondisi_mobil');
    	$ket_kegiatan = $this->input->post('ket_kegiatan');
    	$jam_pengembalian = $this->input->post('jam_pengembalian');
    	$status_pengembalian = $this->input->post('status_pengembalian');
    	$ket_status = $this->input->post('ket_status');

    	$data = array(
    		'id_pengembalian' => $id,
    		'tanggal' => $tanggal,
 			  'id_sales' => $id_sales,
    		'id_mobil' => $id_mobil,
    		'id_lokasi' => $id_lokasi,
    		'bukti_kondisi_mobil' => $bukti_kondisi_mobil,
    		'ket_kegiatan' => $ket_kegiatan,
    		'jam_pengembalian' => $jam_pengembalian,
    		'status_pengembalian' => $status_pengembalian,
    		'ket_status' => $ket_status
    	);

    	$where = array(
    		'id_pengembalian' => $id
    	);

    	$this->pengembalian_model->update_data($where, $data, 'pengembalian');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Pengembalian Berhasil Update!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/pengembalian');
    }

     public function delete($id){

      $where = array('id_pengembalian' => $id);
      $this->pengembalian_model->hapus_data($where,'pengembalian');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Pengembalian Berhasil Dihapus!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
      redirect('admin/pengembalian');
    }
}
