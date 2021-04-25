<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dokumen extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		include_once './vendor/autoload.php';
		$this->load->model('m_dokumen');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		## Pagination
		$base_url = base_url () . "dokumen/index/";
		$total_rows = $this->m_dokumen->data('', '');
		$per_page = 25;
		$uri_segment = 3;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_dokumen->data($per_page, $page);
		
 		$this->render('dokumen/content');
	}

	//View Create Data
	public function create_view()
	{
		$this->render('dokumen/insert');
	}

	//View Update Data
	public function create()
	{
		$this->form_validation->set_rules('jenis_permohonan', 'Jenis Permohonan', 'required|max_length[255]');
		$this->form_validation->set_rules('l48', 'L 48', 'required|max_length[255]');
		$this->form_validation->set_rules('p48', 'P 48', 'required|max_length[255]');
		$this->form_validation->set_rules('l24', 'L 24', 'required|max_length[255]');
		$this->form_validation->set_rules('p24', 'P 24', 'required|max_length[255]');
		 $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create_view();
		} 
		else 
		{	
			$data['jenis_permohonan'] = $this->input->post('jenis_permohonan');
			$data['l48'] = str_replace(".", "", $this->input->post('l48'));
			$data['p48'] = str_replace(".", "", $this->input->post('p48'));
			$data['l24'] = str_replace(".", "", $this->input->post('l24'));
			$data['p24'] = str_replace(".", "", $this->input->post('p24'));
			$this->m_dokumen->insert($data);
			
			$this->logger
			->user($this->ion_auth->get_users_groups()->row()->id) 
			->type('post') 
			->id('') 
			->token('Tambah Dokumen')
			->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Dokumen Di Simpan !</b></p>');
			redirect('dokumen');
		}
	}

	//View Update Data
	public function update_view()
	{
		$dokumen_id = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_dokumen->get($dokumen_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('dokumen');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('dokumen/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$dokumen_id = encrypt_url($this->input->post('dokumen_id'));	
		
		$this->form_validation->set_rules('jenis_permohonan', 'Jenis Permohonan', 'required|max_length[255]');
		$this->form_validation->set_rules('l48', 'L 48', 'required|max_length[255]');
		$this->form_validation->set_rules('p48', 'P 48', 'required|max_length[255]');
		$this->form_validation->set_rules('l24', 'L 24', 'required|max_length[255]');
		$this->form_validation->set_rules('p24', 'P 24', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_dokumen->get($this->input->post('dokumen_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('dokumen');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('dokumen/update');
			}
		} 
		else 
		{	
			$data['dokumen_id'] = $this->input->post('dokumen_id');
			$data['jenis_permohonan'] = $this->input->post('jenis_permohonan');
			$data['l48'] = str_replace(".", "", $this->input->post('l48'));
			$data['p48'] = str_replace(".", "", $this->input->post('p48'));
			$data['l24'] = str_replace(".", "", $this->input->post('l24'));
			$data['p24'] = str_replace(".", "", $this->input->post('p24'));
			$this->m_dokumen->update($data);
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($this->input->post('dokumen_id')) 
			 ->token('Ubah Dokumen')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Dokumen Di Ubah !</b></p>');
			redirect('dokumen');
		}
	}

	//Delete Data
	public function delete() 
	{
		
		$dokumen_id = decrypt_url($this->uri->segment(3));
		
		$this->m_dokumen->delete($dokumen_id);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($dokumen_id) 
			 ->token('Hapus Dokumen')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Dokumen Di Hapus !</b></p>');
        redirect('dokumen');

    }
	
	
}
