<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {

    public function __construct()
    {
        parent::__construct();


        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Query');

        date_default_timezone_set('Asia/Jakarta');
        $this -> nopek  = $_SESSION['nopek'];

        $this -> level    = $_SESSION['user_level'];
        $this -> foto    = $_SESSION['foto'];
        $this -> inisial    = $_SESSION['inisial'];
        $this -> status =$_SESSION['status'];

        #cek login
        if(isset($_SESSION['user_is_login']) and $_SESSION['user_is_login']== true):
            $this -> nopek  = $_SESSION['nopek'];

            $this -> user_level  = $_SESSION['user_level'];
            $this -> foto  = $_SESSION['foto'];
            $this -> inisial    = $_SESSION['inisial'];
            $this -> status =$_SESSION['status'];

            if($this -> status == 'OFF'):
                redirect(base_url('Disabled'));
            elseif( $this -> user_level !== 'SuperAdmin'):
                redirect(base_url('Dashboard'));

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

        $flash_message = array( 'title' => $title,
            'color' => $color,
            'msg'   => $msg
        );
        $this->session->set_flashdata('message',$flash_message);
    }



    public function index()
    {


                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'resetpassword.php',
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

                $data['table'] = $this->Query->Akun();
        $data['notif'] = $this->Query->getAllData('v_notif')->row();
                $data['help'] = $this->Query->getAllData('kontak')->row();

                $this->load->view('Template', $data);


    }
    //----------------------
    public function detail()
    {


                $id = $this->uri->segment(3, 0);

                $decode = base64_decode($id);
                $split = explode('-', $decode);

                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'detailuser.php',
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

             //   $data['table'] = $this->Query->getAllData('t_login')->result();
                $data['detail'] = $this->Query->AkunDetail($split[0]);
        $data['notif'] = $this->Query->getAllData('v_notif')->row();
                $this->load->view('Template', $data);


    }

    public function edit()
    {
        $nik		= $this -> input -> post('nopek');
        $level		= $this -> input -> post("level");
        $status		= $this -> input -> post("status");



        if($nik=='' or $level=='' or $status ==''):
            $this->flsh_msg('Gagal','warning','Data tidak lengkap');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $query = $this->Query->updateData(array('nopek' => $nik),
                array(
                    'nopek' => $nik,
                    'level' => $level,
                    'status' => $status


                ),
                't_login');


            if ($query['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'Gray', 'Perubahan Berhasil Disimpan!');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Edit Gagal' . $query['error']['message']);
            endif;


        endif;

    }

    public function reset()
    {
        $id = $this->uri->segment(3,0);


        $decode = base64_decode($id);
        $split  = explode('-', $decode);

        $password 		= md5("ptpn7jaya");
        $query = $this->Query->updateData(array('nopek' => $split[0]),
            array(

                'password' => $password


            ),
            't_login');

        if ($query['error']['message'] == null):
            //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

            $this->flsh_msg('Berhasil', 'Gray', 'Reset Berhasil!');
            redirect($_SERVER['HTTP_REFERER']);
        else:
            $this->flsh_msg('Gagal.', 'warning', 'Reset Gagal' . $query['error']['message']);
        endif;

    }


    public function delete()
    {

        $id = $this->uri->segment(3,0);
        $decode = base64_decode($id);
        $split  = explode('-', $decode);


        $query  	= $this -> Query -> delData(array('nopek'=>$split[0]),
            't_login');

        if($query):
            $this->flsh_msg('Sukses.','ok','Akun berhasil dihapus');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $this->flsh_msg('Gagal.','warning','Akun gagal dihapus');
            redirect(base_url());
        endif;


    }


    public function updateKontak()
    {

        $no	= $this -> input -> post("kontak");



        if($no ==''):
            $this->flsh_msg('Gagal','warning','Isi Nomor Kontak');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $query = $this->Query->updateData(array('id' => 1),
                array(
                    'no' => $no,


                ),
                'kontak');


            if ($query['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'Gray', 'Update Kontak Berhasil!');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Update Kontak Gagal' . $query['error']['message']);
            endif;


        endif;


    }



}
