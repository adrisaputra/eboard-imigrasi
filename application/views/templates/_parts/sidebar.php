<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
			<img src="<?php echo base_url();?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->ion_auth->user()->row()->username;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment(1)=='dashboard'||$this->uri->segment(1)==''){echo "active";}?>">
          <a href="<?php echo base_url();?>dashboard">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
		
		
		<?php  
		
		## Administrator
		if ($this->ion_auth->get_users_groups()->row()->id == 1){ ?>
		<li class="<?php if($this->uri->segment(1)=='pagu'){echo "active";}?>">
          <a href="<?php echo base_url();?>pagu">
            <i class="fa fa-money-bill-wave"></i> <span>Anggaran</span>
          </a>
    </li>
		<li class="<?php if($this->uri->segment(1)=='video'){echo "active";}?>">
          <a href="<?php echo base_url();?>video">
            <i class="fa fa-video"></i> <span>Video</span>
          </a>
        </li>
		<li class="<?php if($this->uri->segment(1)=='bulletin'){echo "active";}?>">
          <a href="<?php echo base_url();?>bulletin">
            <i class="fa fa-chart-area"></i> <span>Text Berjalan</span>
          </a>
        </li>
		<li class="header">SETTING</li>
		<li class="treeview <?php if($this->uri->segment(1)=='user'||$this->uri->segment(1)=='profile'){echo "active";}?>">
		  <a href="#"><i class="fa fa-sliders-h"></i> 
			<span>Pengaturan</span>
			<span class="pull-right-container">
			  <i class="fa fa-angle-left pull-right"></i>
			</span>
		  </a>
		  <ul class="treeview-menu">
			<li class="<?php if($this->uri->segment(1)=='user'){echo "active";}?>"><a href="<?php echo base_url();?>user"><i class="fa fa-circle-o"></i> Pengguna</a></li>
			</ul>
		</li>
		
		
		
		
		
		
		
		
		
		<?php } else if ($this->ion_auth->get_users_groups()->row()->id == 2){ ?>
		
		<li class="<?php if($this->uri->segment(1)=='ship'){echo "active";}?>">
          <a href="<?php echo base_url();?>ship">
            <i class="fa fa-ship"></i> <span>Jadwal Kapal</span>
          </a>
        </li>
		<li class="<?php if($this->uri->segment(1)=='video'){echo "active";}?>">
          <a href="<?php echo base_url();?>video">
            <i class="fa fa-video"></i> <span>Video</span>
          </a>
        </li>
		<li class="<?php if($this->uri->segment(1)=='bulletin'){echo "active";}?>">
          <a href="<?php echo base_url();?>bulletin">
            <i class="fa fa-chart-area"></i> <span>Text Berjalan</span>
          </a>
        </li>
		
		
		
		
		
		
		<!-- Kitchen -->
		<?php } ?>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>