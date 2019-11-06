<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class APIberanda extends REST_Controller
{
	// constructor
	public function __construct($config = 'rest')
	{
		parent::__construct($config);
	}

	public function index_get()
	{
		$response = $this->db->query("SELECT a.*,b.nama,c.*,d.*,e.* FROM (SELECT * FROM tr_knowledge_management where status='Dipublikasikan')
									as a LEFT JOIN (SELECT nopek,nama FROM master_data_karyawan) as b on a.nopek = b.nopek LEFT JOIN 
									(SELECT * FROM master_kriteria) as c on a.kode_kriteria = c.kode_kriteria LEFT JOIN (SELECT * FROM master_bidang) 
									as d on a.kode_bidang = d.kode_bidang LEFT  JOIN (SELECT * FROM tr_km_admin) as e on a.id=e.id");

		$this->response($response->result());

	}
}
