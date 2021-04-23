<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eboard extends CI_Controller {
	
	public function __construct(){  
        parent::__construct();
		error_reporting(0);
		$this->load->model('m_eboard');
    }
	
	public function index()
	{
		$data['bulletin1']= $this->m_eboard->bulletin1();
		$data['bulletin2']= $this->m_eboard->bulletin2();
		$data['pagu']= $this->m_eboard->pagu();
		$data['realisasi']= $this->m_eboard->realisasi();
		$data['video_primary']= $this->m_eboard->video_primary();
		$data['video']= $this->m_eboard->video();
		$this->load->view('eboard', $data);
	}
	
}
