<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KnowledgeSharing extends CI_Controller
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


		$id = $this->uri->segment(3, 0);


		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'knowledgeSharing/view.php',
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
		$data['tableks'] = $this->Query->getAllData('v_admin_knowledge_sharing')->result();


		$data['getlike2'] = $this->Query->Rating();
		//$data['getlike3'] =$this->Query->DescRev();

		//   $data['getdislike'] = $this->Query->getDisLike($id, $id_user);


		$this->load->view('Template', $data);


	}


	public function Viewer()
	{
		$st = 'Belum_Dipublikasikan';
		$id = $this->uri->segment(3, 0);
		$id_user = $_SESSION['nopek'];

		$decode = base64_decode($id);
		$split = explode('-', $decode);

		$tanggal = date('Y-m-d');
		$kunjungan = 1;


		$input_data = $this->Query->inputData(array(
			'id' => $split[0],
			'nopek' => $id_user,
			'tanggal' => $tanggal,
			'viewer' => $kunjungan,


		),
			'tr_viewer');
		if ($input_data['error']['message'] == null):

			redirect(base_url('KnowledgeSharing/View/' . $id));
		else:
			redirect(base_url());
		endif;


	}


	public function View()
	{

		$st = 'Belum_Dipublikasikan';
		$id = $this->uri->segment(3, 0);
		$id_user = $_SESSION['nopek'];

		$decode = base64_decode($id);
		$split = explode('-', $decode);


		$data['web'] = array(

			'aktif_menu' => 'profil',
			'page' => 'ViewPdf.php',
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

		// $data['alldata'] = $this->Query->getAllData('admin_knowledge_sharing')->row();

		$data['ksdet'] = $this->Query->ViewKM($split[0]);

		// $data['ksdet'] = $this->db->query("SELECT * FROM `v_admin_knowledge_sharing`");


		$data['komen'] = $this->Query->tanggapan($split[0]);
		$data['Jkomen'] = $this->Query->getData(array('id' => $split[0]), 'tr_komentar');
		$data['notif'] = $this->Query->getAllData('v_notif')->row();
		$data['getlike'] = $this->Query->getLike($split[0]);
		$data['countlike'] = $this->Query->countLike($split[0], $id_user);


		$data['getdislike'] = $this->Query->getDisLike($split[0]);
		$data['countdislike'] = $this->Query->countDisLike($split[0], $id_user);


		$this->load->view('Template', $data);

	}
	//----------------------------------LIKE----------------------------------------

	public function Like()
	{


		$id = $this->uri->segment(3, 0);
		$id_user = $_SESSION['nopek'];


		$decode = base64_decode($id);

		$split = explode('-', $decode);

		$input_data = $this->Query->Like($split[0], $id_user);


		if ($input_data['error']['message'] == null) {
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');


			redirect(base_url('KnowledgeSharing/View/' . $id));
		}


	}


	public function unLike()
	{


		$id = $this->uri->segment(3, 0);
		$id_user = $_SESSION['nopek'];
		$decode = base64_decode($id);


		$split = explode('-', $decode);

		$input_data = $this->Query->unLike($split[0], $id_user);


		if ($input_data['error']['message'] == null) {
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');


			redirect(base_url('KnowledgeSharing/View/' . $id));
		}


	}


	//----------------------------------END LIKE------------------------------------

	public function Dislike()
	{


		$id = $this->uri->segment(3, 0);
		$id_user = $_SESSION['nopek'];

		$decode = base64_decode($id);
		$split = explode('-', $decode);
		$input_data = $this->Query->Dislike($split[0], $id_user);


		if ($input_data['error']['message'] == null) {
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');


			redirect(base_url('KnowledgeSharing/View/' . $id));
		}


	}

	public function unDislike()
	{


		$id = $this->uri->segment(3, 0);
		$id_user = $_SESSION['nopek'];

		$decode = base64_decode($id);
		$split = explode('-', $decode);

		$input_data = $this->Query->unDislike($split[0], $id_user);


		if ($input_data['error']['message'] == null) {
			//  $this->flsh_msg('Sukses.','ok','data berhasil ditambah');


			redirect(base_url('KnowledgeSharing/View/' . $id));
		}


	}


	public function Komentar()
	{

		$idpost = $this->input->post('idpost');
		$nopek = $_SESSION['nopek'];
		$komen = $this->input->post('komen');
		$nama = $this->input->post('nama');


		$id = $this->uri->segment(3, 0);
		$decode = base64_decode($idpost);
		$split = explode('-', $decode);

		$input_data = $this->Query->inputData(array(
			'id' => $split[0],
			'nopek' => $nopek,
			'komentar' => $komen,
			// 'jam' => time('H:i:s')
		),
			'tr_komentar');

		if ($input_data['error']['message'] == null) {

			redirect($_SERVER['HTTP_REFERER'] . '?page=showall');
		}


	}

	public function DelKomentar()
	{

		$id = $this->uri->segment(3, 0);


		$query = $this->Query->delData(array('id_komentar' => $id),
			'tr_komentar');

		if ($query):
			$this->flsh_msg('Sukses.', 'ok', 'Komentar berhasil dihapus');
			redirect($_SERVER['HTTP_REFERER']);

		else:
			$this->flsh_msg('Gagal.', 'warning', 'Komentar gagal dihapus');
			redirect(base_url());
		endif;


	}


}
