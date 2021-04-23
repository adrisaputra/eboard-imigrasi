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
        Jadwal Kapal 
      </h1>
      <ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>ship">Jadwal Kapal</a></li>
        <li class="active">Tambah Jadwal Kapal</li>
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
 						<h3 class="box-title">TAMBAH JADWAL KAPAL</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->

 					<?php echo form_open_multipart('ship/create'); ?>
 					<div class="table-responsive box-body">
 						<table class="table table-bordered table-striped">
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('ship_name')){
									echo form_error('ship_name');
								} else { 
									echo "Nama Kapal";
								} 
								?>
								<span class="required">*</span></th>
 								<td colspan="3"><input type="text" class="form-control" name="ship_name" value="<?php echo set_value('ship_name'); ?>"></td>
 							</tr>
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('destination')){
									echo form_error('destination');
								} else { 
									echo "Tujuan";
								} 
								?>
								<span class="required">*</span></th>
 								<td colspan="3"><input type="text" class="form-control" name="destination" value="<?php echo set_value('destination'); ?>"></td>
 							</tr>
							
							
							<!-- Tanggal Tiba -->
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('arrived_date')){
									echo form_error('arrived_date');
								} else { 
									echo "Tanggal Tiba";
								} 
								?>
								<span class="required">*</span></th>
 								<td><div class="input-group col-md-12">
										<input id="datepicker3" type="text" class="form-control" name="arrived_date" value="<?php if(set_value('arrived_date')){
											echo set_value('arrived_date');
										}else {
											echo date('d-m-Y');
										} ; ?>">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</td>
								<th class="col-md-3">
								<?php 
								if(form_error('arrived_time')){
									echo form_error('arrived_time');
								} else { 
									echo "Jam Tiba";
								} 
								?>
								<span class="required">*</span></th>
 								<td><div class="input-group col-md-12">
										<input  type="text" class="form-control clockpicker3" name="arrived_time" value="<?php echo set_value('arrived_time');?>">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
									</div>
								</td>
 							</tr>
							
							
							<!-- Tanggal Sandar -->
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('leaning_date')){
									echo form_error('leaning_date');
								} else { 
									echo "Tanggal Sandar";
								} 
								?>
								<span class="required">*</span></th>
 								<td><div class="input-group col-md-12">
										<input id="datepicker2" type="text" class="form-control" name="leaning_date" value="<?php if(set_value('leaning_date')){
											echo set_value('leaning_date');
										}else {
											echo date('d-m-Y');
										} ; ?>">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</td>
								<th class="col-md-3">
								<?php 
								if(form_error('leaning_time')){
									echo form_error('leaning_time');
								} else { 
									echo "Jam Sandar";
								} 
								?>
								<span class="required">*</span></th>
 								<td><div class="input-group col-md-12">
										<input  type="text" class="form-control clockpicker2" name="leaning_time" value="<?php echo set_value('leaning_time');?>">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
									</div>
								</td>
 							</tr>
							
							
							
							<!-- Tanggal Berangkat -->
 							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('start_date')){
									echo form_error('start_date');
								} else { 
									echo "Tanggal Berangkat";
								} 
								?>
								<span class="required">*</span></th>
 								<td><div class="input-group col-md-12">
										<input id="datepicker" type="text" class="form-control" name="start_date" value="<?php if(set_value('start_date')){
											echo set_value('start_date');
										}else {
											echo date('d-m-Y');
										} ; ?>">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</td>
								<th class="col-md-3">
								<?php 
								if(form_error('start_time')){
									echo form_error('start_time');
								} else { 
									echo "Jam Berangkat";
								} 
								?>
								<span class="required">*</span></th>
 								<td><div class="input-group col-md-12">
										<input  type="text" class="form-control clockpicker" name="start_time" value="<?php echo set_value('start_time');?>">
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
									</div>
								</td>
 							</tr>
 						</table>
 					</div>
 					<!-- /.box-body -->
 					<div class="box-footer">
 						<div class="col-md-6">					
 							<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
 							<button type="reset" class="btn btn-warning btn-sm" ><i class="fa fa-repeat"></i> Reset</button>
 							<a href="<?php echo base_url();?>ship" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Kembali</a>
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
  <script type="text/javascript">
	$(function() {
		$('#datepicker').datepicker({
			format:'dd-mm-yyyy',
			autoclose: true
		});
	});
	$(function() {
		$('#datepicker2').datepicker({
			format:'dd-mm-yyyy',
			autoclose: true
		});
	});
	$(function() {
		$('#datepicker3').datepicker({
			format:'dd-mm-yyyy',
			autoclose: true
		});
	});
	$(function() {
     $('.clockpicker').clockpicker({
		 donetext: 'Done'
	 });
   });
   
   $(function() {
     $('.clockpicker2').clockpicker({
		 donetext: 'Done'
	 });
   });
   $(function() {
     $('.clockpicker3').clockpicker({
		 donetext: 'Done'
	 });
   });
</script>