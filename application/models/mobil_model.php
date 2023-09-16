<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_model extends CI_Model {

	public function get_data($table){

        return $this->db->get($table);
    }

	public function tampil_data(){

		return $this->db->get('mobil');
    }


    public function CreateCode(){

        
    $kode = "MBL";
    $query = "SELECT MAX(id_mobil) AS kode_auto FROM mobil";
    $data = $this->db->query($query)->row_array();
    $max_kode = $data['kode_auto'];
    $max_kode2 = (int) substr($max_kode, 3, 2);
    $kodecount = $max_kode2+1;
    $kode_auto = $kode.sprintf('%02s', $kodecount);

    return $kode_auto;

	}

    public function input_data($data){

    	$this->db->insert('mobil', $data);
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

    public function mobil_tersedia(){

        $this->db->select('*');
        $this->db->from('mobil');
        $this->db->where('status', 'Tersedia');

        return $this->db->get()->num_rows();

    }        	


}

/* End of file mobil_model.php */
/* Location: ./application/models/mobil_model.php */