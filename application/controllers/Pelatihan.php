<?php

class Pelatihan extends CI_Controller
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
			'page' => 'pelatihan/daftarPenilaian.php',
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

		$data['tampil'] = $this->db->query("select * from daftar_penilai order by status ASC, unit_peserta ASC")->result();
		$data['penilai'] = $this->db->query("select * from daftar_penilai where nopek_penilai='$this->nopek'")->result();
		$this->load->view('Template', $data);
	}

	public function getNopek()
	{
		$nopek = $this->input->post('nopek');
		$data = $this->Query->getNopek($nopek);
		echo json_encode($data);
	}

	public function cekSurvey()
	{
		$no_tugas = $this->input->post('no_tugas');
		$query = $this->db->query("SELECT a.*,b.no_tugas,b.nopek_penilai FROM (SELECT * FROM `data_survey` 
						where nopek = '$this->nopek' AND no_tugas='$no_tugas') as a LEFT JOIN 
						(SELECT no_tugas,nopek_penilai FROM `daftar_penilai`) as b on a.nopek = b.nopek_penilai AND a.no_tugas = b.no_tugas")->result();
		echo json_encode($query);
	}


	public function simpanPenilai()
	{

		$nopekPen = $this->input->post('nopekPen');
		$namaPen = $this->input->post('namaPen');
		$jabatanPen = $this->input->post('jabatanPen');
		$nopekPes = $this->input->post('nopekPes');
		$namaPes = $this->input->post('namaPes');
		$jabatanPes = $this->input->post('jabatanPes');
		$strata = $this->input->post('strata');
		$unitPes = $this->input->post('unit');
		$unitSaatPel = $this->input->post('unitSaatPelatihan');
		$noTugas = $this->input->post('noSurat');
		$judul = $this->input->post('judul');
		$tglMulai = $this->input->post('tglMulai');
		$tglSelesai = $this->input->post('tglSelesai');

		$input_data = $this->Query->inputData(
			array(
				'nopek_penilai' => $nopekPen,
				'nama_penilai' => $namaPen,
				'jabatan_penilai' => $jabatanPen,
				'nopek_peserta' => $nopekPes,
				'nama_peserta' => $namaPes,
				'jabatan_peserta' => $jabatanPes,
				'strata_peserta' => $strata,
				'unit_peserta' => $unitPes,
				'unit_saat_pelatihan' => $unitSaatPel,
				'no_tugas' => $noTugas,
				'judul_nama' => $judul,
				'tgl_mulai' => $tglMulai,
				'tgl_selesai' => $tglSelesai,
				'status' => "Belum",
				'edited_by' => $this->nopek,
				'waktu_input' => date("Y/m/d H:i:s"),
			),
			'daftar_penilai');

		if ($input_data['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

			$this->flsh_msg('Berhasil', 'ok', 'Data Berhasil  Di Simpan ');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

	public function BukaEditPenilai()
	{
		$nopek = $_SESSION['nopek'];
		$noTugas = $this->input->post('no_tugas');

		$id = $this->input->post('id');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'pelatihan/EditPenilai.php',
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
		$data['tampil'] = $this->db->query("select * from daftar_penilai")->result();
		$this->load->view('Template', $data);
	}


	public function TambahPenilai()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'pelatihan/TambahPenilai.php',
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

	public function SimpanPerubahanPenilai()
	{

		$id = $this->input->post('id');

		$nopek_penilai = $this->input->post('nopek_penilai');
		$nama_penilai = $this->input->post('nama_penilai');
		$jabatan_penilai = $this->input->post('jabatan_penilai');
		$nopek_peserta = $this->input->post('nopek_peserta');
		$nama_peserta = $this->input->post('nama_peserta');
		$jabatan_peserta = $this->input->post('jabatan_peserta');
		$unit_peserta = $this->input->post('unit_peserta');
		$unit_saat_pelatihan = $this->input->post('unit_saat_pelatihan');
		$no_tugas = $this->input->post('no_tugas');
		$judul_nama = $this->input->post('judul_nama');
		$tgl_mulai = $this->input->post('tgl_mulai');
		$tgl_selesai = $this->input->post('tgl_selesai');
		$status = $this->input->post('status');

		$input_data = $this->Query->updateData(array('id' => $id),
			array(
				'nopek_penilai' => $nopek_penilai,
				'nama_penilai' => $nama_penilai,
				'jabatan_penilai' => $jabatan_penilai,
				'nopek_peserta' => $nopek_peserta,
				'nama_peserta' => $nama_peserta,
				'jabatan_peserta' => $jabatan_peserta,
				'unit_peserta' => $unit_peserta,
				'unit_saat_pelatihan' => $unit_saat_pelatihan,
				'no_tugas' => $no_tugas,
				'judul_nama' => $judul_nama,
				'tgl_mulai' => $tgl_mulai,
				'tgl_selesai' => $tgl_selesai,
				'status' => $status,
				'edited_by' => $this->nopek,
				'waktu_input' => date("Y/m/d H:i:s"),
			),
			'daftar_penilai');

		echo json_encode($input_data);
	}

	public function survey()
	{
		$nopek = $_SESSION['nopek'];
		$noTugas = $this->input->post('no_tugas');
		$nopekPeserta = $this->input->post('nopek_peserta');

		$id = $this->input->post('id');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'survey/survey.php',
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
		//$data['noTugas'] = $this->input->post('no_tugas');
		$data['tampil'] = $this->db->query("select * from daftar_penilai where no_tugas='$noTugas'")->result();
		$data['pertanyaan'] = $this->db->query("select * from master_pertanyaan where jenis_skor='Text'")->result();
		$data['pertanyaan1'] = $this->db->query("select * from master_pertanyaan where aspek_pertanyaan='Peningkatan Kompetensi (Aspek1)'")->result();
		$data['pertanyaan2'] = $this->db->query("select * from master_pertanyaan where aspek_pertanyaan='Peningkatan Kinerja (Aspek2)'")->result();
		$data['pertanyaan3'] = $this->db->query("select * from master_pertanyaan where aspek_pertanyaan='Implementasi Hasil Pelatihan (Aspek3)'")->result();
		$data['pertanyaan4'] = $this->db->query("select * from master_pertanyaan where aspek_pertanyaan='Knowledge Sharing (Aspek4)'")->result();
		$data['pertanyaan5'] = $this->db->query("select * from master_pertanyaan where aspek_pertanyaan='Peran Atasan (Aspek5)'")->result();

		$this->load->view('Template', $data);
	}

	public function hitungTotalEvaluasi()
	{

		$tahun = $this->input->post('tahun');
		$skor = $this->input->post('skor_real');
		$tahunSkrng = date('Y');

		if ($tahun != $tahunSkrng) {
			$input_data = $this->Query->inputData(
				array(
					'strata' => 'Total',
					'tahun' => $tahunSkrng,
					'skor_target' => '60',
					'skor_real' => $skor,
				),
				'data_survey_5tahun');
		} elseif ($tahun == $tahunSkrng) {
			$input_data = $this->Query->updateData(array('tahun' => $tahun, 'strata' => 'Total'),
				array(
					'skor_real' => $skor,
				),
				'data_survey_5tahun');
		}

		echo json_encode($input_data);
	}

	public function hitungTotalKarpelEvaluasi()
	{

		$tahun = $this->input->post('tahun');
		$skor = $this->input->post('skor_real');
		$tahunSkrng = date('Y');

		if ($tahun != $tahunSkrng) {
			$input_data = $this->Query->inputData(
				array(
					'strata' => 'Karpel',
					'tahun' => $tahunSkrng,
					'skor_target' => '60',
					'skor_real' => $skor,
				),
				'data_survey_5tahun');
		} elseif ($tahun == $tahunSkrng) {
			$input_data = $this->Query->updateData(array('tahun' => $tahun, 'strata' => 'Karpel'),
				array(
					'skor_real' => $skor,
				),
				'data_survey_5tahun');
		}

		echo json_encode($input_data);
	}

	public function hitungTotalKarpimEvaluasi()
	{

		$tahun = $this->input->post('tahun');
		$skor = $this->input->post('skor_real');
		$tahunSkrng = date('Y');

		if ($tahun != $tahunSkrng) {
			$input_data = $this->Query->inputData(
				array(
					'strata' => 'Karpim',
					'tahun' => $tahunSkrng,
					'skor_target' => '60',
					'skor_real' => $skor,
				),
				'data_survey_5tahun');
		} elseif ($tahun == $tahunSkrng) {
			$input_data = $this->Query->updateData(array('tahun' => $tahun, 'strata' => 'Karpim'),
				array(
					'skor_real' => $skor,
				),
				'data_survey_5tahun');
		}

		echo json_encode($input_data);
	}

	public function hasilSurvey()
	{

		$no_tugas = $this->input->post('no_tugas');
		$nopekNya = $this->input->post('nopek_pen');

		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'survey/hasilSurvey.php',
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

		$data['tampil'] = $this->db->query("select pertanyaan_,jawaban from data_survey where no_tugas='$no_tugas' and nopek='$nopekNya'")->result();

		$data['aspek1'] = $this->db->query("SELECT a.*,b.pertanyaan FROM (SELECT * FROM data_survey where 
										no_tugas='$no_tugas' AND nopek = '$nopekNya') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek1%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek2'] = $this->db->query("SELECT a.*,b.pertanyaan FROM (SELECT * FROM data_survey where 
										no_tugas='$no_tugas' AND nopek = '$nopekNya') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek2%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek3'] = $this->db->query("SELECT a.*,b.pertanyaan FROM (SELECT * FROM data_survey where 
										no_tugas='$no_tugas' AND nopek = '$nopekNya') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek3%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek4'] = $this->db->query("SELECT a.*,b.pertanyaan FROM (SELECT * FROM data_survey where 
										no_tugas='$no_tugas' AND nopek = '$nopekNya') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek4%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek5'] = $this->db->query("SELECT a.*,b.pertanyaan FROM (SELECT * FROM data_survey where 
										no_tugas='$no_tugas' AND nopek = '$nopekNya') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek5%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$this->load->view('Template', $data);
	}

	public function terbitkanEvaluasi()
	{
		$idpelatihan = $this->input->post('id');
		$id = $_SESSION['nopek'];
		$input_data = $this->Query->updateData(array('id_laporan' => $idpelatihan),
			array(
				'status' => "Selesai"
			),
			'p_sdm');

		if ($input_data['error']['message'] == null):
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');

			$this->flsh_msg('Berhasil', 'ok', 'Evaluasi untuk pelatihan anda telah diterbitkan');
			redirect($_SERVER['HTTP_REFERER']);
		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;
	}

	public function laporanEvaluasi()
	{
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'survey/laporanEvaluasi.php',
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
		$tahunbonus = $tahun - 5;
		$tahun1 = $tahun - 4;
		$tahun2 = $tahun - 3;
		$tahun3 = $tahun - 2;
		$tahun4 = $tahun - 1;

		$data['notif'] = $this->Query->getAllData('v_notif')->row();

		$data['totalPenilai'] = $this->db->query("select * from daftar_penilai where status='Selesai' and tgl_selesai like '%$tahun%'")->result();

		$data['totalPenilaiTahun'] = $this->db->query("select * from data_survey_5tahun where strata='total' order by tahun desc LIMIT 5")->result();

		$data['totalPenilaiTahunKarpel'] = $this->db->query("select * from data_survey_5tahun where strata='Karpel' order by tahun desc LIMIT 5")->result();

		$data['totalPenilaiTahunKarpim'] = $this->db->query("select * from data_survey_5tahun where strata='Karpim' order by tahun desc LIMIT 5")->result();

		//aspek
		$data['aspek1'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek1%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek2'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek2%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek3'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek3%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek4'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek4%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek5'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek5%') as b on a.pertanyaan_ = b.pertanyaan")->result();
		//karpim

		$data['totalPenilaiKarpim'] = $this->db->query("select * from daftar_penilai where status='Selesai' and strata_peserta='Karpim' and tgl_selesai like '%$tahun%'")->result();

		$data['aspek1Karpim'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where 
									strata_peserta ='Karpim' and tahun like '%$tahun%') as a LEFT JOIN (SELECT * FROM master_pertanyaan 
									WHERE aspek_pertanyaan LIKE '%Aspek1%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek2Karpim'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where 
									strata_peserta ='Karpim' and tahun like '%$tahun%') as a LEFT JOIN (SELECT * FROM master_pertanyaan 
									WHERE aspek_pertanyaan LIKE '%Aspek2%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek3Karpim'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where 
								strata_peserta ='Karpim' and tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek3%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek4Karpim'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where strata_peserta ='Karpim' and tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek4%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek5Karpim'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where strata_peserta ='Karpim' and tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek5%') as b on a.pertanyaan_ = b.pertanyaan")->result();
		//karpel

		$data['totalPenilaiKarpel'] = $this->db->query("select * from daftar_penilai where status='Selesai' and strata_peserta='Karpel' and tgl_selesai like '%$tahun%'")->result();

		$data['aspek1Karpel'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where strata_peserta ='Karpel' and tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek1%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek2Karpel'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where strata_peserta ='Karpel' and tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek2%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek3Karpel'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where strata_peserta ='Karpel' and tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek3%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek4Karpel'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where strata_peserta ='Karpel' and tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek4%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$data['aspek5Karpel'] = $this->db->query("SELECT a.*,b.pertanyaan, b.no_pertanyaan FROM (SELECT * FROM data_survey where strata_peserta ='Karpel' and tahun like '%$tahun%') as a LEFT JOIN 
										(SELECT * FROM master_pertanyaan WHERE aspek_pertanyaan LIKE '%Aspek5%') as b on a.pertanyaan_ = b.pertanyaan")->result();

		$this->load->view('Template', $data);
	}

	public function tampilkanGrafikLaporanTotal()
	{

		$input_data = $this->db->query("select * from data_survey_5tahun where strata='total' order by tahun asc LIMIT 5");

		echo json_encode($input_data);
	}
}
