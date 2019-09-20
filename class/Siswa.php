<?php 

	include_once"Koneksi.php";

	/**
	 * 
	 */
	class Siswa 
	{
		
		public $nds,
			   $nama,
			   $kelas,
			   $jk,
			   $tempat,
			   $ttl,
			   $alamat,
			   $tahun,
			   $biaya,
			   $awaltempo;


		public function tambah()
		{
			$db = new Koneksi();
			$conn = $db->connect();
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
			if($this->$nds=='' || $nama=='' || $kelas==''){
				echo "form belum lengkap";
				return false;
			}else{
				$simpan = mysqli_query($koneksi, "insert into siswa(nds,namasiswa,kelas,jeniskelamin, tempat,ttl,alamat,tahunajaran,biaya)
						values('$nds','$nama','$kelas','$jk', '$tempat','$ttl','$alamat','$tahun','$biaya')");
				if(!$simpan){
					echo "Penyimpanan data gagal..";
					return false;
				}else{
					//ambil data id siswa terakhir
					$ds=mysqli_fetch_array(mysqli_query($koneksi, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
					$idsiswa = $ds['idsiswa'];
					//membuat tagihan (12 bulan dimulai dari Juli 2018 dan menyimpan tagihan di tabel spp
					for($i=0; $i<12; $i++){
						//membuat tanggal jatuh tempo nya setiap tanggal 10
						$jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

						$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];

						mysqli_query($koneksi, "INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah)
									values('$idsiswa','$jatuhtempo','$bulan','$biaya')");
					}
				}
				echo("<script>location.href = 'viewdata.php';</script>");
			}
			$conn = $db->close();
			return $sql;
		}
		public function getKelas()
		{
			$db = new Koneksi();
			$conn = $db->connect();
			$sql = mysqli_query($conn, "select * from kelas order by kelas ASC");
			$conn = $db->close();
			return $sql->fetch_array();
		}
		public function nds()
		{
			$db = new Koneksi();
			$conn = $db->connect();
			$today = date("Y");
			$sql = mysqli_query($conn, "SELECT max(nds) AS last FROM siswa WHERE nds LIKE '$today%'");
			$data = mysqli_fetch_array($sql);
			$lastNds	= $data['last'];
			$lastNoUrut		= substr($lastNds, 4, 4);
			$nextNoUrut		= $lastNoUrut + 1;
			$nextNds	= $today.sprintf('%04s', $nextNoUrut);
			$conn = $db->close();
			return $nextNds;
		}
	}

 ?>