<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiayaTK extends CI_Controller
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

			if ($this->status == 'OFF'):
				redirect(base_url('Disabled'));
			elseif ($this->user_level == 'User'):
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
		$tahun = date('Y');
		$id = $_SESSION['nopek'];

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'ViewBiayaTenagaKerja.php',
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
		$data['tampil'] = $this->db->query("select * from biaya_tenaga_kerja where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from biaya_tenaga_kerja")->result();

		$this->load->view('Template', $data);

	}

	public function tampilBiayaTK()
	{
		$id = $_SESSION['nopek'];
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'ViewBiayaTenagaKerja.php',
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
		$data['tahun'] = $this->db->query("select distinct tahun from biaya_tenaga_kerja")->result();
		$data['tampil'] = $this->db->query("select * from biaya_tenaga_kerja where tahun=$tahun")->result();

		$this->load->view('Template', $data);
	}

	public function tambah_biayaTK()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'TambahBiayaTenagaKerja.php',
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

		$tahun = date('Y');

		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['tampil'] = $this->db->query("select distinct * from biaya_tenaga_kerja")->result();
		$this->load->view('Template', $data);
	}

	public function saveBiayaTK()
	{
		$uraian = $this->input->post('pil');
		$rkap_thn = $this->input->post('rkap_tahun');
		$rkap_sdbi = $this->input->post('rkap_sdbi');
		$realisasi = $this->input->post('realisasi');
		$tahun = $this->input->post('tahun');
		$db_tahun = $this->input->post('thn');

		if ($tahun == $db_tahun) {
			$this->flsh_msg('Info', 'warning', 'Data tidak disimpan, Ubah inputan tahun<br>Tombol <b>"Tambah"</b> hanya dapat menyimpan data baru');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$input_data = $this->Query->inputData(array(
				'uraian' => $uraian,
				'tahun' => $tahun,
				'rkap_tahun' => $rkap_thn,
				'rkap_sdbi' => $rkap_sdbi,
				'realisasi' => $realisasi,
				'edited_by' => $this->nopek,
				'time_edit' => date("Y/m/d H:i:s"),
			),
				'biaya_tenaga_kerja');

			if ($input_data['error']['message'] == null):
				//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

				$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan');
				redirect($_SERVER['HTTP_REFERER']);
			else:
				$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
			endif;
		}
	}

	public function filterBiayaTK()
	{
		$id = $_SESSION['nopek'];
		//$tahun = date('Y');
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditBiayaTK.php',
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

		$tahun = $this->input->get('thn');

		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['tampil'] = $this->db->query("select * from biaya_tenaga_kerja where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from biaya_tenaga_kerja")->result();
		$this->load->view('Template', $data);
	}

	public function editBiayaTK()
	{

		$id = $_SESSION['nopek'];

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditBiayaTK.php',
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

		$tahun = date('Y');

		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['tampil'] = $this->db->query("select * from biaya_tenaga_kerja where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from biaya_tenaga_kerja")->result();
		$this->load->view('Template', $data);
	}

	public function SimpanPerubahanBiayaTK()
	{

		$idKar = $this->input->post('id');
		$id = $_SESSION['nopek'];
		$rkap1 = $this->input->post('rkap1');
		$rkap2 = $this->input->post('rkap2');
		$realisasi = $this->input->post('realisasi');

		$input_data = $this->Query->updateData(array('id' => $idKar),
			array(
				'rkap_tahun' => (int)$rkap1,
				'rkap_sdbi' => (int)$rkap2,
				'realisasi' => (int)$realisasi,
				'edited_by' => $this->nopek,
				'time_edit' => date("Y/m/d H:i:s"),
			),
			'biaya_tenaga_kerja');

		if ($input_data['error']['message'] == null):
			$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Ubah ');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}
}
