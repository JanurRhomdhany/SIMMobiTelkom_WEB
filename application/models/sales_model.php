<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

	public function get_data($table){

        return $this->db->get($table);
    }

	public function tampil_data(){

		return $this->db->from('master_sales')
		->join('agency', 'agency.id_agency = master_sales.id_agency')
        ->get();
    }

    // public function ddSales(){
    //     $this->db->select('id_sales, nama_sales');
    //     return $this->db->from('sales')->get();
    // }
    
    public function cekIdSales($idSales){

        $this->db->select('*');
        $this->db->from('master_sales');
        $this->db->where('id_sales', $idSales);
        return $this->db->get()->row_array();
    }

    public function input_data($data){

    	$this->db->insert('master_sales', $data);
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

/* End of file sales_model.php */
/* Location: ./application/models/sales_model.php */