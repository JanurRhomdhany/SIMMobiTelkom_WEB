<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Mobil extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function index_get()
    {
        $mobil = $this->mobil_model->tampil_data()->result();


        if ($mobil) {
                        $this->response([
                'mobil' => $mobil,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
        }
        else{
            $this->response([
                'mobil' => FALSE,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
        }
        // $this->response($data, RestController::HTTP_OK);
    }

}