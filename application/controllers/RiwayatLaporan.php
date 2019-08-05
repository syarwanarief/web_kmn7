<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatLaporan extends CI_Controller
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

                // $status -> foto ==  'Belum_Dipublikasikan';
                $st = 'Belum_Dipublikasikan';
                $id = $this->uri->segment(3, 0);

                $kriteria = $this->input->post("kriteria");

                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'RiwayatLaporan.php',
                    'is_trview' => false,
                    'is_table' => false,
                );
                $data['user'] = array(

                    'nik' => $this->nopek,
                    'level' => $this->user_level,
                    'foto' => $this->foto,
                    'inisial' => $this->inisial
                    // 'level' => $this->jabatan
                );
                // $data['ksq'] = $this->Query->getAllData('user_knowledge_sharing');
                //   $data['ksdet'] = $this->Query->getData(array('id' => $id), 'user_knowledge_sharing')->row();


                if ($kriteria == '1') {
                    $data['table'] = $this->Query->getData(array('kode_kriteria' => 1),'tr_knowledge_management')->result();
                    $data['kriteria'] = $this->db->query("Select a.*,b.* from (select * from tr_knowledge_management where kode_kriteria = 1 ) as a 
                    left join (select * from master_kriteria) as b on a.kode_kriteria = b.kode_kriteria")->row();
                } else if ($kriteria == '2') {
                    $data['table'] = $this->Query->getData(array('kode_kriteria' => 2),'tr_knowledge_management')->result();
                    $data['kriteria'] = $this->db->query("Select a.*,b.* from (select * from tr_knowledge_management where kode_kriteria = 2 ) as a 
                    left join (select * from master_kriteria) as b on a.kode_kriteria = b.kode_kriteria")->row();
                } else if ($kriteria == '3') {
                    $data['table'] = $this->Query->getData(array('kode_kriteria' => 3),'tr_knowledge_management')->result();
                    $data['kriteria'] = $this->db->query("Select a.*,b.* from (select * from tr_knowledge_management where kode_kriteria = 3 ) as a 
                    left join (select * from master_kriteria) as b on a.kode_kriteria = b.kode_kriteria")->row();
                } else {
                    $data['table'] = $this->Query->getData(array('kode_kriteria' => 4),'tr_knowledge_management')->result();
                    $data['kriteria'] = $this->db->query("Select a.*,b.* from (select * from tr_knowledge_management where kode_kriteria = 4 ) as a 
                    left join (select * from master_kriteria) as b on a.kode_kriteria = b.kode_kriteria")->row();

                }

        $data['notif'] = $this->Query->getAllData('v_notif')->row();
                $this->load->view('Template', $data);



    }

}