<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokumen extends CI_Model {
	
	public function data($limit, $start) {
		$this->db->select('*');
		$this->db->from('dokumen_tbl');
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('dokumen_tbl.dokumen_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian dokumen_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('dokumen_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('dokumen_tbl.dokumen_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada dokumen_tbl
	public function get($dokumen_id) {
		$this->db->where('dokumen_tbl.dokumen_id', $dokumen_id);
        $query = $this->db->get('dokumen_tbl', 1);
        return $query->result_array();
    }
	
	//Create data
	public function insert($data) {
        $this->db->insert('dokumen_tbl', $data);
    }

	//Update data
	public function update($data) {
        $this->db->update('dokumen_tbl', $data, array('dokumen_id'=>$data['dokumen_id']));
    }

	//Delete Data
	public function delete($dokumen_id) {
        $this->db->delete('dokumen_tbl', array('dokumen_id' => $dokumen_id));
    }
	
}
