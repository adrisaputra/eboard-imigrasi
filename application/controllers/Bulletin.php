<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Bulletin extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		$this->load->model('m_bulletin');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		## Pagination
		$base_url = base_url () . "bulletin/index/";
		$total_rows = $this->m_bulletin->data('', '');
		$per_page = 25;
		$uri_segment = 3;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_bulletin->data($per_page, $page);
		
 		$this->render('bulletin/content');
	}
	
	//View Update Data
	public function update_view()
	{
		$bulletin_id = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_bulletin->get($bulletin_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('satuan');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('bulletin/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$bulletin_id = encrypt_url($this->input->post('bulletin_id'));	
		
		$this->form_validation->set_rules('bulletin', 'Text Berjalan', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_bulletin->get($this->input->post('bulletin_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('satuan');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('bulletin/update');
			}
		} 
		else 
		{	
			$data['bulletin_id'] = $this->input->post('bulletin_id');
			$data['bulletin'] = $this->input->post('bulletin');
			$data['date'] = date("Y-m-d");
			$data['time'] = date("h:i:s");
			$data['year'] = date("y");
			$this->m_bulletin->update($data);
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($this->input->post('bulletin_id')) 
			 ->token('Ubah Pengumuman')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pengumuman Di Ubah !</b></p>');
			redirect('bulletin');
		}
	}
	
}
