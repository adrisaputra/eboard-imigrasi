<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_realisasi extends CI_Model {
	
	public function data($tahun,$limit, $start) {
		$this->db->select('*');
		$this->db->from('realisasi_tbl');
		$this->db->where('tahun',$tahun);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('realisasi_tbl.realisasi_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian realisasi_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('realisasi_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('realisasi_tbl.realisasi_id','ASC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada realisasi_tbl
	public function get($realisasi_id) {
		$this->db->where('realisasi_tbl.realisasi_id', $realisasi_id);
        $query = $this->db->get('realisasi_tbl', 1);
        return $query->result_array();
    }
	
	//Create data
	public function insert($data) {
        $this->db->insert('realisasi_tbl', $data);
    }

	//Update data
	public function update($data) {
        $this->db->update('realisasi_tbl', $data, array('realisasi_id'=>$data['realisasi_id']));
    }

	//Delete Data
	public function delete($realisasi_id) {
        $this->db->delete('realisasi_tbl', array('realisasi_id' => $realisasi_id));
    }
	
}
