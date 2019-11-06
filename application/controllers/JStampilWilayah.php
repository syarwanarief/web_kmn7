<?php


class JStampilWilayah extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('JStampilWil');
    }
    public function index() {

        $this->load->view('TambahTKperWilayah');
    }

}