<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akunsales extends CI_Controller {

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
		$data['akunsales'] = $this->akunsales_model->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/data_akun_sales', $data);
		$this->load->view('templates_admin/footer');
	}

	public function input(){

		$data = array(
			'id_sales' => set_value('id_sales'),
			'nama_sales' => set_value('nama_sales'),
			'id_agency' => set_value('id_agency'),
			'no_telp' => set_value('no_telp')
		);

		// $id_sales = $this->sales_model->cek_id_sales();
		// $nomor = substr($id_sales,3, 4);
		// $idsalesSekarang = $nomor+1;
		// $data = array('id_sales' => $idsalesSekarang);
		// $data['kode'] = $this->sales_model->CreateCode();
		// $data['agency'] = $this->sales_model->get_data('agency')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_akunsales', $data);
		$this->load->view('templates_admin/footer');

	}

	public function input_aksi(){

		$this->_rules();
        $idSales = $this->input->post('id_sales', TRUE);
        $passSales = $this->input->post('password', TRUE);
        
        

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
            $cek_id_sales = $this->akunsales_model->cekIdSales($idSales);
            if ($cek_id_sales > 0) {
                $this->input();
                echo "<script>alert('ID Sudah Terdaftar, Silahkan Gunakan ID Lain');</script>";
            
            
            }else{
                $data = array(
                'id_sales' => $idSales,
                'nama_sales' => $this->input->post('nama_sales', TRUE),
                'id_agency' => $this->input->post('id_agency', TRUE),
                'no_telp' => $this->input->post('no_telp'), TRUE
            );
            $this->sales_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Sales Berhasil Ditambahkan!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
            redirect('admin/akunsales');
            }


		}
	}

    public function _rules(){

        $this->form_validation->set_rules('id_sales', 'Id Sales', 'required', ['required' => 'ID Sales harus diisi!']);
        $this->form_validation->set_rules('nama_sales', 'Nama Sales', 'required', ['required' => 'Nama Sales harus diisi!']);
        $this->form_validation->set_rules('id_agency', 'Id Agency', 'required', ['required' => 'ID Agency harus diisi!']);
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required', ['required' => 'Nomor Telp harus diisi!']);
    }

    public function update($id){

    	$where = array('id_sales' => $id);
    	$data['akunsales'] = $this->sales_model->edit_data($where,'sales')->result();

    	// $data['agency'] = $this->agency_model->get_data('agency')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/update_dataakunsales', $data);
		$this->load->view('templates_admin/footer');
    }

    public function update_aksi(){

    	$id = $this->input->post('id_sales');
    	$password = $this->input->post('password');

    	$data = array(
    		'id_sales' => $id,
    		'password' => md5($password) 
    	);

    	$where = array(
    		'id_sales' => $id
    	);

    	$this->sales_model->update_data($where, $data, 'sales');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data Sales Berhasil Update!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/akunsales');
    }

    public function delete($id){

    	$where = array('id_sales' => $id);
    	$this->sales_model->hapus_data($where,'sales');
    	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Data Sales Berhasil Dihapus!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
    	redirect('admin/akunsales');
    }





}

/* End of file Sales.php */
/* Location: ./application/controllers/admin/Sales.php */