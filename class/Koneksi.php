<?php 

class Koneksi {
	
	public $conn;
		
		// method untuk menghubungkan ke database
		public function connect(){
			$this->conn = new mysqli("localhost", "root", "", "pkl");
			return $this->conn;
		}
		
		// method untuk memutuskan koneksi dengan database
		public function close(){
			return $this->conn->close();
		}
	
}

?>