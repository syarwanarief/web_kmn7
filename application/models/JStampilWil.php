<?php


class JStampilWil extends CI_Model
{
    function index(){
        $wilayah = $this->input->get('str');
        $query = $this->db->query ("select * from jumlah_tk_perwilayah where wilayah= $wilayah");

        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

}