<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanDataKM extends CI_Controller {

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
            elseif( $this -> user_level == 'User'):
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

                // $status -> foto ==  'Belum_Dipublikasikan';
                $st = 'Belum_Dipublikasikan';
                $id = $_SESSION['nopek'];
                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'LaporanMasuk.php',
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
                // $data['ksq'] = $this->Query->getAllData('user_knowledge_sharing');

                $data['bidang'] = $this->Query->getAllData('master_bidang')->result();
                $data['kriteria'] = $this->Query->getAllData('master_kriteria')->result();

                $data['ks'] = $this->Query->getAllData('v_user_knowledge_sharing')->result();
                $data['tk'] = $this->Query->getAllData('v_user_transfer_knowledge')->result();
                $data['ktls'] = $this->Query->getAllData('v_user_karya_tulis')->result();
                $data['pn'] = $this->Query->getAllData('v_user_pengalaman_narasumber')->result();
                $this->load->view('Template', $data);



    }



    //----------------------



    public function KnowledgeSharing()
    {

                // $status -> foto ==  'Belum_Dipublikasikan';
                $st = 'Belum_Dipublikasikan';
                $id = $this->uri->segment(3, 0);

                $decode = base64_decode($id);

                $split = explode('-', $decode);

                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'DetailLaporanKM.php',
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

                $data['ksdet'] = $this->Query->UserKM($split[0]);

        $data['notif'] = $this->Query->getAllData('v_notif')->row();
                $this->load->view('Template', $data);



    }


    public function TransferKnowledge()
    {


                // $status -> foto ==  'Belum_Dipublikasikan';
                $st = 'Belum_Dipublikasikan';
                $id = $this->uri->segment(3, 0);
                $decode = base64_decode($id);

                $split = explode('-', $decode);

                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'DetailLaporanKM.php',
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

                $data['ksdet'] = $this->Query->UserKM($split[0]);

        $data['notif'] = $this->Query->getAllData('v_notif')->row();
                $this->load->view('Template', $data);



    }


    public function KaryaTulis()
    {

                // $status -> foto ==  'Belum_Dipublikasikan';
                $st = 'Belum_Dipublikasikan';
                $id = $this->uri->segment(3, 0);

                $decode = base64_decode($id);

                $split = explode('-', $decode);

                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'DetailLaporanKM.php',
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

                $data['ksdet'] = $this->Query->UserKM($split[0]);

        $data['notif'] = $this->Query->getAllData('v_notif')->row();
                $this->load->view('Template', $data);



    }


    public function PengalamanNarasumber()
    {

                // $status -> foto ==  'Belum_Dipublikasikan';
                $st = 'Belum_Dipublikasikan';
                $id = $this->uri->segment(3, 0);

                $decode = base64_decode($id);

                $split = explode('-', $decode);

                $data['web'] = array(

                    'aktif_menu' => 'profil',
                    'page' => 'DetailLaporanKM.php',
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

                $data['ksdet'] = $this->Query->UserKM($split[0]);

        $data['notif'] = $this->Query->getAllData('v_notif')->row();
                $this->load->view('Template', $data);



    }



    public function Download()
    {
        if ($this->status == 'OFF') {
            //$this->load->view('off');
            redirect(base_url('Disabled'));
        } else {


            if ($this->level == 'SuperAdmin' or $this->level == 'AdminSDM') {
                #cek uri
                $id = $this->input->post('id');
                $kode_kriteria= $this->input->post("kriteria");


                    $get_db = $this->Query->getData(array('id' => $id), 'tr_knowledge_management');
                    $q = $get_db->row_array();
                    $file = $q['file_word'];
                    $path = './LaporanWord/' . $file;
                    $data = file_get_contents($path);
                    $name = $file;
                    force_download($name, $data);




            } else {
                redirect(base_url('dashboard'));


            }

        }
    }



    public function do_upload()
    {

        $idword = $this->input->post('idword');
        $nik = $this->input->post('nopek');
        $nama = $this->input->post("nama");
        $jabatan = $this->input->post('jabatan');
        $unitkerja = $this->input->post('unit');
        $katakunci = $this->input->post("katakunci");
        $bidang = $this->input->post("bidang");
        $kriteria = $this->input->post("kriteria2");
        $judul = $this->input->post("judul");
        $surat = $this->input->post("surat");
        $nopekAdmin  = $_SESSION['nopek'];
        //upload photo
        $config['allowed_types'] = 'pdf';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['upload_path'] = 'LaporanPdf/';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('pdf');
        $data_pdf = $this->upload->data('file_name');

        $pdff =  substr($data_pdf, -3);



            if ($pdff == 'pdf') {

            if ($kriteria == '1' || $kriteria == '2'  and $surat ='' ) {

                    $this->flsh_msg('Gagal', 'warning', 'No Surat Penugasan Wajib Diisi !');
                    redirect(base_url('LaporanDataKM'));
                } else {

                $input_data = $this->Query->inputData(array(

                    'id' => $idword,
                    'file_pdf' => $data_pdf,
                    'waktu_input' => date('Y-m-d H:i:s'),
                    'nopek_admin' => $nopekAdmin
                    //  'status' => Belum_Dipublikasikan

                ),
                    'tr_km_admin');
                if ($input_data['error']['message'] == null):
                    //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                    $query = $this->Query->updateData(array('id' => $idword),
                        array(
                            'status' => Dipublikasikan
                        ),
                        'tr_knowledge_management');


                    if ($query['error']['message'] == null) {
                        $this->flsh_msg('Berhasil', 'Gray', 'Upload Berhasil ! ' . $data_pdf . ' Telah Dipublikasikan');
                        redirect(base_url('LaporanDataKM'));
                    } else {
                        $this->flsh_msg('Gagal.', 'warning', 'Upload File ' . $data_pdf . ' Gagal' . $input_data['error']['message']);

                    }

                else:
                    $this->flsh_msg('Gagal.', 'warning', 'Upload Gagal' . $input_data['error']['message']);
                endif;

            }

            }else{

                $this->flsh_msg('Gagal.', 'warning', 'Upload Gagal ! Pilih Format Yang Benar' );
                redirect($_SERVER['HTTP_REFERER']);
            }



    }



    public function Reject()
    {
        $kriteria	= $this -> input -> post("kriteriaq");
        $id = $this -> input -> post("idq");



            $query = $this->Query->updateData(array('id' => $id),
                array(
                    'status' => Tidak_Layak
                ),
                'tr_knowledge_management');
            if ($query['error']['message'] == null):
                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                $this->flsh_msg('Berhasil', 'Gray', 'Laporan Dimasukan Daftar Tidak Layak !');
                redirect(base_url('LaporanDataKM?page=KnowledgeSharing'));
            else:
                $this->flsh_msg('Gagal.', 'warning', 'Gagal' );
            endif;





    }


}
