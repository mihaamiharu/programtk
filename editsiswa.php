<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($koneksi, "SELECT * FROM siswa WHERE idsiswa='$_GET[id]'");
$e=mysqli_fetch_array($sqlEdit);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="assets/img/header.jpg">
	<title>Ubah Siswa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">
<h3>Edit Data Siswa</h3>
<hr>
<form class="form-horizontal" method="post" action="">
	<input type="hidden" name='idsiswa' value="<?php echo $e['idsiswa']; ?>" />
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">NDS :</label>
				<div class="col-sm-10">
					<input type="text" name="nds" maxlength="8" class="form-control" value="<?php echo $e['nds']; ?>" readonly/>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Nama Siswa :</label>
				<div class="col-sm-10">
					<input type="text" name="namasiswa" maxlength="40" class="form-control" value="<?php echo $e['namasiswa']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;"class="control-label col-sm-2" for="nama">Kelas 	:</label>
				<div class="col-sm-10">
					<select name="kelas" id="kelas" onchange="isi_otomatis(this)">
					<option value="" selected disabled="">- Pilih Kelas -</option>
					<?php
					$sqlKelas = mysqli_query($koneksi, "select * from kelas order by kelas ASC");
					while($k=mysqli_fetch_array($sqlKelas)){
						?>
						<option value="<?php echo $k['kelas']; ?>" ><?php echo $k['kelas']; ?></option>
						<?php
					}
					?>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="jeniskelamin">Jenis Kelamin:</label>
				<div class="col-sm-10">
            <label>
            	<input type="radio" name="jeniskelamin" value="laki-laki"> Laki-laki
            </label>
            <label>
            	<input type="radio" name="jeniskelamin" value="perempuan"> Perempuan
            </label>
			</div>
			</div>	
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tempat Lahir 	:</label>
				<div class="col-sm-10">
					<input type="text" name="tempat" class="form-control" value="<?php echo $e['tempat']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tanggal Lahir 	:</label>
				<div class="col-sm-10">
					<input type="date" name="ttl" class="form-control" value="<?php echo $e['ttl']; ?>" />
				</div>
			</div>	
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Alamat 	:</label>
				<div class="col-sm-10">
					<input type="text" name="alamat" class="form-control" value="<?php echo $e['alamat']; ?>" />
				</div>
			</div>			
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tahun Ajaran 	:</label>
				<div class="col-sm-10">
					<input type="text" name="tahunajaran" class="form-control" value="<?php echo $e['tahunajaran']; ?>" readonly/>
				</div>
			</div>	
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Biaya SPP 	:</label>
				<div class="col-sm-10">
					<input type="text" name="biaya" id="biaya" class="form-control" value="<?php echo $e['biaya']; ?>" readonly/>
				</div>
			</div>
			
			<div align="right">
				<a href="viewdata.php">
					<button type="button" class="btn btn-danger btn-s" ><i class="fa  fa-times-circle"> Batal</i></button>
				</a>
				<button type="submit" value="update" class="btn btn-success btn-s"><i class="fa  fa-refresh"> Update</i></button>
			</div>
			<br>
</form>
</div>
<!-- proses edit data -->
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form
	$id 	= $_POST['idsiswa'];
	$nds 	= $_POST['nds'];
	$nama 	= $_POST['namasiswa'];
	$kelas 	= $_POST['kelas'];
	$jeniskelamin 	= $_POST['jeniskelamin'];
	$tempat = $_POST['tempat'];
	$ttl = $_POST['ttl'];
	$alamat = $_POST['alamat'];
	$tahun 	= $_POST['tahunajaran'];
	$biaya 	= $_POST['biaya'];

	if($nds=='' || $nama =='' || $kelas==''|| $jeniskelamin==''){
		echo "<script type='text/javascript'>alert('Form Belum lengkap....');</script>";
	}else{
		$update = mysqli_query($koneksi, "UPDATE siswa SET nds='$nds',
											namasiswa='$nama',
											kelas='$kelas',
											jeniskelamin='$jeniskelamin',
											tempat='$tempat',
											ttl='$ttl',
											alamat='$alamat',
											tahunajaran='$tahun',
											biaya='$biaya'
										WHERE idsiswa='$id'");

		if(!$update){
			echo "Update data gagal...";

		}else{
			echo("<script>location.href = 'viewdata.php';</script>");
		}
	}
}
?>
</body>
</html>
<script src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript">
	function isi_otomatis(sel){
		var a=sel.value;
    if(a=='Reguler'){
			var a = '75000'    ;
      
    }if(a=='Terpadu'){
    	var a = '110000'
    }
    $("#biaya").val(a);
    }
	
</script>