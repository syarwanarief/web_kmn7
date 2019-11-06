<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class API_likeDislike extends REST_Controller
{
	function __construct($config = 'rest') {
		parent::__construct($config);
	}

	function index_post(){

		$data = array(
			'nopek'           => $this->post('nopek'),
			'id'    => ($this->post('id')),
			'rating_action'    => $this->post('rating_action'));

		$insert = $this->db->insert('tr_rating_info', $data);
		if ($insert) {
			$this->response($data);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
	function index_delete() {

		$data = array(
			'nopek' => $this->delete('nopek'),
			'id' => $this->delete('id')
		);
		$delete = $this->db->delete('tr_rating_info', $data);
		if ($delete) {
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'fail', 502));
		}
	}
}
