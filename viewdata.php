<?php include "header.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="assets/img/header.jpg">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>

<h1 align="center">Data <small>Siswa</small></h1>
		<hr>
	
<div class="container" align="center">
	<?php if(isset($_SESSION['tambah'])) :  ?>
    <p>
    	<div class="alert alert-success alert-dismissible">
    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		<strong>Berhasil!</strong> Siswa Berhasil di Tambahkan.
  		</div>
    </p>
    <!-- Mengosongkan session message agar pesan tidak muncul kembali -->
      <?php unset($_SESSION['tambah']); ?>
    <?php endif; ?> 
	<form method="get" action="">
	<i class="fa fa-user icon"></i>
	<input type="text" name="nds" placeholder="nds siswa" autofocus/>
	<button  type="submit" class="btn btn-danger btn-l" 
	name="cari" value="Cari Siswa"><i class="fa fa-search"></i> </button>
	<a class="btn btn-info btn-s" href="tambahsiswa.php"><i class="glyphicon glyphicon-plus"></i> </a>
	</form>
</div>
</div>
	<?php
if(isset($_GET['nds']) && $_GET['nds']!=''){
	$sqlSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nds='$_GET[nds]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nds = $ds['nds'];
?>
<div class="container" align="left">
	
	<h3 align="center">Biodata Siswa</h3>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>NDS</th>
			<th>Nama Siswa</th>
			<th>Jenis Kelamin</th>
			<th>Kelas</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
			<th>Tahun Ajaran</th>
			<th>Biaya</th>
			<th>Sumbangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$sql = mysqli_query($koneksi,"select * from siswa WHERE idsiswa='$ds[idsiswa]'");
		$no=1;
		
		while($d=mysqli_fetch_array($sql)):?>
			<tr>
				<td><?= $no ?> </td>
				<td><?= $d['nds']?></td>
				<td><?= $d['namasiswa']?></td>
				<td><?= $d['jeniskelamin']?></td>
				<td><?= $d['kelas']?></td>
				<td><?= $d['tempat']?></td>
				<td><?= $d['ttl'] ?></td>
				<td><?= $d['alamat'] ?></td>
				<td><?= $d['tahunajaran'] ?></td>
				<td>Rp. <?= $d['biaya'] ?></td>
				<td>Rp. <?= $d['sumbangan'] ?></td>
				<td>
					<a class='btn btn-warning btn-xs' href='editsiswa.php?id=<?= $d['idsiswa']?>'><i class='fa  fa-edit'> Ubah</i> </a> <br><br>
					<a class='btn btn-danger btn-xs' onclick="javascript: return confirm('Anda yakin hapus ?')" href='hapussiswa.php?id=<?= $d['idsiswa']?>'><i class='fa  fa-trash'> Hapus</i></a>
				</td>
			</tr>
			
		
		<?php endwhile; $no++;?>
		</tbody>
	</table>
<?php
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
