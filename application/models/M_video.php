<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_video extends CI_Model {
	
	public function data($limit, $start) {
		$this->db->select('*');
		$this->db->from('video_tbl');
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('video_tbl.video_id','DESC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Show data pencarian video_tbl
	public function search($column, $value, $limit, $start) {
		$this->db->select('*');
		$this->db->from('video_tbl');
		$this->db->like($column,$value);
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('video_tbl.video_id','DESC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	//Get id_satuan pada video_tbl
	public function get($video_id) {
		$this->db->where('video_tbl.video_id', $video_id);
        $query = $this->db->get('video_tbl', 1);
        return $query->result_array();
    }
	
	//Create data
	public function insert($data) {
        $this->db->insert('video_tbl', $data);
    }

	//Update data
	public function update($data) {
        $this->db->update('video_tbl', $data, array('video_id'=>$data['video_id']));
    }

	//Delete Data
	public function delete($video_id) {
        $this->db->delete('video_tbl', array('video_id' => $video_id));
    }
	
}
