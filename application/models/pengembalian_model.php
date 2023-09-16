<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends CI_Model {

	public function get_data($table){

        return $this->db->get($table);
    }

        public function getPengembalianMobil($idSales, $tanggal){
        $query = "SELECT pb.id_pengembalian, pb.tanggal, m.plat_mobil, m.id_mobil, ms.nama_sales, ms.id_sales, a.nama_agency, a.id_agency, l.id_lokasi, l.nama_lokasi, pb.bukti_kondisi_mobil, pb.ket_kegiatan, pb.jam_pengembalian, pb.status_pengembalian, pb.ket_status FROM pengembalian AS pb
                 JOIN peminjaman AS pj ON pb.id_peminjaman = pj.id_peminjaman
                 JOIN mobil AS m ON pj.id_mobil = m.id_mobil
                 JOIN master_sales AS ms ON pj.id_sales = ms.id_sales
                 JOIN agency AS a ON ms.id_agency = a.id_agency
                 JOIN lokasi as l ON pj.id_lokasi = l.id_lokasi
                 WHERE pj.id_sales = '$idSales' AND pb.tanggal = '$tanggal'";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

	public function tampil_data(){

        $query = "SELECT pb.id_pengembalian, pj.id_peminjaman, pb.tanggal, ms.nama_sales, a.nama_agency, m.plat_mobil, l.nama_lokasi, pb.bukti_kondisi_mobil, pb.ket_kegiatan, pb.jam_pengembalian, pb.status_pengembalian, pb.ket_status
        FROM pengembalian AS pb
        JOIN peminjaman AS pj ON pb.id_peminjaman = pj.id_peminjaman 
        JOIN master_sales AS ms ON pj.id_sales = ms.id_sales
        JOIN agency AS a ON ms.id_agency = a.id_agency
        JOIN mobil AS m ON pj.id_mobil = m.id_mobil
        JOIN lokasi AS l ON pj.id_lokasi = l.id_lokasi
        ORDER BY pb.tanggal DESC";
        $result = $this->db->query($query);
        return $result;
    }

    public function accept_data($id){

    	$accept = $this->db->query("
    		UPDATE pengembalian 
    		SET status_pengembalian = 'Berhasil',
    			ket_status = 'Mobil Parkir'
    		WHERE id_pengembalian = '$id'");
    	return $accept;
    }

    public function reject_data($id){

    	$reject = $this->db->query("
    		UPDATE pengembalian 
    		SET status_pengembalian = 'Gagal',
    		ket_status = 'Mobil Masih Jalan'
    		WHERE id_pengembalian = '$id'
    		");
    	return $reject;
    }

    public function pending_data($id){

    	$pending = $this->db->query("
    		UPDATE pengembalian 
    		SET status_pengembalian = 'Request',
    		ket_status = 'Mobil Masih Jalan'
    		WHERE id_pengembalian = '$id'
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

    public function req_kembali(){

        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->where('status_pengembalian', 'Request');

        return $this->db->get()->num_rows();

    }

    public function input_data($data){

        $this->db->insert('pengembalian', $data);
        return $this->db->affected_rows();
    } 

    public function hapus_data($where, $table){

        $this->db->where($where);
        $this->db->delete($table);
    }
}

/* End of file pengembalian_model.php */
/* Location: ./application/models/pengembalian_model.php */