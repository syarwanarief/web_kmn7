<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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



            #cek uri

            $id = $_SESSION['nopek'];
            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'profile.php',
                'is_trview' => false,
                'is_table' => false,
            );
            $data['user'] = array(

                'nik' => $this->nopek,
                'level' => $this->user_level,
                'foto' => $this->foto,
                'inisial' => $this->inisial,
                'status' => $this->status
                // 'level' => $this->jabatan
            );
            $data['edit'] = $this->Query->getData(array('nopek' => $id), 't_login')->row();
        $data['notif'] = $this->Query->getAllData('v_notif')->row();

            $this->load->view('Template', $data);

    }
            //----------------------
    public function update()
    {
#cek jika ada post submit


        $st = 'Belum_Dipublikasikan';

            $nik		= $_SESSION['nopek'];

        $inisial 		= $this -> input -> post("inisial");



        if( $inisial ==''):
            $this->flsh_msg('Gagal','warning','Data tidak lengkap');
            redirect(base_url('profile'));

        else:

            $sqlb = $this->db->query("SELECT inisial FROM t_login where inisial='$inisial'");
            $cek_inisial = $sqlb->num_rows();
            if ($cek_inisial > 0) {

                $this->flsh_msg('Gagal','Gray','INISIAL Sudah Terpakai');
                redirect(base_url('profile'));
            }else {


                $query = $this->Query->updateData(array('nopek' => $nik),
                    array(
                        'nopek' => $nik,

                        'inisial' => $inisial


                    ),
                    't_login');


                if ($query['error']['message'] == null):
                    $verif = $this->Query->getData(array('nopek' => $nik,  'inisial' => $inisial), 't_login')->row();
                    $session = array(
                        'nopek' => $verif->nopek,

                        'user_is_login' => TRUE,
                        'user_level' => $verif->level,
                        'foto' => $verif->foto,
                        'inisial' => $verif->inisial,

                    );
                    $this->session->set_userdata($session);
                    $this->flsh_msg('Berhasil', 'ok', 'Inisial  Berhasil Di Update');
                    redirect(base_url('profile'));
                else:
                    $this->flsh_msg('Gagal.', 'warning', 'Inisial  Gagal Di Update :  ' . $query['error']['message']);
                    redirect(base_url('profile'), 'refresh');
                endif;

            }
        endif;


        }


    public function updatePassword()
    {
        $nik		= $this -> input -> post('nopek');
        $pass 	= md5($this -> input -> post("password"));

        $query = $this->Query->updateData(array('nopek' => $nik),
            array(
                'nopek' => $nik,
                'password' => $pass


            ),
            't_login');
        if ($query['error']['message'] == null):
            $this->flsh_msg('Berhasil', 'ok', 'Password Berhasil Di Update');
            redirect(base_url('profile'));
        else:
            $this->flsh_msg('Gagal.', 'warning', ' Password  Gagal Di Update :  ' . $query['error']['message']);
            redirect(base_url('profile'), 'refresh');
        endif;

    }


    public function do_upload(){
//upload photo
        $nik		= $this -> input -> post('nopek');

        //upload photo
        $config['allowed_types']='png|jpg|jpeg';
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']='fotoProfil/';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('photo');
        $data_image=$this->upload->data('file_name');
        $gambarr =  substr($data_image, -4);

        if(empty($_FILES['photo']['name'])) {
            $this->flsh_msg('GAGAL', 'warning', 'Profil GAGAL Di Update. Harap pilih foto !');
            redirect(base_url('profile'));

        }else{

            if ($gambarr == '.png' or $gambarr == '.jpg' or $gambarr == 'jpeg') {




                $query = $this->Query->updateData(array('nopek' => $nik),
                    array(
                        'nopek' => $nik,
                        'foto' => $data_image

                    ),
                    't_login');


                if ($query['error']['message'] == null):
                    $verif = $this->Query->getData(array('nopek' => $nik, 'foto' => $data_image), 't_login')->row();
                    $session = array(
                        'nopek' => $verif->nopek,
                        'user_is_login' => TRUE,
                        'foto' => $verif->foto
                    );
                    $this->session->set_userdata($session);
                    $this->flsh_msg('Berhasil', 'ok', 'Foto Berhasil Di Update');
                    redirect(base_url('profile'));
                else:
                    $this->flsh_msg('Gagal.', 'warning', 'Foto Gagal Di Update :  ' . $query['error']['message']);
                    redirect(base_url('profile'), 'refresh');
                endif;


            }else{

                $this->flsh_msg('Gagal.', 'warning', 'Upload Gagal ! Pilih Format Yang Benar' );
                redirect($_SERVER['HTTP_REFERER']);
            }

            }




    }
        
}
