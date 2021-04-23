<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ship extends CI_Model {
	
	public function data($limit, $start) {
		$this->db->select('*');
		$this->db->from('ship_tbl');
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('ship_tbl.ship_id','DESC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian ship_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('ship_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('ship_tbl.ship_id','DESC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada ship_tbl
	public function get($ship_id) {
		$this->db->where('ship_tbl.ship_id', $ship_id);
        $query = $this->db->get('ship_tbl', 1);
        return $query->result_array();
    }
	
	//Create data
	public function insert($data) {
        $this->db->insert('ship_tbl', $data);
    }

	//Update data
	public function update($data) {
        $this->db->update('ship_tbl', $data, array('ship_id'=>$data['ship_id']));
    }

	//Delete Data
	public function delete($ship_id) {
        $this->db->delete('ship_tbl', array('ship_id' => $ship_id));
    }
	
}
