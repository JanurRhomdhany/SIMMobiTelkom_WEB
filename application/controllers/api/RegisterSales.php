<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Registersales extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function index_post(){

                $idSales = strip_tags($this->post('id_sales'));
                $passSales = strip_tags($this->post('password'));


        $idCount = $this->registersales_model->getData($idSales);

        if ($idCount > 0) {
            $this->response([
                'status' => false,
                'message' => 'ID Sales Sudah Terdaftar, Silahkan Gunakan ID Lain'
            ], RestController::HTTP_BAD_REQUEST);
        }
        else{

            $data = [
                    'id_sales' => $idSales,
                    'password' => md5($passSales)
                ];
            $register = $this->registersales_model->proses_registerSales($data);

            if ($register) {
                $this->response([
                'status' => true,
                'message' => 'Register Berhasil',
                'registerSales' => $register
            ], RestController::HTTP_OK);
            }
            else{
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        }



    }


}