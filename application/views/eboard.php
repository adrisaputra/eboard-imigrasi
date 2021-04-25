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
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "BELANJA PEGAWAI",
  "color": am4core.color("#2196f3"),
  "litres": <?php echo $realisasi[0]['belanja_pegawai']; ?>
}, {
  "country": "BELANJA BARANG",
  "color": am4core.color("#dd4b39"),
  "litres": <?php echo $realisasi[0]['belanja_barang']; ?>
}, {
  "country": "BELANJA MODAL",
  "color": am4core.color("#00a65a"),
  "litres": <?php echo $realisasi[0]['belanja_modal']; ?>
}, {
  "country": "SISA ANGGARAN",
  "litres": <?php echo $pagu[0]['pagu']-($realisasi[0]['belanja_pegawai']+$realisasi[0]['belanja_barang']+$realisasi[0]['belanja_modal']); ?>
}
];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 5;
pieSeries.slices.template.propertyFields.fill = "color";
pieSeries.ticks.template.disabled = true;
pieSeries.labels.template.disabled = true;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;
// Create a base filter effect (as if it's not there) for the hover to return to

chart.hiddenState.properties.radius = am4core.percent(0);

// Add a legend
chart.legend = new am4charts.Legend();

}); // end am4core.ready()
</script>

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
        <div class="col-lg-1 col-xs-12" style="flex: 0 0 19.777777%;max-width: 19.777777%;padding-right: 0px;">
        <img src="<?php echo base_url();?>upload/gambar/<?php echo $gambar[0]['gambar']?>" width="100%" height="520px">
        </div>
        <div class="col-lg-8 col-xs-12" style="flex: 0 0 43.6666666%;max-width: 43.6666666%;padding-right: 0px;padding-left: 0px;padding-top:10x">
        <?php 
        $vm = str_replace("https://www.youtube.com/watch?v=","",$video_primary[0]['link']); 
        ?>
			  <!-- <iframe id="videoElement" controls  width="320" height="200" src="http://www.youtube.com/embed/<!--?php echo $video[0]['link']?>?autoplay=1&loop=1&playlist=<!--?php echo $video[0]['link']?>" style="background-color: white;margin-top: -3px;border-radius: 0px;width:100%; height:485px;object-fit:cover;"></iframe> -->
          <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=<!--?php echo $video[0]['link']?>&autoplay=1&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="background-color: white;margin-top: -3px;border-radius: 0px;width:100%; height:485px;object-fit:cover;"></iframe> -->
          <iframe width="300" height="515" src="https://www.youtube.com/embed/<?php echo $vm;?>?version=3&loop=1&playlist=<?php foreach($video as $v) { 
            $video = str_replace("https://www.youtube.com/watch?v=","",$v->link); 
            echo $video.","; } 
          ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowFullScreen="allowFullScreen" style="background-color: white;margin-top: 0px;border-radius: 0px;width:100%; height:520px;object-fit:cover;"></iframe>
        <!--p class=" text-center" style="font-size:16px;padding: 3px;margin-top: -4px;border-radius: 0px;background-color: #b10101;color:#ffffff"><b><marquee scrolldelay="30">-- <?php echo $bulletin1[0]['bulletin']?> --</marquee></b></p-->
        </div>
        
        <div class="col-lg-1 col-xs-12" style="flex: 0 0 19.777777%;max-width: 19.777777%;padding-left: 0px;">
        <img src="<?php echo base_url();?>upload/gambar/<?php echo $gambar[1]['gambar']?>" width="100%" height="520px">
        </div>
        <div class="col-lg-1 col-xs-12"></div>
      </div>
      <div class="row">
        <div class="col-lg-1 col-xs-12"></div>
        <div class="col-lg-10 col-xs-12">
        <div class="bd-example" style="background-color: white;">
              
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                          
                            <div class="row">
                              <div class="col-lg-6 col-xs-12">
                                    <div id="chartdiv"></div>
                              </div>
                              <div class="col-lg-6 col-xs-12">
                                  <div class="table-responsive box-body">
                                      <table class="table table-bordered table-striped" >
                                          <tr class="bg-red">
                                            <th style="width: 100px;font-size:16px;text-align:center;background-color: #b10101;color:#ffffff" colspan=2>REALISASI PENGGUNAAN ANGGARAN<br>
                                                                                    PENERIMAAN NEGARA BUKAN PAJAK(PNBP)<br>
                                                                                    BULAN <?php echo strtoupper($realisasi[0]['bulan'])?> <?php echo $realisasi[0]['tahun']?></th>
                                          </tr>
                                          <tr class="bg-blue">
                                            <th style="width: 100px;font-size:16px;text-align: left;padding:5px">TOTAL PAGU KESELURUHAN</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;padding:5px"><?php echo number_format( $pagu[0]['pagu'], 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;padding:5px">BELANJA PEGAWAI</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;padding:5px"><?php echo number_format( $realisasi[0]['belanja_pegawai'], 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;padding:5px">BELANJA BARANG</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;padding:5px"><?php echo number_format( $realisasi[0]['belanja_barang'], 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;padding:5px">BELANJA MODAL</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;padding:5px"><?php echo number_format( $realisasi[0]['belanja_modal'], 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;color: #00a65a;padding:5px">JUMLAH REALISASI</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;color: #00a65a;padding:5px"><?php echo number_format( $realisasi[0]['belanja_pegawai']+$realisasi[0]['belanja_barang']+$realisasi[0]['belanja_modal'], 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;color: #00a65a;padding:5px">SISA PAGU</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;color: #00a65a;padding:5px"><?php echo number_format(  $pagu[0]['pagu']-($realisasi[0]['belanja_pegawai']+$realisasi[0]['belanja_barang']+$realisasi[0]['belanja_modal']), 0, ',', '.');?></th>
                                          </tr>
                                          <tr>
                                            <th style="width: 100px;font-size:16px;text-align: left;color: #00a65a;padding:5px">PERSENTASI</th>
                                            <th style="width: 100px;font-size:18px;text-align: right;color: #00a65a;padding:5px"><?php echo number_format((($realisasi[0]['belanja_pegawai']+$realisasi[0]['belanja_barang']+$realisasi[0]['belanja_modal']) * 100)/$pagu[0]['pagu'], 2, ',', '.');?> % </th>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                            </div>
                          </div>

                          <div class="carousel-item">
                          
                            <div class="row">
                              <div class="col-lg-6 col-xs-12">
                                <div class="table-responsive box-body">
                                    <table class="table table-bordered table-striped" >
                                    
                                    <tr class="bg-red">
                                            <th style="width: 100px;font-size:16px;text-align:center;background-color: #b10101;color:#ffffff;padding:10px" colspan=6>
                                               PENERBITAN DOKUMEN PERJALANAN REPUBLIK INDONESIA</th>
                                          </tr>
                                      <tr class="bg-blue">
                                        <th style="width: 200px;font-size:14px;text-align: left;padding:3px" rowspan=3><center>JENIS PERMOHONAN</th>
                                        <th style="width: 100px;font-size:14px;text-align: left;padding:3px" colspan=4><center>JENIS DPRI</th>
                                        <th style="width: 1px;font-size:14px;text-align: left;padding:3px" rowspan=3><center>JUMLAH</th>
                                      </tr>
                                      <tr class="bg-blue">
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:3px" colspan=2><center>48 Hal</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:3px" colspan=2><center>24 Hal</th>
                                      </tr>
                                      <tr class="bg-blue">
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:3px"><center>L</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:3px"><center>P</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:3px"><center>L</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:3px"><center>P</th>
                                      </tr>
                                      <?php 
                                      $a = 0; $b = 0; $c = 0; $d = 0;
                                      foreach($dokumen as $v){ 
                                        $a = $a + $v->l48;
                                        $b = $b + $v->p48;
                                        $c = $c + $v->l24;
                                        $d = $d + $v->p24;
                                        ?>
                                        <tr>
                                          <th style="width: 10px;font-size:16px;text-align: left;padding:4px"><?php echo $v->jenis_permohonan;?></th>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( $v->l48, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( $v->p48, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( $v->l24, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( $v->p24, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( ($v->l48+$v->p48+$v->l24+$v->p24), 0, ',', '.');?></td>
                                        </tr>
                                      <?php } ?>
                                      <tr>
                                          <th style="width: 10px;font-size:16px;text-align: left;padding:4px">TOTAL PERMOHONAN</th>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( $a, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( $b, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( $c, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( $d, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:4px"><center><?php echo number_format( ($a+$b+$c+$d), 0, ',', '.');?></td>
                                        </tr>
                                    </table>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-xs-12">
                              <div class="table-responsive box-body">
                                    <table class="table table-bordered table-striped" >
                                    
                                    <tr class="bg-red">
                                            <th style="width: 100px;font-size:16px;text-align:center;background-color: #b10101;color:#ffffff;padding:10px" colspan=8>
                                               PERLINTASAN KAPAL LAUT</th>
                                          </tr>
                                      <tr class="bg-blue">
                                        <th style="width: 200px;font-size:14px;text-align: left;padding:4px" rowspan=2><center>PELABUHAN</th>
                                        <th style="width: 100px;font-size:14px;text-align: left;padding:4px" colspan=2><center>KAPAL</th>
                                        <th style="width: 100px;font-size:14px;text-align: left;padding:4px" colspan=2><center>IN</th>
                                        <th style="width: 100px;font-size:14px;text-align: left;padding:4px" colspan=2><center>OUT</th>
                                      </tr>
                                      <tr class="bg-blue">
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:4px"><center>IN</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:4px"><center>OUT</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:4px"><center>CREW WNI</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:4px"><center>CREW WNA</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:4px"><center>CREW WNI</th>
                                        <th style="width: 10px;font-size:14px;text-align: left;padding:4px"><center>CREW WNA</th>
                                      </tr>
                                      <?php 
                                      $a = 0; $b = 0; $c = 0; $d = 0; $e = 0; $f= 0;
                                      foreach($pelabuhan as $v){ 
                                        $a = $a + $v->kapal_in;
                                        $b = $b + $v->kapal_out;
                                        $c = $c + $v->in_crew_wni;
                                        $d = $d + $v->in_crew_wna;
                                        $e = $e + $v->out_crew_wni;
                                        $f = $f + $v->out_crew_wna;
                                        ?>
                                        <tr>
                                          <th style="width: 10px;font-size:16px;text-align: left;padding:11px"><?php echo $v->pelabuhan;?></th>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $v->kapal_in, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $v->kapal_out, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $v->in_crew_wni, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $v->in_crew_wna, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $v->out_crew_wni, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $v->out_crew_wna, 0, ',', '.');?></td>
                                        </tr>
                                      <?php } ?>
                                      <tr>
                                          <th style="width: 10px;font-size:16px;text-align: left;padding:11px">TOTAL PERMOHONAN</th>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $a, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $b, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $c, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $d, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $e, 0, ',', '.');?></td>
                                          <td style="width: 10px;font-size:16px;text-align: left;padding:11px"><center><?php echo number_format( $f, 0, ',', '.');?></td>
                                        </tr>
                                    </table>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                          
                            <div class="row">
                              <div class="col-lg-12 col-xs-12">
                                <div class="table-responsive box-body">
                                    <table class="table table-bordered table-striped" >
                                    
                                    <tr class="bg-red">
                                            <th style="width: 100px;font-size:16px;text-align:center;background-color: #b10101;color:#ffffff;padding:5px" colspan=2>
                                               PENERIMAAN NEGARA BUKAN PAJAK (PNBP)<br>
                                               KANTOR IMIGRASI KELAS I TPI KENDARI<br>
                                               SAMPAI DENGAN BULAN TAHUN <?php echo date('Y')?></th>
                                          </tr>
                                      <tr class="bg-blue">
                                        <th style="width: 300px;font-size:14px;text-align: left;padding:3px"><center>JENIS PENERIMAAN</th>
                                        <th style="width: 100px;font-size:14px;text-align: left;padding:3px"><center>JUMLAH</th>
                                      </tr>
                                      <?php 
                                      $a = 0;
                                      foreach($penerimaan as $v){ 
                                        $a = $a + $v->jumlah;
                                        ?>
                                        <tr>
                                          <th style="width: 10px;font-size:16px;text-align: left;padding:4px"><?php echo $v->jenis_penerimaan;?></th>
                                          <td style="width: 10px;font-size:16px;text-align: right;padding:4px"><?php echo number_format( $v->jumlah, 0, ',', '.');?></td>
                                          </tr>
                                      <?php } ?>
                                      <tr>
                                          <th style="width: 10px;font-size:16px;text-align: left;padding:4px">TOTAL PENERIMAAN NEGARA BUKAN PAJAK (PNBP)</th>
                                          <td style="width: 10px;font-size:16px;text-align: right;padding:4px"><?php echo number_format( $a, 0, ',', '.');?></td>
                                          
                                        </tr>
                                    </table>
                                  </div>
                              </div>
                          </div>


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

