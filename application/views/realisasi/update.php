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
        Realisasi 
      </h1>
      <ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>realisasi">Realisasi</a></li>
        <li class="active">Ubah Realisasi</li>
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
 						<h3 class="box-title">UBAH REALISASI</h3>
 					</div>
 					<!-- /.box-header -->
 					<!-- form start -->

 					<?php echo form_open_multipart('realisasi/update/'.encrypt_url($entry['tahun'])); ?>
 					<div class="table-responsive box-body">
 						<table class="table table-bordered table-striped">
							<input type="hidden" class="form-control" name="realisasi_id" value="<?php echo $entry['realisasi_id']?>">
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('bulan')){
									echo form_error('bulan');
								} else { 
									echo "Bulan";
								} 
								?>
								<span class="required">*</span></th>
 								<td>
									<select  class="form-control" name="bulan">
										<option value="">- Pilih Bulan -</option>
										<option value="Januari" <?php if($entry['bulan']=="Januari"){ echo "selected"; } ?> >Januari</option>
										<option value="Februari" <?php if($entry['bulan']=="Februari"){ echo "selected"; } ?> >Februari</option>
										<option value="Maret" <?php if($entry['bulan']=="Maret"){ echo "selected"; } ?> >Maret</option>
										<option value="April" <?php if($entry['bulan']=="April"){ echo "selected"; } ?> >April</option>
										<option value="Mei" <?php if($entry['bulan']=="Mei"){ echo "selected"; } ?> >Mei</option>
										<option value="Juni" <?php if($entry['bulan']=="Juni"){ echo "selected"; } ?> >Juni</option>
										<option value="Juli" <?php if($entry['bulan']=="Juli"){ echo "selected"; } ?> >Juli</option>
										<option value="Agustus" <?php if($entry['bulan']=="Agustus"){ echo "selected"; } ?> >Agustus</option>
										<option value="September" <?php if($entry['bulan']=="September"){ echo "selected"; } ?> >September</option>
										<option value="Oktober" <?php if($entry['bulan']=="Oktober"){ echo "selected"; } ?> >Oktober</option>
										<option value="November" <?php if($entry['bulan']=="November"){ echo "selected"; } ?> >November</option>
										<option value="Desember" <?php if($entry['bulan']=="Desember"){ echo "selected"; } ?> >Desember</option>
									</select>
								</td>
 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('belanja_pegawai')){
									echo form_error('belanja_pegawai');
								} else { 
									echo "Belanja Pegawai";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="belanja_pegawai" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('belanja_pegawai')){
										echo set_value('belanja_pegawai');
									}else {
										echo number_format($entry['belanja_pegawai'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('belanja_barang')){
									echo form_error('belanja_barang');
								} else { 
									echo "Belanja Barang";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="belanja_barang" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('belanja_barang')){
										echo set_value('belanja_barang');
									}else {
										echo number_format($entry['belanja_barang'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
							<tr>
 								<th class="col-md-3">
								<?php 
								if(form_error('belanja_modal')){
									echo form_error('belanja_modal');
								} else { 
									echo "Belanja Modal";
								} 
								?>
								<span class="required">*</span></th>
 								<td><input type="text" class="form-control" name="belanja_modal" onkeyup="formatRupiah(this, '.')" value="<?php if(set_value('belanja_modal')){
										echo set_value('belanja_modal');
									}else {
										echo number_format($entry['belanja_modal'], 0, ',', '.');
									} ; ?>"></td>

 							</tr>
 						</table>
 					</div>
 					<!-- /.box-body -->
 					<div class="box-footer">
 						<div class="col-md-6">					
 							<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
 							<button type="reset" class="btn btn-warning btn-sm" ><i class="fa fa-repeat"></i> Reset</button>
 							<a href="<?php echo base_url();?>realisasi/index/<?php echo encrypt_url($entry['tahun'])?>" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Kembali</a>
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