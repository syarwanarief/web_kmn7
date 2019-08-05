<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class CekLaporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Query');

        date_default_timezone_set('Asia/Jakarta');
        $this->nopek = $_SESSION['nopek'];

        $this->level = $_SESSION['user_level'];
        $this->foto = $_SESSION['foto'];
        $this->inisial = $_SESSION['inisial'];
        $this->status = $_SESSION['status'];

        #cek login
        if (isset($_SESSION['user_is_login']) and $_SESSION['user_is_login'] == true):
            $this->nopek = $_SESSION['nopek'];

            $this->user_level = $_SESSION['user_level'];
            $this->foto = $_SESSION['foto'];
            $this->inisial = $_SESSION['inisial'];
            $this->status = $_SESSION['status'];



            if($this -> status == 'OFF'):
                redirect(base_url('Disabled'));
            elseif( $this -> user_level == 'User'):
                redirect(base_url('Dashboard'));

            endif;

        else:
            //	$this -> flsh_msg('Perhatian!','warning','anda harus login untuk mengakses halaman tersebut');
            redirect(base_url('Users'));
        endif;
    }

    public function flsh_msg($title, $type, $msg)
    {
        $color = '';

        switch ($type) {
            case 'ok':
                $color = 'alert-success';
                break;
            case 'warning':
                $color = 'alert-warning';
                break;
            case 'danger':
                $color = 'alert-danger';
                break;
            default:
                $color = 'alert-info';
                break;
        }

        $flash_message = array('title' => $title,
            'color' => $color,
            'msg' => $msg
        );
        $this->session->set_flashdata('message', $flash_message);
    }





    public function index()
    {

            $noTugas		= $this -> input -> get('no_tugas');
            $NopeK 	= $this -> input -> get('nopek');

            //  $decode = base64_decode($id);
            //$split = explode('-', $decode);
           // echo $NopeK;

            $nop = 301;

            $data['web'] = array(

                'page' => 'CekLaporan.php',

            );
            $data['user'] = array(

                'nik' => $this->nopek,
                'level' => $this->user_level,
                'foto' => $this->foto,
                'inisial' => $this->inisial
                // 'level' => $this->jabatan
            );
            // $data['ksq'] = $this->Query->getAllData('user_knowledge_sharing');



                $data['cek'] = $this->Query->CekLaporan($NopeK,$noTugas);
      //  $data['cek2'] = $this->Query->getData(array('nopek' => $NopeK, 'surat_penugasan' =>$noTugas, 'status'=> 'Tidak_Layak'), 'tr_knowledge_management');

            $data['notif'] = $this->Query->getAllData('v_notif')->row();
            $this->load->view('Top', $data);

        }

}