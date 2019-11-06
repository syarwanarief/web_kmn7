<?php
class M_wilayah extends CI_Model{

	function get_KatWilayah(){
		$hasil=$this->db->query("SELECT * FROM jumlah_tk_perwilayah");
		return $hasil;
	}

	function get_wilayah($id){
		$hasil=$this->db->query("SELECT * FROM jumlah_tk_perwilayah WHERE id='$id'");
		return $hasil->result();
	}
}