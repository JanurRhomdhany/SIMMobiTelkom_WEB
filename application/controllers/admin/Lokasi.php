<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

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
        $data['lokasi'] = $this->lokasi_model->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_lokasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function input(){

        $data = array(
            'id_lokasi' => set_value('id_lokasi'),
            'nama_lokasi' => set_value('nama_lokasi')
        );

        $data['lokasi'] = $this->lokasi_model->get_data('lokasi')->result();
        $data['kode'] = $this->lokasi_model->CreateCode();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_lokasi', $data);
        $this->load->view('templates_admin/footer');

    }

    public function input_aksi(){


        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->input();
        }else{
            $data = array(
                'id_lokasi' => $this->input->post('id_lokasi', TRUE),
                'nama_lokasi' => $this->input->post('nama_lokasi', TRUE)
            );
            
            $this->lokasi_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Lokasi Berhasil Ditambahkan!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
            redirect('admin/lokasi');
        }
    }

    public function _rules(){

        // $this->form_validation->set_rules('id_sales', 'Id Sales', 'required', ['required' => 'ID Sales harus diisi!']);
        $this->form_validation->set_rules('id_lokasi', 'ID Lokasi', 'required', ['required' => 'ID Lokasi harus diisi!']);
        $this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'required', ['required' => 'Nama Lokasi harus diisi!']);
    }

    public function update($id){

        $where = array('id_lokasi' => $id);
        $data['lokasi'] = $this->lokasi_model->edit_data($where,'lokasi')->result();
        // $data['agency'] = $this->sales_model->get_data('agency')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_lokasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_aksi(){

        $id = $this->input->post('id_lokasi');
        $nama_lokasi = $this->input->post('nama_lokasi');

        $data = array(
            'id_lokasi' => $id,
            'nama_lokasi' => $nama_lokasi
        );

        $where = array(
            'id_lokasi' => $id
        );

        $this->lokasi_model->update_data($where, $data, 'lokasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Lokasi Berhasil Update!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
        redirect('admin/lokasi');
    }

    public function delete($id){

        $where = array('id_lokasi' => $id);
        $this->lokasi_model->hapus_data($where,'lokasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Data Lokasi Berhasil Dihapus!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
        redirect('admin/lokasi');
    }

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */