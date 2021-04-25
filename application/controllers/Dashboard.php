<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		error_reporting(0);
		$this->load->model('m_dashboard');
    }
	
	public function index()
	{
		if ($this->ion_auth->get_users_groups()->row()->id){
			$this->data['user'] = $this->m_dashboard->count_user();
			$this->render('dashboard');
		} else {
			redirect('login');
		}
		
	}
	
}
