<?php include "header.php"; ?>
<?php
//membuat nds otomatis
		$today = date("Y");
		$query = mysqli_query($koneksi, "SELECT max(nds) AS last FROM siswa WHERE nds LIKE '$today%'");
		$data = mysqli_fetch_array($query);
		$lastNds	= $data['last'];
		$lastNoUrut		= substr($lastNds, 4, 4);
		$nextNoUrut		= $lastNoUrut + 1;
		$nextNds	= $today.sprintf('%04s', $nextNoUrut);
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

<h3>Tambah Data Siswa</h3>
<hr>
<div class="coloums">
	<form class="form-horizontal" method="post" action="" >
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">NDS :</label>
				<div class="col-sm-10">
					<input type="text" name="nds" readonly class="form-control" value="<?php echo $nextNds ?>">
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Nama Siswa :</label>
				<div class="col-sm-10">
					<input type="text" name="namasiswa" maxlength="40" class="form-control" required>
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
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tempat Lahir:</label>
				<div class="col-sm-10">
					<input type="text" name="tempat" maxlength="20" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tanggal Lahir :</label>
				<div class="col-sm-10">
					<input type="date" name="ttl"class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Alamat Tinggal :</label>
				<div class="col-sm-10">
					<input type="text" name="alamat" maxlength="100" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Tahun Ajaran 	:</label>
				<div class="col-sm-10">
					<input type="text" name="tahunajaran" class="form-control" value="<?php echo date('Y'); ?>" readonly>
				</div>
			</div>	
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Biaya SPP 	:</label>
				<div class="col-sm-10">
					<input type="text" name="biaya" id="biaya" class="form-control" required readonly="">
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Sumbangan 	:</label>
				<div class="col-sm-10">
					<input type="text" name="sumbangan" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label style="text-align: left;" class="control-label col-sm-2" for="nama">Jatuh Tempo Pertama 	:</label>
				<div class="col-sm-10">
					<input type="text" name="jatuhtempo" class="form-control" value="2019-07-10" readonly>
				</div>
			</div>
			<div align="right">
				<a href="viewdata.php">
					<button type="button" class="btn btn-danger btn-s" ><i class="fa  fa-times-circle"> Batal</i></button>
				</a>
				<button type="submit" value="Simpan" class="btn btn-success btn-s"><i class="fa  fa-save"> Simpan</i></button>
			</div>	
			<br>	

</form>
</div>
</div>
<!-- simpan data -->
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//variabel untuk menampung inputan dari form
		$nds 	= $_POST['nds'];
		$nama 	= $_POST['namasiswa'];
		$kelas 	= $_POST['kelas'];
		$jk 	= $_POST['jeniskelamin'];
		$tempat = $_POST['tempat'];
		$ttl    = $_POST['ttl'];
		$alamat = $_POST['alamat'];
		$tahun 	= $_POST['tahunajaran'];
		$biaya 	= $_POST['biaya'];
		$sumbangan 	= $_POST['sumbangan'];
		$awaltempo = $_POST['jatuhtempo'];

		// Membuat Array untuk menampung bulan bahasa indonesia
		$bulanIndo = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);
		
		//proses simpan
		
         
		if($nds=='' || $nama=='' || $kelas==''){
			echo "form belum lengkap";
		}else{
			$simpan = mysqli_query($koneksi, "insert into siswa(nds,namasiswa,kelas,jeniskelamin, tempat,ttl,alamat,tahunajaran,biaya,sumbangan)
					values('$nds','$nama','$kelas','$jk', '$tempat','$ttl','$alamat','$tahun','$biaya','$sumbangan')");
			if(!$simpan){
				echo "Penyimpanan data gagal..";
			}else{
				//ambil data id siswa terakhir
				$ds = mysqli_fetch_array(mysqli_query($koneksi, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
				$idsiswa = $ds['idsiswa'];
				//membuat tagihan (12 bulan dimulai dari Juli 2018 dan menyimpan tagihan di tabel spp
				for($i=0; $i<12; $i++){
					//membuat tanggal jatuh tempo nya setiap tanggal 10
					$jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

					$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];

					mysqli_query($koneksi, "INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah,ket)
								values('$idsiswa','$jatuhtempo','$bulan','$biaya','BELUM LUNAS')");
				}
			}
			session_start();
			$_SESSION['tambah'] = $simpan;
			echo("<script>location.href = 'viewdata.php';</script>");
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