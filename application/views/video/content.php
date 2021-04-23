 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Video
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Video</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
			<?php echo form_open("video/search");?>
				<div class="col-md-8">
				  <a href="<?php echo base_url();?>video/create_view" class="btn btn-success">Tambah Data</a>
				  <a href="<?php echo base_url();?>video" class="btn btn-warning"><i class="fa fa-sync-alt"></i></a>
				</div>
				<div class="col-md-4">
				  <div class="input-group">
					<input type="text" name="data" class="form-control" placeholder="Nama Video">
						<span class="input-group-btn">
						  <input type="submit" name="submit" class="btn btn-info" value="Go">
						</span>
				  </div>
				</div>
			<?php echo form_close();?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<!--div class="col-md-12">
				<a href="<!--?php echo base_url();?>video/create_view" class="btn btn-primary">Cetak Laporan Stok</a>
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
                  <th style="width: 2px">No</th>
                  <th style="width: 300px">Nama Video</th>
                  <th style="width: 300px">Link Video</th>
                  <th style="width: 80px">Aksi</th>
                </tr>
				<?php 
				$no = $number+1;
				foreach($data as $v){ 
				?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td><?php echo $v->video_name;?></td>
                  <td>
                  <?php $a = str_replace("watch?v=","embed/",$v->link); ?>
														<iframe width="320" height="200" src="<?= $a ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                  </td>
                  <td>
					<center>
						<a href="<?php echo base_url();?>video/update_view/<?php echo encrypt_url($v->video_id)?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah Video"><i class="fa fa-pencil-alt"></i></a>
						<a href="<?php echo base_url();?>video/delete/<?php echo encrypt_url($v->video_id)?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Video" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i></a>
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