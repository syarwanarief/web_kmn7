<?php
class C_Wilayah extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_wilayah');
	}
	function index(){
		$x['data']=$this->m_kategori->get_kategori();
		$this->load->view('v_kategori',$x);
	}

	function get_subkategori(){
		$id=$this->input->post('id');
		$data=$this->m_wilayah->get_subkategori($id);
		echo json_encode($data);
	}
}