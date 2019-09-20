<?php
//variabel koneksi
$koneksi = mysqli_connect("localhost","root","","pkl");

if(!$koneksi) {
	echo "koneksi database gagal !!!" ;
}
?>