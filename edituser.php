<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>PT KAI DAOP 2 Bandung - LOST & FOUND </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="superadmin.php">SUPER ADMIN PAGE</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="superadmin.php">Home</a></li>
					<li><a href="registrasi.php">Form Registrasi</a></li>
					<li><a href="saform.php">Form Barang</a></li>
					<li><a href="sadata.php">Data Admin</a></li>
					<li><a href="sahilangbproses.php">Laporan Kehilangan Belum Diproses</a></li>
					<li><a href="sahilangsproses.php">Laporan Kehilangan Terproses</a></li>
					<li><a href="salost.php">Data Barang Belum Diambil </a></li>
					<li><a href="safound.php">Data Barang Diambil</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			
			<!-- Heading -->
			<div id="heading" >
				<h1>EDIT</h1>
			</div>
			
			<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
				<p><a href="superadmin.php">Halaman Utama.</a><a href="sadata.php">Batal Edit</a></p>
				<?php
				if ((isset($_GET['iduser'])) && (is_numeric($_GET['iduser']))){
					$id = $_GET['iduser'];
				}elseif ((isset($_POST['iduser'])) && (is_numeric($_POST['iduser']))){
					$id = $_POST['iduser'];
				}else {
					echo '<p class="error"> Halaman ini Error</p>';
					exit();
				}
				require('mysqli_connect.php');
				
				//apakah form telah disubmit?
			if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
					$arrayError = array();
				//1
				if (empty($_POST['nama'])){
					$arrayError[] = '<script type="text/javascript">alert("Nama tidak boleh kosong");</script>';
				}else{
					$nama = mysqli_real_escape_string($dbkoneksi, trim($_POST['nama']));
				}
				//2
				if (empty($_POST['nipp'])){
					$arrayError[] = '<script type="text/javascript">alert("Tanggal nipp tidak boleh kosong");</script>';
				}else{
					$nipp = mysqli_real_escape_string($dbkoneksi, trim($_POST['nipp']));
				}
				//3
				if (empty($_POST['username'])){
					$arrayError[] = '<script type="text/javascript">alert("Username tidak boleh kosong");</script>';
				}else{
					$username = mysqli_real_escape_string($dbkoneksi, trim($_POST['username']));
				}
				//4
				if (empty($_POST['password'])){
					$arrayError[] = '<script type="text/javascript">alert("password tidak boleh kosong");</script>';
				}else{
					$password = mysqli_real_escape_string($dbkoneksi, trim($_POST['password']));
				}
				
				//Update
				if (empty($arrayError)){
					$q="UPDATE pengguna SET nama='$nama', nipp='$nipp',  username='$username', password='$password' WHERE iduser = $id LIMIT 1";
					$hasil = @mysqli_query($dbkoneksi, $q);
					
					if (mysqli_affected_rows($dbkoneksi) == 1){
						echo '<p>  BERHASIL DIEDIT. <a href="sadata.php">Kembali</a>, <a href="superadmin.php">Halaman Utama</a>.</p>';
					}else{
						echo '<script type="text/javascript">alert("Batal diedit");</script>';
						
					}
				}else{
					echo '<script type="text/javascript">alert("Pastikan Semua Kolom Terisi");</script>';
				}
			}
				
				//menyeleksi rekaman
				$q = "SELECT nama, nipp, username, password FROM pengguna WHERE iduser =$id";
				$hasil = @mysqli_query ($dbkoneksi, $q);
				
				
				if(mysqli_num_rows ($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					
					
					//form edit
					echo '
						<form action="edituser.php" method="post">
						<div class="row gtr-uniform">
						<div class="col-6 col-12-xsmall">
                            <label>Nama	:
                            <input class="form-control" name="nama" type="text"  value="' . $baris[0] . '">
							</label>
						</div>
						<div class="col-6 col-12-xsmall">
                            <label>NIPP	:
                            <input class="form-control" name="nipp" type="text"  value="' . $baris[1] . '">
							</label>
						</div>
						<div class="col-6 col-12-xsmall">
                            <label>Username	:
                            <input class="form-control" name="username" type="text"  value="' . $baris[2] . '">
							</label>
						</div>
						<div class="col-6 col-12-xsmall">
                            <label>Password	:
                            <input class="form-control" name="password" type="password"  value="' . $baris[3] . '">
							</label>
						</div>
						<div class="col-6 col-12-xsmall">
						<br><p><input id="submit" class="primary fit" 
						type="submit" name="submit" value="Update"></p>
						<br><input type="hidden" name="iduser" value="' . $id . '"/>
						<div class="col-6 col-12-xsmall">
						</div>
						</div>
						</form>';
				}else{
				echo "Halaman Error";
				}
				mysqli_close($dbkoneksi);
				?>
				
				</div>
			</div>
			</div>
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; PT KAI DAOP 2 BANDUNG, Divisi Pengamanan</a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>