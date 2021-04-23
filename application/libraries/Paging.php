<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paging  {

	public function paginate_function($base_url,$total_rows,$per_page,$uri_segment)
	{
		$CI =& get_instance();
		$CI->load->library('pagination');
		$config = array ();
		$config ["base_url"] = $base_url;
		$config ["total_rows"] = $total_rows;
		$config ["per_page"] = $per_page;
		$config ["uri_segment"] = $uri_segment;
		$choice = $config ["total_rows"] / $config ["per_page"];
		$config ["num_links"] = 5;
			
		// config css for pagination
		$config ['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
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
		
		if ($CI->uri->segment ( $uri_segment ) == "") {
			$number = 0;
		} else {
			$number = $CI->uri->segment ( $uri_segment );
		}
			
		$CI->pagination->initialize ( $config );
			
		$links = $CI->pagination->create_links ();
		return array('number'=>$number,'links'=>$links);
	}
    
}
