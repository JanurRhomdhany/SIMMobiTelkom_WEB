<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggunaan_model extends CI_Model {

	public function get_data($table){

        return $this->db->get($table);
    }

	public function tampil_data(){

        $query = $this->db->query("
        	SELECT `pengembalian`.`tanggal`, `master_sales`.`nama_sales`, `agency`.`nama_agency`, `mobil`.`plat_mobil`, `lokasi`.`nama_lokasi`, `ket_kegiatan`
			FROM ((((`pengembalian`
			INNER JOIN `peminjaman` ON `pengembalian`.`id_peminjaman` = `peminjaman`.`id_peminjaman`
			INNER JOIN `master_sales` ON `peminjaman`.`id_sales` = `master_sales`.`id_sales`)
			INNER JOIN `agency` ON `master_sales`.`id_agency` = `agency`.`id_agency`)
			INNER JOIN `mobil` ON `peminjaman`.`id_mobil` = `mobil`.`id_mobil`)
			INNER JOIN `lokasi` ON `peminjaman`.`id_lokasi` = `lokasi`.`id_lokasi`)
			WHERE `pengembalian`.`status_pengembalian` = 'Berhasil'
        	ORDER BY `pengembalian`.`tanggal` DESC;");
        
        return $query;
    }
	

}

/* End of file penggunaan_model.php */
/* Location: ./application/models/penggunaan_model.php */