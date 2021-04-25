<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelabuhan extends CI_Model {
	
	public function data($limit, $start) {
		$this->db->select('*');
		$this->db->from('pelabuhan_tbl');
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('pelabuhan_tbl.pelabuhan_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian pelabuhan_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('pelabuhan_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('pelabuhan_tbl.pelabuhan_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada pelabuhan_tbl
	public function get($pelabuhan_id) {
		$this->db->where('pelabuhan_tbl.pelabuhan_id', $pelabuhan_id);
        $query = $this->db->get('pelabuhan_tbl', 1);
        return $query->result_array();
    }
	
	//Create data
	public function insert($data) {
        $this->db->insert('pelabuhan_tbl', $data);
    }

	//Update data
	public function update($data) {
        $this->db->update('pelabuhan_tbl', $data, array('pelabuhan_id'=>$data['pelabuhan_id']));
    }

	//Delete Data
	public function delete($pelabuhan_id) {
        $this->db->delete('pelabuhan_tbl', array('pelabuhan_id' => $pelabuhan_id));
    }
	
}
