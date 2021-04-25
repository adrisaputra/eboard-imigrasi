 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dokumen
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Dokumen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <div class="col-md-8">
                  <!-- <a href="<?php echo base_url();?>dokumen/create_view/<?php echo $this->uri->segment('3')?>" class="btn btn-success">Tambah Data</a> -->
                  <a href="<?php echo base_url();?>pagu" class="btn btn-warning">Kembali</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<!--div class="col-md-12">
				<a href="<!--?php echo base_url();?>dokumen/create_view" class="btn btn-primary">Cetak Laporan Stok</a>
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
                  <th style="width: 2px" rowspan=3><center>No</th>
                  <th style="width: 40px" rowspan=3><center>JENIS PERMOHONAN</th>
                  <th style="width: 40px" colspan=4><center>JENIS DPRI</th>
                  <th style="width: 10px" rowspan=3><center>Aksi</th>
                </tr>
                <tr class="bg-blue">
                  <th style="width: 40px" colspan=2><center>48 Hal</th>
                  <th style="width: 40px" colspan=2><center>24 Hal</th>
                </tr>
                <tr class="bg-blue">
                  <th style="width: 40px"><center>L</th>
                  <th style="width: 40px"><center>P</th>
                  <th style="width: 40px"><center>L</th>
                  <th style="width: 40px"><center>P</th>
                </tr>
				<?php 
				$no = $number+1;
				foreach($data as $v){ 
				?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td><?php echo $v->jenis_permohonan;?></td>
                  <td><?php echo number_format( $v->l48, 0, ',', '.');?></td>
                  <td><?php echo number_format( $v->p48, 0, ',', '.');?></td>
                  <td><?php echo number_format( $v->l24, 0, ',', '.');?></td>
                  <td><?php echo number_format( $v->p24, 0, ',', '.');?></td>
                  <td>
					<center>
						<a href="<?php echo base_url();?>dokumen/update_view/<?php echo encrypt_url($v->dokumen_id)?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah Dokumen"><i class="fa fa-pencil-alt"></i></a>
						<!-- <a href="<?php echo base_url();?>dokumen/delete/<?php echo encrypt_url($v->dokumen_id)?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Dokumen" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i></a> -->
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