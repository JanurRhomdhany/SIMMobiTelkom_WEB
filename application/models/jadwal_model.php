<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

	
	public function get_data($table){

        return $this->db->get($table);
    }

    public function getDataApi(){
                      $query = "SELECT j.id_mobil, j.id_agency, j.id_lokasi, j.tanggal, m.plat_mobil, a.nama_agency, l.nama_lokasi FROM jadwal as j
                  JOIN mobil as m ON m.id_mobil = j.id_mobil
                  JOIN agency as a ON a.id_agency = j.id_agency
                  JOIN lokasi as l ON l.id_lokasi = j.id_lokasi
                  ORDER BY j.tanggal;
                  ";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getJadwalAPI($tanggal){
        
        $query = "SELECT j.id_mobil, j.id_agency, j.id_lokasi, j.tanggal, m.plat_mobil, j.id_mobil, a.nama_agency, l.nama_lokasi FROM jadwal as j
                  JOIN mobil as m ON m.id_mobil = j.id_mobil
                  JOIN agency as a ON a.id_agency = j.id_agency
                  JOIN lokasi as l ON l.id_lokasi = j.id_lokasi
                  WHERE tanggal = '$tanggal'";

        $result = $this->db->query($query)->result_array();
        return $result;
        
    }

    public function searchJadwalAPI($search){
                $query = "SELECT j.id_mobil, j.id_agency, j.id_lokasi, j.tanggal, m.plat_mobil, j.id_mobil, a.nama_agency, l.nama_lokasi FROM jadwal as j
                  JOIN mobil as m ON m.id_mobil = j.id_mobil
                  JOIN agency as a ON a.id_agency = j.id_agency
                  JOIN lokasi as l ON l.id_lokasi = j.id_lokasi
                  WHERE a.nama_agency LIKE '%$search%' OR
                  j.tanggal LIKE '%$search%' OR
                  l.nama_lokasi LIKE '%$search%' OR
                  m.plat_mobil LIKE '%$search%' OR
                  j.id_mobil LIKE '%$search%'
                  ORDER BY j.tanggal;
                  ";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

	public function tampil_data(){

    $query = "SELECT * FROM jadwal as j
              JOIN mobil as m ON m.id_mobil = j.id_mobil
              JOIN agency as a ON a.id_agency = j.id_agency
              JOIN lokasi as l ON l.id_lokasi = j.id_lokasi
              ORDER BY j.tanggal DESC;";

    return $this->db->query($query);

		// return $this->db->from('jadwal')
		// ->join('mobil', 'mobil.id_mobil = jadwal.id_mobil')
		// ->join('agency', 'agency.id_agency = jadwal.id_agency')
		// ->join('lokasi', 'lokasi.id_lokasi = jadwal.id_lokasi')
  //   ->order_by('tanggal', 'ASC')
  //       ->get();
        
    }


    public function input_data($data){

    	$this->db->insert('jadwal', $data);
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

/* End of file jadwal_model.php */
/* Location: ./application/models/jadwal_model.php */