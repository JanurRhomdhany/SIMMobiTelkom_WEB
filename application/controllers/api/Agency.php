<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Agency extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('agency_model');
    }

    public function index_get()
    {
        $agency = $this->agency_model->tampil_data()->result();


        if ($agency) {
                        $this->response([
                'agency' => $agency,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
        }
        else{
            $this->response([
                'agency' => FALSE,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
        }
        // $this->response($data, RestController::HTTP_OK);
    }

}