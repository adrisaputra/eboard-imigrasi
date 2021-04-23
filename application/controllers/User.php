<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends admin_Controller {
	
	public function __construct(){  
        parent::__construct();
		$this->load->model('m_user');
		$this->load->library('upload');
		
		if($this->ion_auth->get_users_groups()->row()->id!=1){
			redirect();
		}
    }
	
	
	//View All Data
	public function index()
	{
		##cek login
		if ($this->ion_auth->get_users_groups()->row()->id == 1){
        
			## Pagination
			$base_url = base_url () . "user/index/".$this->uri->segment(3);
			$total_rows = $this->m_user->data('', '');
			$per_page = 25;
			$uri_segment = 4;
			$page = ($this->uri->segment ( $uri_segment )) ? $this->uri->segment ( $uri_segment ) : 0;
			$paging = $this->paging->paginate_function($base_url,$total_rows,$per_page,$uri_segment);
			
			$this->data['number'] = $paging['number'];
			$this->data['links'] = $paging['links'];
			$this->data['data'] = $this->m_user->data($per_page, $page);
			
			$this->render('user/content');

		} else {
			
			redirect('dashboard');
			
		}
	}
	
	//View Data Pencarian
	public function search()
	{
		if($this->input->post('submit')){
				$column = $this->input->post('column');
				$query = $this->input->post('data');
				
				$option = array(
					'user_column'=>$column,
					'user_data'=>$query
				);
				$this->session->set_userdata($option);
		}else{
		   $query = $this->uri->segment ( 3 );
		   $column = $this->uri->segment ( 4 );
		}
			
		$config = array ();
		$config ["base_url"] = base_url () . "user/search/".$query."/".$column;
		$config ["total_rows"] = $this->m_user->record_count_search($column,$query);
		$config ["per_page"] = 25;
		$config ["uri_segment"] = 5;
		$choice = $config ["total_rows"] / $config ["per_page"];
		$config ["num_links"] = 5;
		
		// config css for pagination
		$config ['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config ['full_tag_close'] = '</ul>';
		$config ['first_link'] = 'First';
		$config ['last_link'] = 'Last';
		$config ['first_tag_open'] = '<li>';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="prev">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li>';
		$config ['next_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li>';
		$config ['last_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		
		if ($this->uri->segment ( 5 ) == "") {
			$data ['number'] = 0;
		} else {
			$data ['number'] = $this->uri->segment ( 5 );
		}
		
		$this->pagination->initialize ( $config );
		$page = ($this->uri->segment ( 5 )) ? $this->uri->segment ( 5 ) : 0;
				
		$data['links'] = $this->pagination->create_links ();
		$data['user'] = $this->m_user->data_search($column,$query,$config ["per_page"], $page);
		$data2['user'] = $this->m_user->data2($this->session->userdata('id_opd'));
		$this->load->view('layouts/header');
		$this->load->view('layouts/topbar',$data2);
		$this->load->view('layouts/sidebar',$data2);
		$this->load->view('setting/user/content', $data);
		$this->load->view('layouts/footer');
	}
	
	
	//View Create Data
	public function create_view()
	{	
        $this->data['groups'] = $this->ion_auth->groups()->result();
		$this->render('user/insert');
	}
	
	
	//Create Data
	public function create()
	{
		$this->form_validation->set_rules('first_name','Nama Depan','trim|required');
        $this->form_validation->set_rules('last_name','Nama Belakang','trim');
        $this->form_validation->set_rules('phone','Telepon','trim');
        $this->form_validation->set_rules('username','Nama User','trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        $this->form_validation->set_rules('password_confirm','Konfimasi Password','required|matches[password]');
        $this->form_validation->set_rules('groups[]','Pilih Group','required');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->data['groups'] = $this->ion_auth->groups()->result();
			$this->render('user/insert');
		} 
		else 
		{	
		
			$username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $group_ids = $this->input->post('groups');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => '',
                'phone'      => $this->input->post('phone')
            );
            $this->ion_auth->register($username, $password, $email, $additional_data, $group_ids);
						
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id('') 
			 ->token('Tambah User')
			 ->log(); 

			$this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pengguna Di Simpan !</b></p>');
            redirect('user');
			
		}
	}
	
	//View Update Data
	public function update_view()
	{
		$id_user = decrypt_url($this->uri->segment(3));
		
		$this->data['entry'] =  $this->m_user->get($id_user);
		if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
			redirect('user');
		} else {
			$this->data['entry'] = $this->data['entry'][0];
			$this->data['groups'] = $this->ion_auth->groups()->result();
			$this->render('user/update');
		}
	}
	
	//Update Data
	public function update()
	{
		$this->form_validation->set_rules('first_name','First name','trim');
        $this->form_validation->set_rules('last_name','Last name','trim');
        $this->form_validation->set_rules('phone','Phone','trim');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_rules('groups[]','Groups','required');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

        if($this->form_validation->run() === FALSE)
        {
            $this->data['entry'] =  $this->m_user->get($this->input->post('user_id'));
			if(!isset($this->data['entry'][0]) || $this->data['entry'][0] == ""){
				redirect('user');
			} else {
				$this->data['entry'] = $this->data['entry'][0];
				$this->data['groups'] = $this->ion_auth->groups()->result();
				$this->render('user/update');
			}
        }
        else
        {
            $user_id = $this->input->post('user_id');
            $new_data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone'),
                'spv'      => $this->input->post('spv'),
            );
            if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');

            $this->ion_auth->update($user_id, $new_data);

            //Update the groups user belongs to
            $groups = $this->input->post('groups');
            if (isset($groups) && !empty($groups))
            {
                $this->ion_auth->remove_from_group('', $user_id);
                foreach ($groups as $group)
                {
                    $this->ion_auth->add_to_group($group, $user_id);
                }
            }
			
			$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($this->input->post('user_id')) 
			 ->token('Ubah Pengguna')
			 ->log(); 

            $this->session->set_flashdata('notif','<p class="alert alert-success text-center"><b>Data Pengguna Di Ubah !</b></p>');
            redirect('user','refresh');
        }
	}
	
	//Update Data User Admin
	public function update_admin()
	{
		$data['id_user'] = $this->input->post('id_user');
		$data['id_opd'] = $this->input->post('id_opd');
		$this->m_user->update($data);
		
		redirect('login/logout');
	}
	
	//Delete Data
	public function delete() 
	{
		
		$id_user = decrypt_url($this->uri->segment(3));
	
        $this->m_user->delete($id_user);
		
		$this->logger
			 ->user($this->ion_auth->get_users_groups()->row()->id) 
			 ->type('post') 
			 ->id($id_user) 
			 ->token('Hapus Pengguna')
			 ->log(''); 

		$this->session->set_flashdata('notif','<p class="alert alert-danger text-center"><b>Data Pengguna Di Hapus !</b></p>');
        redirect('user');

    }
}
