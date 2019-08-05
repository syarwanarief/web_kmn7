<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditMaster extends CI_Controller
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

            $id = $_SESSION['nopek'];
            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'user/Master.php',
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
            $data['notif'] = $this->Query->getAllData('v_notif')->row();

            $data['bidang'] = $this->Query->getAllData('master_bidang')->result();
            $data['kriteria'] = $this->Query->getAllData('master_kriteria')->result();
            $data['pelatihan'] = $this->Query->getAllData('master_k_pelatihan')->result();
            $data['ur'] = $this->Query->getAllData('master_uraian')->result();

            $data['k'] = $this->Query->getAllData('t_kinerja_tahunan')->result();

            $this->load->view('Template', $data);

    }


    public function Kriteria (){


        $k	= $this -> input -> post("k");
        $idk	= $this -> input -> post("idk");


        if($k ==''):
            $this->flsh_msg('Gagal','warning','Isi  Kriteria');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $query = $this->Query->updateData(array('kode_kriteria' => $idk),
                array(
                    'kriteria' => $k


                ),
                'master_kriteria');


            if ($query['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'Gray', 'Update Kriteria Berhasil!');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Update Kriteria Gagal' . $query['error']['message']);
            endif;


        endif;

    }




    public function Bidang (){


        $b	= $this -> input -> post("b");
        $idb	= $this -> input -> post("idb");


        if($b ==''):
            $this->flsh_msg('Gagal','warning','Isi  Bidang');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $query = $this->Query->updateData(array('kode_bidang' => $idb),
                array(
                    'bidang' => $b


                ),
                'master_bidang');


            if ($query['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'Gray', 'Update Bidang Berhasil!');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Update Bidang Gagal' . $query['error']['message']);
            endif;


        endif;

    }



    public function Pelatihan (){


        $kp	= $this -> input -> post("kp");
        $idkp	= $this -> input -> post("idkp");


        if($kp ==''):
            $this->flsh_msg('Gagal','warning','Isi  Kriteria Pelatihan');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $query = $this->Query->updateData(array('kode_pelatihan' => $idkp),
                array(
                    'k_pelatihan' => $kp


                ),
                'master_k_pelatihan');


            if ($query['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'Gray', 'Update Kriteria Pelatihan Berhasil!');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Update Kriteria Pelatihan Gagal' . $query['error']['message']);
            endif;


        endif;




    }



    public function Uraian (){


        $ur	= $this -> input -> post("ur");
        $idur	= $this -> input -> post("idur");


        if($ur ==''):
            $this->flsh_msg('Gagal','warning','Isi Uraian');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $query = $this->Query->updateData(array('id_uraian' => $idur),
                array(
                    'uraian' => $ur


                ),
                'master_uraian');


            if ($query['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'Gray', 'Update Uraian Berhasil!');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Update Uraian Gagal Gagal' . $query['error']['message']);
            endif;


        endif;




    }

    public  function TambahKriteriaPelatihan (){

		$kp	= $this -> input -> post("tkp");

		$input_data = $this->Query->inputData(array(
			'k_pelatihan' => $kp

		),
			'master_k_pelatihan');

		if ($input_data['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

			$this->flsh_msg('Berhasil', 'ok', 'Kriteria Pelatihan Berhasil  Di Simpan');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;


	}


}
