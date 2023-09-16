<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Peminjaman extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('peminjaman_model');
    }

public function mobilPeminjaman_get(){
    $idMobil = $this->get('idMobil');
    $tanggal = $this->get('tanggal');
        if (empty($idMobil) && empty($tanggal)) {
        // Return an error response if ID Sales is empty
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['error' => 'Isi ID Mobil dan tanggal']));
        return;


        } else{
            $peminjaman = $this->peminjaman_model->getPeminjamanDariMobil($idMobil, $tanggal);

            if ($peminjaman) {
                        $this->response([
                'peminjaman' => $peminjaman,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
            }
            else{
            $this->response([
                'peminjaman' => false,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
            }
        }

}

public function dataPeminjamanIdSales_get(){
    $idSales = $this->get('idSales');
        if (empty($idSales)) {
        // Return an error response if ID Sales is empty
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['error' => 'Isi ID Sales']));
        return;


        } else{
            $peminjaman = $this->peminjaman_model->getPeminjamanIdSales($idSales);

            if ($peminjaman) {
                        $this->response([
                'peminjaman' => $peminjaman,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
            }
            else{
            $this->response([
                'peminjaman' => false,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
            }
        }
}

    public function index_get()
    {
        $idSales = $this->get('idSales');
        $tanggal = $this->get('tanggal');
        if (empty($idSales) && empty($tanggal)) {
        // Return an error response if ID Sales is empty
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['error' => 'Isi ID Sales dan Tanggal']));
        return;


        } else{
            $peminjaman = $this->peminjaman_model->getPeminjamanMobil($idSales, $tanggal);

            if ($peminjaman) {
                        $this->response([
                'peminjaman' => $peminjaman,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
            }
            else{
            $this->response([
                'peminjaman' => false,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
            }
        }

        

    }

    public function index_post(){

        $data = [
                'id_peminjaman' => $this->post('id_peminjaman'),
                'tanggal' => $this->post('tanggal'),
                'id_sales' => $this->post('id_sales'),
                'id_mobil' => $this->post('id_mobil'),
                'id_lokasi' => $this->post('id_lokasi'),
                'jam_peminjaman' => $this->post('jam_peminjaman'),
                'status_peminjaman' => $this->post('status_peminjaman'),
                'ket' => $this->post('ket')
        ];

        if ($this->peminjaman_model->input_data($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'berhasil input request peminjaman'
            ], RestController::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'gagal input request peminjaman'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function getLatestData(){

        $latestId = $this->peminjaman_model->getLatestId();

        if ($latestId > 0) {
                $this->response([
                'latest_id' => $latest_id,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
        }
        else{
            $this->response([
                'latest_id' => false,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
        }


    }
}