<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M extends CI_Controller
{



    public function DataKaryawan()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Query');

        date_default_timezone_set('Asia/Jakarta');

        //	$this -> flsh_msg('Perhatian!','warning','anda harus login untuk mengakses halaman tersebut');
        $this->load->view('Welcome');

    }


}