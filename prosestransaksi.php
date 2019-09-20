<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	if($_GET['act']=='bayar'){

		$idspp 	= $_GET['id'];
		$nds	= $_GET['nds'];

		//membuat nomor pembayaran
		function acak($panjang)
							{
							    $karakter= '0123456789';
							    $string = '';
							    for ($i = 0; $i < $panjang; $i++) {
							  $pos = rand(0, strlen($karakter)-1);
							  $string .= $karakter{$pos};
							    }
							    return $string;
							}
							//cara memanggilnya
							$hasil_1= acak(6);

		//tanggal Bayar
		$tglBayar 	= date('Y-m-d');

		//id admin
		$admin = $_SESSION['id'];

		//infak


	    $result = mysqli_query($koneksi, "UPDATE spp SET nobayar='$hasil_1',
											tglbayar='$tglBayar',
											
											ket='LUNAS',
											idadmin='$admin'
									WHERE idspp='$idspp'");

	    session_start();
		$_SESSION['tambah'] = $result;
		header('location:spp.php?nds='.$nds);
	}
	elseif ($_GET['act']=='batal') {
		
		$idspp 	= $_GET['id'];
		$nds	= $_GET['nds'];

		mysqli_query($koneksi, "UPDATE spp SET nobayar=null,
											tglbayar=null,
											
											ket='BELUM LUNAS',
											idadmin=null
									WHERE idspp='$idspp'");

		header('location:spp.php?nds='.$nds);
	}
}
?>