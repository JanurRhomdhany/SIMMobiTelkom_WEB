<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Jadwal extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('jadwal_model');
    }

    public function dataJadwalTanggal_get(){
        $tanggal = $this->get('tanggal');

        if (empty($tanggal)) {
        // Return an error response if ID Sales is empty
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['error' => 'Isi Tanggal Jadwal']));
        return;


        } else{
            $jadwal = $this->jadwal_model->getJadwalAPI($tanggal);

            if ($jadwal) {
                        $this->response([
                'jadwal' => $jadwal,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
            }
            else{
            $this->response([
                'jadwal' => null,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_get(){
        $search = $this->get('search');
        if (empty($search)) {
        //if the search is empty
            $jadwal = $this->jadwal_model->getDataApi();
            if ($jadwal) {
                $this->response([
                'jadwal' => $jadwal,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            } else{
                $this->response([
                'jadwal' => FALSE,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
            }

        } else{
            $jadwal = $this->jadwal_model->searchJadwalAPI($search);

        if ($jadwal) {
                        $this->response([
                'jadwal' => $jadwal,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
        }
        else{
            $this->response([
                'jadwal' => FALSE,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
        }
        }

        
    }

    // public function index_get()
    // {
    //     // $etTanggal = $this->get('tanggal');
    //     $tanggal = $this->get('tanggal');
    //     if (empty($tanggal)) {
    //     // Return an error response if the date is empty
    //     $this->output
    //         ->set_content_type('application/json')
    //         ->set_output(json_encode(['error' => 'Date is required']));
    //     return;
    //     }

    //     $jadwal = $this->jadwal_model->getJadwalAPI($tanggal);

    //     if ($jadwal) {
    //                     $this->response([
    //             'jadwal' => $jadwal,
    //             'message' => 'Berhasil Tampil'
    //         ], RestController::HTTP_OK);
    //         // $this->response($jadwal, RestController::HTTP_OK);
    //     }
    //     else{
    //         $this->response([
    //             'jadwal' => FALSE,
    //             'message' => 'Tidak Ada Data'
    //         ], RestController::HTTP_NOT_FOUND);
    //     }
    // }
}