<?php include "header.php"; ?>
<?php
if ($_GET['id']) {
		
		$idspp 	= $_GET['id'];
		$jt 	= $_GET['jt'];
		$nds	= $_GET['nds'];
		$koneksi =mysqli_connect("localhost","root","","pkl");
		$result = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nds = '$_GET[nds]'");
		$ambil=mysqli_fetch_array($result);		
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="assets/img/header.jpg">
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
	
</head>

<body>
<div class="container">

<h3>Pembayaran SPP Siswa</h3>
<hr>
<div class="coloums">
	<form class="form-horizontal" method="post" action="" >
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">No Bayar :</label>
				<div class="col-sm-10">
					<input type="text" name="nobayar" readonly class="form-control" value="<?= $ambil['nds']?><?= $idspp ?>">
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">NDS :</label>
				<div class="col-sm-10">
					<input type="text" name="nds" readonly class="form-control" value="<?= $ambil['nds']?>">
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Nama Siswa :</label>
				<div class="col-sm-10">
					<input type="text" name="namasiswa" maxlength="40" class="form-control" value="<?= $ambil['namasiswa']?>" required readonly>
				</div>
			</div>
			<!-- <div class="form-group">
				<label style="text-align: left;"class="control-label col-sm-2" for="nama">Kelas 	:</label>
				<div class="col-sm-10">
					<input type="text" name="kelas" maxlength="40" class="form-control" value="<?= $ambil['kelas']?>" required readonly>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="jeniskelamin">Jenis Kelamin:</label>
				<div class="col-sm-10">
					<input type="text" name="jeniskelamin" maxlength="40" class="form-control" value="<?= $ambil['jeniskelamin']?>" required readonly>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tempat Tanggal Lahir:</label>
				<div class="col-sm-10">
					<input type="text" name="tempat" maxlength="20" class="form-control" value="<?= $ambil['tempat']?>,&nbsp;<?= $ambil['ttl']?>" required readonly>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Alamat Tinggal :</label>
				<div class="col-sm-10">
					<input type="text" name="alamat" maxlength="100" class="form-control" value="<?= $ambil['alamat']?>" required readonly>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tahun Ajaran 	:</label>
				<div class="col-sm-10">
					<input type="text" name="tahunajaran" class="form-control" value="<?= date('Y'); ?>" readonly>
				</div>
			</div>	 -->
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Biaya SPP 	:</label>
				<div class="col-sm-10">
					<input type="number" name="biaya"  class="form-control" required autofocus>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tempo Pembayaran	:</label>
				<div class="col-sm-10">
					<input type="text" name="jatuhtempo" class="form-control" value="<?= $_GET['jt'];?>" readonly>
				</div>
			</div>
			<div align="right">
				<a href="viewdata.php">
					<button type="button" class="btn btn-danger btn-s" ><i class="fa  fa-times-circle"> Batal</i></button>
				</a>
				<button type="submit" value="Bayar" class="btn btn-success btn-s"><i class="fa  fa-save"> Bayar</i></button>
			</div>	
			<br>	

</form>
</div>
</div>
<!-- simpan data -->
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//variabel untuk menampung inputan dari form
		
		$biaya 	    = $_POST['biaya'];
		$tglbayar 	= date('Y-m-d');
		$nobayar    = $_POST['nobayar'];
		
		//proses bayar
		
		if($biaya=='')
		{
			echo "<script type='text/javascript'>alert('form belum lengkap');</script>";
		}else
		{
			$result = mysqli_query($koneksi, "SELECT tunggakan FROM spp where idspp='$idspp' ");
			$cek=mysqli_fetch_array($result);
			$tunggakan = $cek['tunggakan'] - $biaya;
			var_dump($tunggakan);
			if ($cek['tunggakan'] == $biaya ){
					echo "<script type='text/javascript'>alert('Maaf Bayaran Melebihi Batas');</script>";
					echo("<script>location.href = 'bayar.php?nds=$nds&act=bayar&jt=$jt&id=$idspp;</script>");
			}else{
					// $bayar = mysqli_query($koneksi, "UPDATE spp SET bayar     ='$biaya',
					// 												tglbayar  = '$tglbayar',
					// 												nobayar   ='$nobayar',
					// 												tunggakan ='$tunggakan'
					// 											WHERE 
					// 												idspp     ='$idspp'");
					// echo("<script>location.href = 'spp.php?nds=$nds';</script>");
				}
		}
	}
?>

</body>
</html>

<script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/DataTables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datatables').DataTable();
        });
</script>