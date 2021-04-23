<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ship extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		include_once './vendor/autoload.php';
		$this->load->model('m_ship');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		## Pagination
		$base_url = base_url () . "ship/index/";
		$total_rows = $this->m_ship->data('', '');
		$per_page = 25;
		$uri_segment = 3;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_ship->data($per_page, $page);
		
 		$this->render('ship/content');
	}
	
	//View Data Pencarian
	public function search()
	{
		if($this->input->post('submit')){
				$column = "ship_name";
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
		$base_url = base_url () . "ship/search/".$query."/".$column;
		$total_rows = $this->m_ship->search($column,$query,'', '');
		$per_page = 25;
		$uri_segment = 5;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_ship->search($column,$query,$per_page, $page);
		
 		$this->render('ship/content');
	}
	
	
	//View Create Data
	public function create_view()
	{
		$this->render('ship/insert');
	}
	
	
	//View Update Data
	public function create()
	{
		$this->form_validation->set_rules('ship_name', 'Nama Kapal', 'required|max_length[255]');
		$this->form_validation->set_rules('destination', 'Tujuan', 'required|max_length[255]');
		$this->form_validation->set_rules('start_date', 'Tanggal Berangkat', 'required|max_length[255]');
		$this->form_validation->set_rules('leaning_date', 'Tanggal Sandar', 'required|max_length[255]');
		$this->form_validation->set_rules('arrived_date', 'Tanggal Tiba', 'required|max_length[255]');
		$this->form_validation->set_rules('start_time', 'Jam Berangkat', 'required|max_length[255]');
		$this->form_validation->set_rules('leaning_time', 'Jam Sandar', 'required|max_length[255]');
		$this->form_validation->set_rules('arrived_time', 'Jam Tiba', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create_view();
		} 
		else 
		{	
			$data['ship_name'] = $this->input->post('ship_name');
			$data['destination'] = $this->input->post('destination');
			$data['start_date'] = date("Y-m-d", strtotime($this->input->post('start_date')));
			$data['leaning_date'] = date("Y-m-d", strtotime($this->input->post('leaning_date')));
			$data['arrived_date'] = date("Y-m-d", strtotime($this->input->post('arrived_date')));
			$data['start_time'] = $this->input->post('start_time');
			$data['leaning_time'] = $this->input->post('leaning_time');
			$data['arrived_time'] = $this->input->post('arrived_time');
			$data['date'] = date("Y-m-d");
			$data['time'] = date("h:i:s");
			$data['year'] = date("y");
			$this->m_ship->insert($data);
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id('') 
			 ->token('Tambah Jadwal Kapal')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Jadwal Kapal Di Simpan !</b></p>');
			redirect('ship');
		}
	}
	
	//View Update Data
	public function update_view()
	{
		$ship_id = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_ship->get($ship_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('satuan');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('ship/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$ship_id = encrypt_url($this->input->post('ship_id'));	
		
		$this->form_validation->set_rules('ship_name', 'Nama Kapal', 'required|max_length[255]');
		$this->form_validation->set_rules('destination', 'Tujuan', 'required|max_length[255]');
		$this->form_validation->set_rules('start_date', 'Tanggal Berangkat', 'required|max_length[255]');
		$this->form_validation->set_rules('leaning_date', 'Tanggal Sandar', 'required|max_length[255]');
		$this->form_validation->set_rules('arrived_date', 'Tanggal Tiba', 'required|max_length[255]');
		$this->form_validation->set_rules('start_time', 'Jam Berangkat', 'required|max_length[255]');
		$this->form_validation->set_rules('leaning_time', 'Jam Sandar', 'required|max_length[255]');
		$this->form_validation->set_rules('arrived_time', 'Jam Tiba', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_ship->get($this->input->post('ship_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('satuan');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('ship/update');
			}
		} 
		else 
		{	
			$data['ship_id'] = $this->input->post('ship_id');
			$data['ship_name'] = $this->input->post('ship_name');
			$data['destination'] = $this->input->post('destination');
			$data['start_date'] = date("Y-m-d", strtotime($this->input->post('start_date')));
			$data['leaning_date'] = date("Y-m-d", strtotime($this->input->post('leaning_date')));
			$data['arrived_date'] = date("Y-m-d", strtotime($this->input->post('arrived_date')));
			$data['start_time'] = $this->input->post('start_time');
			$data['leaning_time'] = $this->input->post('leaning_time');
			$data['arrived_time'] = $this->input->post('arrived_time');
			$data['date'] = date("Y-m-d");
			$data['time'] = date("h:i:s");
			$data['year'] = date("y");
			$this->m_ship->update($data);
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($this->input->post('ship_id')) 
			 ->token('Ubah Jadwal Kapal')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Jadwal Kapal Di Ubah !</b></p>');
			redirect('ship');
		}
	}
	
	//Delete Data
	public function delete() 
	{
		
		$ship_id = decrypt_url($this->uri->segment(3));
		
		$this->m_ship->delete($ship_id);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($ship_id) 
			 ->token('Hapus Jadwal Kapal')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Jadwal Kapal Di Hapus !</b></p>');
        redirect('ship');

    }
	
}
