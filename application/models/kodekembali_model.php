<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kodekembali_model extends CI_Model {


public function getLatestId(){
	
        $query = $this->db->query("SELECT MAX(id_pengembalian) AS id_pengembalian FROM pengembalian");
        $row = $query->row();
        $latestId = $row->id_pengembalian;
        return $latestId;


}



}