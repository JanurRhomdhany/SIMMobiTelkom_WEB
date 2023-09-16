<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registersales_model extends CI_Model {


    public function getData($idSales){

        $this->db->select('*');
        $this->db->from('sales');
        $this->db->where('id_sales', $idSales);
        return $this->db->get()->row_array();
    }

    public function proses_registerSales($data){

        return $this->db->insert('sales', $data);
    }

}

/* End of file agency_model.php */
/* Location: ./application/models/agency_model.php */