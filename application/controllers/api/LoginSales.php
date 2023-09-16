<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Loginsales extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('loginsales_model');
    }

    public function index_post(){

        $idSales = $this->input->post('id_sales');
        $passSales = $this->input->post('password');
        
        $i = $idSales;
        $p = MD5($passSales);

        $salesLogin = $this->loginsales_model->proses_loginSales($i, $p);

        if ( $salesLogin) {
                $this->response([
                'status' => true,
                'message' => 'Login Berhasil',
                'salesLogin' => $salesLogin
            ], RestController::HTTP_OK);
        }
        else{
                $this->response([
                'status' => false,
                'message' => 'ID atau Password Salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
        
        // $this->form_validation->set_rules('id_sales', 'ID Sales', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');

        // if ($this->form_validation->run()) {
            
        //     $data = array('id_sales' => $idSales, 'password'=> md5($passSales));

        //     $loginSalesStatus = $this->loginsales_model->cekLoginSales($data);
        //     if ($loginSalesStatus != false) {
                
        //         $idSales = $loginSalesStatus->id_sales;
        //         $responseData = array(
        //         'status' => true,
        //         'message' => 'Berhasil Login!');

        //         return $this->response($responseData, RestController::HTTP_OK);
        //     }

        // }
        // else{
        //     $responseData = array(
        //         'status' => false,
        //         'message' => 'ID Sales atau Password Salah!',
        //         'data' => []
        //     );
        //     return $this->response($responseData, RESTController::HTTP_BAD_REQUEST);
        // }
    }

    // public function index_get(){

    //     $sales = $this->loginsales_model->tampil_data()->result();

    //     if ($sales) {
    //                     $this->response([
    //             'sales' => $sales,
    //             'message' => 'Berhasil Tampil'
    //         ], RestController::HTTP_OK);
    //         // $this->response($jadwal, RestController::HTTP_OK);
    //     }
    //     else{
    //         $this->response([
    //             'sales' => FALSE,
    //             'message' => 'Tidak Ada Data'
    //         ], RestController::HTTP_NOT_FOUND);
    //     }
    // }

    // public function index_post()
    // {
        
    //     $idSales = $this->post('id_sales');
    //     $passSales = $this->post('password');

    //     if(!empty($idSales) && !empty($passSales)){
            
    //         // Check if any user exists with the given credentials
    //         $con['conditions'] = array(
    //             'id_sales' => $idSales,
    //             'password' => md5($passSales),
    //             'status' => 1
    //         );

    //         $user = $this->loginsales_model->getRows($con);
            
    //         if($user){
    //             // Set the response and exit
    //             $this->response([
    //                 'status' => TRUE,
    //                 'message' => 'User login successful.',
    //                 'data' => $user
    //             ], REST_Controller::HTTP_OK);
    //         }else{
    //             // Set the response and exit
    //             //BAD_REQUEST (400) being the HTTP response code
    //             $this->response("Wrong email or password.", RESTController::HTTP_BAD_REQUEST);
    //         }
    //     }else{
    //         // Set the response and exit
    //         $this->response("Provide email and password.", RESTController::HTTP_BAD_REQUEST);
    //     }

            // $u = $this->post('username');
            // $p = $this->post('password');

        // if ($this->loginsales_model->proses_loginSales($idSales, $passSales) > 0) {
        //         $this->response([
        //         'status' => '200',
        //         'message' => 'berhasil login',
        //         'idSales' => $idSales
        //     ], RestController::HTTP_CREATED);
        // }
        // else{
        //         $this->response([
        //         'status' => '400',
        //         'message' => 'gagal login'
        //     ], RestController::HTTP_BAD_REQUEST);
        // }

    //}

        

}