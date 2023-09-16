<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Pengembalian extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    

    public function index_get()
    {
       $idSales = $this->get('idSales');
       $tanggal = $this->get('tanggal');
        if (empty($idSales) && empty($tanggal)) {
        // Return an error response if ID Sales is empty
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['error' => 'Isi ID Sales']));
        return;


        } else{
            $pengembalian = $this->pengembalian_model->getPengembalianMobil($idSales, $tanggal);

            if ($pengembalian) {
                        $this->response([
                'pengembalian' => $pengembalian,
                'message' => 'Berhasil Tampil'
            ], RestController::HTTP_OK);
            // $this->response($jadwal, RestController::HTTP_OK);
            }
            else{
            $this->response([
                'pengembalian' => null,
                'message' => 'Tidak Ada Data'
            ], RestController::HTTP_NOT_FOUND);
            }
        }

    }

    public function index_post(){

        $id = $this->input->post('id_pengembalian');
        $tanggal = $this->input->post('tanggal');
        $id_sales = $this->input->post('id_sales');
        $id_mobil = $this->input->post('id_mobil');
        $id_lokasi = $this->input->post('id_lokasi');

        $ket_kegiatan = $this->input->post('ket_kegiatan');
        $jam_pengembalian = $this->input->post('jam_pengembalian');
        $status_pengembalian = $this->input->post('status_pengembalian');
        $ket_status = $this->input->post('ket_status');

        $upload_path = './uploads/';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpeg|gif|jpg|png';
        $config['max_size'] = 5120; // ukuran maksimum dalam kilobita
        $this->load->library('upload', $config);

        foreach ($_FILES['bukti_kondisi_mobil']['tmp_name'] as $key => $tmp_name) {
        $_FILES['userfile']['name'] = $_FILES['bukti_kondisi_mobil']['name'][$key];
        $_FILES['userfile']['type'] = $_FILES['bukti_kondisi_mobil']['type'][$key];
        $_FILES['userfile']['tmp_name'] = $_FILES['bukti_kondisi_mobil']['tmp_name'][$key];
        $_FILES['userfile']['error'] = $_FILES['bukti_kondisi_mobil']['error'][$key];
        $_FILES['userfile']['size'] = $_FILES['bukti_kondisi_mobil']['size'][$key];

        if ($this->upload->do_upload('userfile')) {
            $upload_data = $this->upload->data();
            $gambar_names[] = $upload_data['file_name'];
        } else {
            $error = $this->upload->display_errors();
            $this->response(['message' => 'Gagal mengunggah gambar: ' . $error], 500);
            return;
        }
    }        

        $data = array(
            'id_pengembalian' => $id,
            'tanggal' => $tanggal,
            'id_sales' => $id_sales,
            'id_mobil' => $id_mobil,
            'id_lokasi' => $id_lokasi,
            'bukti_kondisi_mobil' => implode(",", $gambar_names),
            'ket_kegiatan' => $ket_kegiatan,
            'jam_pengembalian' => $jam_pengembalian,
            'status_pengembalian' => $status_pengembalian,
            'ket_status' => $ket_status
        );

        if ($this->pengembalian_model->input_data($data) > 0) {
            $this->response([ 
                'status' => true,
                'message' => 'berhasil request pengembalian'
            ], RestController::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'gagal request pengembalian'
            ], RestController::HTTP_BAD_REQUEST);
        }

}

    public function getLatestData(){

        $latestId = $this->pengembalian_model->getLatestId();

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