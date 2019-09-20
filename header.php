<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SPP Al-Munar</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li class="nav-item ">
                            <a class="nav-link" href="index.php">Halaman Utama</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="viewdata.php">Data Siswa</a>
                             <li class="nav-item">
                            <a class="nav-link" href="spp.php">Pembayaran</a>
                             </li>
                             <li class="nav-item">
                             <a class="nav-link" href="viewlaporan.php">Laporan</a>
                            </li>   
                            <li><a href="logout.php">Keluar</a></li>
                        </ul>
                    </div>
                </div>
    </section>
<!-- CORE JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
</html>
