<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

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
		$data['agency'] = $this->agency_model->get_data('agency')->result();
		$data['mobil'] = $this->mobil_model->get_data('mobil')->result();
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi')->result();

		$data['jadwal'] = $this->jadwal_model->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_jadwal', $data);
		$this->load->view('templates_admin/footer');		
	}

	public function input(){

		$data = array(
			'id_jadwal' => set_value('id_jadwal'),
			'tanggal' => set_value('tanggal'),
			'id_mobil' => set_value('id_mobil'),
			'id_agency' => set_value('id_agency'),
			'id_lokasi' => set_value('id_lokasi')
		);
		
		$data['agency'] = $this->agency_model->get_data('agency')->result();
		$data['mobil'] = $this->mobil_model->get_data('mobil')->result();
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_jadwal', $data);
		$this->load->view('templates_admin/footer');

	}

	public function input_aksi(){

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'tanggal' => $this->input->post('tanggal', TRUE),
				'id_mobil' => $this->input->post('id_mobil', TRUE),
				'id_agency' => $this->input->post('id_agency', TRUE),
				'id_lokasi' => $this->input->post('id_lokasi', TRUE)
			);

			$this->jadwal_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Jadwal Berhasil Ditambahkan!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
			redirect('admin/jadwal');
		}
	}

    public function _rules(){

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Tanggal harus diisi!']);
        $this->form_validation->set_rules('id_mobil', 'ID Mobil', 'required', ['required' => 'ID Mobil harus diisi!']);
        $this->form_validation->set_rules('id_agency', 'ID Agency', 'required', ['required' => 'ID Agency harus diisi!']);
        $this->form_validation->set_rules('id_lokasi', 'ID Lokasi', 'required', ['required' => 'ID Lokasi harus diisi!']);
    }

    public function update($id){

    	$where = array('id_jadwal' => $id);
    	$data['jadwal'] = $this->jadwal_model->edit_data($where,'jadwal')->result();

		$data['agency'] = $this->agency_model->get_data('agency')->result();
		$data['mobil'] = $this->mobil_model->get_data('mobil')->result();
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_jadwal', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi(){

    	$id = $this->input->post('id_jadwal');
    	$tanggal = $this->input->post('tanggal');
    	$batas_waktu_peminjaman = $this->input->post('batas_waktu_peminjaman');
    	$batas_waktu_pengembalian = $this->input->post('batas_waktu_pengembalian');
    	$id_mobil = $this->input->post('id_mobil');
    	$id_agency = $this->input->post('id_agency');
    	$id_lokasi = $this->input->post('id_lokasi');

    	$data = array(
    		'id_jadwal' => $id,
    		'tanggal' => $tanggal,
    		'id_mobil' => $id_mobil,
    		'id_agency' => $id_agency,
    		'id_lokasi' => $id_lokasi
    	);

    	$where = array(
    		'id_jadwal' => $id
    	);

    	$this->jadwal_model->update_data($where, $data, 'jadwal');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Jadwal Berhasil Update!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/jadwal');
    }

    public function delete($id){

    	$where = array('id_jadwal' => $id);
    	$this->jadwal_model->hapus_data($where,'jadwal');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Data Jadwal Berhasil Dihapus!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/jadwal');
    }


}

/* End of file Jadwal.php */
/* Location: ./application/controllers/admin/Jadwal.php */