<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBerandaAndroid extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Query');

		date_default_timezone_set('Asia/Jakarta');

	}

	public function index()
	{
		$id = $this->uri->segment(3, 0);

		$decode = base64_decode($id);
		$split = explode('-', $decode);

		$data['tampil'] = $this->db->query("select * from tr_knowledge_management")->result();
		$this->load->view('viewBerandaAndroid', $data);
	}

	function getLikeDislike(){
		$id = $this->input->post('id');
		$data['getlike'] = $this->Query->getLike($id);
		$data['getdislike'] = $this->Query->getDisLike($id);
	}

}
