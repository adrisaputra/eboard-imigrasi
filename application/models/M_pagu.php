<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pagu extends CI_Model {
	
	public function data($limit, $start) {
		$this->db->select('*');
		$this->db->from('pagu_tbl');
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('pagu_tbl.pagu_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian pagu_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('pagu_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('pagu_tbl.pagu_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada pagu_tbl
	public function get($pagu_id) {
		$this->db->where('pagu_tbl.pagu_id', $pagu_id);
        $query = $this->db->get('pagu_tbl', 1);
        return $query->result_array();
    }
	
	//Create data
	public function insert($data) {
        $this->db->insert('pagu_tbl', $data);
    }

	//Update data
	public function update($data) {
        $this->db->update('pagu_tbl', $data, array('pagu_id'=>$data['pagu_id']));
    }

	//Delete Data
	public function delete($pagu_id) {
        $this->db->delete('pagu_tbl', array('pagu_id' => $pagu_id));
    }
	
}
