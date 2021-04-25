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
        Penerimaan 
      </h1>
      <ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>penerimaan">Penerimaan</a></li>
        <li class="active">Ubah Penerimaan</li>
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
 						<h3 class="box-title">UBAH PENERIMAAN</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->

 					<?php echo form_open_multipart('penerimaan/create/'); ?>
 					<div class="table-responsive box-body">
 						<table class="table table-bordered table-striped">
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('jenis_penerimaan')){
									echo form_error('jenis_penerimaan');
								} else { 
									echo "Jenis Penerimaan";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="jenis_penerimaan" value="<?php echo set_value('jenis_penerimaan'); ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('jumlah')){
									echo form_error('jumlah');
								} else { 
									echo "Jumlah";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="jumlah" onkeyup="formatRupiah(this, '.')"  value="<?php echo set_value('jumlah'); ?>"></td>

 							</tr>
 						</table>
 					</div>
 					<!-- /.box-body -->
 					<div class="box-footer">
 						<div class="col-md-6">					
 							<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
 							<button type="reset" class="btn btn-warning btn-sm" ><i class="fa fa-repeat"></i> Reset</button>
 							<a href="<?php echo base_url();?>penerimaan" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Kembali</a>
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