<?php 
	include "../../class/Siswa.php";
	$siswa = new Siswa();

		$siswa->nds        = $_POST['nds'];
		$siswa->$nama      = $_POST['namasiswa'];
		$siswa->$kelas     = $_POST['kelas'];
		$siswa->$jk        = $_POST['jeniskelamin'];
		$siswa->$tempat    = $_POST['tempat'];
		$siswa->$ttl       = $_POST['ttl'];
		$siswa->$alamat    = $_POST['alamat'];
		$siswa->$tahun 	   = $_POST['tahunajaran'];
		$siswa->$biaya 	   = $_POST['biaya'];
		$siswa->$awaltempo = $_POST['jatuhtempo'];

		$error = $siswa->tambah();




 ?>