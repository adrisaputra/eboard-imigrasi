<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Penerimaan extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		include_once './vendor/autoload.php';
		$this->load->model('m_penerimaan');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		## Pagination
		$base_url = base_url () . "penerimaan/index/";
		$total_rows = $this->m_penerimaan->data('', '');
		$per_page = 25;
		$uri_segment = 3;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_penerimaan->data($per_page, $page);
		
 		$this->render('penerimaan/content');
	}

	//View Create Data
	public function create_view()
	{
		$this->render('penerimaan/insert');
	}

	//View Update Data
	public function create()
	{
		$this->form_validation->set_rules('jenis_penerimaan', 'Jenis Penerimaan', 'required|max_length[1000]');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|max_length[255]');
		 $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create_view();
		} 
		else 
		{	
			$data['jenis_penerimaan'] = $this->input->post('jenis_penerimaan');
			$data['jumlah'] = str_replace(".", "", $this->input->post('jumlah'));
			$this->m_penerimaan->insert($data);
			
			$this->logger
			->user($this->ion_auth->get_users_groups()->row()->id) 
			->type('post') 
			->id('') 
			->token('Tambah Pelabuhan')
			->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pelabuhan Di Simpan !</b></p>');
			redirect('penerimaan');
		}
	}

	//View Update Data
	public function update_view()
	{
		$penerimaan_id = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_penerimaan->get($penerimaan_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('penerimaan');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('penerimaan/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$penerimaan_id = encrypt_url($this->input->post('penerimaan_id'));	
		
		$this->form_validation->set_rules('jenis_penerimaan', 'Jenis Penerimaan', 'required|max_length[1000]');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_penerimaan->get($this->input->post('penerimaan_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('penerimaan');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('penerimaan/update');
			}
		} 
		else 
		{	
			$data['penerimaan_id'] = $this->input->post('penerimaan_id');
			$data['jenis_penerimaan'] = $this->input->post('jenis_penerimaan');
			$data['jumlah'] = str_replace(".", "", $this->input->post('jumlah'));
			$this->m_penerimaan->update($data);
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($this->input->post('penerimaan_id')) 
			 ->token('Ubah Pelabuhan')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pelabuhan Di Ubah !</b></p>');
			redirect('penerimaan');
		}
	}

	//Delete Data
	public function delete() 
	{
		
		$penerimaan_id = decrypt_url($this->uri->segment(3));
		
		$this->m_penerimaan->delete($penerimaan_id);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($penerimaan_id) 
			 ->token('Hapus Pelabuhan')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Pelabuhan Di Hapus !</b></p>');
        redirect('penerimaan');

    }
	
	
}
