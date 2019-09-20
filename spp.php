<?php include "header.php" ?>
<link rel="shortcut icon" href="assets/img/header.jpg">
  <div class="container">
	<h1 align="center">Pembayaran <small>SPP</small></h1>
		<hr>
		<?php if(isset($_SESSION['tambah'])) :  ?>
		    <p>
		    	<div class="alert alert-success alert-dismissible">
		    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    		<strong>Terimakasih! </strong> Pembayaran Berhasil.
		  		</div>
		    </p>
    	<!-- Mengosongkan session message agar pesan tidak muncul kembali -->
      	<?php unset($_SESSION['tambah']); ?>
    	<?php endif; ?>
		<form method="get" align="center" action="">
			<div class="form-group"> 
			<input type="text" name="nds" placeholder="nds siswa" />
			<button  type="submit" class="btn btn-danger btn-l" 
			name="cari" value="Cari Siswa"><i class="fa fa-search"></i> </button>
		</div>
		</form>
<?php
if(isset($_GET['nds']) && $_GET['nds']!=''){
	$sqlSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nds='$_GET[nds]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nds = $ds['nds'];
?>
<div class="container">
	
	<h3>Biodata Siswa</h3>


<table>
	<tr>
		<td>NDS</td>
		<td>:</td>
		<td>&emsp;<?php echo $ds['nds']; ?></td>
	</tr>

	<tr>
		<td>Nama Siswa </td>
		<td>:</td>
		<td>&emsp;<?php echo $ds['namasiswa']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td>&emsp;<?php echo $ds['kelas']; ?></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td>:</td>
		<td>&emsp;<?php echo $ds['tahunajaran']; ?></td>
	</tr>
</table>
	<h3>Tagihan SPP Siswa</h3>
<table class="table table-bordered table-striped">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Jatuh Tempo</th>
		<th>No. Slip</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>
	
	<?php
	$sql = mysqli_query($koneksi, "SELECT * FROM spp WHERE idsiswa='$ds[idsiswa]'");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[bulan]</td>
			<td>$d[jatuhtempo]</td>
			<td>$d[nobayar]</td>
			<td>$d[tglbayar]</td>
			<td>Rp. $d[jumlah]</td>
			<td>$d[ket]</td>
			<td align='center'>";
				if($d['nobayar']==''){
					//echo "<a class='btn btn-primary btn-s' href='bayar.php?nds=$nds&act=bayar&id=$d[idspp]'><i class='fa fa-money'> Bayar</i></a>";
					echo "<a class='btn btn-success btn-s' href='prosestransaksi.php?nds=$nds&act=bayar&id=$d[idspp]'><i class='fa fa-money'> Bayar</i></a>";
				}else{
					// echo "<a class='btn btn-danger btn-s' href='prosestransaksi.php?nds=$nds&act=batal&id=$d[idspp]'><i class='fa fa-times-circle'> Batal</i></a>
					 echo "<a class='btn btn-default btn-s' href='cetakslip.php?nds=$nds&id=$d[idspp]' target='_blank'><i class='fa fa-print'> Cetak</i></a> ";
				}
			"</td>
		</tr>";
		$no++;
	}
	?>
</table>
<?php
}
?>
</div>
</div>