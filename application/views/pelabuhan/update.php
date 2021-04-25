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
        Pelabuhan 
      </h1>
      <ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>pelabuhan">Pelabuhan</a></li>
        <li class="active">Ubah Pelabuhan</li>
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
 						<h3 class="box-title">UBAH PELABUHAN</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->

 					<?php echo form_open_multipart('pelabuhan/update/'); ?>
 					<div class="table-responsive box-body">
 						<table class="table table-bordered table-striped">
							<input type="hidden" class="form-control" name="pelabuhan_id" value="<?php echo $entry['pelabuhan_id']?>">
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('pelabuhan')){
									echo form_error('pelabuhan');
								} else { 
								} 
								echo "Pelabuhan";
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="pelabuhan" value="<?php if(set_value('pelabuhan')){
										echo set_value('pelabuhan');
									}else {
										echo $entry['pelabuhan'];
									} ; ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('kapal_in')){
									echo form_error('kapal_in');
								} else { 
									echo "KAPAL IN";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="kapal_in" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('kapal_in')){
										echo set_value('kapal_in');
									}else {
										echo number_format($entry['kapal_in'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('kapal_out')){
									echo form_error('kapal_out');
								} else { 
									echo "KAPAL OUT";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="kapal_out" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('kapal_out')){
										echo set_value('kapal_out');
									}else {
										echo number_format($entry['kapal_out'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
							
							 <tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('in_crew_wni')){
									echo form_error('in_crew_wni');
								} else { 
									echo "IN CREW WNI";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="in_crew_wni" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('in_crew_wni')){
										echo set_value('in_crew_wni');
									}else {
										echo number_format($entry['in_crew_wni'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('in_crew_wna')){
									echo form_error('in_crew_wna');
								} else { 
									echo "IN CREW WNA";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="in_crew_wna" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('in_crew_wna')){
										echo set_value('in_crew_wna');
									}else {
										echo number_format($entry['in_crew_wna'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
							 
							 <tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('out_crew_wni')){
									echo form_error('out_crew_wni');
								} else { 
									echo "OUT CREW WNI";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="out_crew_wni" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('out_crew_wni')){
										echo set_value('out_crew_wni');
									}else {
										echo number_format($entry['out_crew_wni'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('out_crew_wna')){
									echo form_error('out_crew_wna');
								} else { 
									echo "OUT CREW WNA";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="out_crew_wna" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('out_crew_wna')){
										echo set_value('out_crew_wna');
									}else {
										echo number_format($entry['out_crew_wna'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
 						</table>
 					</div>
 					<!-- /.box-body -->
 					<div class="box-footer">
 						<div class="col-md-6">					
 							<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
 							<button type="reset" class="btn btn-warning btn-sm" ><i class="fa fa-repeat"></i> Reset</button>
 							<a href="<?php echo base_url();?>pelabuhan" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Kembali</a>
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