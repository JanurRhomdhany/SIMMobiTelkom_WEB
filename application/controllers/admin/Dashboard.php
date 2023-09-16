<?php 
/**
 * 
 */
class Dashboard extends CI_Controller
{
	
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

	public function index(){

		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'akses' => $data->akses
		);

		$data['mobil'] = $this->mobil_model->mobil_tersedia();
		$data['peminjaman'] = $this->peminjaman_model->req_pinjam();
		$data['pengembalian'] = $this->pengembalian_model->req_kembali();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}
}

?>