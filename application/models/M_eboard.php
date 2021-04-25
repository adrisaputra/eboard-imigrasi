<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_eboard extends CI_Model {
	
	public function video_primary() {
		$this->db->select('*');
		$this->db->from('video_tbl');
		$query = $this->db->get ();
		return $query->result_array();
	}
	public function video() {
		$this->db->select('*');
		$this->db->from('video_tbl');
		$query = $this->db->get ();
		return $query->result();
	}
	
	public function dokumen() {
		$this->db->select('*');
		$this->db->from('dokumen_tbl');
		$query = $this->db->get ();
		return $query->result();
	}
	
	public function pelabuhan() {
		$this->db->select('*');
		$this->db->from('pelabuhan_tbl');
		$query = $this->db->get ();
		return $query->result();
	}
	
	public function penerimaan() {
		$this->db->select('*');
		$this->db->from('penerimaan_tbl');
		$query = $this->db->get ();
		return $query->result();
	}
	
	public function gambar() {
		$this->db->select('*');
	  	$this->db->from('gambar_tbl');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function bulletin1() {
        	$this->db->select('*');
		$this->db->from('bulletin_tbl');
		$this->db->where('bulletin_id',1);
        	$query = $this->db->get();
        	return $query->result_array();
    	}
	
	public function bulletin2() {
        	$this->db->select('*');
		$this->db->from('bulletin_tbl');
		$this->db->where('bulletin_id',2);
        	$query = $this->db->get();
        	return $query->result_array();
    	}
	
	public function pagu() {
		$this->db->select('*');
		$this->db->from('pagu_tbl');
		$this->db->where('tahun',date('Y'));
        	$query = $this->db->get();
        	return $query->result_array();
    }
	public function realisasi() {
		$this->db->select('*');
		$this->db->from('realisasi_tbl');
		$this->db->where('tahun',date('Y'));
		$this->db->order_by('bln','ASC');
        	$query = $this->db->get();
        	return $query->result_array();
    }
	
	
}
