<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
		<span class="logo-lg">
			<b>E-BOARD</b>
		</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	  <i class="fa fa-list"></i>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="<?php echo base_url();?>assets/dist/img/avatar5.png" class="user-image" alt="User Image">
				<span class="hidden-xs"> <?php echo $this->ion_auth->user()->row()->username;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                
				<?php if ($this->session->userdata('foto')){?>
					<img src="<?php echo base_url();?>upload/user/<?php echo $this->session->userdata('foto')?>" class="img-circle" alt="User Image">
				<?php } else {?>
					<img src="<?php echo base_url();?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
				<?php } ?>
				
                <p>
                  <?php echo $this->ion_auth->user()->row()->username;?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url();?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>