<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Video extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		$this->load->model('m_video');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		## Pagination
		$base_url = base_url () . "video/index/";
		$total_rows = $this->m_video->data('', '');
		$per_page = 25;
		$uri_segment = 3;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_video->data($per_page, $page);
		
 		$this->render('video/content');
	}
	
	//View Data Pencarian
	public function search()
	{
		if($this->input->post('submit')){
				$column = "video_name";
				$query = $this->input->post('data');
				
				$option = array(
					'user_column'=>$column,
					'user_data'=>$query
				);
				$this->session->set_userdata($option);
		}else{
		   $query = str_replace("%20"," ",$this->uri->segment ( 3 ));
		   $column = $this->uri->segment ( 4 );
		}
			
		## Pagination
		$base_url = base_url () . "video/search/".$query."/".$column;
		$total_rows = $this->m_video->search($column,$query,'', '');
		$per_page = 25;
		$uri_segment = 5;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_video->search($column,$query,$per_page, $page);
		
 		$this->render('video/content');
	}
	
	
	//View Create Data
	public function create_view()
	{
		$this->render('video/insert');
	}
	
	
	//View Update Data
	public function create()
	{
		$this->form_validation->set_rules('video_name', 'Nama Video', 'required|max_length[255]');
		$this->form_validation->set_rules('link', 'Link Youtube', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create_view();
		} 
		else 
		{	
			
			$dat = $this->upload->data();
			$data['video_name'] = $this->input->post('video_name');
			$data['link'] = $this->input->post('link');
				
			$this->m_video->insert($data);
			
			$this->logger
				->user($this->ion_auth->get_users_groups()->row()->id) 
				->type('post') 
				->id('') 
				->token('Tambah Video')
				->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Video Di Simpan !</b></p>');
			redirect('video');
		}
	}
	
	//View Update Data
	public function update_view()
	{
		$video_id = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_video->get($video_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('satuan');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('video/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$video_id = encrypt_url($this->input->post('video_id'));	
		
		$this->form_validation->set_rules('video_name', 'Nama Video', 'required|max_length[255]');
		$this->form_validation->set_rules('link', 'Link Youtube', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_video->get($this->input->post('video_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('satuan');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('video/update');
			}
		} 
		else 
		{	
			$data['video_id'] = $this->input->post('video_id');
			$data['video_name'] = $this->input->post('video_name');
			$data['link'] = $this->input->post('link');
				
			$this->m_video->update($data);
			
			$this->logger
				->user($this->ion_auth->get_users_groups()->row()->id) 
				->type('post') 
				->id('') 
				->token('Ubah Video')
				->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Video Di Ubah !</b></p>');
			redirect('video');
		}
	}
	
	//Delete Data
	public function delete() 
	{
		
		$video_id = decrypt_url($this->uri->segment(3));
		
		$this->m_video->delete($video_id);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($video_id) 
			 ->token('Hapus Video Kapal')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Video Di Hapus !</b></p>');
        redirect('video');

    }
	
}
