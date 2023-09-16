<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['user'] = $this->user_model->getData()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_user', $data);
		$this->load->view('templates_admin/footer');
	}

    public function input(){

        $data = array(
            'id_sales' => set_value('id_sales'),
            'nama_sales' => set_value('nama_sales'),
            'id_agency' => set_value('id_agency'),
            'no_telp' => set_value('no_telp')
        );

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_user', $data);
        $this->load->view('templates_admin/footer');

    }

    public function input_aksi(){

        $this->_rules();
        $userName = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        
        

        if ($this->form_validation->run() == FALSE) {
            $this->input();
        }else{
            $cek_id_user = $this->user_model->cekIdUser($userName);
            if ($cek_id_user > 0) {
                $this->input();
                echo "<script>alert('Username Sudah Terdaftar, Silahkan Gunakan Username Lain');</script>";
            
            
            }else{
                $data = array(
                'username' => $userName,
                'password' => md5($password),
                'akses' => $this->input->post('hak_akses', TRUE)
            );
            $this->user_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data User Berhasil Ditambahkan!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
            redirect('admin/user');
            }


        }
    }

    public function _rules(){

        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'ID Sales harus diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Nama Sales harus diisi!']);
        $this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required', ['required' => 'Hak Akses harus diisi!']);
    }

    public function update($id){

        $where = array('username' => $id);
        $data['user'] = $this->user_model->edit_data($where,'login')->result();

        // $data['agency'] = $this->agency_model->get_data('agency')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_aksi(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $akses = $this->input->post('akses');

        $data = array(
            'username' => $username,
            'password' => md5($password),
            'akses' => $akses 
        );

        $where = array(
            'username' => $username
        );

        $this->user_model->update_data($where, $data, 'login');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data User Berhasil Update!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
        redirect('admin/user');
    }

    public function delete($id){

        $where = array('username' => $id);
        $this->user_model->hapus_data($where,'login');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Data User Berhasil Dihapus!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
        redirect('admin/user');
    }


}

/* End of file Agency.php */
/* Location: ./application/controllers/admin/Agency.php */