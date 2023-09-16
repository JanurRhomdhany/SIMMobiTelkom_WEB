<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

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
		// $data['agency'] = $this->sales_model->get_data('agency')->result();
		$data['mobil'] = $this->mobil_model->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function input(){

		$data = array(
			'id_mobil' => set_value('id_mobil'),
			'plat_mobil' => set_value('plat_mobil'),
			'status' => set_value('status')
		);

		$data['mobil'] = $this->mobil_model->get_data('mobil')->result();
		$data['kode'] = $this->mobil_model->CreateCode();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_mobil', $data);
		$this->load->view('templates_admin/footer');

	}

	public function input_aksi(){

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'id_mobil' => $this->input->post('id_mobil', TRUE),
				'plat_mobil' => $this->input->post('plat_mobil', TRUE),
				'status' => $this->input->post('status', TRUE)
			);

			$this->mobil_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Mobil Berhasil Ditambahkan!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
			redirect('admin/mobil');
		}
	}

    public function _rules(){

        // $this->form_validation->set_rules('id_sales', 'Id Sales', 'required', ['required' => 'ID Sales harus diisi!']);
        $this->form_validation->set_rules('plat_mobil', 'Plat Mobil', 'required', ['required' => 'Plat Mobil harus diisi!']);
        $this->form_validation->set_rules('status', 'Status', 'required', ['required' => 'Status harus diisi!']);
    }

    public function update($id){

    	$where = array('id_mobil' => $id);
    	$data['mobil'] = $this->mobil_model->edit_data($where,'mobil')->result();
    	// $data['agency'] = $this->sales_model->get_data('agency')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_mobil', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi(){

    	$id = $this->input->post('id_mobil');
    	$plat_mobil = $this->input->post('plat_mobil');
    	$status = $this->input->post('status');

    	$data = array(
    		'id_mobil' => $id,
    		'plat_mobil' => $plat_mobil,
    		'status' => $status
    	);

    	$where = array(
    		'id_mobil' => $id
    	);

    	$this->mobil_model->update_data($where, $data, 'mobil');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Mobil Berhasil Update!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/mobil');
    }

    public function delete($id){

    	$where = array('id_mobil' => $id);
    	$this->mobil_model->hapus_data($where,'mobil');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Data Mobil Berhasil Dihapus!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/mobil');
    }


}

/* End of file Mobil.php */
/* Location: ./application/controllers/admin/Mobil.php */