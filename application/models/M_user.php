<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Model
{
	
	public function data($limit, $start) {
		$this->db->select('users.*, groups.id as group_id, groups.bgcolor, groups.name');
		$this->db->from('users');
		$this->db->join('users_groups', 'users.id = users_groups.user_id' );
		$this->db->join('groups', 'users_groups.group_id = groups.id' );
		if($limit){
			$this->db->limit ($limit, $start);
			$this->db->order_by('id','DESC');
			$query = $this->db->get ();
			return $query->result();
		} else {
			return $this->db->count_all_results(); 
		}
	}
	
	public function get($id_user) {
        $this->db->select('users.*, groups.id as group_id');
		$this->db->from('users');
		$this->db->join('users_groups', 'users.id = users_groups.user_id' );
		$this->db->join('groups', 'users_groups.group_id = groups.id' );
		$this->db->where('users.id', $id_user );
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function delete($id_user) {
        $this->db->delete('users', array('id' => $id_user));
    }
	
	
}