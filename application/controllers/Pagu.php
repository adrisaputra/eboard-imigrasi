<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pagu extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		include_once './vendor/autoload.php';
		$this->load->model('m_pagu');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		## Pagination
		$base_url = base_url () . "pagu/index/";
		$total_rows = $this->m_pagu->data('', '');
		$per_page = 25;
		$uri_segment = 3;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_pagu->data($per_page, $page);
		
 		$this->render('pagu/content');
	}

	//View Create Data
	public function create_view()
	{
		$this->render('pagu/insert');
	}

	//View Update Data
	public function create()
	{
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[255]');
		$this->form_validation->set_rules('pagu', 'Pagu', 'required|max_length[255]');
		 $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create_view();
		} 
		else 
		{	
			$data['tahun'] = $this->input->post('tahun');
			$data['pagu'] = str_replace(".", "", $this->input->post('pagu'));
			$this->m_pagu->insert($data);
			
			$this->logger
			->user($this->ion_auth->get_users_groups()->row()->id) 
			->type('post') 
			->id('') 
			->token('Tambah Pagu')
			->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pagu Di Simpan !</b></p>');
			redirect('pagu');
		}
	}

	//View Update Data
	public function update_view()
	{
		$pagu_id = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_pagu->get($pagu_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('pagu');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('pagu/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$pagu_id = encrypt_url($this->input->post('pagu_id'));	
		
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[255]');
		$this->form_validation->set_rules('pagu', 'Pagu', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_pagu->get($this->input->post('pagu_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('pagu');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('pagu/update');
			}
		} 
		else 
		{	
			$data['pagu_id'] = $this->input->post('pagu_id');
			$data['tahun'] = $this->input->post('tahun');
			$data['pagu'] = str_replace(".", "", $this->input->post('pagu'));
			$this->m_pagu->update($data);
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($this->input->post('pagu_id')) 
			 ->token('Ubah Pagu')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pagu Di Ubah !</b></p>');
			redirect('pagu');
		}
	}

	//Delete Data
	public function delete() 
	{
		
		$pagu_id = decrypt_url($this->uri->segment(3));
		
		$this->m_pagu->delete($pagu_id);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($pagu_id) 
			 ->token('Hapus Pagu')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Pagu Di Hapus !</b></p>');
        redirect('pagu');

    }
	
	
}
