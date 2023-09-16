<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kodepinjam_model extends CI_Model {


public function getLatestId(){
	
        $query = $this->db->query("SELECT MAX(id_peminjaman) AS id_peminjaman FROM peminjaman");
        $row = $query->row();
        $latestId = $row->id_peminjaman;
        return $latestId;


}



}
