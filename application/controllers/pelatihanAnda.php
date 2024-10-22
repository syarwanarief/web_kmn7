<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelatihanAnda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Query');
		$this->load->library('form_validation');
		$this->nopek = $_SESSION['nopek'];
		$this->level = $_SESSION['user_level'];
		$this->foto = $_SESSION['foto'];
		$this->inisial = $_SESSION['inisial'];
		$this->status = $_SESSION['status'];
		$this->last_sen = $_SESSION['last_sen'];


		#cek login
		if (isset($_SESSION['user_is_login']) and $_SESSION['user_is_login'] == true):
			$this->nopek = $_SESSION['nopek'];
			$this->user_level = $_SESSION['user_level'];
			$this->foto = $_SESSION['foto'];
			$this->inisial = $_SESSION['inisial'];
			$this->status = $_SESSION['status'];
			$this->last_sen = $_SESSION['last_sen'];

			if ($this->status == 'OFF'):
				redirect(base_url('Disabled'));
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
			'page' => 'pelatihan/Riwayat.php',
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

		$data['tampil'] = $this->db->query("SELECT a.*,b.nama,c.k_pelatihan FROM (SELECT * FROM `p_sdm` where nopek = $id) 
as a LEFT JOIN (SELECT nama,nopek FROM master_data_karyawan) as b on a.nopek = b.nopek 
Left JOIN (SELECT  * from master_k_pelatihan)as c on a.kode_pelatihan = c.kode_pelatihan ORDER By waktu_input ASC")->result();
		$this->load->view('Template', $data);
	}

	public function EvaluasiAnda(){
		$id = $_SESSION['nopek'];
		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'pelatihan/evaluasiPascaPelatihan.php',
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
		//$data['cekSurvey'] = $this->db->query("select * from daftar_penilai where survey_by like '%$this->nopek%'")->result();
		$this->load->view('Template', $data);
	}

	public function survey(){
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

	public function simpanSurvey()
	{

		$no_tugas = $this->input->post('no_tugas');
		$nopek_peserta = $this->input->post('nopek_peserta');
		$strata = $this->input->post('strata');
		$tahun = $this->input->post('tahunn');
		$idSurvey = $this->input->post('idSurvey');

		$per1sub1 = $this->input->post('pertanyaan1sub1'); //1
		$per2sub1 = $this->input->post('pertanyaan2sub1'); //2
		$per3sub1 = $this->input->post('pertanyaan3sub1'); //3
		$per1sub2 = $this->input->post('pertanyaan1sub2'); //4
		$per2sub2 = $this->input->post('pertanyaan2sub2'); //5
		$per3sub2 = $this->input->post('pertanyaan3sub2'); //6
		$per4sub2 = $this->input->post('pertanyaan4sub2'); //7
		$per5sub2 = $this->input->post('pertanyaan5sub2'); //8
		$per1sub3 = $this->input->post('pertanyaan1sub3'); //9
		$per2sub3 = $this->input->post('pertanyaan2sub3'); //10
		$per3sub3 = $this->input->post('pertanyaan3sub3'); //11
		$per4sub3 = $this->input->post('pertanyaan4sub3'); //12
		$per1sub4 = $this->input->post('pertanyaan1sub4'); //13
		$per2sub4 = $this->input->post('pertanyaan2sub4'); //14
		$per1sub5 = $this->input->post('pertanyaan1sub5'); //15
		$per2sub5 = $this->input->post('pertanyaan2sub5'); //16
		$per3sub5 = $this->input->post('pertanyaan3sub5'); //17

		$text0 = $this->input->post('text0');
		$text1 = $this->input->post('text1');
		$text2 = $this->input->post('text2');
		$text3 = $this->input->post('text3');

		$pertanyaan = array($per1sub1, $per2sub1, $per3sub1, $per1sub2, $per2sub2, $per3sub2, $per4sub2, $per5sub2,
			$per1sub3, $per2sub3, $per3sub3, $per4sub3, $per1sub4, $per2sub4, $per1sub5, $per2sub5, $per3sub5, $text0, $text1, $text2, $text3);

		$jaw1Soal1 = $this->input->post('jawaban1Soal1'); //1
		$jaw1Soal2 = $this->input->post('jawaban1Soal2'); //2
		$jaw1Soal3 = $this->input->post('jawaban1Soal3'); //3
		$jaw2Soal1 = $this->input->post('jawaban2Soal1'); //4
		$jaw2Soal2 = $this->input->post('jawaban2Soal2'); //5
		$jaw2Soal3 = $this->input->post('jawaban2Soal3'); //6
		$jaw2Soal4 = $this->input->post('jawaban2Soal4'); //7
		$jaw2Soal5 = $this->input->post('jawaban2Soal5'); //8
		$jaw3Soal1 = $this->input->post('jawaban3Soal1'); //9
		$jaw3Soal2 = $this->input->post('jawaban3Soal2'); //10
		$jaw3Soal3 = $this->input->post('jawaban3Soal3'); //1
		$jaw3Soal4 = $this->input->post('jawaban3Soal4'); //12
		$jaw4Soal1 = $this->input->post('jawaban4Soal1'); //13
		$jaw4Soal2 = $this->input->post('jawaban4Soal2'); //14
		$jaw5Soal1 = $this->input->post('jawaban5Soal1'); //15
		$jaw5Soal2 = $this->input->post('jawaban5Soal2'); //16
		$jaw5Soal3 = $this->input->post('jawaban5Soal3'); //17
		//text0
		$program1 = $this->input->post('program1');
		$sasaran1 = $this->input->post('sasaran1');
		$waktu1 = $this->input->post('waktu_pelatihan1');
		$hasil1 = $this->input->post('hasil_dicapai1');
		$program2 = $this->input->post('program2');
		$sasaran2 = $this->input->post('sasaran2');
		$waktu2 = $this->input->post('waktu_pelatihan2');
		$hasil2 = $this->input->post('hasil_dicapai2');
		$program3 = $this->input->post('program3');
		$sasaran3 = $this->input->post('sasaran3');
		$waktu3 = $this->input->post('waktu_pelatihan3');
		$hasil3 = $this->input->post('hasil_dicapai3');

		//text2
		$jabatan1 = $this->input->post('jabatan1');
		$pelatihan1 = $this->input->post('pelatihan1');
		$jabatan2 = $this->input->post('jabatan2');
		$pelatihan2 = $this->input->post('pelatihan2');
		$jabatan3 = $this->input->post('jabatan3');
		$pelatihan3 = $this->input->post('pelatihan3');

		$jawabanText0 = $program1 . "@@@" . $sasaran1 . "@@@" . $waktu1 . "@@@" . $hasil1;
		$jawabanText1 = $this->input->post('jwbText1');
		$jawabanText2 = $jabatan1 . "@@@" . $pelatihan1 .
			"@@@" . $jabatan2 . "@@@" . $pelatihan2 .
			"@@@" . $jabatan3 . "@@@" . $pelatihan3;
		$jawabanText3 = $this->input->post('comment');

		$jawaban = array($jaw1Soal1, $jaw1Soal2, $jaw1Soal3, $jaw2Soal1, $jaw2Soal2, $jaw2Soal3, $jaw2Soal4, $jaw2Soal5,
			$jaw3Soal1, $jaw3Soal2, $jaw3Soal3, $jaw3Soal4, $jaw4Soal1, $jaw4Soal2, $jaw5Soal1, $jaw5Soal2, $jaw5Soal3,
			$jawabanText0, $jawabanText1, $jawabanText2, $jawabanText3);

		$aspek1 = array($jaw1Soal1, $jaw1Soal2, $jaw1Soal3);
		$aspek2 = array($jaw2Soal5, $jaw2Soal4, $jaw2Soal3, $jaw2Soal2, $jaw2Soal1);
		$aspek3 = array($jaw3Soal4, $jaw3Soal3, $jaw3Soal2, $jaw3Soal1);
		$aspek4 = array($jaw4Soal2, $jaw4Soal1);
		$aspek5 = array($jaw5Soal1, $jaw5Soal2, $jaw5Soal3);

		$hitungAspek1 = round(array_sum($aspek1) * 20 / count($aspek1));
		$hitungAspek2 = round(array_sum($aspek2) * 20 / count($aspek2));
		$hitungAspek3 = round(array_sum($aspek3) * 20 / count($aspek3));
		$hitungAspek4 = round(array_sum($aspek4) * 20 / count($aspek4));
		$hitungAspek5 = round(array_sum($aspek5) * 20 / count($aspek5));

		$totalAspek = round(array_sum($aspek1) + array_sum($aspek2) + array_sum($aspek3) + array_sum($aspek4) + array_sum($aspek5) * 20 / 17);

		$surveyBy = $this->input->post('survey_by');

		for ($i = 0; $i < count($jawaban); $i++):
			$input_data = $this->Query->inputData(
				array(
					'no_tugas' => $no_tugas,
					'tahun' => $tahun,
					'pertanyaan_' => $pertanyaan[$i],
					'jawaban' => $jawaban[$i],
					'strata_peserta' => $strata,
					'nopek' => $this->nopek,
					'waktu_input' => date("Y/m/d H:i:s"),
				),
				'data_survey');
		endfor;

		$query = $this->Query->updateData(array('no_tugas' => $no_tugas),
			array(
				'status' => "Selesai",
			),
			'daftar_penilai');


		if ($input_data['error']['message'] == null && $query['error']['message'] == null):

			$this->flsh_msg('Terimakasih.', 'ok', 'Evaluasi Yang Anda Lakukan Saat Berarti');

			redirect('pelatihanAnda/EvaluasiAnda');

		else:
			$this->flsh_msg('Gagal.', 'warning', 'Simpan Gagal' . $input_data['error']['message']);
		endif;

	}

	public function exportPenilai()
	{
		$data['tampil'] = $this->db->query("select * from daftar_penilai")->result();
		$this->load->view('pelatihan/ExportDaftarPenilaian.php', $data);
	}

}
