<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengembanganSDM extends CI_Controller
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


		//   $id = $this->uri->segment(3, 0);
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PengembanganSDM.php',
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

		$data['sdm'] = $this->Query->getAllData('p_sdm')->result();

		$this->load->view('Template', $data);


	}


	public function Tambah()

	{

		$nik = $this->input->get('np');

		#cek uri


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'TambahDataSDM.php',
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


		$data['kpelatihan'] = $this->Query->getAllData('master_k_pelatihan')->result();

		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['dataK'] = $this->Query->getData(array('nopek' => $nik), 'master_data_karyawan')->row();


		$this->load->view('Template', $data);


	}


	public function Simpan()
	{

		$periode = $this->input->post("periode");
		$noPenugasan = $this->input->post("npenugasan");
		$tPenugasan = $this->input->post("tpenugasan");
		$uraian = $this->input->post("uraian");

		$penyelenggara = $this->input->post("penyelenggara");
		$tMulai = $this->input->post("tmulai");
		$tAkhir = $this->input->post("takhir");

		$TM = date_create($tMulai);
		$TA = date_create($tAkhir);

		$diff = date_diff($TM, $TA);
		$jumlahHari = $diff->format("%d%");

		$lokasi = $this->input->post("lokasi");
		$kPelatihan = $this->input->post("kpelatihan");
		$nopek = $this->input->post("nopek");
		$jPeserta = $this->input->post("jpeserta");
		$mandays = $jumlahHari * $jPeserta;
		$nama = $this->input->post("nama");

		$jabatan = $this->input->post("jabatan");
		$golongan = $this->input->post("golongan");
		$unit = $this->input->post("unit");
		$bKepesertaan = $this->input->post("kepesertaan");

		$bSPPD = $this->input->post("sppd");
		$bTiket = $this->input->post("tiket");
		$bPenginapan = $this->input->post("penginapan");
		$bLain = $this->input->post("lain");
		$dpeserta = $this->input->post("dpeserta");

		$bJumlah = $bSPPD + $bTiket + $bPenginapan + $bLain + $bKepesertaan;


		if ($tMulai > $tAkhir):
			$this->flsh_msg('Gagal', 'warning', 'Tanggal Akhir Penugasan Tidak Benar !');
			redirect($_SERVER['HTTP_REFERER']);

		else:

			if ($jumlahHari == "0"){
				$durasi = "1";
				$mandays = $jPeserta;
			}else{
				$durasi = $jumlahHari;
			}
			$input_data = $this->Query->inputData(array(
				'periode' => $periode,
				'no_tugas' => $noPenugasan,
				't_tugas' => $tPenugasan,
				'uraian' => $uraian,

				'penyelenggara' => $penyelenggara,
				't_mulai' => $tMulai,
				't_akhir' => $tAkhir,
				'jumlah_hari' => $durasi,

				'lokasi' => $lokasi,
				'kode_pelatihan' => $kPelatihan,
				'nopek' => $nopek,
				'j_peserta' => $jPeserta,
				'mandays' => $mandays,

				'b_kepesertaan' => $bKepesertaan,
				'b_sppd' => $bSPPD,
				'b_tiket' => $bTiket,
				'b_kepenginapan' => $bPenginapan,
				'b_lain' => $bLain,
				'b_jumlah' => $bJumlah,
				'dpeserta' => $dpeserta,
				'status' => "Belum Dievaluasi",

				'waktu_input' => date('Y-m-d H:i:s')


			),
				'p_sdm');
			if ($input_data['error']['message'] == null):
				//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

				$this->flsh_msg('Berhasil', 'Gray', 'Data Berhasil Ditambahkan !');
				redirect(base_url('PengembanganSDM'));
			else:
				$this->flsh_msg('Gagal.', 'warning', 'Upload Gagal' . $input_data['error']['message']);
			endif;

		endif;

	}


	public function Januari()
	{

		$nik = $this->input->get('np');
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 1;
		$AG = 'Januari';

		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function Februari()
	{

		$nik = $this->input->get('np');


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 2;
		$AG = 'Februari';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function Maret()
	{

		$nik = $this->input->get('np');


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 3;
		$AG = 'Maret';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function April()
	{

		$nik = $this->input->get('np');


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 4;
		$AG = 'April';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function Mei()
	{

		$nik = $this->input->get('np');


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 5;
		$AG = 'Mei';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function Juni()
	{


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 6;
		$AG = 'Juni';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function Juli()
	{


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 7;
		$AG = 'Juli';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function Agustus()
	{


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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


		$data['nb'] = 8;
		$AG = 'Agustus';
		$data['sdm'] = $this->Query->Periode($AG);
		$data['notif'] = $this->Query->getAllData('v_notif')->row();

		$this->load->view('Template', $data);


	}

	public function September()
	{
		#cek uri


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 9;
		$AG = 'September';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function Oktober()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 10;
		$AG = 'Oktober';
		$data['sdm'] = $this->Query->Periode($AG);

		$this->load->view('Template', $data);
	}

	public function November()
	{

		#cek uri


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 11;
		$AG = 'November';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function Desember()
	{


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 12;
		$AG = 'Desember';
		$data['sdm'] = $this->Query->Periode($AG);


		$this->load->view('Template', $data);


	}

	public function All()
	{

		$nik = $this->input->get('np');


		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDM.php',
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
		$data['nb'] = 0;
		$data['sdm'] = $this->Query->All();


		$this->load->view('Template', $data);


	}


	public function Edit()
	{

		$id = $this->uri->segment(3, 0);
		$decode = base64_decode($id);
		$split = explode('-', $decode);


		// $id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'PeriodeSDMedit.php',
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
		// $data['input'] = $this->Query->getData(array('nopek' => $id), 'master_data_karyawan')->row();

		$data['sdm'] = $this->Query->getAllData('p_sdm')->result();
		$data['kpelatihan'] = $this->Query->getAllData('master_k_pelatihan')->result();
		$data['EditSDM'] = $this->Query->EditSDM($split[0]);


		$this->load->view('Template', $data);


	}


	public function Update()
	{

		$periode = $this->input->post("periode");
		$noPenugasan = $this->input->post("npenugasan");
		$tPenugasan = $this->input->post("tpenugasan");
		$uraian = $this->input->post("uraian");

		$penyelenggara = $this->input->post("penyelenggara");
		$tMulai = $this->input->post("tmulai");
		$tAkhir = $this->input->post("takhir");

		$TM = date_create($tMulai);
		$TA = date_create($tAkhir);

		$diff = date_diff($TM, $TA);
		$jumlahHari = $diff->format("%d%");

		$lokasi = $this->input->post("lokasi");
		$kPelatihan = $this->input->post("kpelatihan");
		$nopek = $this->input->post("nopek");
		$jPeserta = $this->input->post("jpeserta");
		$mandays = $jumlahHari * $jPeserta;
		$nama = $this->input->post("nama");

		$jabatan = $this->input->post("jabatan");
		$golongan = $this->input->post("golongan");
		$unit = $this->input->post("unit");
		$bKepesertaan = $this->input->post("kepesertaan");

		$bSPPD = $this->input->post("sppd");
		$bTiket = $this->input->post("tiket");
		$bPenginapan = $this->input->post("penginapan");
		$bLain = $this->input->post("lain");
		$dpeserta = $this->input->post("dpeserta");

		$id = $this->input->post("id");

		$bJumlah = $bSPPD + $bTiket + $bPenginapan + $bLain + $bKepesertaan;

		$input_data = $this->Query->updateData(array('id_laporan' => $id),
			array(
				'periode' => $periode,
				'no_tugas' => $noPenugasan,
				't_tugas' => $tPenugasan,
				'uraian' => $uraian,

				'penyelenggara' => $penyelenggara,
				't_mulai' => $tMulai,
				't_akhir' => $tAkhir,
				'jumlah_hari' => $jumlahHari,

				'lokasi' => $lokasi,
				'kode_pelatihan' => $kPelatihan,
				'nopek' => $nopek,
				'j_peserta' => $jPeserta,
				'mandays' => $mandays,

				'b_kepesertaan' => $bKepesertaan,
				'b_sppd' => $bSPPD,
				'b_tiket' => $bTiket,
				'b_kepenginapan' => $bPenginapan,
				'b_lain' => $bLain,
				'b_jumlah' => $bJumlah,
				'dpeserta' => $dpeserta,

				'waktu_input' => date('Y-m-d H:i:s')


			),
			'p_sdm');
		if ($input_data['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

			$this->flsh_msg('Berhasil', 'Gray', 'Data Berhasil Di Perbaharui !');
			redirect(base_url('PengembanganSDM'));
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Edit Gagal' . $input_data['error']['message']);
		endif;


	}


	public function Hapus()
	{

		$id = $this->uri->segment(3, 0);
		$decode = base64_decode($id);
		$split = explode('-', $decode);


		$query = $this->Query->delData(array('id_laporan' => $split[0]),
			'p_sdm');

		if ($query):
			$this->flsh_msg('Sukses.', 'ok', 'Data berhasil dihapus');
			redirect($_SERVER['HTTP_REFERER']);

		else:
			$this->flsh_msg('Gagal.', 'warning', 'Data gagal dihapus');
			redirect(base_url());
		endif;


	}

	public function Excel()
	{


		$id = $this->uri->segment(3, 0);
		$decode = base64_decode($id);
		$split = explode('-', $decode);

		$nbln = $split[0];


		if ($nbln == 1) {
			$data['title'] = 'Periode Januari';
			$AG = 'Januari';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 2) {
			$data['title'] = 'Periode Februari';
			$AG = 'Februari';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 3) {
			$data['title'] = 'Periode Maret';
			$AG = 'Maret';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 4) {
			$data['title'] = 'Periode April';
			$AG = 'April';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 5) {
			$data['title'] = 'Periode Mei';
			$AG = 'Mei';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 6) {
			$data['title'] = 'Periode Juni';
			$AG = 'Juni';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 7) {
			$data['title'] = 'Periode Juli';
			$AG = 'Juli';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 8) {
			$data['title'] = 'Periode Agustus';
			$AG = 'Agustus';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 9) {
			$data['title'] = 'Periode September';
			$AG = 'September';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 10) {
			$data['title'] = 'Periode Oktober';
			$AG = 'Oktober';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 11) {
			$data['title'] = 'Periode November';
			$AG = 'November';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 12) {
			$data['title'] = 'Periode Desember';
			$AG = 'Desember';
			$data['sdm'] = $this->Query->Periode($AG);
		} else if ($nbln == 0) {
			$data['title'] = 'Semua Periode';
			$data['sdm'] = $this->Query->All();
		}

		$this->load->view('LaporanSDM', $data);


	}
}
