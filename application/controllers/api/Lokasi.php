<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Lokasi extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function index_get()
    {
        $lokasi = $this->lokasi_model->tampil_data()->result();


        if ($lokasi) {
                        $this->response([
                'lokasi' => $lokasi,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
        }
        else{
            $this->response([
                'lokasi' => FALSE,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
        }
        // $this->response($data, RestController::HTTP_OK);
    }

}