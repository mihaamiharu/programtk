<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE idsiswa='$_GET[id]'");
	
	if($hapus){
		header('location:viewdata.php');
	}else{
		echo "Hapus data gagal...,
			<a href='viewdata.php'> Kembali</a>";
	}
}else{
	echo "Anda tidak memiliki akses ke halaman ini!!!";
}
?>