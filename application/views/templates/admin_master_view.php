<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/_parts/header'); 
$this->load->view('templates/_parts/topbar');
$this->load->view('templates/_parts/sidebar');?>
<?php echo $the_view_content;?>
<?php $this->load->view('templates/_parts/footer');?>