<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Realisasi extends Admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		include_once './vendor/autoload.php';
		$this->load->model('m_realisasi');
		if($this->ion_auth->get_users_groups()->row()->id != 1 && $this->ion_auth->get_users_groups()->row()->id != 2){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		$tahun = decrypt_url($this->uri->segment(3));

		## Pagination
		$base_url = base_url () . "realisasi/index/";
		$total_rows = $this->m_realisasi->data($tahun, '','');
		$per_page = 25;
		$uri_segment = 4;
		$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
		$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
		
		$this->data['number'] = $paging['number'];
		$this->data['links'] = $paging['links'];
		$this->data['data'] = $this->m_realisasi->data($tahun, $per_page, $page);
		
 		$this->render('realisasi/content');
	}

	//View Create Data
	public function create_view()
	{
		$this->data['tahun'] = decrypt_url($this->uri->segment(3));
		$this->render('realisasi/insert');
	}

	//View Update Data
	public function create()
	{
		$this->form_validation->set_rules('bulan', 'Bulan', 'required|max_length[255]');
		$this->form_validation->set_rules('belanja_pegawai', 'Belanja Pegawai', 'required|max_length[255]');
		$this->form_validation->set_rules('belanja_barang', 'Belanja Barang', 'required|max_length[255]');
		$this->form_validation->set_rules('belanja_modal', 'Belanja Modal', 'required|max_length[255]');
		 $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->create_view();
		} 
		else 
		{	
			$data['bulan'] = $this->input->post('bulan');
			if($this->input->post('bulan')=="Januari"){
				$data['bln'] = 1;
			} else if($this->input->post('bulan')=="Februari"){
				$data['bln'] = 2;
			} else if($this->input->post('bulan')=="Maret"){
				$data['bln'] = 3;
			} else if($this->input->post('bulan')=="April"){
				$data['bln'] = 4;
			} else if($this->input->post('bulan')=="Mei"){
				$data['bln'] = 5;
			} else if($this->input->post('bulan')=="Juni"){
				$data['bln'] = 6;
			} else if($this->input->post('bulan')=="Juli"){
				$data['bln'] = 7;
			} else if($this->input->post('bulan')=="Agustus"){
				$data['bln'] = 8;
			} else if($this->input->post('bulan')=="September"){
				$data['bln'] = 9;
			} else if($this->input->post('bulan')=="Oktober"){
				$data['bln'] = 10;
			} else if($this->input->post('bulan')=="November"){
				$data['bln'] = 11;
			} else if($this->input->post('bulan')=="Desember"){
				$data['bln'] = 12;
			}
			$data['tahun'] = date('Y');
			$data['belanja_pegawai'] = str_replace(".", "", $this->input->post('belanja_pegawai'));
			$data['belanja_barang'] = str_replace(".", "", $this->input->post('belanja_barang'));
			$data['belanja_modal'] = str_replace(".", "", $this->input->post('belanja_modal'));
			$this->m_realisasi->insert($data);
			
			$this->logger
			->user($this->ion_auth->get_users_groups()->row()->id) 
			->type('post') 
			->id('') 
			->token('Tambah Realisasi')
			->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Realisasi Di Simpan !</b></p>');
			redirect('realisasi/index/'.encrypt_url($this->input->post('tahun')));
		}
	}

	//View Update Data
	public function update_view()
	{
		$realisasi_id = decrypt_url($this->uri->segment(4));
		
		$this->data['entry'] =  $this->m_realisasi->get($realisasi_id);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('realisasi');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->render('realisasi/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$realisasi_id = encrypt_url($this->input->post('realisasi_id'));	
		
		$this->form_validation->set_rules('bulan', 'Bulan', 'required|max_length[255]');
		$this->form_validation->set_rules('belanja_pegawai', 'Belanja Pegawai', 'required|max_length[255]');
		$this->form_validation->set_rules('belanja_barang', 'Belanja Barang', 'required|max_length[255]');
		$this->form_validation->set_rules('belanja_modal', 'Belanja Modal', 'required|max_length[255]');
		 $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['entry'] =  $this->m_realisasi->get($this->input->post('realisasi_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('realisasi');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->render('realisasi/update');
			}
		} 
		else 
		{	
			$data['realisasi_id'] = $this->input->post('realisasi_id');
			$data['bulan'] = $this->input->post('bulan');
			if($this->input->post('bulan')=="Januari"){
				$data['bln'] = 1;
			} else if($this->input->post('bulan')=="Februari"){
				$data['bln'] = 2;
			} else if($this->input->post('bulan')=="Maret"){
				$data['bln'] = 3;
			} else if($this->input->post('bulan')=="April"){
				$data['bln'] = 4;
			} else if($this->input->post('bulan')=="Mei"){
				$data['bln'] = 5;
			} else if($this->input->post('bulan')=="Juni"){
				$data['bln'] = 6;
			} else if($this->input->post('bulan')=="Juli"){
				$data['bln'] = 7;
			} else if($this->input->post('bulan')=="Agustus"){
				$data['bln'] = 8;
			} else if($this->input->post('bulan')=="September"){
				$data['bln'] = 9;
			} else if($this->input->post('bulan')=="Oktober"){
				$data['bln'] = 10;
			} else if($this->input->post('bulan')=="November"){
				$data['bln'] = 11;
			} else if($this->input->post('bulan')=="Desember"){
				$data['bln'] = 12;
			}
			$data['tahun'] = date('Y');
			$data['belanja_pegawai'] = str_replace(".", "", $this->input->post('belanja_pegawai'));
			$data['belanja_barang'] = str_replace(".", "", $this->input->post('belanja_barang'));
			$data['belanja_modal'] = str_replace(".", "", $this->input->post('belanja_modal'));
			$this->m_realisasi->update($data);
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($this->input->post('realisasi_id')) 
			 ->token('Ubah Realisasi')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Realisasi Di Ubah !</b></p>');
			redirect('realisasi/index/'.$this->uri->segment(3));
		}
	}

	//Delete Data
	public function delete() 
	{
		
		$realisasi_id = decrypt_url($this->uri->segment(4));
		
		$this->m_realisasi->delete($realisasi_id);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($realisasi_id) 
			 ->token('Hapus Realisasi')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Realisasi Di Hapus !</b></p>');
        redirect('realisasi/index/'.$this->uri->segment(3));

    }
	
	
}
