<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pelabuhan extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		include_once './vendor/autoload.php';
		$this->load->model('m_pelabuhan');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		## Pagination
		$base_url = base_url () . "pelabuhan/index/";
		$total_rows = $this->m_pelabuhan->data('', '');
		$per_page = 25;
		$uri_segment = 3;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_pelabuhan->data($per_page, $page);
		
 		$this->render('pelabuhan/content');
	}

	//View Create Data
	public function create_view()
	{
		$this->render('pelabuhan/insert');
	}

	//View Update Data
	public function create()
	{
		$this->form_validation->set_rules('pelabuhan', 'Pelabuhan', 'required|max_length[255]');
		$this->form_validation->set_rules('kapal_in', 'KAPAL IN', 'required|max_length[255]');
		$this->form_validation->set_rules('kapal_out', 'KAPAL OUT', 'required|max_length[255]');
		$this->form_validation->set_rules('in_crew_wni', 'IN CREW WNI', 'required|max_length[255]');
		$this->form_validation->set_rules('in_crew_wna', 'IN CREW WNA', 'required|max_length[255]');
		$this->form_validation->set_rules('out_crew_wni', 'OUT CREW WNI', 'required|max_length[255]');
		$this->form_validation->set_rules('out_crew_wna', 'OUT CREW WNA', 'required|max_length[255]');
		 $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create_view();
		} 
		else 
		{	
			$data['pelabuhan'] = $this->input->post('pelabuhan');
			$data['kapal_in'] = str_replace(".", "", $this->input->post('kapal_in'));
			$data['kapal_out'] = str_replace(".", "", $this->input->post('kapal_out'));
			$data['in_crew_wni'] = str_replace(".", "", $this->input->post('in_crew_wni'));
			$data['in_crew_wna'] = str_replace(".", "", $this->input->post('in_crew_wna'));
			$data['out_crew_wni'] = str_replace(".", "", $this->input->post('out_crew_wni'));
			$data['out_crew_wna'] = str_replace(".", "", $this->input->post('out_crew_wna'));
			$this->m_pelabuhan->insert($data);
			
			$this->logger
			->user($this->ion_auth->get_users_groups()->row()->id) 
			->type('post') 
			->id('') 
			->token('Tambah Pelabuhan')
			->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pelabuhan Di Simpan !</b></p>');
			redirect('pelabuhan');
		}
	}

	//View Update Data
	public function update_view()
	{
		$pelabuhan_id = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_pelabuhan->get($pelabuhan_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('pelabuhan');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('pelabuhan/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$pelabuhan_id = encrypt_url($this->input->post('pelabuhan_id'));	
		
		$this->form_validation->set_rules('pelabuhan', 'Pelabuhan', 'required|max_length[255]');
		$this->form_validation->set_rules('kapal_in', 'KAPAL IN', 'required|max_length[255]');
		$this->form_validation->set_rules('kapal_out', 'KAPAL OUT', 'required|max_length[255]');
		$this->form_validation->set_rules('in_crew_wni', 'IN CREW WNI', 'required|max_length[255]');
		$this->form_validation->set_rules('in_crew_wna', 'IN CREW WNA', 'required|max_length[255]');
		$this->form_validation->set_rules('out_crew_wni', 'OUT CREW WNI', 'required|max_length[255]');
		$this->form_validation->set_rules('out_crew_wna', 'OUT CREW WNA', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_pelabuhan->get($this->input->post('pelabuhan_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('pelabuhan');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('pelabuhan/update');
			}
		} 
		else 
		{	
			$data['pelabuhan_id'] = $this->input->post('pelabuhan_id');
			$data['kapal_in'] = str_replace(".", "", $this->input->post('kapal_in'));
			$data['kapal_out'] = str_replace(".", "", $this->input->post('kapal_out'));
			$data['in_crew_wni'] = str_replace(".", "", $this->input->post('in_crew_wni'));
			$data['in_crew_wna'] = str_replace(".", "", $this->input->post('in_crew_wna'));
			$data['out_crew_wni'] = str_replace(".", "", $this->input->post('out_crew_wni'));
			$data['out_crew_wna'] = str_replace(".", "", $this->input->post('out_crew_wna'));
			$this->m_pelabuhan->update($data);
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($this->input->post('pelabuhan_id')) 
			 ->token('Ubah Pelabuhan')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pelabuhan Di Ubah !</b></p>');
			redirect('pelabuhan');
		}
	}

	//Delete Data
	public function delete() 
	{
		
		$pelabuhan_id = decrypt_url($this->uri->segment(3));
		
		$this->m_pelabuhan->delete($pelabuhan_id);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($pelabuhan_id) 
			 ->token('Hapus Pelabuhan')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Pelabuhan Di Hapus !</b></p>');
        redirect('pelabuhan');

    }
	
	
}
