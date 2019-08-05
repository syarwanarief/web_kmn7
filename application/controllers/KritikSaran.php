<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KritikSaran extends CI_Controller
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

            $st = 'Belum_Dipublikasikan';
            if ($this->level == 'User') {
                #cek uri


                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'KritikSaran.php',
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


                $data['input'] = $this->Query->getData(array('nopek' => $id), 'master_data_karyawan')->row();


                $data['lima'] = $this->Query->getData(array('star' => 5), 'rating_info_kmn7');
                $data['empat'] = $this->Query->getData(array('star' => 4), 'rating_info_kmn7');
                $data['tiga'] = $this->Query->getData(array('star' => 3), 'rating_info_kmn7');
                $data['dua'] = $this->Query->getData(array('star' => 2), 'rating_info_kmn7');
                $data['satu'] = $this->Query->getData(array('star' => 1), 'rating_info_kmn7');

                $data['TRate'] = $this->Query->totalrate();
                $data['rataRata'] = $this->Query->rata()->row();
                $data['rate'] = $this->Query->countRate($id);


                $this->load->view('Template', $data);



        }else{
                redirect(base_url('Dashboard'));
            }
    }


    public function InputKritik()
    {
        $id = $_SESSION['nopek'];

        $kritik = $this->input->post("kritik");
        $star = $this->input->post("star");

        if ($star == 0){
            $this->flsh_msg('GAGAL', 'warning', 'Harap Beri Rating Bintang/Star.');
            redirect($_SERVER['HTTP_REFERER']);
        }else {

            $input_data = $this->Query->inputData(array(
                'nopek' => $id,
                'kritik' => $kritik,
                'star' => $star,
                'waktu' => date('Y-m-d H:i:s'),
            ),
                'rating_info_kmn7');

            if ($input_data['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'Gray', 'Kritik Dan Saran Anda Telah Kami Terima.');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Harap Ulangi');
            endif;

        }

    }


    public function UpdateKritik()
    {
        $id = $_SESSION['nopek'];

        $kritik = $this->input->post("kritik");
        $star = $this->input->post("star");

        $query = $this->Query->updateData(array('nopek' => $id),
            array(
                'nopek' => $id,
                'kritik' => $kritik,
                'star' => $star,
                'waktu' => date('Y-m-d H:i:s'),

            ),
            'rating_info_kmn7');
        if ($query['error']['message'] == null):
            //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

            $this->flsh_msg('Berhasil', 'Gray', 'Kritik Dan Saran Anda Telah Kami Terima.');
            redirect($_SERVER['HTTP_REFERER']);
        else:
            $this->flsh_msg('Gagal.', 'warning', 'Harap Ulangi');
        endif;


    }





    public function View()
    {

            if ($this->level !== 'User') {
                #cek uri

                // $status -> foto ==  'Belum_Dipublikasikan';
                $st = 'Belum_Dipublikasikan';
                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'ViewKritikSaran.php',
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
                $data['notif'] = $this->Query->getAllData('v_notif')->row();
                $data['lima'] = $this->Query->getData(array('star' => 5), 'rating_info_kmn7');
                $data['empat'] = $this->Query->getData(array('star' => 4), 'rating_info_kmn7');
                $data['tiga'] = $this->Query->getData(array('star' => 3), 'rating_info_kmn7');
                $data['dua'] = $this->Query->getData(array('star' => 2), 'rating_info_kmn7');
                $data['satu'] = $this->Query->getData(array('star' => 1), 'rating_info_kmn7');



                $data['viewrate'] = $this->Query->tampilRate();
                $data['TRate'] = $this->Query->totalrate();
                $data['rataRata'] = $this->Query->rata()->row();


                $this->load->view('Template', $data);


            } else {
                redirect(base_url('dashboard'));


            }



    }



}