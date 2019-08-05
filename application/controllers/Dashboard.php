<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() 
 	{
    	parent::__construct();
		
    	$this->load->helper('url');
    	$this->load->library('session');
    	$this->load->model('Query');
    	$this->load->library('form_validation');
    	$this -> nopek  = $_SESSION['nopek'];
    	$this -> level    = $_SESSION['user_level'];
        $this -> foto    = $_SESSION['foto'];
        $this -> inisial    = $_SESSION['inisial'];
        $this -> status =$_SESSION['status'];
        $this -> last_sen =$_SESSION['last_sen'];


    	#cek login
    	if(isset($_SESSION['user_is_login']) and $_SESSION['user_is_login']== true):
            $this -> nopek  = $_SESSION['nopek'];
            $this -> user_level  = $_SESSION['user_level'];
            $this -> foto  = $_SESSION['foto'];
            $this -> inisial    = $_SESSION['inisial'];
            $this -> status =$_SESSION['status'];
            $this -> last_sen =$_SESSION['last_sen'];

            if($this -> status == 'OFF'):
                redirect(base_url('Disabled'));
                endif;


	    else:
	    //	$this -> flsh_msg('Perhatian!','warning','anda harus login untuk mengakses halaman tersebut');
			redirect(base_url('Users'));
    	endif;
	}

	public function flsh_msg($title,$type,$msg)
	{
		$color = '';

		switch ($type) {
			case 'ok':
				$color = 'callout-success';
				break;
			case 'warning':
				$color = 'callout-warning';
				break;
			case 'danger':
				$color = 'callout-danger';
				break;
			default:
				$color = 'callout-info';
				break;
		}

		$flash_message = array( 'title' => $title,
								'color' => $color,
								'msg'   => $msg
							  );
		$this->session->set_flashdata('message',$flash_message);
	}


	public function index()
	{


		$page = null;
		if($this -> user_level == 'SuperAdmin' or $this -> user_level == 'AdminSDM')
		{

            $page ="user/homeUser.php";
		}
		else
		{
            $page ="user/homeUser.php";
		}
		$data['web'] 	= array(
								// 'aktif_menu' => 'home',
								 'header'	  => 'Beranda',
								 'sub_header' => '',
								 'page'		  => $page,
								 'is_trview'  => false,
								 'is_table'   => false
								);
		$data['user']	= array(
								 'level'	  => $this -> user_level,
                                 'nik'	       => $this -> nopek,
                                 'foto'	       => $this -> foto,
                                 'inisial'    => $this -> inisial,
                              'status'   => $this -> status,
                            'last_sen'   => $this -> last_sen

								);


		$data['breadcrumb'] = array('Beranda');

            $data['notif'] = $this->Query->getAllData('v_notif')->row();
            $data['dashboard'] = $this->Query->getAllData('v_km')->row();

        $this->load->view('Template',$data);
	}


}
