<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginsales_model extends CI_Model {

	public function proses_loginSales($idSales, $passSales){

	$query = $this->db->query("SELECT s.id_sales, ms.nama_sales, a.nama_agency, ms.id_agency
								FROM sales AS s
								JOIN master_sales AS ms ON s.id_sales = ms.id_sales
								JOIN agency AS a ON ms.id_agency = a.id_agency 
								WHERE s.id_sales = '$idSales' AND s.password = '$passSales'");
	$row = $query->row();
	return $row;
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */