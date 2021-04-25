 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penerimaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Penerimaan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <div class="col-md-8">
                  <!-- <a href="<?php echo base_url();?>penerimaan/create_view/<?php echo $this->uri->segment('3')?>" class="btn btn-success">Tambah Data</a> -->
                  <a href="<?php echo base_url();?>pagu" class="btn btn-warning">Kembali</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<!--div class="col-md-12">
				<a href="<!--?php echo base_url();?>penerimaan/create_view" class="btn btn-primary">Cetak Laporan Stok</a>
			</div><br><br-->
			 <?php
			 $message = $this->session->flashdata('notif');
			 if($message){
			   echo $message;
			 }
			 ?>
			 <div class="table-responsive box-body">
              <table class="table table-bordered table-striped table-hover" >
                <tr class="bg-blue">
                  <th style="width: 2px"><center>No</th>
                  <th style="width: 200px"><center>Jenis Penerimaan</th>
                  <th style="width: 100px"><center>Jumlah</th>
                  <th style="width: 30px"><center>Aksi</th>
                </tr>
				<?php 
				$no = $number+1;
				foreach($data as $v){ 
				?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td><?php echo $v->jenis_penerimaan;?></td>
                  <td><?php echo number_format( $v->jumlah, 0, ',', '.');?></td>
                  <td>
					<center>
						<a href="<?php echo base_url();?>penerimaan/update_view/<?php echo encrypt_url($v->penerimaan_id)?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah Penerimaan"><i class="fa fa-pencil-alt"></i></a>
						<!-- <a href="<?php echo base_url();?>penerimaan/delete/<?php echo encrypt_url($v->penerimaan_id)?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Penerimaan" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i></a> -->
					</center>
				  </td>
                </tr>
				<?php 
				$no++;
				}?>
              </table>
             </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
             <div align="right"><?php echo $links?> </div>
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->