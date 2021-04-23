<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_group extends CI_Model
{
	function __construct() {
        parent::__construct();
    }

	public function data() {
		$query  = $this->db->query("SELECT * FROM groups");
        return $query->result();
	}
	
	public function user_spv() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_groups','users.id = users_groups.user_id','LEFT');
		$this->db->where('group_id',2);
		$query = $this->db->get ();
		return $query->result();
	}
	
	public function user_wiraniaga() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_groups','users.id = users_groups.user_id','LEFT');
		$this->db->where('group_id',3);
		$query = $this->db->get ();
		return $query->result();
	}
	
	public function user_kacab() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_groups','users.id = users_groups.user_id','LEFT');
		$this->db->where('group_id',4);
		$query = $this->db->get ();
		return $query->result();
	}
	
	public function get_kabkot($provinsi_id){
		$this->db->where('spv',$provinsi_id);
		$kelurahan=$this->db->get('users');
		if($kelurahan->num_rows()>0){
			foreach ($kelurahan->result_array() as $row)
			{
				$result['']= '- Pilih User -';
				$result[$row['username']]= $row['username'];
			}
		} else {
			$result['']= '- Belum Ada User -';
		}
		return $result;
	}
	
	public function get_kabkot2($provinsi_id){
		$this->db->where('spv',$provinsi_id);
		$kelurahan=$this->db->get('users');
		if($kelurahan->num_rows()>0){
			foreach ($kelurahan->result_array() as $row)
			{
				$result['']= '- Pilih Wiraniaga -';
				$result[$row['id']]= $row['username'];
			}
		} else {
			$result['']= '- Belum Ada Wiraniaga -';
		}
		return $result;
	}
	
	### Beranda Kacab
	
	public function countSpvAll() {
		return $this->db->count_all("users JOIN users_groups ON users.id = users_groups.user_id WHERE group_id = '2'");
	}
	
	public function countWiraniagaAll() {
		return $this->db->count_all("users JOIN users_groups ON users.id = users_groups.user_id WHERE group_id = '3'");
	}
	
	public function countProspekAll() {
		return $this->db->count_all("tabel_prospek JOIN users ON tabel_prospek.user_id = users.id WHERE id != ''");
	}
		
	public function countSubprospekAll() {
		return $this->db->count_all("tabel_subprospek JOIN users ON tabel_subprospek.user_id = users.id WHERE id != ''");
	}
	
	public function data_spv() {
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->join('users_groups','users.id = users_groups.user_id','LEFT');
		$this->db->where('group_id',2);
		$query = $this->db->get ();
		return $query->result();
	}
	
	### Beranda SPV
	
	public function countWiraniaga($spv) {
		return $this->db->count_all("users WHERE spv = '$spv'");
	}
	
	public function countProspek($spv) {
		return $this->db->count_all("users JOIN tabel_prospek ON users.id = tabel_prospek.user_id WHERE spv = '$spv'");
	}
		
	public function countSubprospek($spv) {
		return $this->db->count_all("users JOIN tabel_subprospek ON users.id = tabel_subprospek.user_id WHERE spv = '$spv'");
	}
	
	### Beranda Wiraniaga
	
	public function countProspek2($user_id) {
		return $this->db->count_all("tabel_prospek WHERE user_id = '$user_id' AND kategori=1 ");
	}
		
	public function countProspek3($user_id) {
		return $this->db->count_all("tabel_prospek WHERE user_id = '$user_id' AND kategori=2 ");
	}
		
	public function countProspek4($user_id) {
		return $this->db->count_all("tabel_prospek WHERE user_id = '$user_id' AND kategori=3 ");
	}
		
	public function countSubprospek2($user_id) {
		return $this->db->count_all("tabel_subprospek WHERE user_id = '$user_id'");
	}
		
}