<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_log extends CI_Model
{
	function __construct() {
        parent::__construct();
    }

	public function data() {
		$query  = $this->db->query("SELECT * FROM core_log");
        return $query->result();
	}
	
	public function getByUser($id) {
		$query  = $this->db->query("SELECT * FROM core_log WHERE id_user='$id'");
        return $query->result();
	}
	
	
	public function create($data) {
        //get data
		$this->action = $data['action'];
        $this->id_user = $this->ion_auth->user()->row()->id;
        $this->date = date("Y-m-d");
		$this->time = date("h:i:s");
		$this->ip_address = $this->input->ip_address();

        //insert data
        $this->db->insert('core_log', $this);
    }
	
	public function update($data) {
        //get data
        $this->action = $data['action'];
        $this->id_user = $this->ion_auth->user()->row()->id;
        $this->date = date("Y-m-d");
		$this->time = date("h:i:s");
		$this->ip_address = $this->input->ip_address();

        //insert data
        $this->db->update('core_log', $this, array('id_log'=>$data['id_log']));
    }
	
	public function delete($id) {
        $this->db->delete('core_log', array('id_log' => $id));
    }
}