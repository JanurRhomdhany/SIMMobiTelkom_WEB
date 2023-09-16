<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/footer');
        $this->load->view('admin/login');
        
    }


    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates_admin/header');
                $this->load->view('templates_admin/footer');
                $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek = $this->login_model->cek_login($user,$pass);

            if ($cek->num_rows() > 0) {

                    foreach ($cek->result() as $ck) {
                        $sess_data['username'] = $ck->username;
                        $sess_data['akses'] = $ck->akses;

                        $this->session->set_userdata($sess_data);
                    }

                    if ($sess_data['akses'] == 'operator' or $sess_data['akses'] == 'manajer') {
                        redirect('admin/dashboard');
                    }

                    // if ($sess_data['akses'] == 'manajer') {
                    //     redirect('admin/manajer');
                    // }

                    else{
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Username atau Password Anda Salah!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
                        $url = base_url('');
                        redirect($url);
                        // redirect('auth');
                    }
                
                    }else{
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Username atau Password Anda Salah!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>');
                        $url = base_url('');
                        redirect($url);
                            // redirect('auth');
                    }
            }       
        }


        public function logout(){

            $this->session->sess_destroy();
            $url = base_url('');
            redirect($url);
        }


    }

/* End of file Auth.php */
/* Location: ./application/controllers/admin/Auth.php */