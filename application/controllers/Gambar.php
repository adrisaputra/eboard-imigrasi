<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Gambar extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		include_once './vendor/autoload.php';
		$this->load->model('m_gambar');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		## Pagination
		$base_url = base_url () . "gambar/index/";
		$total_rows = $this->m_gambar->data('', '');
		$per_page = 25;
		$uri_segment = 3;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_gambar->data($per_page, $page);
		
 		$this->render('gambar/content');
	}

	//View Create Data
	public function create_view()
	{
		$this->render('gambar/insert');
	}

	//View Update Data
	public function create()
	{
		$this->form_validation->set_rules('nama_gambar', 'Nama Gambar', 'required|max_length[255]');
		if (empty($_FILES['userfile']['name']))
			{	
				$this->form_validation->set_rules('userfile', 'File Gambar', 'required');
			}
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create_view();
		} 
		else 
		{	
			$filename = $this->input->post('nama_gambar');
			$config['upload_path']      = './upload/gambar/';
			$config['allowed_types']    = 'jpg|jpeg|png';
			$config['max_size']         = 200000000;
			$config['max_width']        = 100000;
			$config['max_height']   	= 100000;
			$config['file_name'] 		= ''.$filename;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('userfile')) {
				 $error = array('error' => $this->upload->display_errors());
				 echo $error['error'];
			} else {
				$dat = $this->upload->data();
				$data['nama_gambar'] = $this->input->post('nama_gambar');
				$data['gambar'] = $dat['file_name'];
					
				$this->m_gambar->insert($data);
				
				$this->logger
				 ->user($this->ion_auth->get_users_groups()->row()->id) 
				 ->type('post') 
				 ->id('') 
				 ->token('Tambah Gambar')
				 ->log(); 

				$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Gambar Di Simpan !</b></p>');
				redirect('gambar');
			}
		}
	}
	
	//View Update Data
	public function update_view()
	{
		$gambar_id = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_gambar->get($gambar_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('satuan');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('gambar/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$gambar_id = encrypt_url($this->input->post('gambar_id'));	
		
		$this->form_validation->set_rules('nama_gambar', 'Nama Gambar', 'required|max_length[255]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_gambar->get($this->input->post('gambar_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('gambar');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('gambar/update');
			}
		} 
		else 
		{	
			$filename = $this->input->post('nama_gambar');
			$config['upload_path']      = './upload/gambar/';
			$config['allowed_types']    = 'jpg|jpeg|png';
			$config['max_size']         = 200000000;
			$config['max_width']        = 100000;
			$config['max_height']   	= 100000;
			$config['file_name'] 		= ''.$filename;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('userfile')) {
				$data['gambar_id'] = $this->input->post('gambar_id');
				$data['nama_gambar'] = $this->input->post('nama_gambar');
					
				$this->m_gambar->update($data);
				
				$this->logger
				 ->user($this->ion_auth->get_users_groups()->row()->id) 
				 ->type('post') 
				 ->id('') 
				 ->token('Ubah Gambar')
				 ->log(); 

				$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Gambar Di Ubah !</b></p>');
				redirect('gambar');
			} else {
				
				$entry =  $this->m_gambar->get($this->input->post('gambar_id'));
				$path_file = './upload/gambar/';
				unlink($path_file.$entry[0]['gambar']);
				
				$dat = $this->upload->data();
				
				$data['gambar_id'] = $this->input->post('gambar_id');
				$data['nama_gambar'] = $this->input->post('nama_gambar');
				$data['gambar'] = $dat['file_name'];
					
				$this->m_gambar->update($data);
				
				$this->logger
				 ->user($this->ion_auth->get_users_groups()->row()->id) 
				 ->type('post') 
				 ->id('') 
				 ->token('Ubah Gambar')
				 ->log(); 

				$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Gambar Di Ubah !</b></p>');
				redirect('gambar');
			}
		}
	}
	
	//Delete Data
	public function delete() 
	{
		
		$gambar_id = decrypt_url($this->uri->segment(3));
		$entry = $this->m_gambar->get($gambar_id);
		
		$path_file = './upload/gambar/';
		unlink($path_file.$entry[0]['gambar_file']);
        
		$this->m_gambar->delete($gambar_id);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($gambar_id) 
			 ->token('Hapus Gambar Kapal')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Gambar Di Hapus !</b></p>');
        redirect('gambar');

    }
	
	
}
