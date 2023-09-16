<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agency_model extends CI_Model {

	public function get_data($table){

        return $this->db->get($table);

    }

	public function tampil_data(){

		return $this->db->get('agency');
    }

    public function input_data($data){

    	$this->db->insert('agency', $data);
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

}

/* End of file agency_model.php */
/* Location: ./application/models/agency_model.php */