<!-- Content Wrapper. Contains page content -->
<style>
    .error {
    color: red;
	font-weight: bold;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dokumentasi 
      </h1>
      <ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>dokumen">Dokumentasi</a></li>
        <li class="active">Ubah Dokumentasi</li>
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
 						<h3 class="box-title">UBAH DOKUMENTASI</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->

 					<?php echo form_open_multipart('dokumen/create/'); ?>
 					<div class="table-responsive box-body">
 						<table class="table table-bordered table-striped">
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('jenis_permohonan')){
									echo form_error('jenis_permohonan');
								} else { 
									echo "Jenis Permohonan";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="jenis_permohonan" value="<?php echo set_value('jenis_permohonan'); ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('l48')){
									echo form_error('l48');
								} else { 
									echo "L 48";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="l48" onkeyup="formatRupiah(this, '.')"  value="<?php echo set_value('l48'); ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('p48')){
									echo form_error('p48');
								} else { 
									echo "P 48";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="p48" onkeyup="formatRupiah(this, '.')" value="<?php echo set_value('p48'); ?>"></td>

 							</tr>
							 
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('l24')){
									echo form_error('l24');
								} else { 
									echo "L 24";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="l24" onkeyup="formatRupiah(this, '.')"  value="<?php echo set_value('l24'); ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('p24')){
									echo form_error('p24');
								} else { 
									echo "P 24";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="p24" onkeyup="formatRupiah(this, '.')" value="<?php echo set_value('p24'); ?>"></td>

 							</tr>
 						</table>
 					</div>
 					<!-- /.box-body -->
 					<div class="box-footer">
 						<div class="col-md-6">					
 							<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
 							<button type="reset" class="btn btn-warning btn-sm" ><i class="fa fa-repeat"></i> Reset</button>
 							<a href="<?php echo base_url();?>dokumen" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Kembali</a>
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
     $('.clockpicker').clockpicker({
		 donetext: 'Done'
	 });
   });
   
   $(function() {
     $('.clockpicker2').clockpicker({
		 donetext: 'Done'
	 });
   });
</script>