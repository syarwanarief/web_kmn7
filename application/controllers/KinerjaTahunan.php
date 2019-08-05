<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KinerjaTahunan extends CI_Controller
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
                    'page' => 'KinerjaTahunan.php',
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


                $data['ur'] = $this->Query->getAllData('master_uraian')->result();

                $data['all'] =$this->db->query("SELECT id_uraian from t_kinerja_tahunan GROUP  BY  id_uraian")->result();


                $data['notif'] = $this->Query->getAllData('v_notif')->row();

                $this->load->view('Template', $data);



    }





    public function Uraian()
    {

            $st = 'Belum_Dipublikasikan';
            $id		= $this -> input -> get("ur");
            $ura = base64_decode($id);

            $j = $this->db->query("SELECT tahun from t_kinerja_tahunan where id_uraian = $ura group by tahun");
            $jl = $j -> num_rows();

            $jml = $jl - 5 ;


                #cek uri
                $tn = $this->input->get('tahun');

                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'UraianKinerjaTahunan.php',
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

                $data['table'] = $this->Query->getAllData('t_login')->result();

                $data['ur'] = $this->Query->getAllData('master_uraian')->result();

                $data['all'] =$this->db->query("SELECT id_uraian from master_uraian where id_uraian = $ura")->row();
                $data['kett'] = $this->Query->getData(array('id_uraian' => $ura ), 'master_uraian')->row();

                $data['notif'] = $this->Query->getAllData('v_notif')->row();

                $data['th'] = $this->db->query("SELECT tahun FROM t_kinerja_tahunan WHERE id_uraian = $ura GROUP by tahun")->result();

                if ($jl >= 5) {


                    $data['thn'] = $this->db->query("SELECT tahun FROM t_kinerja_tahunan WHERE id_uraian = $ura GROUP by tahun LIMIT $jml,5")->result();
                    // $data['thn'] =$this->db->query("SELECT tahun FROM `t_kinerja_tahunan` where id_uraian= $ura GROUP by tahun LIMIT 1,5")->result();
                    $data['persen'] = $this->db->query("SELECT persen FROM `t_kinerja_tahunan` where id_uraian= $ura GROUP by tahun LIMIT $jml,5")->result();
                    $data['real'] = $this->db->query("SELECT real2 FROM `t_kinerja_tahunan` where id_uraian= $ura GROUP by tahun LIMIT $jml,5")->result();
                    $data['rkap'] = $this->db->query("SELECT rkap FROM `t_kinerja_tahunan` where id_uraian= $ura GROUP by tahun LIMIT $jml,5")->result();
                    $data['k'] = $this->db->query("SELECT a.*,b.uraian FROM (SELECT  * FROM t_kinerja_tahunan where id_uraian= $ura group by id_uraian) as a left  JOIN (SELECT * FROM master_uraian) as b on a.id_uraian = b.id_uraian")->result();
                    $data['chart'] =json_encode( $this->db->query("SELECT * FROM t_kinerja_tahunan WHERE id_uraian = $ura GROUP by tahun LIMIT $jml,5")->result());


                }else{

                    $data['thn'] =$this->db->query("SELECT tahun FROM `t_kinerja_tahunan` where id_uraian= $ura ORDER by tahun asc LIMIT 5")->result();
                    $data['persen'] =$this->db->query("SELECT persen FROM `t_kinerja_tahunan` where id_uraian= $ura ORDER by tahun asc LIMIT 5")->result();
                    $data['real'] =$this->db->query("SELECT real2 FROM `t_kinerja_tahunan` where id_uraian= $ura ORDER by tahun asc LIMIT 5")->result();
                    $data['rkap'] =$this->db->query("SELECT rkap FROM `t_kinerja_tahunan` where id_uraian= $ura ORDER by tahun asc LIMIT 5")->result();
                    $data['k'] = $this->db->query("SELECT a.*,b.uraian FROM (SELECT  * FROM t_kinerja_tahunan where id_uraian= $ura group by id_uraian) as a left  JOIN (SELECT * FROM master_uraian) as b on a.id_uraian = b.id_uraian")->result();
                    $data['chart'] =json_encode( $this->db->query("SELECT * FROM t_kinerja_tahunan WHERE id_uraian = $ura GROUP by tahun  ORDER by tahun asc LIMIT 5")->result());



                }

                $data['input'] = $this->Query->getData(array('nopek' => $id), 'master_data_karyawan')->row();


                $this->load->view('Template', $data);



    }





    public function RangeTahun()
    {

            $ura	= $this -> input -> post("idUra");


            $j = $this->db->query("SELECT tahun from t_kinerja_tahunan where id_uraian = $ura group by tahun");
            $jl = $j -> num_rows();

            $jml = $jl - 5 ;


                #cek uri
                $tn = $this->input->post('tahun');

                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'UraianKinerjaTahunan.php',
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

                $data['table'] = $this->Query->getAllData('t_login')->result();

                $data['ur'] = $this->Query->getAllData('master_uraian')->result();

                $data['all'] =$this->db->query("SELECT id_uraian from master_uraian where id_uraian = $ura")->row();
                $data['kett'] = $this->Query->getData(array('id_uraian' => $ura ), 'master_uraian')->row();

                $data['notif'] = $this->Query->getAllData('v_notif')->row();

                $data['th'] = $this->db->query("SELECT tahun FROM t_kinerja_tahunan WHERE id_uraian = $ura GROUP by tahun")->result();
                $data['input'] = $this->Query->getData(array('nopek' => $id), 'master_data_karyawan')->row();


                $data['thn'] =$this->db->query("SELECT tahun FROM `t_kinerja_tahunan` where id_uraian= $ura and tahun >= $tn ORDER by tahun asc LIMIT 5")->result();
                $data['persen'] =$this->db->query("SELECT persen FROM `t_kinerja_tahunan` where id_uraian= $ura and tahun >= $tn ORDER by tahun asc LIMIT 5")->result();
                $data['real'] =$this->db->query("SELECT real2 FROM `t_kinerja_tahunan` where id_uraian= $ura and tahun >= $tn ORDER by tahun asc LIMIT 5")->result();
                $data['rkap'] =$this->db->query("SELECT rkap FROM `t_kinerja_tahunan` where id_uraian= $ura and tahun >= $tn ORDER by tahun asc LIMIT 5")->result();
                $data['k'] = $this->db->query("SELECT a.*,b.uraian FROM (SELECT  * FROM t_kinerja_tahunan where id_uraian= $ura and tahun >= $tn group by id_uraian) as a left  JOIN (SELECT * FROM master_uraian) as b on a.id_uraian = b.id_uraian")->result();
                $data['chart'] =json_encode( $this->db->query("SELECT * FROM t_kinerja_tahunan WHERE id_uraian = $ura and tahun >= $tn GROUP by tahun  ORDER by tahun asc LIMIT 5")->result());



                $this->load->view('Template', $data);



    }







    public function Tambah()
    {


                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'TambahKinerjaTahunan.php',
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

                $data['ur'] = $this->Query->getAllData('master_uraian')->result();
                $this->load->view('Template', $data);



    }


    public function Save()
    {
        $idUr = $this->input->post('ur');
        $tahun = $this->input->post("tahun");
        $satuan = $this->input->post('satuan');
        $persen = $this->input->post('persen');
        $rkap = $this->input->post("rkap");
        $real = $this->input->post("real2");

        $verif = $this -> Query -> getData(array('id_uraian'=>$idUr,'tahun'=>$tahun),'t_kinerja_tahunan') -> row();
        if(count($verif) < 1):

        // echo 'gagal login';



            $input_data = $this->Query->inputData(array(
                'id_uraian' => $idUr,
                'satuan' => $satuan,
                'rkap' => $rkap,
                'real2' => $real,
                'persen' => $persen,
                'tahun' => $tahun


            ),
                't_kinerja_tahunan');

            if ($input_data['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan');
                redirect($_SERVER['HTTP_REFERER']);
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
            endif;


        else:
            $this -> flsh_msg('Perhatian!','warning','Simpan Data Gagal, Data Sudah Tersedia !');
            redirect($_SERVER['HTTP_REFERER']);

        endif;

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

