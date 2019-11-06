<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class APIdaftar extends REST_Controller
{
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    public function index_get(){
        $nopek = $this->get('nopek');
        $nama = $this->get('nama');
        if ($nopek != ''){
            $this->db->where ('nopek', $nopek);
            $response = $this->db->get('master_data_karyawan')->result();
        }elseif($nama != ''){
            $this->db->where ('nama', $nama);
            $response = $this->db->get('master_data_karyawan')->result();
        }else {
            $response = $this->db->get('master_data_karyawan')->result();
        }
        $this->response($response);
    }

    function index_post(){
        $data = array(
            'nopek'           => $this->post('nopek'),
            'nama'    => ($this->post('nama')),
            'password'    => md5($this->post('password')),
            'level'    => ($this->post('level')),
            'status'    => ($this->post('status')),
            'inisial'        => $this->post('inisial'));
        $insert = $this->db->insert('t_login', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}