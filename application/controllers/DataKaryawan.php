<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKaryawan extends CI_Controller {

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


        $id		= $this -> input -> get("un");
        $un = base64_decode($id);

            $st = 'Belum_Dipublikasikan';
            if ($this->level !== 'User') {
                #cek uri


                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'DataKaryawan.php',
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


              //  $data['k'] =$this->Query->getAllData('v_master_data_karyawan')->result();
                $data['notif'] = $this->Query->getAllData('v_notif')->row();

                if($un == 'semua'){
                    $data['k'] =$this->Query->getAllData('v_master_data_karyawan')->result();
                }else if ($un == ''){

                    $data['k'] =$this->Query->getAllData('v_master_data_karyawan')->result();
                }else {
                    $data['k'] = $this->Query->getData(array('unit' => $un), 'v_master_data_karyawan')->result();
                }
                $this->load->view('Template', $data);


            } else {
                redirect(base_url('dashboard'));


            }


    }



    public function UpdateKaryawan()
    {
        $nopek=$this->input->post('NOPEK2');
        $sap=$this->input->post('SAP');
        $status=$this->input->post('STATUS');
        $lokunit=$this->input->post('LOKUNIT');
        $unit=$this->input->post('UNIT');
        $strata=$this->input->post('STRATA');
        $gol=$this->input->post('GOL');
        $mkg=$this->input->post('MKG');
        $position=$this->input->post('POSITION');
        $jabatan=$this->input->post('JABATAN');
        $btugas=$this->input->post('BTUGAS');
        $kodecc=$this->input->post('KODECC');
        $cc=$this->input->post('CC');
        $agama=$this->input->post('AGAMA');
        $tctahunan=$this->input->post('TCTAHUNAN');
        $leaving=$this->input->post('LEAVING');
        $tcpanjang=$this->input->post('TCPANJANG');

        //$nop = 2896916287;

        $query = $this->Query->updateData(array('nopek' => $nopek),
            array(

                'No_SAP' => $sap,
                'Status' => $status,
                'Lokasi_Kerja' => $lokunit,
                'unit' => $unit,
                'Strata' => $strata,
                'Gol' => $gol,
                'MKG' => $mkg,
                'Position' => $position,
                'jabatan' => $jabatan,
                'Bidang_Tugas' => $btugas,
                'Kode_CC' => $kodecc,
                'CC' => $cc,
                'Agama' => $agama,
                'Tgl_Cuti_Tahunan' => $tctahunan,
                'Leaving' => $leaving,
                'Tgl_Cuti_Panjang' => $tcpanjang,


            ),
            'master_data_karyawan');
        if ($query['error']['message'] == null):
            //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

            $this->flsh_msg('Berhasil', 'ok', 'Data Berhasil Di Update !');
            redirect($_SERVER['HTTP_REFERER']);
        else:
            $this->flsh_msg('Gagal.', 'warning', 'Gagal' );
        endif;
    }


    public function Delete()
    {

        $id = $this->uri->segment(3,0);
      $decode = base64_decode($id);
      $split  = explode('-', $decode);
       // $nop = 'MzA0';
        //$decode = base64_decode($nop);

        $query  	= $this -> Query -> delData(array('nopek'=>$split[0]),
            'master_data_karyawan');

        if($query):
            $this->flsh_msg('Sukses.','ok','Data berhasil dihapus');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $this->flsh_msg('Gagal.','warning','Data gagal dihapus');
            //redirect(base_url());
        endif;


    }


    public function Ubah()
    {


            if ($this->level == 'SuperAdmin') {
                #cek uri
                $id		= $this -> input -> get("un");
                $un = base64_decode($id);


                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'UbahDataKaryawan.php',
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

                $data['notif'] = $this->Query->getAllData('v_notif')->row();
                if($un == 'semua'){
                    $data['k'] =$this->Query->getAllData('v_master_data_karyawan')->result();
                }else if ($un == ''){

                    $data['k'] =$this->Query->getAllData('v_master_data_karyawan')->result();
                }else {
                    $data['k'] = $this->Query->getData(array('unit' => $un), 'v_master_data_karyawan')->result();
                }

                $this->load->view('Template', $data);


            } else {
                redirect(base_url('dashboard'));


            }
    }


    public function ViewDetail()
    {


        if ($this->level == 'SuperAdmin') {
            #cek uri

            $id = $this->uri->segment(3, 0);


            $decode = base64_decode($id);
            $split = explode('-', $decode);

            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'ViewDetailKaryawan.php',
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

            $data['notif'] = $this->Query->getAllData('v_notif')->row();
            $data['data'] = $this->Query->getData(array('nopek' => $split[0]), 'master_data_karyawan')->row();
            $this->load->view('Template', $data);


        } else {
            redirect(base_url('dashboard'));


        }
    }



    public function Edit()
    {


        if ($this->level == 'SuperAdmin') {
            #cek uri

            $id = $this->uri->segment(3, 0);


            $decode = base64_decode($id);
            $split = explode('-', $decode);

            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'EditKaryawan.php',
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

            $data['notif'] = $this->Query->getAllData('v_notif')->row();
            $data['data'] = $this->Query->getData(array('nopek' => $split[0]), 'master_data_karyawan')->row();
            $this->load->view('Template', $data);


        } else {
            redirect(base_url('dashboard'));


        }
    }

    //----------------------



    //----------------------
    public function detail()
    {


            if ($this->level !== 'User') {
                #cek uri
                $id = $this->uri->segment(3, 0);


                $decode = base64_decode($id);
               $split = explode('-', $decode);

                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'DetailDataKaryawan.php',
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

                $data['notif'] = $this->Query->getAllData('v_notif')->row();

                $data['lihat'] = $this->Query->getData(array('nopek' => $split[0]), 'master_data_karyawan')->row();
                $data['pelatihan'] = $this->Query->Pelatihan($split[0]);

                $this->load->view('Template', $data);

            } else {
                redirect(base_url('dashboard'));


        }

    }




    public function ADD()
    {
        $nopek=$this->input->post('nopek7');
        $nama=$this->input->post('nama7');
        $sap=$this->input->post('sap7');
        $status=$this->input->post('status7');
        $lokunit=$this->input->post('lokunit7');
        $unit=$this->input->post('unit7');
        $strata=$this->input->post('strata7');
        $gol=$this->input->post('gol7');
        $mkg=$this->input->post('mkg7');
        $position=$this->input->post('position7');
        $jabatan=$this->input->post('jabatan7a');

        $btugas=$this->input->post('btugas7');
        $kodecc=$this->input->post('kodecc7');
        $cc=$this->input->post('cc7');
        $darah=$this->input->post('darah7');
        $suku=$this->input->post('suku7');
        $agama=$this->input->post('agama7');
        $jk=$this->input->post('jk7');
        $tctahunan=$this->input->post('tctahunan7');
        $leaving=$this->input->post('leaving7');
        $tcpanjang=$this->input->post('tcpanjang7');
        $tlahir=$this->input->post('lahir7');
        $pensiun=$this->input->post('pensiun7');
        $mbt=$this->input->post('mbt7');
        $tmkerja=$this->input->post('tmkerja7');

        //$nop = 2896916287;

        $query = $this->Query->inputData(array(

                'nopek' => $nopek,
                'No_SAP' => $sap,
                'nama' => $nama,
                'Status' => $status,
                'Lokasi_Kerja' => $lokunit,
                'unit' => $unit,
                'Strata' => $strata,
                'Gol' => $gol,
                'MKG' => $mkg,
                'Position' => $position,
                'jabatan' => $jabatan,

                'Bidang_Tugas' => $btugas,
                'Kode_CC' => $kodecc,
                'CC' => $cc,
                'Gol_Darah' => $darah,
                'Suku' => $suku,
                'Tgl_Lahir' => $tlahir,
                'Agama' => $agama,
                 'Jenis_Kelamin' => $jk,
                'Leaving' => $leaving,
                 'Tgl_Pensiun' => $pensiun,
                'Tgl_Cuti_Tahunan' => $tctahunan,
                'Tgl_Cuti_Panjang' => $tcpanjang,
                'Tgl_MBT' => $mbt,
                'Tgl_Masuk_Kerja' => $tmkerja


            ),
            'master_data_karyawan');
        if ($query['error']['message'] == null):
            //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

            $this->flsh_msg('Berhasil', 'ok', 'Data Berhasil Di Simpan !');
            redirect($_SERVER['HTTP_REFERER']);
        else:
            $this->flsh_msg('Gagal.', 'warning', 'Gagal' );
        endif;
    }


    public function Filter()
    {


        if ($this->level !== 'User') {
            #cek uri
            $id = $this->uri->segment(3, 0);


            $decode = base64_decode($id);
            $split = explode('-', $decode);

            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'Filter1.php',
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

            $data['notif'] = $this->Query->getAllData('v_notif')->row();

            $data['ft'] = $this->Query->getDataSpecifiedGroupBy('unit','unit', 'master_data_karyawan')->result();
            $this->load->view('Template', $data);

        } else {
            redirect(base_url('dashboard'));


        }

    }



    public function FilterKaryawan()
    {


        if ($this->level !== 'User') {
            #cek uri
            $id = $this->uri->segment(3, 0);


            $decode = base64_decode($id);
            $split = explode('-', $decode);

            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'Filter2.php',
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

            $data['notif'] = $this->Query->getAllData('v_notif')->row();

            $data['ft'] = $this->Query->getDataSpecifiedGroupBy('unit','unit', 'master_data_karyawan')->result();
            $this->load->view('Template', $data);

        } else {
            redirect(base_url('dashboard'));


        }

    }



}
