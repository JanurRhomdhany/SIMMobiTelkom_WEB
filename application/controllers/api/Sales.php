<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Sales extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function index_get()
    {
        $sales = $this->sales_model->tampil_data()->result();


        if ($sales) {
                        $this->response([
                'sales' => $sales,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
        }
        else{
            $this->response([
                'sales' => FALSE,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
        }
        // $this->response($data, RestController::HTTP_OK);
    }



}