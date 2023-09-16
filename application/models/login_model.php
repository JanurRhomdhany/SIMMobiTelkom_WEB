<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek_login($username, $password){

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('login');
	}

	public function getLoginData($user, $pass){

		$u = $user;
		$p = MD5($pass);

		$query_cekLogin = $this->db->get_where('login', array('username' => $u, 'password' => $p));

		if (count($query_cekLogin->result()) > 0) {
			foreach ($query_cekLogin as $qck) {
				foreach ($query_cekLogin as $ck) {
					$sess_data['logged_in'] = TRUE;
					$sess_data['username']	= $ck->username;
					$sess_data['password']	= $ck->password;
					$sess_data['akses']	= $ck->akses;
					$this->session->set_userdata($sess_data);
				}
				redirect('admin/dashboard');
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Username atau Password Anda Salah!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
			redirect('auth');
		}
	}

	public function proses_loginSales($idSales, $passSales){

	$this->db->query("SELECT * from sales WHERE id_sales = '$idSales' AND password = '$passSales'");
	return $this->db->affected_rows();
	}

	

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */