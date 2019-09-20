<?php 
session_start();
if (isset($_SESSION['login'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title> Cetak Laporan Pembayaran</title>
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
<?php 
$sqlSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nds='$_GET[nds]'");
$ds = mysqli_fetch_array($sqlSiswa);
?>
<table>
	<tr>
		<td width="100">Nama Siswa</td>
		<td width="4">:</td>
		<td><?php echo $ds['namasiswa']; ?></td>
	</tr>
	<tr>
		<td width="100">NIS</td>
		<td width="4">:</td>
		<td><?php echo $ds['nds']; ?></td>
	</tr>
	<tr>
		<td width="100">Kelas</td>
		<td width="4">:</td>
		<td><?php echo $ds['kelas']; ?></td>
	</tr>
</table>
<br>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th>No.</th>
		<th>No Bayar</th>
		<th>Pembayaran Bulan</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
	</tr>
	<?php 
	$sqlBayar = mysqli_query($koneksi,"SELECT spp.*,siswa.nds,siswa.namasiswa,siswa.kelas FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa WHERE idspp='$_GET[id]' ORDER BY nobayar ASC");
	$no=1;
	while ($d=mysqli_fetch_array($sqlBayar)) {
		echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$d[nobayar]</td>
			<td align='center'>$d[bulan]</td>
			<td align='center'>$d[jumlah]</td>
			<td align='center'>$d[ket]</td>
			</tr>";
			$no++;
	}
	?>
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
<a href="#" class="no-print" onclick="window.print();">			<button type="button" class="btn btn-default 		btn-lg" >Cetak</button>
</a>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>