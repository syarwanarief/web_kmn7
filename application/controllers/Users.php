<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Query');
        date_default_timezone_set('Asia/Jakarta');

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
            case 'Gray':
                $color = '#d2d6de';
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
        #cek login
        if(isset($_SESSION['user_is_login']) and $_SESSION['user_is_login']== true):
            $this -> nopek  = $_SESSION['nik'];

            $this -> user_level    = $_SESSION['user_level'];
            $this -> foto    = $_SESSION['foto'];
            $this -> inisial    = $_SESSION['inisial'];
            $this -> status = $_SESSION['status'];
            $this -> last_sen =$_SESSION['last_sen'];
            redirect(base_url('dashboard'));
        else:
            /*	$this -> flsh_msg('Perhatian!','warning','anda harus login untuk mengakses halaman tersebut');

            $options = array(
                'img_path'=>'./captcha/', #folder captcha yg sudah dibuat tadi
                'img_url'=>base_url('captcha'), #ini arahnya juga ke folder captcha
                'img_width'=>'290', #lebar image captcha
                'img_height'=>'65', #tinggi image captcha
				'font_size'     => 25,
                'word_length'   => 4,
                'expiration'=>7200, #waktu expired
               // 'font_path' => FCPATH . 'assets/font/coolvetica.ttf', #load font jika mau ganti fontnya
                'pool' => 'ASDF', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)

                # atur warna captcha-nya di sini ya.. gunakan kode RGB
                'colors' => array(
                    'background' => array(242, 242, 242),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40))
            );
            $cap = create_captcha($options);
            $data['image'] = $cap['image'];
            $this->session->set_userdata('mycaptcha', $cap['word']);
            $data['word'] = $this->session->userdata('mycaptcha');*/

            $data['help'] = $this->Query->getAllData('kontak')->row();

            $this->load->view('login',$data);
        endif;

	}

    public function ceknama(){
        $u = $this -> input -> post('nopekUser1');
        $verif = $this -> Query -> getData(array('nopek'=>$u),'master_data_karyawan') -> row();
        echo json_encode($verif);

    }


	public function login(){

        $u = $this -> input -> post('nopekUser2');
        $p = md5($this -> input -> post('password'));
        $c = $this -> input -> post('captcha');


        $word = $this->session->userdata('mycaptcha'); #mengambil value captcha


        $mbt1 = $this->db->query("SELECT SUBSTRING(Tgl_MBT, 1, 2) as MBT1 FROM `master_data_karyawan` WHERE nopek = '$u'")->row();
        $mbt2 = $this->db->query("SELECT SUBSTRING(Tgl_MBT, 4, 2) as MBT2 FROM `master_data_karyawan` WHERE nopek = '$u'")->row();
        $mbt3 = $this->db->query("SELECT SUBSTRING(Tgl_MBT, 7, 4) as MBT3 FROM `master_data_karyawan` WHERE nopek = '$u'")->row();

        $mbta = $mbt1-> MBT1 ;
        $mbtb = $mbt2-> MBT2;
        $mbtc = $mbt3-> MBT3 ;

        $mbth2 =  "$mbtc$mbtb$mbta";
        //---------------
        $date = date('Y-m-d H:i:s');

        $thn = substr($date,0, 4);
        $bln = substr($date,5, 2);
        $tg = substr($date,8, 2);


        $tgls = "$thn$bln$tg";



        if (strtoupper($c)==strtoupper($word)) { #proses pencocokan captcha
            #terserah kalian mau diisi apa di sini


            $verif = $this->Query->getData(array('nopek' => $u, 'password' => $p), 't_login')->row();
            if (count($verif) < 1):
                $this->flsh_msg('Perhatian!', 'Gray', 'Login Gagal. Username / Password Salah !');
                redirect(base_url('Users'));
            // echo 'gagal login';
            elseif ($mbth2 <= $tgls):
                $this->flsh_msg('Gagal', 'Gray', 'Anda Sudah Memasuki Masa MBT/Pensiun');
                redirect(base_url('Users'));

            else :

                $query = $this->Query->updateData(array('nopek' => $u),
                    array(
                        'last_sen' => null
                    ),
                    't_login');


                $session = array(
                    'nopek' => $verif->nopek,

                    'user_is_login' => TRUE,
                    'user_level' => $verif->level,
                    'foto' => $verif->foto,
                    'inisial' => $verif->inisial,
                    'status' => $verif->status,
                    'last_sen' => $verif->last_sen
                );


                $this->session->set_userdata($session);
                //   $this -> flsh_msg('Welcome','ok','Selamat datang '.$verif->nama_karyawan);
                redirect(base_url());
                // print_r($session);
            endif;
        }else{

            $this->flsh_msg('Perhatian!', 'Gray', 'Login Gagal. Captcha Salah !');
            redirect(base_url('Users'));
        }

    }

    public function register()
    {
        #cek jika ada post submit
        if(isset($_POST['register-submit'])):
            $nik	    = $this -> input -> post("nopekUser1");
            $nama	    = $this -> input -> post("nama");
            $password 		= md5($this -> input -> post("password1"));
            $inisial	    = $this -> input -> post("inisial");

            #cek apakah nama / username / password kosong
            if($nik=='' or $nama=='' or $password =='' or $inisial==''):
                $this->flsh_msg('Gagal','warning','Data tidak lengkap');
                redirect(base_url('Users'));

            else:



                $c =  $this -> Query -> getData(array('nopek'=>$nik,'nama'=>$nama),'master_data_karyawan') -> row();
                if(count($c) < 1){
                    $this->flsh_msg('Gagal','Gray','NIK / Nama Tidak Terdaftar');
                    redirect(base_url('Users'));
                }else{
//insert db
                    $sql = $this->db->query("SELECT nopek FROM t_login where nopek='$nik'");
                    $sqlb = $this->db->query("SELECT inisial FROM t_login where inisial='$inisial'");
                    $cek_nik = $sql->num_rows();
                    $cek_inisial = $sqlb->num_rows();



                    if ($cek_nik or $cek_inisial > 0) {

                        $this->flsh_msg('Gagal','Gray','NIK / INISIAL  Sudah Terpakai');
                        redirect(base_url('Users'));
                    }else  {


                        $mbt1 = $this->db->query("SELECT SUBSTRING(Tgl_MBT, 1, 2) as MBT1 FROM `master_data_karyawan` WHERE nopek = '$nik'")->row();
                        $mbt2 = $this->db->query("SELECT SUBSTRING(Tgl_MBT, 4, 2) as MBT2 FROM `master_data_karyawan` WHERE nopek = '$nik'")->row();
                        $mbt3 = $this->db->query("SELECT SUBSTRING(Tgl_MBT, 7, 4) as MBT3 FROM `master_data_karyawan` WHERE nopek = '$nik'")->row();

                        $mbta = $mbt1-> MBT1 ;
                        $mbtb = $mbt2-> MBT2;
                        $mbtc = $mbt3-> MBT3 ;

                        $mbth =  "$mbtc$mbtb$mbta";
                        //---------------
                        $date = date('Y-m-d H:i:s');

                        $thn = substr($date,0, 4);
                        $bln = substr($date,5, 2);
                        $tg = substr($date,8, 2);


                        $tgls = "$thn$bln$tg";

                     //   echo  $mbth <$tgls;

                        if($mbth < $tgls){
                            $this->flsh_msg('Gagal', 'Gray', 'Anda Sudah Memasuki Masa MBT/Pensiun');
                            redirect(base_url('Users'));
                        }else {

                            $input_data = $this->Query->inputData(array(
                                'nopek' => $nik,

                                'password' => $password,
                                'level' => User,
                                'foto' => fotoDefault,
                                'inisial' => $inisial,
                                'status' => OFF

                            ),
                                't_login');
                            if ($input_data['error']['message'] == null):
                                //  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

                                $this->flsh_msg('Berhasil', 'Gray', 'Registrasi Berhasil. Silahkan Login !');
                                redirect(base_url('Users'));
                            else:
                                $this->flsh_msg('Gagal.', 'warning', 'Registrasi Gagal' . $input_data['error']['message']);
                            endif;
                        }
                    }
                }
            endif;
        endif;
    }

    public function logout()
    {
        $id = $_SESSION['nopek'];

        $query = $this->Query->updateData(array('nopek' => $id),
            array(
                'last_sen' => null
            ),
            't_login');

        session_destroy();
        redirect(base_url('Users'));
    }

}
