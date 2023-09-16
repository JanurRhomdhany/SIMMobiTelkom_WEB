<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Kodepinjam extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('kodepinjam_model');
    }

    public function index_get()
    {

        $latestId = $this->kodepinjam_model->getLatestId();

        // Return the latest ID as JSON response
        $response = array('id_peminjaman' => $latestId);
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