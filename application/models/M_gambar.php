<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gambar extends CI_Model {
	
	public function data($limit, $start) {
		$this->db->select('*');
		$this->db->from('gambar_tbl');
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('gambar_tbl.gambar_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian gambar_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('gambar_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('gambar_tbl.gambar_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada gambar_tbl
	public function get($gambar_id) {
		$this->db->where('gambar_tbl.gambar_id', $gambar_id);
        $query = $this->db->get('gambar_tbl', 1);
        return $query->result_array();
    }
	
	//Create data
	public function insert($data) {
        $this->db->insert('gambar_tbl', $data);
    }

	//Update data
	public function update($data) {
        $this->db->update('gambar_tbl', $data, array('gambar_id'=>$data['gambar_id']));
    }

	//Delete Data
	public function delete($gambar_id) {
        $this->db->delete('gambar_tbl', array('gambar_id' => $gambar_id));
    }
	
}
