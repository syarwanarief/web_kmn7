<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JumlahTK extends CI_Controller
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
            'page' => 'ViewJumlahTK.php',
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


        $data['kat'] = $this->Query->getAllData('master_jumlah_tk')->result();
        $data['notif'] = $this->Query->getAllData('v_notif')->row();

        $data['tampil'] = $this->Query->getAllData('jumlah_tenaga_kerja')->result();

        $this->load->view('Template', $data);



    }

    public function tampil()
    {

        $st = 'Belum_Dipublikasikan';
        $id	= $this -> input -> get("kat");
        $pilihan = $id;

        $id = $_SESSION['nopek'];

        if ($pilihan == "MQ==") {
            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'ViewJumlahTotalTK.php',
                'is_trview' => false,
                'is_table' => false,
            );
            $data['tampil'] = $this->Query->getAllData('jumlah_tenaga_kerja')->result();

        }elseif ($pilihan == "Mg=="){
            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'ViewJumlahTKperWilayah.php',
                'is_trview' => false,
                'is_table' => false,
            );
            $data['tampil'] = $this->Query->getAllData('jumlah_tk_perwilayah')->result();

        }elseif ($pilihan == "Mw=="){
            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'ViewJumlahTKperKomoditas.php',
                'is_trview' => false,
                'is_table' => false,
            );
            $data['tampil'] = $this->Query->getAllData('jumlah_tk_perkomoditas')->result();
        }else{
            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'ViewJumlahTK.php',
                'is_trview' => false,
                'is_table' => false,
            );
            $data['kat'] = $this->Query->getAllData('master_jumlah_tk')->result();
            echo "ERROR!<BR> TIDAK DAPAT MENAMPILKAN DATA";
            echo $pilihan;
        }
        $data['user'] = array(
        'nik' => $this->nopek,
        'level' => $this->user_level,
        'foto' => $this->foto,
        'inisial' => $this->inisial
        // 'level' => $this->jabatan
    );
        $data['kat'] = $this->Query->getAllData('master_jumlah_tk')->result();
        $data['notif'] = $this->Query->getAllData('v_notif')->row();
        $this->load->view('Template', $data);



    }

    public function tambah_total()
    {
        $id = $_SESSION['nopek'];
        $data['web'] = array(

            'aktif_menu' => 'profil',
            'page' => 'TambahTenagaKerja.php',
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
        $data['id'] = $this->Query->getAllData('jumlah_tenaga_kerja')->result();
        $data['tampil'] = $this->Query->getAllData('jumlah_tenaga_kerja')->result();
        $this->load->view('Template', $data);

    }


    public function save()
    {
        $idTK = $this->input->post('id_total');
        $tetap_lama = $this->input->post('kar_tetap');
        $t_tetap_lama = $this->input->post('kar_tidak_tetap');
        $TKtetap = $this->input->post('tetap');
        $TKtidak_tetap = $this->input->post('tidak_tetap');
        $tahun = $this->input->post('tahun');

        $jumlah = $this->Query->getAllData('jumlah_tenaga_kerja')->result();

        if ($tetap_lama == null || $t_tetap_lama == null){

            $input_data = $this->Query->inputData(array(
                    'karyawan_tetap' => $TKtetap,
                    'karyawan_tidak_tetap' => $TKtidak_tetap,
                    'tahun' => $tahun,
                ),
                'jumlah_tenaga_kerja');

            if ($input_data['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
            endif;
        }

        if ($tahun != date('Y')) {

            if ($TKtetap == null){
                $tetap = $tetap_lama+0;
                $t_tetap = $t_tetap_lama+$TKtidak_tetap;
            }elseif ($TKtidak_tetap == ""){
                $tetap = $tetap_lama+$TKtetap;
                $t_tetap = $t_tetap_lama+0;
            }else{
                $tetap = $tetap_lama+$TKtetap;
                $t_tetap = $t_tetap_lama+$TKtidak_tetap;
            }

            $input_data = $this->Query->updateData(array('id_jumlah_total' => $idTK),
                array(
                    'karyawan_tetap' => $tetap,
                    'karyawan_tidak_tetap' => $t_tetap,
                    'tahun' => $tahun,
                ),
                'jumlah_tenaga_kerja');

            if ($input_data['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
            endif;

        }elseif($TKtetap || $TKtidak_tetap != ""){

            if ($TKtetap == null){
                $tetap = $tetap_lama+0;
                $t_tetap = $t_tetap_lama+$TKtidak_tetap;
            }elseif ($TKtidak_tetap == ""){
                $tetap = $tetap_lama+$TKtetap;
                $t_tetap = $t_tetap_lama+0;
            }else{
                $tetap = $tetap_lama+$TKtetap;
                $t_tetap = $t_tetap_lama+$TKtidak_tetap;
            }

            $input_data = $this->Query->updateData(array('id_jumlah_total' => $idTK),
                array(
                    'karyawan_tetap' => $tetap,
                    'karyawan_tidak_tetap' => $t_tetap,

                ),
                'jumlah_tenaga_kerja');

            if ($input_data['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
            endif;
        }
    }



    public function ADD()
    {

        $UR = $this->input->post("urn");

        $input_data = $this->Query->inputData(array(
            'uraian' => $UR,



        ),
            'master_uraian');

        if ($input_data['error']['message'] == null):
            //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

            $this->flsh_msg('Berhasil', 'ok', 'Uraian Berhasil  Di Tambahkan');
            redirect($_SERVER['HTTP_REFERER']);
        else:
            $this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
        endif;



    }

    public function Keterangan()
    {
        $id = $this->input->post("id");
        $ket = $this->input->post("keterangan");

        $query = $this->Query->updateData(array('id_uraian' => $id),
            array(
                'keterangan' => $ket

            ),
            'master_uraian');
        if ($query['error']['message'] == null):
            //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

            $this->flsh_msg('Berhasil', 'Gray', 'Keterangan Berhasil Ditambahkan');
            redirect($_SERVER['HTTP_REFERER']);
        else:
            $this->flsh_msg('Gagal.', 'warning', 'Harap Ulangi');
        endif;



    }

    public function Edit()
    {
        $idu = $this->input->post("idUra");
        $thnu = $this->input->post("thUra");



        $id = $_SESSION['nopek'];
        $data['web'] = array(

            'aktif_menu' => 'profil',
            'page' => 'EditKinerjaTahunan.php',
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
        $data['dk'] = $this->Query->getData(array('tahun' => $thnu, 'id_uraian' => $idu), 't_kinerja_tahunan')->row();


        $this->load->view('Template', $data);




    }





    public function SimpanEdit()
    {
        $satuan = $this->input->post("satuan");
        $real = $this->input->post("real2");
        $persen = $this->input->post("persen");
        $rkap = $this->input->post("rkap");

        $id = $this->input->post("idu");
        $tahun = $this->input->post("tahun");

        $ur = base64_encode($id);

        $query = $this->Query->updateData(array('id_uraian' => $id,'tahun' => $tahun),
            array(
                'satuan' => $satuan,
                'real2' => $real,
                'persen' => $persen,
                'rkap' => $rkap


            ),
            't_kinerja_tahunan');
        if ($query['error']['message'] == null):
            //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

            $this->flsh_msg('Berhasil', 'Gray', 'Data Berhasil Di Edit');
            redirect(base_url('KinerjaTahunan/Uraian').'?ur='.$ur);
        else:
            $this->flsh_msg('Gagal.', 'warning', 'Harap Ulangi');
        endif;



    }



    public function HapusDataTahun()
    {

        $idu = $this->input->post("hidUra");
        $thnu = $this->input->post("hthUra");

        $query  	= $this -> Query -> delData(array('tahun'=>$thnu,'id_uraian' => $idu),
            't_kinerja_tahunan');

        if($query):
            $this->flsh_msg('Sukses.','ok','Data berhasil dihapus');
            redirect($_SERVER['HTTP_REFERER']);

        else:
            $this->flsh_msg('Gagal.','warning','Data gagal dihapus');
            redirect(base_url());
        endif;


    }

}

