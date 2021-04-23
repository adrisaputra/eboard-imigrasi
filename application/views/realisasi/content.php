 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Realisasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Realisasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <div class="col-md-8">
                  <a href="<?php echo base_url();?>realisasi/create_view/<?php echo $this->uri->segment('3')?>" class="btn btn-success">Tambah Data</a>
                  <a href="<?php echo base_url();?>pagu" class="btn btn-warning">Kembali</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<!--div class="col-md-12">
				<a href="<!--?php echo base_url();?>realisasi/create_view" class="btn btn-primary">Cetak Laporan Stok</a>
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
                  <th style="width: 40px">Bulan</th>
                  <th style="width: 40px">Realisasi Belanja Pegawai</th>
                  <th style="width: 40px">Realisasi Belanja Barang</th>
                  <th style="width: 40px">Realisasi Belanja Modal</th>
                  <th style="width: 10px">Aksi</th>
                </tr>
				<?php 
				$no = $number+1;
				foreach($data as $v){ 
				?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td><?php echo $v->bulan;?></td>
                  <td><?php echo number_format( $v->belanja_pegawai, 0, ',', '.');?></td>
                  <td><?php echo number_format( $v->belanja_barang, 0, ',', '.');?></td>
                  <td><?php echo number_format( $v->belanja_modal, 0, ',', '.');?></td>
                  <td>
					<center>
						<a href="<?php echo base_url();?>realisasi/update_view/<?php echo $this->uri->segment('3')?>/<?php echo encrypt_url($v->realisasi_id)?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah Realisasi"><i class="fa fa-pencil-alt"></i></a>
						<a href="<?php echo base_url();?>realisasi/delete/<?php echo $this->uri->segment('3')?>/<?php echo encrypt_url($v->realisasi_id)?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Realisasi" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i></a>
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