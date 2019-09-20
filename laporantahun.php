<?php 
session_start();
if (isset($_SESSION['login'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body {
			font-family: Arial;
		}
		@media print{
			.no-print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>

<body>
<p align="center"> <img src="assets/img/bukti.PNG" width="45%"/></p><p align="center"></p>
<p>Tanggal	: <?php echo $_GET['bln']; ?></p>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th>No.</th>
		<th>NDS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>No Bayar</th>
		<th>Pembayaran Bulan</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
	</tr>
	<?php 
	$sqlBayar = mysqli_query($koneksi,"SELECT spp.*,siswa.nds,siswa.namasiswa,siswa.kelas FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa where ket='lunas' and bulan='$_GET[bln]' ");
	$no=1;
	$total = 0;
	while ($d=mysqli_fetch_array($sqlBayar)) {
		echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$d[nds]</td>
			<td align='center'>$d[namasiswa]</td>
			<td align='center'>$d[kelas]</td>
			<td align='center'>$d[nobayar]</td>
			<td align='center'>$d[bulan]</td>
			<td align='right'>Rp. $d[jumlah]</td>
			<td align='center'>$d[ket]</td>
			</tr>";
			$no++;
			$total += $d['jumlah'];
	}
	?>
	<tr>
		<td colspan="6" align="center">
			TOTAL
		</td>
		<td align="right"><b>Rp. <?php echo $total; ?></b></td>
		<td></td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Bandung, <?php echo date("d-m-Y"); ?></p>
			<br>
			<br>
			<p>_________________</p>
		</td>
	</tr>
</table>
<hr>
<br>
	<a href="#" class="no-print" onclick="window.print();">
		<button type="button" class="btn btn-default btn-lg">Cetak</button>
	</a>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>