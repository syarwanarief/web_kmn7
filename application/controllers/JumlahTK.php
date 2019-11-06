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

		$this->load->view('Template', $data);

	}

	public function tampil()
	{

		$st = 'Belum_Dipublikasikan';
		$id = $this->input->get("kat");
		$pilihan = $id;
		$tahun = date('Y');

		$id = $_SESSION['nopek'];

		if ($pilihan == "MQ==") {
			$data['web'] = array(

				'aktif_menu' => 'profil',
				'page' => 'ViewJumlahTotalTK.php',
				'is_trview' => false,
				'is_table' => false,
			);
			$data['tampil'] = $this->db->query("select * from jumlah_tenaga_kerja where tahun=$tahun")->result();
			$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tenaga_kerja")->result();

		} elseif ($pilihan == "Mg==") {
			$data['web'] = array(

				'aktif_menu' => 'profil',
				'page' => 'ViewJumlahTKperWilayah.php',
				'is_trview' => false,
				'is_table' => false,
			);
			$data['tampil'] = $this->db->query("select * from jumlah_tk_perwilayah where tahun=$tahun")->result();
			$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perwilayah")->result();
			$data['pilih'] = $this->db->query("select wilayah from jumlah_tk_perwilayah")->result();

		} elseif ($pilihan == "Mw==") {
			$data['web'] = array(

				'aktif_menu' => 'profil',
				'page' => 'ViewJumlahTKperKomoditas.php',
				'is_trview' => false,
				'is_table' => false,
			);
			$data['tampil'] = $this->db->query("select * from jumlah_tk_perkomoditas where tahun=$tahun")->result();
			$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perkomoditas")->result();

		} elseif ($pilihan == "NA==") {
			$data['web'] = array(

				'aktif_menu' => 'profil',
				'page' => 'ViewJumlahTKperUnitKerja.php',
				'is_trview' => false,
				'is_table' => false,
			);
			$data['tampil'] = $this->db->query("select * from jumlah_tk_perunit where tahun=$tahun")->result();
			$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perunit")->result();

		} else {
			$data['web'] = array(

				'aktif_menu' => 'profil',
				'page' => 'ViewJumlahTK.php',
				'is_trview' => false,
				'is_table' => false,
			);
			$data['kat'] = $this->Query->getAllData('master_jumlah_tk')->result();
			echo "ERROR!<BR> TIDAK DAPAT MENAMPILKAN DATA ";
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

	function filterTotalTK()
	{
		$tahun = $this->input->get('thn');

		$data['user'] = array(
			'nik' => $this->nopek,
			'level' => $this->user_level,
			'foto' => $this->foto,
			'inisial' => $this->inisial
			// 'level' => $this->jabatan
		);

		if ($tahun == "5tahun") {

			$data['web'] = array(

				'aktif_menu' => 'profil',
				'page' => 'ViewTotalTK5tahun.php',
				'is_trview' => false,
				'is_table' => false,
			);

			$thnAkhir = date('Y');
			$thnAwal = $thnAkhir - 4;
			$data['notif'] = $this->Query->getAllData('v_notif')->row();
			$data['tampil'] = $this->db->query("select * from jumlah_tenaga_kerja where tahun between $thnAwal and $thnAkhir")->result();
			$data['thn'] = $this->db->query("select distinct tahun from jumlah_tenaga_kerja where tahun between $thnAwal and $thnAkhir ORDER BY tahun asc ")->result();
			$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tenaga_kerja")->result();

		} else {

			$data['web'] = array(

				'aktif_menu' => 'profil',
				'page' => 'ViewJumlahTotalTK.php',
				'is_trview' => false,
				'is_table' => false,
			);
			$data['notif'] = $this->Query->getAllData('v_notif')->row();
			$data['tampil'] = $this->db->query("select * from jumlah_tenaga_kerja where tahun=$tahun")->result();
			$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tenaga_kerja")->result();

		}
		$this->load->view('Template', $data);
	}

	function filterTKwilayah()
	{
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'ViewJumlahTKperWilayah.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perwilayah where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perwilayah")->result();
		$this->load->view('Template', $data);
	}

	function filterTKkomoditas()
	{
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'ViewJumlahTKperKomoditas.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perkomoditas where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perkomoditas")->result();
		$this->load->view('Template', $data);
	}

	function filterTKunit()
	{
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'ViewJumlahTKperUnitKerja.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perunit where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perunit")->result();
		$this->load->view('Template', $data);
	}

	function filterEditTotalTK()
	{
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditTenagaKerjaTotal.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tenaga_kerja where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tenaga_kerja")->result();
		$this->load->view('Template', $data);
	}

	function filterEditTKwilayah()
	{
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditTKperWilayah.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perwilayah where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perwilayah")->result();
		$this->load->view('Template', $data);
	}

	function filterEditTKkomoditas()
	{
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditTKperKomoditas.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perkomoditas where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perkomoditas")->result();
		$this->load->view('Template', $data);
	}

	function filterEditTKunit()
	{
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditTKperUnit.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perunit where tahun=$tahun")->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perunit")->result();
		$this->load->view('Template', $data);
	}

	public function tambah_total()
	{
		$id = $_SESSION['nopek'];
		$tahun = $this->input->get('tahun');

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
		if ($tahun != null) {
			$data['tampil'] = $this->db->query("select * from jumlah_tenaga_kerja where tahun=$tahun")->result();
		} else {
			$tahun = date('Y');
			$data['tampil'] = $this->db->query("select * from jumlah_tenaga_kerja where tahun=$tahun")->result();
		}
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tenaga_kerja")->result();
		$this->load->view('Template', $data);

	}

	public function tambah_perWilayah()
	{
		$id = $_SESSION['nopek'];
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'TambahTKperWilayah.php',
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
		$data['tampil'] = $this->Query->getAllData('jumlah_tk_perwilayah')->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perwilayah")->result();
		$this->load->view('Template', $data);

	}

	public function tambah_perKomoditas()
	{
		$id = $_SESSION['nopek'];
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'TambahTKperKomoditas.php',
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
		$data['tampil'] = $this->Query->getAllData('jumlah_tk_perkomoditas')->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perkomoditas")->result();
		$this->load->view('Template', $data);

	}

	public function tambah_perUnitKerja()
	{
		$id = $_SESSION['nopek'];
		$tahun = $this->input->get('thn');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'TambahTKperUnitKerja.php',
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
		$data['tampil'] = $this->Query->getAllData('jumlah_tk_perunit')->result();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perunit")->result();
		$this->load->view('Template', $data);

	}

	public function saveTkTotal()
	{
		$idTK = $this->input->post('id_total');
		$tetap_lama = $this->input->post('kar_tetap');
		$t_tetap_lama = $this->input->post('kar_tidak_tetap');
		$TKtetap = $this->input->post('tetap');
		$TKtidak_tetap = $this->input->post('tidak_tetap');
		$tahun = $this->input->post('tahun');
		$db_tahun = $this->input->post('thn');

		if ($tahun == $db_tahun) {
			$this->flsh_msg('Info', 'warning', 'Data tidak disimpan, Ubah inputan tahun<br>Tombol <b>"Tambah"</b> hanya dapat menyimpan data baru');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$input_data = $this->Query->inputData(array(
				'karyawan_tetap' => $TKtetap,
				'karyawan_tidak_tetap' => $TKtidak_tetap,
				'tahun' => $tahun,
				'edited_by' => $this->nopek,
				'time_edit' => date("Y/m/d H:i:s"),
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

	public function saveTkPerWilayah()
	{
		$wil = $this->input->post('pil');
		$idTK = $this->input->post('id_total');
		$tetap_lama = $this->input->post('kar_tetap');
		$t_tetap_lama = $this->input->post('kar_tidak_tetap');
		$TKtetap = $this->input->post('tetap');
		$TKtidak_tetap = $this->input->post('tidak_tetap');
		$tahun = $this->input->post('tahun');
		$db_tahun = date('Y');

		if ($tahun == $db_tahun) {
			$this->flsh_msg('Info', 'warning', 'Data tidak disimpan, Ubah inputan tahun<br>Tombol <b>"Tambah"</b> hanya dapat menyimpan data baru');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$input_data = $this->Query->inputData(
				array(
					'wilayah' => $wil,
					'karyawan_tetap' => $TKtetap,
					'karyawan_tidak_tetap' => $TKtidak_tetap,
					'tahun' => $tahun,
					'edited_by' => $this->nopek,
					'time_edit' => date("Y/m/d H:i:s"),
				),
				'jumlah_tk_perwilayah');

			if ($input_data['error']['message'] == null):
				//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

				$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan ');
				redirect($_SERVER['HTTP_REFERER']);
			else:
				$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
			endif;
		}
	}

	public function saveTkPerKomoditas()
	{
		$wil = $this->input->post('pil');

		$idTK = $this->input->post('id_total');
		$tetap_lama = $this->input->post('kar_tetap');
		$t_tetap_lama = $this->input->post('kar_tidak_tetap');
		$TKtetap = $this->input->post('tetap');
		$TKtidak_tetap = $this->input->post('tidak_tetap');
		$tahun = $this->input->post('tahun');
		$db_tahun = date('Y');

		if ($tahun == $db_tahun) {
			$this->flsh_msg('Info', 'warning', 'Data tidak disimpan, Ubah inputan tahun<br>Tombol <b>"Tambah"</b> hanya dapat menyimpan data baru');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$input_data = $this->Query->inputData(
				array(
					'komoditas' => $wil,
					'karyawan_tetap' => $TKtetap,
					'karyawan_tidak_tetap' => $TKtidak_tetap,
					'tahun' => $tahun,
					'edited_by' => $this->nopek,
					'time_edit' => date("Y/m/d H:i:s"),
				),
				'jumlah_tk_perkomoditas');

			if ($input_data['error']['message'] == null):
				//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

				$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan ');
				redirect($_SERVER['HTTP_REFERER']);
			else:
				$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
			endif;
		}
	}

	public function saveTkPerUnit()
	{
		$unit = $this->input->post('pil');

		$idTK = $this->input->post('id_total');
		$tetap_lama = $this->input->post('kar_tetap');
		$t_tetap_lama = $this->input->post('kar_tidak_tetap');
		$TKtetap = $this->input->post('tetap');
		$honor = $this->input->post('honor');
		$ILA = $this->input->post('ila');
		$OS = $this->input->post('os');
		$kamp = $this->input->post('kamp');
		$biaya = $this->input->post('biaya');
		$tahun = $this->input->post('tahun');
		$db_tahun = date('Y');

		if ($tahun == $db_tahun) {
			$this->flsh_msg('Info', 'warning', 'Data tidak disimpan, Ubah inputan tahun<br>Tombol <b>"Tambah"</b> hanya dapat menyimpan data baru');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$input_data = $this->Query->inputData(
				array(
					'unit' => $unit,
					'karyawan_tetap' => $TKtetap,
					'tahun' => $tahun,
					'karyawan_honor' => $honor,
					'ILA' => $ILA,
					'OS' => $OS,
					'Kamp' => $kamp,
					'Biaya' => $biaya,
					'edited_by' => $this->nopek,
					'time_edit' => date("Y/m/d H:i:s"),
				),
				'jumlah_tk_perunit');

			if ($input_data['error']['message'] == null):
				//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

				$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan ');
				redirect($_SERVER['HTTP_REFERER']);
			else:
				$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
			endif;
		}
	}

	function loadPilihanWilayah()
	{
		$wilayah = $this->input->post('wilayah');
		$data = $this->Query->get_wilayah($wilayah);
		echo json_encode($data);
	}

	function loadPilihanKomoditas()
	{
		$komoditas = $this->input->post('komoditas');
		$data = $this->Query->get_komoditas($komoditas);
		echo json_encode($data);
	}

	function loadPilihanUnit()
	{
		$unit = $this->input->post('unit');
		$data = $this->Query->get_unit($unit);
		echo json_encode($data);
	}

	function editTKtotal()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditTenagaKerjaTotal.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tenaga_kerja where tahun=$tahun")->result();
		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tenaga_kerja")->result();

		$this->load->view('Template', $data);
	}

	function editTKperWilayah()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditTKperWilayah.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perwilayah where tahun=$tahun")->result();
		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perwilayah")->result();

		$this->load->view('Template', $data);
	}

	function editTKperKomoditas()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditTKperKomoditas.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perkomoditas where tahun=$tahun")->result();
		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perkomoditas")->result();

		$this->load->view('Template', $data);
	}

	function editTKperUnit()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'EditTKperUnit.php',
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
		$data['tampil'] = $this->db->query("select * from jumlah_tk_perunit where tahun=$tahun")->result();
		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['tahun'] = $this->db->query("select distinct tahun from jumlah_tk_perunit")->result();

		$this->load->view('Template', $data);
	}

	function SimpanPerubahanTotalTK()
	{
		$idKar = $this->input->post('id');
		$karyawan_tetap = $this->input->post('tetap');
		$karyawan_tidak_tetap = $this->input->post('tidak_tetap');
		$id = $_SESSION['nopek'];

		$input_data = $this->Query->updateData(array('id' => $idKar),
			array(
				'karyawan_tetap' => (int)$karyawan_tetap,
				'karyawan_tidak_tetap' => (int)$karyawan_tidak_tetap,
				'edited_by' => $this->nopek,
				'time_edit' => date("Y/m/d H:i:s"),
			),
			'jumlah_tenaga_kerja');

		if ($input_data['error']['message'] == null):
			$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Ubah ');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;


	}

	function SimpanPerubahanTKperWilayah()
	{
		$idKar = $this->input->post('id');
		$karyawan_tetap = $this->input->post('tetap');
		$karyawan_tidak_tetap = $this->input->post('tidak_tetap');
		$id = $_SESSION['nopek'];

		$input_data = $this->Query->updateData(array('id' => $idKar),
			array(
				'karyawan_tetap' => $karyawan_tetap,
				'karyawan_tidak_tetap' => $karyawan_tidak_tetap,
				'edited_by' => $this->nopek,
				'time_edit' => date("Y/m/d H:i:s"),
			),
			'jumlah_tk_perwilayah');

		if ($input_data['error']['message'] == null):
			$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Ubah ');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

	function SimpanPerubahanTKperKomoditas()
	{
		$idKar = $this->input->post('id');
		$karyawan_tetap = $this->input->post('tetap');
		$karyawan_tidak_tetap = $this->input->post('tidak_tetap');
		$id = $_SESSION['nopek'];

		$input_data = $this->Query->updateData(array('id' => $idKar),
			array(
				'karyawan_tetap' => $karyawan_tetap,
				'karyawan_tidak_tetap' => $karyawan_tidak_tetap,
				'edited_by' => $this->nopek,
				'time_edit' => date("Y/m/d H:i:s"),
			),
			'jumlah_tk_perkomoditas');

		if ($input_data['error']['message'] == null):
			$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Ubah ');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

	function SimpanPerubahanTKperUnit()
	{
		$idKar = $this->input->post('id');
		$karyawan_tetap = $this->input->post('tetap');
		$honor = $this->input->post('tidak_tetap');
		$ila = $this->input->post('ila');
		$os = $this->input->post('os');
		$kamp = $this->input->post('kamp');
		$biaya = $this->input->post('biaya');
		$id = $_SESSION['nopek'];

		$input_data = $this->Query->updateData(array('id' => $idKar),
			array(
				'karyawan_tetap' => $karyawan_tetap,
				'karyawan_honor' => $honor,
				'ILA' => $ila,
				'OS' => $os,
				'Kamp' => $kamp,
				'Biaya' => $biaya,
				'edited_by' => $this->nopek,
				'time_edit' => date("Y/m/d H:i:s"),
			),
			'jumlah_tk_perunit');

		if ($input_data['error']['message'] == null):
			$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Ubah ');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}
}

