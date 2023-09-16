<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends CI_Controller {

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
		$data['agency'] = $this->agency_model->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_agency', $data);
		$this->load->view('templates_admin/footer');
	}

	public function input(){

		$data = array(
			'id_agency' => set_value('id_agency'),
			'nama_agency' => set_value('nama_agency')
		);

		$data['agency'] = $this->agency_model->get_data('agency')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_agency', $data);
		$this->load->view('templates_admin/footer');

	}

	public function input_aksi(){


		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'id_agency' => $this->input->post('id_agency', TRUE),
				'nama_agency' => $this->input->post('nama_agency', TRUE)
			);
			
			$this->agency_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Agency Berhasil Ditambahkan!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
			redirect('admin/agency');
		}
	}

				    // $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //                       ID Sudah Terpakai, Gunakan ID Lain
        //                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                         <span aria-hidden="true">&times;</span>
        //                       </button>
        //                     </div>');

    public function _rules(){

        // $this->form_validation->set_rules('id_sales', 'Id Sales', 'required', ['required' => 'ID Sales harus diisi!']);
        $this->form_validation->set_rules('id_agency', 'ID Agency', 'required', ['required' => 'ID Agency harus diisi!']);
        $this->form_validation->set_rules('nama_agency', 'Nama Agency', 'required', ['required' => 'Nama Agency harus diisi!']);
    }

    public function update($id){

    	$where = array('id_agency' => $id);
    	$data['agency'] = $this->agency_model->edit_data($where,'agency')->result();
    	// $data['agency'] = $this->sales_model->get_data('agency')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_agency', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi(){

    	$id = $this->input->post('id_agency');
    	$nama_agency = $this->input->post('nama_agency');

    	$data = array(
    		'id_agency' => $id,
    		'nama_agency' => $nama_agency
    	);

    	$where = array(
    		'id_agency' => $id
    	);

    	$this->agency_model->update_data($where, $data, 'agency');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Agency Berhasil Update!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/agency');
    }

    public function delete($id){

    	$where = array('id_agency' => $id);
    	$this->agency_model->hapus_data($where,'agency');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Data Agency Berhasil Dihapus!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/agency');
    }

}

/* End of file Agency.php */
/* Location: ./application/controllers/admin/Agency.php */