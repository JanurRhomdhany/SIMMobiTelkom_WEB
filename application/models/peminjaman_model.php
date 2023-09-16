<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	public function get_data($table){

        return $this->db->get($table);
    }

    public function getPeminjamanMobil($idSales, $tanggal){
        $query = "SELECT p.id_peminjaman, p.tanggal, m.plat_mobil, m.id_mobil, ms.nama_sales, ms.id_sales, a.nama_agency, a.id_agency, l.id_lokasi, l.nama_lokasi, p.jam_peminjaman, p.status_peminjaman, p.ket FROM peminjaman AS p
                 JOIN mobil AS m ON p.id_mobil = m.id_mobil
                 JOIN master_sales AS ms ON p.id_sales = ms.id_sales
                 JOIN agency AS a ON ms.id_agency = a.id_agency
                 JOIN lokasi as l ON p.id_lokasi = l.id_lokasi
                 WHERE p.id_sales = '$idSales' AND p.tanggal = '$tanggal'";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getPeminjamanIdSales($idSales){
              $query = "SELECT p.id_peminjaman, p.tanggal, m.plat_mobil, m.id_mobil, ms.nama_sales, ms.id_sales, a.nama_agency, a.id_agency, l.id_lokasi, l.nama_lokasi, p.jam_peminjaman, p.status_peminjaman, p.ket FROM peminjaman AS p
                 JOIN mobil AS m ON p.id_mobil = m.id_mobil
                 JOIN master_sales AS ms ON p.id_sales = ms.id_sales
                 JOIN agency AS a ON ms.id_agency = a.id_agency
                 JOIN lokasi as l ON p.id_lokasi = l.id_lokasi
                 WHERE p.id_sales = '$idSales'
                 ORDER BY p.tanggal DESC";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

public function getPeminjamanDariMobil($idMobil, $tanggal){
          $query = "SELECT p.id_peminjaman, p.tanggal, m.plat_mobil, m.id_mobil, ms.nama_sales, ms.id_sales, a.nama_agency, a.id_agency, l.id_lokasi, l.nama_lokasi, p.jam_peminjaman, p.status_peminjaman, p.ket FROM peminjaman AS p
                 JOIN mobil AS m ON p.id_mobil = m.id_mobil
                 JOIN master_sales AS ms ON p.id_sales = ms.id_sales
                 JOIN agency AS a ON ms.id_agency = a.id_agency
                 JOIN lokasi as l ON p.id_lokasi = l.id_lokasi
                 WHERE p.id_mobil = '$idMobil' AND p.tanggal = '$tanggal'";

        $result = $this->db->query($query)->result_array();
        return $result;
}

	public function tampil_data(){

		// return $this->db->from('peminjaman')
		// ->join('mobil', 'peminjaman.id_mobil = mobil.id_mobil')
		// ->join('sales', 'peminjaman.id_sales = sales.id_sales')
		// ->join('agency', 'sales.id_sales = agency.id_agency')
		// ->join('lokasi', 'peminjaman.id_lokasi = lokasi.id_lokasi')
  //       ->get();

        $query = "SELECT p.id_peminjaman, p.tanggal, m.plat_mobil, ms.nama_sales, a.nama_agency, l.nama_lokasi, p.jam_peminjaman, p.status_peminjaman, p.ket FROM peminjaman AS p
                 JOIN mobil AS m ON p.id_mobil = m.id_mobil
                 JOIN master_sales AS ms ON p.id_sales = ms.id_sales
                 JOIN agency AS a ON ms.id_agency = a.id_agency
                 JOIN lokasi as l ON p.id_lokasi = l.id_lokasi
                 ORDER BY p.jam_peminjaman DESC";

        $result = $this->db->query($query);
        return $result;
   //      $query = $this->db->query("
   //      	SELECT `peminjaman`.`id_peminjaman`, `peminjaman`.`tanggal`, `mobil`.`plat_mobil`, `sales`.`nama_sales`, `agency`.`nama_agency`, `lokasi`.`nama_lokasi`, `peminjaman`.`jam_peminjaman`, `peminjaman`.`status_peminjaman`, `peminjaman`.`ket`
			// 	FROM `peminjaman`(((
			// INNER JOIN mobil ON `peminjaman`.`id_mobil` = `mobil`.`id_mobil`
			// INNER JOIN `sales` ON `peminjaman`.`id_sales` = `sales`.`id_sales`
			// INNER JOIN `agency` ON `sales`.`id_agency` = `agency`.`id_agency`
			// INNER JOIN `lokasi` ON `peminjaman`.`id_lokasi` = `lokasi`.`id_lokasi`)))
   //      	ORDER BY 'peminjaman'.'jam_peminjaman'");
   //      return $query;
    }

  //   	public function tampil_data(){

		// return $this->db->from('peminjaman')
		// ->join('mobil', 'peminjaman.id_mobil = mobil.id_mobil')
		// ->join('sales', 'peminjaman.id_sales = sales.id_sales')
		// ->join('lokasi', 'peminjaman.id_lokasi = lokasi.id_lokasi')
  //       ->get();
  //   }


    public function accept_data($id){

    	$accept = $this->db->query("
    		UPDATE peminjaman 
    		SET status_peminjaman = 'Diterima',
    			ket = 'Mobil Jalan'
    		WHERE id_peminjaman = '$id'");
    	return $accept;
    }

    public function reject_data($id){

    	$reject = $this->db->query("
    		UPDATE peminjaman 
    		SET status_peminjaman = 'Ditolak',
    		ket = 'Mobil Parkir'
    		WHERE id_peminjaman = '$id'
    		");
    	return $reject;
    }

    public function pending_data($id){

    	$pending = $this->db->query("
    		UPDATE peminjaman 
    		SET status_peminjaman = 'Request',
    		ket = 'Mobil Parkir'
    		WHERE id_peminjaman = '$id'
    		");
    	return $pending;
    }

    public function edit_data($where, $table){

    	return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table){

    	$this->db->where($where);
    	$this->db->update($table, $data);
    }

    public function req_pinjam(){

        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->where('status_peminjaman', 'Request');

        return $this->db->get()->num_rows();

    }

    public function input_data($data){

        $this->db->insert('peminjaman', $data);
        return $this->db->affected_rows();
    }    

    public function hapus_data($where, $table){

        $this->db->where($where);
        $this->db->delete($table);
    }


}

/* End of file peminjaman_model.php */
/* Location: ./application/models/peminjaman_model.php */