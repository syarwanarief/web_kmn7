<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanUser extends CI_Controller {

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
            $st = 'Belum_Dipublikasikan';
            $id = $_SESSION['nopek'];
            $data['web'] = array(

                'aktif_menu' => 'profil',
                'page' => 'user/InputLaporan.php',
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
            $data['input'] = $this->Query->getData(array('nopek' => $id), 'master_data_karyawan')->row();
        $data['notif'] = $this->Query->getAllData('v_notif')->row();

            $data['bidang'] = $this->Query->getAllData('master_bidang')->result();
            $data['kriteria'] = $this->Query->getAllData('master_kriteria')->result();


            $this->load->view('Template', $data);

    }
    //----------------------
    public function do_upload()
    {

        $nik = $this->input->post('nopek');
        $nama = $this->input->post("nama");
        $jabatan = $this->input->post('jabatan');
        $unitkerja = $this->input->post('unit');
        $katakunci = $this->input->post("katakunci");
        $bidang = $this->input->post("bidang");
        $kriteria = $this->input->post("kriteria");
        $judul = $this->input->post("judul");
        $surat = $this->input->post("surat");

        //upload photo
        $config['allowed_types'] = 'doc|docx';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['upload_path'] = 'LaporanWord/';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('word');
        $data_word = $this->upload->data('file_name');

       $docxx =  substr($data_word, -4);

        if ($nik == '' or $katakunci == '' or $bidang == '' or $kriteria == '' or $judul == '' or empty($_FILES['word']['name']) ):
            $this->flsh_msg('Gagal', 'warning', 'Data tidak lengkap');
            redirect(base_url('LaporanUser'));

        else:

            if ($docxx == '.doc' or $docxx == 'docx') {

                if ($kriteria == '1' || $kriteria == '2' and $surat == '' ) {


                    $this->flsh_msg('Gagal', 'warning', 'Surat Penugasan Harap Diisi');
                    redirect(base_url('LaporanUser'));

                }else{
                        $input_data = $this->Query->inputData(array(
                            'nopek' => $nik,
                            'kata_kunci' => $katakunci,
                            'kode_bidang' => $bidang,
                            'kode_kriteria' => $kriteria,
                            'judul' => $judul,
                            'surat_penugasan' => $surat,
                            'file_word' => $data_word,
                            'waktu_input' => date('Y-m-d H:i:s'),
                            'status' => 'Belum_Dipublikasikan'

                        ),
                            'tr_knowledge_management');

                        if ($input_data['error']['message'] == null):
                            //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                            $this->flsh_msg('Berhasil', 'Gray', 'Upload Berhasil ! Data Akan Tampil Setelah Disetuji Admin');
                            redirect(base_url('LaporanUser'));
                        else:
                            $this->flsh_msg('Gagal.', 'warning', 'Upload Gagal' . $input_data['error']['message']);
                        endif;




                }

            }else{

                $this->flsh_msg('Gagal.', 'warning', 'Upload Gagal ! Pilih Format Yang Benar' );
                redirect(base_url('LaporanUser'));
            }
            endif;

    }





}
