<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Kodekembali extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('kodekembali_model');
    }

    public function index_get()
    {

        $latestId = $this->kodekembali_model->getLatestId();

        // Return the latest ID as JSON response
        $response = array('id_pengembalian' => $latestId);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    //     $kodePinjam = $this->kodepinjam_model->getLatestData();


    //     if ($kodePinjam) {
    //                     $this->response([
    //             'id_peminjaman' => $kodePinjam
    //         ], RestController::HTTP_OK);
    //         // $this->response($jadwal, RestController::HTTP_OK);
    //     }
    //     else{
    //         $this->response([
    //             'id_peminjaman' => FALSE
    //         ], RestController::HTTP_NOT_FOUND);
    //     }
    // }
    }
}