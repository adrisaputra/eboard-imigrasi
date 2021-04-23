<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	
	public function count_user() {
		$this->db->select('*');
		$this->db->from('users');
		return $this->db->count_all_results(); 
	}
	
	public function count_ship() {
		$this->db->select('*');
		$this->db->from('ship_tbl');
		return $this->db->count_all_results(); 
	}
	
}