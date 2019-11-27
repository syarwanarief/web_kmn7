<?php 
 
class Query extends CI_Model{

    function get_wilayah($wilayah){
        $hasil=$this->db->query("SELECT * FROM jumlah_tk_perwilayah WHERE wilayah='$wilayah'");
        return $hasil->result();
    }

    function get_komoditas($komoditas){
        $hasil=$this->db->query("SELECT * FROM jumlah_tk_perkomoditas WHERE komoditas='$komoditas'");
        return $hasil->result();
    }

	public function getNopek($nopek){
		$data = $this->db->query("select * from master_data_karyawan where nopek='$nopek'");
		return $data->result();
	}

	function get_unit($unit){
		$hasil=$this->db->query("SELECT * FROM jumlah_tk_perunit WHERE unit='$unit'");
		return $hasil->result();
	}

	function putTKtotal($karyawan_tetap,$karyawan_tidak_tetap, $id){
    	$query = $this->db->query("update jumlah_tenaga_kerja set karyawan_tetap=$karyawan_tetap, karyawan_tidak_tetap=$karyawan_tidak_tetap where id=$id");
    	return $query->result();
	}

	function getAllData($table)
    {
		return $this -> db -> get($table);
	}

    function getAllDataDesc()
    {
        $query=$this->db->query("SELECT * FROM `user_knowledge_sharing` ORDER BY `id` DESC");
return $query->result();


    }

    function getAllDataOrder($table,$params,$order_type)
    {
        $this -> db -> select('*')
                    -> from($table)
                    -> order_by($params,$order_type);
        return $this -> db -> get();
    }
	
	function inputDataDetail($data,$table){
		$input = $this -> db -> insert($table,$data);
        $error = $this->db->error(); // Has keys 'code' and 'message'
        $return_arr = array('is_query'=>$input,'error'=>$error);
    return $return_arr;
	}



  function inputData($data,$table){

    return $this -> db -> insert($table,$data);

  }

     function inputDataGetLastID($data,$table){
        $insert = $this -> db -> insert($table,$data);
        $get_id = $this-> db ->query('SELECT LAST_INSERT_ID() AS "last_id" ')->row();
        $id = $get_id -> last_id;
        $error = $this->db->error();
        $ret_array = array('id'=>$id,'is_insert'=>$insert,'error'=>$error);
        return $ret_array;
    }

	function delData($where,$table){
		$this -> db -> where($where);
		$delete = $this -> db -> delete($table);
        return $delete;
	}

	function getData($where,$table){
		return $this -> db -> get_where($table,$where);
	}



    function getDataSpecified($field,$table)
    {
        $this -> db -> select($field)
                    -> from($table);
        return $this -> db -> get();
    }

    function getDataSpecifiedWhere($field,$where,$table)
    {
        $this -> db -> select($field)
                    -> from($table)
                    -> where($where);
        return $this -> db -> get();
    }
    function getDataSpecifiedGroupBy($field,$groub,$table)
    {
        $this -> db -> select($field)
            -> from($table)
           // -> where($where)
        -> group_by($groub);
        return $this -> db -> get();
    }

	function updateData($where,$data,$table){
		$update = $this->db->where($where)
		                   ->update($table,$data);
        return $update;
	}	

  function updateDataDetail($where,$data,$table){
    $update = $this->db->where($where)
                       ->update($table,$data);
    $error = $this->db->error(); // Has keys 'code' and 'message'
    $return_arr = array('is_query'=>$update,'error'=>$error);
    return $return_arr;
  } 

    function aktifasiBiaya($where,$data,$table){
        $update = $this->db->where('id_biaya_spp !=',$where)
                           ->update($table,$data);
        return $update;
    }   

	function getDataJoin($table1,$table2,$field){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        // $this->db->where($where);
        return $this->db->get();
    }

    function getDataJoinOrder($table1,$table2,$field,$order){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order);
        // $this->db->where($where);
        return $this->db->get();
    }

    function getDataJoinOrderWhere($table1,$table2,$field,$order,$where){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order);
        return $this->db->get();
    }

    function getDataTransWait()
    {
        $this->db->select('*')
                 ->from('transaksi')
                 ->join('meja','meja.id_meja = transaksi.id_meja','left')
                 ->where(array('status_trans'=>'wait'))
                 ->order_by("tgl_transaksi DESC");
        return $this -> db -> get();
    }

    function getDataJoinWhere($table1,$table2,$field,$where){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        return $this->db->get();
    }

    function getDataJoinLike($table1,$table2,$field,$like){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->like($like);
        return $this->db->get();
    }


     function getDataJoinWhereDiff($table1,$table2,$field,$field2,$where){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field2);
        $this->db->where($where);
        return $this->db->get();
    }

     function getDataJoinWhereNot($table1,$table2,$field,$where,$wherenot){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->where_not_in($wherenot);
        return $this->db->get();
    }

   function getDataBahanFromMenu($where)
   {
        $this->db->select('*')
                 ->from('menu_has_bahan')
                 ->join('bahan','menu_has_bahan.id_bahan = bahan.id_bahan','left')
                 ->join('satuan','bahan.id_satuan = satuan.id_satuan','left')
                 ->where($where);
        return $this -> db -> get();
   }  


   function getDataMenuFromTrans()
   {
        $this->db-> select('*')
                 -> from('transaksi_detail')
                 -> join('menu','transaksi_detail.id_menu = menu.id_menu','left')
                 -> join('transaksi','transaksi_detail.id_transaksi = transaksi.id_transaksi','left')
                 -> order_by('transaksi.tgl_transaksi','desc');
        return $this -> db -> get(); 
   }

  function getDataMenuFromTransWhere($where)
   {
        $this->db-> select('*')
                 -> from('transaksi_detail')
                 -> join('menu','transaksi_detail.id_menu = menu.id_menu','left')
                 -> join('transaksi','transaksi_detail.id_transaksi = transaksi.id_transaksi','left')
                 -> order_by('transaksi.tgl_transaksi','desc')
                 -> where($where);  
        return $this -> db -> get(); 
   }

   function GetDataTransaksiDetail($where)
   {
        $this->db-> select('*')
                 -> from('transaksi_detail')
                 -> join('menu','transaksi_detail.id_menu = menu.id_menu','left')
                 -> join('transaksi','transaksi_detail.id_transaksi = transaksi.id_transaksi','left')
                 -> order_by('transaksi.tgl_transaksi','desc')
                 -> where($where);  
        return $this -> db -> get(); 
   }

   function getDataTransaksiFilter($tgl_mulai,$tgl_selesai)
   {
        $this->db -> select('*')
                  -> from('transaksi')
                  -> join('meja','transaksi.id_meja = meja.id_meja','left')
                  -> order_by('transaksi.tgl_transaksi','desc')
                  -> where('tgl_transaksi BETWEEN "'.$tgl_mulai. '" AND "'.$tgl_selesai.'"');
        return $this -> db -> get(); 
   }

    function sum($where)
    {
        $this->db->select_sum('price');
        $this->db->select('sum(jumlah_beli) as count');
        $this->db->from('pre_transaksi');
        $this->db->where($where);
        return $this->db->get();
    }

    public function orderByLimit($table,$field,$sort,$limit){
        $this->db->select('id_transaksi')
            ->from($table)
            ->order_by($field,$sort)
            ->limit($limit);
        return $this->db->get();
    }


    function getLast($table){
        $data = $this -> db -> select('id_transaksi')
                        ->from($table);
        $get_id = $this-> db ->query('SELECT LAST_INSERT_ID() AS "last_id" ')->row();
        $id = $get_id -> last_id;
        $error = $this->db->error();
        $ret_array = array('id_transaksi'=>$id,'is_insert'=>$data,'error'=>$error);
        return $ret_array;
    }


    function selectMax($table, $where)
    {
        $this -> db -> select_max('id_transaksi')
            -> from($table);
        return $this -> db -> get();
    }



    function update_file($nik,$foto){
        $hsl=$this->db->query("UPDATE t_login SET foto='$foto' WHERE nopek='$nik'");
        return $hsl;
    }



    function getDataKS($field1,$field2){
        $query=$this->db->query("SELECT * FROM user_pengalaman_narasumber WHERE (judul = '$field1' AND kata_kunci = '$field2')");
        return $query->result();
    }

    function get_file_byid($id){
        $query=$this->db->query("SELECT `id`, `nopek`, `nama`, `jabatan`, `unit`, `kata_kunci`, `bidang`, `kriteria`, `judul`, `surat_penugasan`, `file_word`, `waktu_input`, `status` FROM `user_knowledge_sharing` WHERE id='$id'");
        return $query;
    }

    //---------------------------
    function rata(){
        $query=$this->db->query("SELECT AVG(star)as rating FROM rating_info_kmn7");
        return $query;
    }
    function countRate($id){
        $query=$this->db->query("SELECT * FROM `rating_info_kmn7` WHERE nopek=$id");
        return $query -> row();
    }
//------------------------------------------------------------------------------------------

    function tanggapan($split){
        // $query0=$this->db->query("DELETE FROM rating_info WHERE user_id=$id_user AND post_id=$id AND rating_action ='dislike'");

        $query=$this->db->query("SELECT a.id,a.id_komentar,a.nopek,a.komentar,a.jam,b.nama,c.inisial FROM (SELECT id_komentar,id,nopek,komentar,jam FROM tr_komentar WHERE id= $split) as a LEFT JOIN (SELECT nama,nopek FROM master_data_karyawan) as b ON a.nopek = b.nopek LEFT JOIN (SELECT nopek,inisial FROM t_login) as c on a.nopek = c.nopek ORDER BY a.jam ASC");
        return $query->result();
    }

//----------------

    function Like($id, $id_user){
       // $query0=$this->db->query("DELETE FROM rating_info WHERE user_id=$id_user AND post_id=$id AND rating_action ='dislike'");

        $query=$this->db->query("INSERT INTO tr_rating_info (nopek, id, rating_action) VALUES ($id_user, $id, 'like')ON DUPLICATE KEY UPDATE rating_action='like'");
        return $query;
    }



    function Rating(){
        $query = $this->db->query("CALL RatingKS()");
            return $query->result();
    }
    function RatingKT(){
        $query = $this->db->query("CALL RatingKT()");
        return $query->result();
    }
    function RatingTK(){
        $query = $this->db->query("CALL RatingTK()");
        return $query->result();
    }
    function RatingPN(){
        $query = $this->db->query("CALL RatingPN()");
        return $query->result();
    }



    function DescRev(){
        // $query0=$this->db->query("DELETE FROM rating_info WHERE user_id=$id_user AND post_id=$id AND rating_action ='dislike'");

        if (mysqli_more_results($this->db->conn_id)) {
            mysqli_next_result($this->db->conn_id);
        }else {

            $query = $this->db->query("CALL descReview()");

            $query->next_result();
        }
    }


    function unLike($id, $id_user){
        $query=$this->db->query("DELETE FROM tr_rating_info WHERE nopek=$id_user AND id=$id");
        return $query;
    }


    function getLike($id){
        $query=$this->db->query("SELECT * FROM tr_rating_info WHERE  id=$id AND rating_action='like'");
        return $query;
    }


    function getLike2($id){
        $query=$this->db->query("SELECT COUNT(*) FROM tr_rating_info WHERE id = $id AND rating_action='like'");
        return $query;
    }



    function countLike($id, $id_user){
        $query=$this->db->query("SELECT * FROM tr_rating_info WHERE nopek=$id_user AND  id=$id AND rating_action='like'");
        return $query -> row();
    }



//------------------------------------------------------

    function Dislike($id, $id_user){

      //  $query0=$this->db->query("DELETE FROM rating_info WHERE user_id=$id_user AND post_id=$id AND rating_action ='like'");


        $query=$this->db->query("INSERT INTO tr_rating_info (nopek, id, rating_action) VALUES ($id_user, $id, 'dislike')ON DUPLICATE KEY UPDATE rating_action='dislike'");
        return $query;


    }


    function unDislike($id, $id_user){
        $query=$this->db->query("DELETE FROM tr_rating_info WHERE nopek=$id_user AND id=$id");
        return $query;
    }

    function getDisLike($id){
        $query=$this->db->query("SELECT * FROM tr_rating_info WHERE  id=$id AND rating_action='dislike'");
        return $query;
    }


    function countDisLike($id, $id_user){
        $query=$this->db->query("SELECT * FROM tr_rating_info WHERE nopek=$id_user AND  id=$id AND rating_action='dislike'");
        return $query -> row();
    }


    //--------------------------------------------------------TK-------LIKE-----------------------------------------



    function totalrate(){
        $query=$this->db->query("SELECT COUNT(star) as Total FROM `rating_info_kmn7`");
        return $query -> row();
    }


    function tampilRate(){
        $query=$this->db->query("SELECT a.*,b.nama FROM ( SELECT  * FROM `rating_info_kmn7`) as a LEFT  JOIN (select  nama,nopek from  master_data_karyawan) as b on a.nopek = b.nopek  ORDER BY a.waktu DESC");
        return $query -> result();
    }

//---------------------------------------------

    function Periode($AG){
        $query=$this->db->query("SELECT a.*,b.nama,c.k_pelatihan FROM (SELECT * FROM `p_sdm` WHERE MATCH (periode) AGAINST ('$AG')) as a LEFT JOIN (SELECT nama,nopek FROM master_data_karyawan) as b on a.nopek = b.nopek Left JOIN (SELECT  * from master_k_pelatihan)as c on a.kode_pelatihan = c.kode_pelatihan ORDER By waktu_input ASC");
       // $query=$this->db->query("SELECT a.*,b.nama FROM (SELECT * FROM `p_sdm` ) as a LEFT JOIN (SELECT nama,nopek FROM t_data_karyawan) as b on a.nopek = b.nopek");
        return $query -> result();
    }

    function All(){
        $query=$this->db->query("SELECT a.*,b.nama,c.k_pelatihan FROM (SELECT * FROM `p_sdm`) as a LEFT JOIN (SELECT nama,nopek FROM master_data_karyawan) as b on a.nopek = b.nopek Left JOIN (SELECT  * from master_k_pelatihan)as c on a.kode_pelatihan = c.kode_pelatihan ORDER By waktu_input ASC");
        return $query -> result();
    }

	function getPelatihan($nopek){
		$query=$this->db->query("SELECT a.*,b.nama,c.k_pelatihan FROM (SELECT * FROM `p_sdm` where nopek = $nopek) as a LEFT JOIN (SELECT nama,nopek FROM master_data_karyawan) as b on a.nopek = b.nopek Left JOIN (SELECT  * from master_k_pelatihan)as c on a.kode_pelatihan = c.kode_pelatihan ORDER By waktu_input ASC");
		return $query -> result();
	}

//--------------------------------------Join ----------------------------------

    function UserKM($split){
        $query=$this->db->query("SELECT a.*,b.nama,b.unit,b.jabatan,c.bidang,d.kriteria FROM (SELECT * FROM tr_knowledge_management WHERE id = $split) as a Left JOIN (SELECT nopek,nama,unit,jabatan FROM master_data_karyawan ) as b on a.nopek = b.nopek LEFT  JOIN (SELECT * FROM master_bidang) as c on a.kode_bidang = c.kode_bidang LEFT  JOIN  (SELECT * FROM master_kriteria ) as d on a.kode_kriteria = d.kode_kriteria");
        return $query -> row();
    }

    function ViewKM($split){
        $query=$this->db->query("SELECT a.*,b.nama,c.*,d.*,e.* FROM (SELECT * FROM tr_knowledge_management WHERE id = $split) as a LEFT JOIN (SELECT nopek,nama FROM master_data_karyawan) as b on a.nopek = b.nopek LEFT JOIN (SELECT * FROM master_kriteria) as c on a.kode_kriteria = c.kode_kriteria LEFT JOIN (SELECT * FROM master_bidang) as d on a.kode_bidang = d.kode_bidang LEFT  JOIN (SELECT * FROM tr_km_admin) as e on a.id=e.id");
        return $query -> row();
    }

    function CekLaporan($Nopek,$noTugas)
    {
        $query = $this->db->query("SELECT a .*,b . kriteria,c . bidang, d.* FROM(SELECT * FROM tr_knowledge_management WHERE nopek = $Nopek AND surat_penugasan = '$noTugas' AND status = 'Dipublikasikan' or status = 'Tidak_Layak') as a LEFT JOIN(SELECT * FROM master_kriteria) as b ON a . kode_kriteria = b . kode_kriteria LEFT JOIN(SELECT * FROM master_bidang) as c on a . kode_bidang = c . kode_bidang Left Join (SELECT * FROM tr_km_admin) as d on a.id = d.id");
            return $query -> row();
    }


    function Pelatihan($decode)
    {
        $query = $this->db->query("SELECT a.*,b .k_pelatihan FROM(SELECT * FROM p_sdm WHERE nopek = $decode ) as a LEFT JOIN(SELECT * FROM master_k_pelatihan) as b ON a . kode_pelatihan = b . kode_pelatihan");
        return $query -> result();
    }

    function Akun()
    {
        $query = $this->db->query("SELECT a.*,b.nama FROM (SELECT  * FROM t_login) AS a LEFT  JOIN  (select nama,nopek from master_data_karyawan) as b on a.nopek=b.nopek");
        return $query -> result();
    }
    function AkunTidakAktif()
    {
        $query = $this->db->query("SELECT a.*,b.nama FROM (SELECT  * FROM t_login where status = 'OFF') AS a LEFT  JOIN  (select nama,nopek from master_data_karyawan) as b on a.nopek=b.nopek");
        return $query -> result();
    }
    function AkunDetail($split)
    {
        $query = $this->db->query("SELECT a.*,b.nama FROM (SELECT  * FROM t_login where  nopek = $split) AS a LEFT  JOIN  (select nama,nopek from master_data_karyawan) as b on a.nopek=b.nopek");
        return $query -> row();
    }


    function EditSDM($split)
    {
        $query = $this->db->query("SELECT a.*,b.*,c.nama,c.Gol,c.unit,c.jabatan FROM (SELECT * FROM p_sdm WHERE id_laporan = $split) as a LEFT JOIN (SELECT * FROM master_k_pelatihan) as b on a.kode_pelatihan = b.kode_pelatihan LEFT Join (SELECT nama,nopek,jabatan,unit,Gol FROM master_data_karyawan) as c ON a.nopek = c.nopek");
        return $query -> row();
    }

}
