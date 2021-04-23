<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_menu extends CI_Model
{
	function __construct() {
        parent::__construct();
    }

	public function data() {
		$query  = $this->db->query("SELECT * FROM core_menu");
        return $query->result();
	}
	
	public function getById($id) {
		$query  = $this->db->query("SELECT * FROM core_menu WHERE id_menu='$id'");
        return $query->result();
	}
	
	public function getDataRoot() {
		$query  = $this->db->query("SELECT * FROM core_menu WHERE id_rootmenu='0'");
        return $query->result();
	}
	
	
	public function create($data) {
        //get data
		$this->id_rootmenu = $data['id_rootmenu'];
		$this->menu_name = $data['menu_name'];
		$this->attribute = $data['attribute'];
		$this->link = $data['link'];
		$this->active = $data['active'];
		$this->statusmenu = $data['statusmenu'];
		$this->position = $data['position'];
		$this->description = $data['description'];
        
        //insert data
        $this->db->insert('core_menu', $this);
    }
	
	public function update($data) {
        //get data
        $this->id_rootmenu = $data['id_rootmenu'];
		$this->menu_name = $data['menu_name'];
		$this->attribute = $data['attribute'];
		$this->link = $data['link'];
		$this->active = $data['active'];
		$this->statusmenu = $data['statusmenu'];
		$this->position = $data['position'];
		$this->description = $data['description'];

        //insert data
        $this->db->update('core_menu', $this, array('id_menu'=>$data['id_menu']));
    }
	
	public function delete($id) {
        $this->db->delete('core_menu', array('id_menu' => $id));
    }
	
	//for sidebar menu
	public function getActiveMenu() {
		$query  = $this->db->query("select * from core_menu WHERE active='Ya' AND statusmenu=1 AND id_rootmenu=0 ORDER BY position ");
        return $query->result();
	}
	
	public function getActiveSubmenu() {
		$query  = $this->db->query("select * from core_menu WHERE active='Ya' AND statusmenu=1 AND id_rootmenu!=0 ORDER BY position ");
        return $query->result();
	}
}