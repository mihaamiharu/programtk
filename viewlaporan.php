<?php include "header.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="assets/img/header.jpg">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<div class="container" align="center">
<h1 align="center">Rekapitulasi <small>Pembayaran</small></h1>
		<hr>
		<div class="container" align="center">
			<strong>Laporan Pembayaran</strong>
		<form method="GET" action="laporanpembayaran.php" target="_blank">
			Mulai Tanggal <input type="date" name="tgl1" value="<?php echo date('Y-m-d'); ?>" />
			Sampai Tanggal <input type="date" name="tgl2" value="<?php echo date('Y-m-d'); ?>" />
			<button type="submit" value="Tampilkan" class="btn btn-success btn-l"><i class="fa  fa-eye"> Tampilkan</i></button>
		</form></div>
			<br>
			<div class="container" align="center">
			<strong>Laporan Pembayaran Belum Lunas</strong>
		<form method="GET" action="laporantunggakan.php" target="_blank">
			Mulai Tanggal <input type="date" name="tgl1" value="<?php echo date('Y-m-d'); ?>" />
			Sampai Tanggal <input type="date" name="tgl2" value="<?php echo date('Y-m-d'); ?>" />
			<button type="submit" value="Tampilkan" class="btn btn-success btn-l"><i class="fa  fa-eye"> Tampilkan</i></button>
		</form></div>
			<br>
		<div class="container" align="center">
		<form method="GET" action="laporantahun.php" target="_blank">
			<select class="custom-select" name="bln"  style="width:515px" required>
              <option selected>-Pilih Bulan-</option>
                   <?php
						$sqlKelas = mysqli_query($koneksi, "select distinct bulan from spp order by bulan ");
						while($k=mysqli_fetch_array($sqlKelas)){
						?>
						<option value="<?php echo $k['bulan']; ?>"><?php echo $k['bulan']; ?></option>
						<?php
						}
					?>
            </select>
            	<button type="submit" value="Tampilkan" class="btn btn-success btn-s" ><i class="fa  fa-eye"> Tampilkan</i></button>
		</form>
		</div>
<br>
	<h5 align="center"><strong>Demografi Pembayaran</strong></h5>
	<div id="container" align="center" style="width:60%;" ></div>
<?php 
	$sqlBayar = mysqli_query($koneksi,"SELECT * FROM spp where ket='lunas'");
	$no=1;
	$total = 0;
	while ($d=mysqli_fetch_array($sqlBayar)) {
		
			$no++;
			$total += $d['jumlah'];
	}
	?>
<p align="center"><b>Total Uang Yang di dapat	: Rp. <?php echo $total; ?></b></p>
</div>
<?php
include 'koneksi.php';

$sql = mysqli_query($koneksi,"select * from spp'");
?>
<script src="assets/highcharts/highcharts.js"></script>
<script src="assets/highcharts/exporting.js"></script>	
<script type="text/javascript">
	Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        tickmarkPlacement: 'on',
        title: {
            enabled: true
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Data Siswa Yang Lunas'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        split: false,
        valueSuffix: ' orang'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{

        name: 'Lunas',
        data: [
        			<?php 
					$jan = mysqli_query($koneksi,"select * from spp where bulan='januari' and ket='lunas'");
					echo mysqli_num_rows($jan);
					?>, 
					<?php 
					$feb = mysqli_query($koneksi,"select * from spp where bulan='februari' and ket='lunas'");
					echo mysqli_num_rows($feb);
					?>, 
					<?php 
					$mar = mysqli_query($koneksi,"select * from spp where bulan='maret' and ket='lunas'");
					echo mysqli_num_rows($mar);
					?>, 
					<?php 
					$apr = mysqli_query($koneksi,"select * from spp where bulan='april' and ket='lunas'");
					echo mysqli_num_rows($apr);
					?>, 
					<?php 
					$mei = mysqli_query($koneksi,"select * from spp where bulan='mei' and ket='lunas'");
					echo mysqli_num_rows($mei);
					?>, 
					<?php 
					$jun = mysqli_query($koneksi,"select * from spp where bulan='juni' and ket='lunas'");
					echo mysqli_num_rows($jun);
					?>, 
					<?php 
					$jul = mysqli_query($koneksi,"select * from spp where bulan='juli' and ket='lunas'");
					echo mysqli_num_rows($jul);
					?>, 
					<?php 
					$agu = mysqli_query($koneksi,"select * from spp where bulan='agustus' and ket='lunas'");
					echo mysqli_num_rows($agu);
					?>, 
					<?php 
					$sep = mysqli_query($koneksi,"select * from spp where bulan='september' and ket='lunas'");
					echo mysqli_num_rows($sep);
					?>, 
					<?php 
					$okt = mysqli_query($koneksi,"select * from spp where bulan='oktober' and ket='lunas'");
					echo mysqli_num_rows($okt);
					?>, 
					<?php 
					$nov = mysqli_query($koneksi,"select * from spp where bulan='november' and ket='lunas'");
					echo mysqli_num_rows($nov);
					?>, 
					<?php 
					$des = mysqli_query($koneksi,"select * from spp where bulan='desember' and ket='lunas'");
					echo mysqli_num_rows($des);
					?>,
					]


    }]
    
});
</script>


</body>
</html>
<script src="assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>

</script>