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
				<h1>LIHAT PASSWORD</h1>
			</div>
			
			<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
				
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
				
				//menyeleksi rekaman
				$q = "SELECT username, password FROM pengguna WHERE iduser =$id";
				$hasil = @mysqli_query ($dbkoneksi, $q);
				
				
				if(mysqli_num_rows ($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					
					
					//form edit
					echo '
						<form action="pass.php" method="post">
						<div class="row gtr-uniform">
						<div class="col-12 col-12-xsmall">
                            <ul class="alt">
							<label>DATA USER</label>
							<li></li>
						</ul>
						</div>
						
						<div class="col-12 col-12-xsmall">
                            <h3>Username	: ' . $baris[0] . '</h3>
						</div>
						<div class="col-12 col-12-xsmall">
                            <h3>Password	: ' . $baris[1] . '</h3>
						</div>
						<div class="col-3 col-12-xsmall">
						<br><p><a href="sadata.php" class="button primary fit">OK</a></p>
						</div>
						</form>';
				}else{
				echo "Halaman Error";
				}
				mysqli_close($dbkoneksi);
				?>
				
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