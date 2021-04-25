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
		$data['dokumen']= $this->m_eboard->dokumen();
		$data['pelabuhan']= $this->m_eboard->pelabuhan();
		$data['penerimaan']= $this->m_eboard->penerimaan();
		$data['gambar']= $this->m_eboard->gambar();
		$this->load->view('eboard', $data);
	}
	
}
