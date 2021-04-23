 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Berjalan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Text Berjalan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <div class="col-md-8">
                  <a href="<?php echo base_url();?>pagu/create_view" class="btn btn-success">Tambah Data</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<!--div class="col-md-12">
				<a href="<!--?php echo base_url();?>pagu/create_view" class="btn btn-primary">Cetak Laporan Stok</a>
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
                  <th style="width: 40px">Tahun</th>
                  <th style="width: 40px">pagu</th>
                  <th style="width: 10px">Aksi</th>
                </tr>
				<?php 
				$no = $number+1;
				foreach($data as $v){ 
				?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td><?php echo $v->tahun;?></td>
                  <td><?php echo number_format( $v->pagu, 0, ',', '.');?></td>
                  <td>
					<center>
						<a href="<?php echo base_url();?>realisasi/index/<?php echo encrypt_url($v->tahun)?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat realisasi"><i class="fa fa-list"></i></a>
						<a href="<?php echo base_url();?>pagu/update_view/<?php echo encrypt_url($v->pagu_id)?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah Text Berjalan"><i class="fa fa-pencil-alt"></i></a>
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