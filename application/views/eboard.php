<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Board</title>
  	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>upload/logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/fontawesome/css/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.css">

</head>
<style>
table.lamp {
    width:100%;
}
table.lamp th, td {
    
}
table.lamp th {
    width:40px;
}

table.lampu {
    width:100%;
}
table.lampu th, td {
	padding: 1px;
}
table.lampu th {
    
}


table.pu  {
    width: 100%;
    padding-top: -3px;
}

table.pu td {
    padding : 0px;
}

video {
    
    /* border:3px solid #f44336; */
    border-radius:48px;
    -moz-border-radius:48px; /* Firefox 3.6 and earlier */
    
}
  ol,ul,li {list-style-type: none;}
</style>
<style>
body {
	background-color:black;
  /* overflow-y: hidden; */
		
}

p.ping {
	 margin-top: -10px;
    margin-bottom: 4px;
}

#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:550px;
    width:571px;
    float:left;
    padding:5px;	
    border: 2px solid #a1a1a1;
}
#section {
	height:550px;
    float:left;
    padding:5px;	 	 
	border: 2px solid #a1a1a1;
	background-color:#eee;
	
}
#footer {
    clear:both;
    text-align:center;
	font-size: 28px;
	background: #f4e825;
        font-weight: bold;
        font-family: "arial";
	color: #206efb !important;
	height:60px;
	padding-top:5px;
	padding-bottom:5px;
}
.bg {
	background: #f4e825;
	padding-left: 10px;
	padding-right: 10px;
}
@font-face{
        font-family: "digital-7";
        src : url('digital-7.ttf');
    }
	.head1 {
            color: #206efb;
            text-shadow: none;
            font-size: 40pt;
            font-family: "digital-7";
			
    }
    .head2 {
            color: #206efb;
            text-shadow: none;
            font-size: 10pt;
            font-family: "arial";
			alignment-adjust: central;
			text-align: center;
            margin-top:0px;
			margin-bottom:0px;
    }
    .head3 {
            font-family: "arial";
            font-size: 14pt;
    }
	.clock {
            color: #fff;
            text-shadow: none;
            font-size: 40pt;
            font-family: "digital-7";
    }

</style>
<style>
.table-fixed thead {
  width: 97%;
}
.table-fixed tbody {
  height: 390px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
}
</style>
 <script>
            function startTime() {
                var today=new Date();
                var h=today.getHours();
                var m=today.getMinutes();
                var s=today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML = h+":"+m+":"+s;
                var t = setTimeout(function(){startTime()},500);
            }

            function checkTime(i) {
                if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }
        </script>
	<script>

        $(document).ready(function() {
            //place code inside jQuery ready event handler 
            //to ensure videoElement is available
            var i = 0;
            var sources = [
                <?php
                   foreach ($video as $v) {
                      $a = str_replace("watch?v=","embed/",$v->link);
                       echo "'".$a."',";
                   }
                ?>              
				'http://localhost/eboard/upload/kapal1.mp4'];
            $('#videoElement').bind('ended', function() {
                //'this' is the DOM video element
                this.src = sources[i++ % sources.length];
                this.load();
                this.play();
            });
        });
        </script>
     <script src="<?php echo base_url(); ?>assets/fade/jquery00.js"></script>       
     <script src="<?php echo base_url(); ?>assets/fade/ticker00.js"></script>       
     <script type="text/javascript">
	$(document).ready(function(){
		$('#fade').list_ticker({
			speed:30000,
			effect:'fade',
                        containerheight: '550px',
                        containerheight: '571px'
		});
		$('#slide').list_ticker({
			speed:10000,
			effect:'slide'
		});		
	})
        </script>
		
	<script>

        $(document).ready(function() {
            //place code inside jQuery ready event handler 
            //to ensure videoElement is available
            var i = 0;
            var sources = [
                 <?php
                   foreach ($video as $v) {
                    $a = str_replace("watch?v=","embed/",$v->link);
                    echo "'".$a."',";
                   }
                ?>                 
				// 'http://localhost/eboard/upload/video/video_1.mp4',       
				'http://localhost/eboard/upload/kapal1.mp4'];
            $('#videoElement').bind('ended', function() {
                //'this' is the DOM video element
                this.src = sources[i++ % sources.length];
                this.load();
                this.play();
            });
        });
        </script>
		


<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<?php 
                            $no = 0;
                            foreach($realisasi as $v) { ?>
<style>
#chartdiv<?php echo $no?> {
  width: 100%;
  height: 330px;
}

</style>
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart<?php echo $no?> = am4core.create("chartdiv<?php echo $no?>", am4charts.PieChart);

// Add data
chart<?php echo $no?>.data = [ {
  "country": "BELANJA PEGAWAI",
  "color": am4core.color("#2196f3"),
  "litres": <?php echo $v->belanja_pegawai; ?>
}, {
  "country": "BELANJA BARANG",
  "color": am4core.color("#dd4b39"),
  "litres": <?php echo $v->belanja_barang; ?>
}, {
  "country": "BELANJA MODAL",
  "color": am4core.color("#00a65a"),
  "litres": <?php echo $v->belanja_modal; ?>
}, {
  "country": "SISA ANGGARAN",
  "litres": <?php echo $pagu[0]['pagu']-($v->belanja_pegawai+$v->belanja_barang+$v->belanja_modal); ?>
}
];

// Add and configure Series
var pieSeries<?php echo $no?> = chart<?php echo $no?>.series.push(new am4charts.PieSeries());
pieSeries<?php echo $no?>.dataFields.value = "litres";
pieSeries<?php echo $no?>.dataFields.category = "country";
pieSeries<?php echo $no?>.slices.template.stroke = am4core.color("#fff");
pieSeries<?php echo $no?>.slices.template.strokeOpacity = 5;
pieSeries<?php echo $no?>.slices.template.propertyFields.fill = "color";
pieSeries<?php echo $no?>.ticks.template.disabled = true;
pieSeries<?php echo $no?>.labels.template.disabled = true;

// This creates initial animation
pieSeries<?php echo $no?>.hiddenState.properties.opacity = 1;
pieSeries<?php echo $no?>.hiddenState.properties.endAngle = -90;
pieSeries<?php echo $no?>.hiddenState.properties.startAngle = -90;
// Create a base filter effect (as if it's not there) for the hover to return to

chart<?php echo $no?>.hiddenState.properties.radius = am4core.percent(0);

// Add a legend
chart<?php echo $no?>.legend = new am4charts.Legend();

}); // end am4core.ready()
</script>

<?php 
                          $no++;
                          } ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="" >
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content" style="
    background-image: url(upload/4853433.jpg);background-size: cover;padding: 0px;
">
	 <br>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-1 col-xs-12"></div>
        <div class="col-lg-10 col-xs-12">
        <?php 
        $vm = str_replace("https://www.youtube.com/watch?v=","",$video_primary[0]['link']); 
        ?>
			  <!-- <iframe id="videoElement" controls  width="320" height="200" src="http://www.youtube.com/embed/<!--?php echo $video[0]['link']?>?autoplay=1&loop=1&playlist=<!--?php echo $video[0]['link']?>" style="background-color: white;margin-top: -3px;border-radius: 0px;width:100%; height:485px;object-fit:cover;"></iframe> -->
          <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=<!--?php echo $video[0]['link']?>&autoplay=1&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="background-color: white;margin-top: -3px;border-radius: 0px;width:100%; height:485px;object-fit:cover;"></iframe> -->
          <iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo $vm;?>?version=3&loop=1&playlist=<?php foreach($video as $v) { 
            $video = str_replace("https://www.youtube.com/watch?v=","",$v->link); 
            echo $video.","; } 
          ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="background-color: white;margin-top: -3px;border-radius: 0px;width:100%; height:485px;object-fit:cover;"></iframe>
        <p class=" text-center" style="font-size:16px;padding: 3px;margin-top: -4px;border-radius: 0px;background-color: #b10101;color:#ffffff"><b><marquee scrolldelay="30">-- <?php echo $bulletin1[0]['bulletin']?> --</marquee></b></p>
        </div>
        <div class="col-lg-1 col-xs-12"></div>
      </div>
      <div class="row">
        <div class="col-lg-1 col-xs-12"></div>
        <div class="col-lg-10 col-xs-12">
        <div class="bd-example" style="background-color: white;">
              
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <?php 
                            $no = 0;
                            foreach($realisasi as $v) { ?>
                            <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $no?>" <?php if($no==0){ echo "class='active'"; } ?>></li>
                          <?php 
                          $no++;
                        } ?>
                        </ol>
                        <div class="carousel-inner">
                          <?php  $no2 = 0;
                          foreach($realisasi as $v) { ?>
                          <div class="carousel-item  <?php if($no2==0){ echo "active"; } ?>">
                          
        <div class="row">
                              <div class="col-lg-6 col-xs-12">
                                    <div id="chartdiv<?php echo $no2?>"></div>
                              </div>
                              <div class="col-lg-6 col-xs-12">
                                  <div class="table-responsive box-body">
                                      <table class="table table-bordered table-striped" >
                                          <tr class="bg-red">
                                            <th style="width: 100px;font-size:16px;text-align:center;background-color: #b10101;color:#ffffff" colspan=2>REALISASI PENGGUNAAN ANGGARAN<br>
                                                                                    PENERIMAAN NEGARA BUKAN PAJAK(PNBP)<br>
                                                                                    BULAN <?php echo strtoupper($v->bulan)?> <?php echo $v->tahun?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;padding:5px">TOTAL PAGU KESELURUHAN</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;padding:5px"><?php echo number_format( $pagu[0]['pagu'], 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;padding:5px">BELANJA PEGAWAI</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;padding:5px"><?php echo number_format( $v->belanja_pegawai, 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;padding:5px">BELANJA BARANG</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;padding:5px"><?php echo number_format( $v->belanja_barang, 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;padding:5px">BELANJA MODAL</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;padding:5px"><?php echo number_format( $v->belanja_modal, 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;color: #00a65a;padding:5px">JUMLAH REALISASI</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;color: #00a65a;padding:5px"><?php echo number_format( $v->belanja_pegawai+$v->belanja_barang+$v->belanja_modal, 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;color: #00a65a;padding:5px">SISA PAGU</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;color: #00a65a;padding:5px"><?php echo number_format(  $pagu[0]['pagu']-($v->belanja_pegawai+$v->belanja_barang+$v->belanja_modal), 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;color: #00a65a;padding:5px">PERSENTASI</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;color: #00a65a;padding:5px"><?php echo number_format((($v->belanja_pegawai+$v->belanja_barang+$v->belanja_modal) * 100)/$pagu[0]['pagu'], 2, ',', '.');?> % </th>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          </div>
                          <?php 
                          $no2++;
                          } ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
              
              </div>
          
            <div class="box">
                <!-- /.box-header -->
                    
            </div>
        </div>
        
      </div>
      <!-- /.row -->
	 
      <div class="row">
        <div class="col-lg-12 col-xs-12">
			<p class=" text-center" style="font-size:25px;padding: 8px;border-radius: 0px;background-color: #b10101;color:#ffffff"><b><marquee scrolldelay="30">-- <?php echo $bulletin2[0]['bulletin']?> --</marquee></b></p>
         </div>
      </div>
      <!-- /.row -->
	 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script> 
	<script src="<?php echo base_url();?>assets/js/popper.js"></script> 
	<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>

</body>
</html>

