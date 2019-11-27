<?php


class Survey extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session', 'javascript');
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
			'page' => 'survey/ViewPertanyaanSurvey.php',
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
		$data['eva'] = $this->Query->getAllData('master_pertanyaan')->result();

		$this->load->view('Template', $data);
	}

	public function editPertanyaan()
	{
		$idPer = $this->input->post('id_pertanyaan');
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'survey/editPertanyaan.php',
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
		$data['tampil'] = $this->db->query("select * from master_pertanyaan where id_pertanyaan=$idPer")->result();

		$this->load->view('Template', $data);
	}

	public function UpdatePertanyaan()
	{

		$idPer = $this->input->post('id_pertanyaan');
		$per = $this->input->post('survey_question');
		$jenis = $this->input->post('pil');
		$kat = $this->input->post('kat');

		$query = $this->Query->updateData(array('id_pertanyaan' => $idPer),
			array(
				'pertanyaan' => $per,
				'jenis_skor' => $jenis,
				'aspek_pertanyaan' => $kat,
				'created' => $this->nopek,
			),
			'master_pertanyaan');

		if ($query['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');
			$this->flsh_msg('Berhasil', 'ok', 'Pertanyaan Berhasil Diubah');

			redirect('Survey');

		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $query['error']['message']);
		endif;
	}

	public function disablePertanyaan()
	{

		$idPer = $this->input->post('id_pertanyaan');

		$query = $this->Query->updateData(array('id_pertanyaan' => $idPer),
			array(
				'status' => "Non Aktif",
			),
			'master_pertanyaan');

		if ($query['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');
			$this->flsh_msg('Berhasil', 'ok', 'Pertanyaan Berhasil Dinonaktifkan');
			redirect($_SERVER['HTTP_REFERER']);

		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

	public function enablePertanyaan()
	{

		$idPer = $this->input->post('id_pertanyaan');

		$query = $this->Query->updateData(array('id_pertanyaan' => $idPer),
			array(
				'status' => "Aktif",
			),
			'master_pertanyaan');

		if ($query['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');
			$this->flsh_msg('Berhasil', 'ok', 'Pertanyaan Berhasil Diaktifkan');
			redirect($_SERVER['HTTP_REFERER']);

		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

	public function deletePertanyaan()
	{
		$idPer = $this->input->post('id_pertanyaan');

		$query = $this->Query->delData(array(
			'id_pertanyaan' => $idPer),
			'master_pertanyaan');

		if ($query['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');
			$this->flsh_msg('Berhasil', 'ok', 'Pertanyaan Berhasil Dihapus');
			redirect($_SERVER['HTTP_REFERER']);

		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $query['error']['message']);
		endif;
	}

	public function create()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'survey/KelolaPertanyaanSurvey.php',
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

		$this->load->view('Template', $data);
	}

	public function save()
	{
		$pertanyaan = $this->input->post('survey_question');
		$jawaban = $this->input->post('possible_answers');
		$jenisSKor = $this->input->post('pil');
		$kat_pertanyaan = $this->input->post('kat');
		$id = $_SESSION['nopek'];
		$waktu = date("YYYY-MM-DD HH:MM:SS");

		$input_data = $this->Query->inputData(
			array(
				'pertanyaan' => $pertanyaan,
				'jenis_skor' => $jenisSKor,
				'aspek_pertanyaan' => $kat_pertanyaan,
				'status' => "Aktif",
				'created' => $id
			),
			'master_pertanyaan');

		if ($input_data['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

			$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan ');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

	public function delete()
	{
		$idPertanyaan = $this->input->post('id');
		$id = $_SESSION['nopek'];

		$input_data = $this->Query->delData(
			array(
				'id' => $idPertanyaan
			),
			'master_pertanyaan');

		if ($input_data['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

			$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Hapus ');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

	public function openRilis()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'survey/rilisSurvey.php',
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
		$data['tampil'] = $this->db->query("select * from daftar_penilai where nopek_penilai='$this->nopek'")->result();
		$data['cekSurvey'] = $this->db->query("select * from daftar_penilai where survey_by like '%$this->nopek%'")->result();

		$this->load->view('Template', $data);
	}

	public function rilis()
	{

		$no_tugas = $this->input->post('no_tugas');
		$input_data = $this->Query->updateData(array('no_tugas' => $no_tugas),
			array(
				'status' => "Selesai"
			),
			'daftar_penilai');

		if ($input_data['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

			$this->flsh_msg('Berhasil', 'ok', 'Evaluasi untuk pelatihan telah selesai');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

}
