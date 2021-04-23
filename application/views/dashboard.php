 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
		<a href="#">
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $user;?></h3>

              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
          </div>
        </div>
		</a>
        <!-- ./col -->
      </div>
	  
	  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>
// Create the chart
// Highcharts.chart('container', {
    // chart: {
		// plotBackgroundColor: null,
        // plotBorderWidth: null,
        // plotShadow: false,
        // type: 'column'
    // },
    // title: {
        // text: '<?php echo $total_item_sold;?> Item Terbanyak Yang Terjual Hari Ini'
    // },
    // xAxis: {
        // type: 'category'
    // },
    // yAxis: {
        // title: {
            // text: 'Jumlah'
        // }

    // },
	// credits: {
	  // enabled: false
	// },
	// exporting: { 
	  // enabled: false 
	// },
    // legend: {
        // enabled: false
    // },
    // series: [
        // {
            // name: "Jumlah",
            // colorByPoint: true,
            // data: [
			// <?php foreach($item_sold as $v) { ?>
				// {
                    // name: "<?php echo $v->product_name_item?>",
                    // y: <?php echo $v->qty?>,
                    // drilldown: "<?php echo $v->product_name_item?>"
                // },
			// <?php } ?>
            // ]
        // }
    // ]
// });

// Highcharts.chart('container2', {
    // chart: {
        // type: 'line'
    // },
    // title: {
        // text: 'Grafik Penjualan 30 Hari Terakhir'
    // },
    // xAxis: {
        // categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 
					 // '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
					 // '22', '22', '23', '24', '25', '26', '27', '28', '29', '30' ]
    // },
    // yAxis: {
        // title: {
            // text: 'Rupiah (Rp.)'
        // }
    // },
    // plotOptions: {
        // line: {
            // dataLabels: {
                // enabled: false
            // },
            // enableMouseTracking: true
        // }
    // },
    // series: [{
        // name: 'Pendapatan',
        // data: [	<?= $a1;?>, 
				// <?= $a2;?>, 
				// <?= $a3;?>, 
				// <?= $a4;?>, 
				// <?= $a5;?>, 
				// <?= $a6;?>, 
				// <?= $a7;?>, 
				// <?= $a8;?>, 
				// <?= $a9;?>, 
				// <?= $a10;?>, 
				// <?= $a11;?>, 
				// <?= $a12;?>,
				// <?= $a1;?>, 
				// <?= $a2;?>, 
				// <?= $a3;?>, 
				// <?= $a4;?>, 
				// <?= $a5;?>, 
				// <?= $a6;?>, 
				// <?= $a7;?>, 
				// <?= $a8;?>, 
				// <?= $a9;?>, 
				// <?= $a10;?>, 
				// <?= $a11;?>, 
				// <?= $a12;?>, 
				// <?= $a8;?>, 
				// <?= $a9;?>, 
				// <?= $a10;?>, 
				// <?= $a11;?>, 
				// <?= $a11;?>, 
				// <?= $a12;?>]
    // }]
// });

Highcharts.chart('container2', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Penjualan Per-Bulan Tahun <?php echo date('Y')?>'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Rupiah (Rp.)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: false
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'Pendapatan',
        data: [	<?= $a1;?>, 
				<?= $a2;?>, 
				<?= $a3;?>, 
				<?= $a4;?>, 
				<?= $a5;?>, 
				<?= $a6;?>, 
				<?= $a7;?>, 
				<?= $a8;?>, 
				<?= $a9;?>, 
				<?= $a10;?>, 
				<?= $a11;?>, 
				<?= $a12;?>]
    }]
});
</script>
