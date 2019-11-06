<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class APIakun extends REST_Controller
{
    public function __construct($config = 'rest'){
        parent::__construct($config);
    }

    public function index_get(){
        $nopek = $this->get('nopek');
        $password = $this->get('password');

        if ($nopek != '' || $password != ''){
            $this->db->where ('nopek', $nopek);
            $response = $this->db->get('t_login')->result();

            //$row = mysqli_fetch_array($response);

            if ($response != ''){
                //$pass = $response->password;
                $this->response($response);
            }else{
                $this->response("pass salah");
            }
        }else {
            $this->response("Terjadi Kesalahan");
        }
    }

}