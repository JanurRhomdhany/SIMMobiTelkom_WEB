<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

	public function get_data($table){

        return $this->db->get($table);
    }

	public function tampil_data(){

		return $this->db->get('lokasi');
    }

    public function input_data($data){

    	$this->db->insert('lokasi', $data);
    }

    public function edit_data($where, $table){

    	return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table){

    	$this->db->where($where);
    	$this->db->update($table, $data);
    }

	public function hapus_data($where, $table){

		$this->db->where($where);
    	$this->db->delete($table);
	}

    public function CreateCode(){


    $kode = "LK";
    $query = "SELECT MAX(id_lokasi) AS kode_auto FROM lokasi";
    $data = $this->db->query($query)->row_array();
    $max_kode = $data['kode_auto'];
    $max_kode2 = (int) substr($max_kode, 2, 3);
    $kodecount = $max_kode2+1;
    $kode_auto = $kode.sprintf('%03s', $kodecount);

    return $kode_auto;

    }    

}