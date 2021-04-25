<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penerimaan extends CI_Model {
	
	public function data($limit, $start) {
		$this->db->select('*');
		$this->db->from('penerimaan_tbl');
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('penerimaan_tbl.penerimaan_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian penerimaan_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('penerimaan_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('penerimaan_tbl.penerimaan_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada penerimaan_tbl
	public function get($penerimaan_id) {
		$this->db->where('penerimaan_tbl.penerimaan_id', $penerimaan_id);
        $query = $this->db->get('penerimaan_tbl', 1);
        return $query->result_array();
    }
	
	//Create data
	public function insert($data) {
        $this->db->insert('penerimaan_tbl', $data);
    }

	//Update data
	public function update($data) {
        $this->db->update('penerimaan_tbl', $data, array('penerimaan_id'=>$data['penerimaan_id']));
    }

	//Delete Data
	public function delete($penerimaan_id) {
        $this->db->delete('penerimaan_tbl', array('penerimaan_id' => $penerimaan_id));
    }
	
}
