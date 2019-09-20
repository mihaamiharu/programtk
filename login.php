<!DOCTYPE html>
<html>
<head>
	<title>Login Aplikasi Pembayaran spp</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row" style="margin-top: 150px">
      <div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
          <div class="panel-heading" style="text-align: center;">
            <strong>TK Al-Munar</strong>  
          </div>
          <div class="panel-body">
<hr/>
<form method="POST" class="form-horizontal" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" placeholder="Enter password" name="password" required>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-1 col-sm-10" >
        <center><button type="submit" class="btn btn-primary" value="Login">LOGIN</button></center>
      </div>
    </div>
  </form>
  <hr/>
<?php
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	//variabel untuk menyimpan kiriman dari form
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if ($user=='' || $pass=='') {
		
	}else{
		include "koneksi.php";
		$sqlLogin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		$d=mysqli_fetch_array($sqlLogin);
		if ($jml > 0) {
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['id']    = $d['idadmin'];
			$_SESSION['username'] =$d['username'];

			header('location:./index.php');
		}else{
			echo "<div class='alert alert-danger'>Login Gagal</div>";
		}
	}
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("assets/img/header1.jpg", {
      speed: 500
    });
  </script>
</body>
</html>
