<?php 
session_start();
session_destroy();

//kembali ke login
header('location:login.php');
?>