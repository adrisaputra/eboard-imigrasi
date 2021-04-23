<!-- Content Wrapper. Contains page content -->
<style>
    .error {
    color: red;
	font-weight: bold;
}
 </style>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Pengguna 
      </h1>
      <ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>customer">Pengguna</a></li>
        <li class="active">Ubah Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
 			<!-- left column -->
 			<div class="col-md-12">
 				<!-- general form elements -->
 				<div class="box">
 					<div class="box-header with-border">
 						<h3 class="box-title">UBAH PENGGUNA</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->

 					<?php echo form_open_multipart('user/update'); ?>
 					<div class="table-responsive box-body">
 						<table class="table table-bordered table-striped">
							<input type="hidden" class="form-control" name="user_id" value="<?php echo $entry['id']?>">
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('first_name')){
									echo form_error('first_name');
								} else { 
									echo "Nama Depan";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="first_name" value="<?php if(set_value('first_name')){
										echo set_value('first_name');
									}else {
										echo $entry['first_name'];
									} ; ?>"></td>
 							</tr>
 							<tr>
 								<th class="col-md-3">Nama Belakang</th>
 								<td><input type="text" class="form-control" name="last_name" value="<?php if(set_value('last_name')){
										echo set_value('last_name');
									}else {
										echo $entry['last_name'];
									} ; ?>"></td>
 							</tr>
 							<tr>
 								<th class="col-md-3">Telepon</th>
 								<td><input type="text" class="form-control" name="phone" value="<?php if(set_value('phone')){
										echo set_value('phone');
									}else {
										echo $entry['phone'];
									} ; ?>"></td>
 							</tr>
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('username')){
									echo form_error('username');
								} else { 
									echo "Nama User";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="username" value="<?php if(set_value('username')){
										echo set_value('username');
									}else {
										echo $entry['username'];
									} ; ?>"></td>
 							</tr>
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('email')){
									echo form_error('email');
								} else { 
									echo "Email";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="email" class="form-control" name="email" value="<?php if(set_value('email')){
										echo set_value('email');
									}else {
										echo $entry['email'];
									} ; ?>"></td>
 							</tr>
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('password')){
									echo form_error('password');
								} else { 
									echo "Password";
								} 
								?>
								<span class="required">*</span>
								</th>
 								<td><input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>"></td>
 							</tr>
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('password_confirm')){
									echo form_error('password_confirm');
								} else { 
									echo "Konfirmasi Password";
								} 
								?>
								<span class="required">*</span>
								</th>
 								<td><input type="password" class="form-control" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>"></td>
 							</tr>
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('group')){
									echo form_error('group');
								} else { 
									echo "Group";
								} 
								?>
								<span class="required">*</span>
								</th>
 								<td><select class="form-control" name="groups[]">
										<option value="">- Pilih Group -</option>
										<?php
										foreach ($groups as $v) {?>
											<option value="<?php echo $v->id ?>" <?php if ($entry['group_id'] == $v->id){ echo "selected";}?> ><?php echo $v->name ?></option>
										<?php }
										?>
									</select>
								</td>
 							</tr>
 						</table>
 					</div>
 					<!-- /.box-body -->
 					<div class="box-footer">
 						<div class="col-md-6">					
 							<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
 							<button type="reset" class="btn btn-warning btn-sm" ><i class="fa fa-repeat"></i> Reset</button>
 							<a href="<?php echo base_url();?>user" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Kembali</a>
 						</div>
 					</div>
 					<?php echo form_close(); ?>
 				</div>
 				<!-- /.box -->

 			</div>
 			<!--/.col (left) -->
 		</div>
 		<!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->