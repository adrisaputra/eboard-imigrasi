<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		error_reporting(0);
		$this->load->model('setting/m_log');
		$this->load->model('setting/m_group');
	     $this->load->library('Ion_auth');
		
	}
	
	public function index()
	{
		$this->data['page_title'] = 'Login';
        $this->load->library('form_validation');
		
		$this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('remember','Remember me','integer');
        if($this->form_validation->run()===TRUE)
        {
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
				 
				$this->logger
				 ->user($this->ion_auth->get_users_groups()->row()->id) 
				 ->type('post') 
				 ->id('') 
				 ->token('Login')
				 ->log(); 

                 redirect('dashboard', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('notif', 'Username atau Password Salah');
                redirect('login', 'refresh');
            }
        }
		else
		{
			$this->load->helper('form');
			$this->load->view('login');
		}
	}
	
	public function logout()
    {
        $this->ion_auth->logout();
        redirect('login', 'refresh');
    }
	
}
