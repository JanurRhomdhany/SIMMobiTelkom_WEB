<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function ambil_data($id){

		$this->db->where('username', $id);
		return $this->db->get('login')->row();
	}

	public function getData(){

		return $this->db->get('login');
    
	}

	    public function cekIdUser($idUser){

        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('username', $idUser);
        return $this->db->get()->row_array();
    }

   public function input_data($data){

    	$this->db->insert('login', $data);
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

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */