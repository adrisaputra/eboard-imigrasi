 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
			<?php echo form_open("user/search");?>
				<div class="col-md-8">
				  <a href="<?php echo base_url();?>user/create_view" class="btn btn-success">Tambah Data</a>
				  <a href="<?php echo base_url();?>user" class="btn btn-warning"><i class="fa fa-reply"></i></a>
				</div>
				<div class="col-md-4">
				  <div class="input-group">
					<input type="text" name="data" class="form-control" placeholder="Nama Pelanggan">
						<span class="input-group-btn">
						  <input type="submit" name="submit" class="btn btn-info" value="Go">
						</span>
				  </div>
				</div>
			<?php echo form_close();?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <?php
			 $message = $this->session->flashdata('notif');
			 if($message){
			   echo $message;
			 }
			 ?>
              <table class="table table-bordered table-striped table-hover">
                <tr class="bg-blue">
                  <th class="col-md-1">No</th>
                  <th class="col-md-2">Nama User</th>
                  <th class="col-md-1">Email</th>
                  <th class="col-md-2">Group</th>
                  <th class="col-md-1">Aksi</th>
                </tr>
				<?php 
				$no = $number+1;
				foreach($data as $v){ 
				?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td><?php echo $v->username;?></td>
                  <td><?php echo $v->email;?></td>
                  <td><span class="label" style="background-color: <?php echo $v->bgcolor;?>;"><?php echo $v->name;?></span></td>
                  <td>
				  <?php if ($v->id != 1) { ?>
					<center>
						<a href="<?php echo base_url();?>user/update_view/<?php echo encrypt_url($v->id)?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah Pengguna"><i class="fa fa-pencil-alt"></i></a>
						<a href="<?php echo base_url();?>user/delete/<?php echo encrypt_url($v->id)?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Pengguna" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i></a>
					</center>
				  <?php } ?>
				  </td>
                </tr>
				<?php 
				$no++;
				}?>
              </table>
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