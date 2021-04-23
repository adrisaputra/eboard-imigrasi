<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bulletin extends CI_Model {
	
	public function data($limit, $start) {
		$this->db->select('*');
		$this->db->from('bulletin_tbl');
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('bulletin_tbl.bulletin_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian bulletin_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('bulletin_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('bulletin_tbl.bulletin_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada bulletin_tbl
	public function get($bulletin_id) {
		$this->db->where('bulletin_tbl.bulletin_id', $bulletin_id);
        $query = $this->db->get('bulletin_tbl', 1);
        return $query->result_array();
    }
	
	//Update data
	public function update($data) {
        $this->db->update('bulletin_tbl', $data, array('bulletin_id'=>$data['bulletin_id']));
    }

	//Delete Data
	public function delete($bulletin_id) {
        $this->db->delete('bulletin_tbl', array('bulletin_id' => $bulletin_id));
    }
	
}
