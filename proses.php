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
				<a class="logo" href="admin.php">ADMIN PAGE</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
				<li><a href="admin.php">Home</a></li>
					<li><a href="admin.php">Home</a></li>
					<li><a href="form.php">FORM</a></li>
					<li><a href="hilangbproses.php">Laporan Kehilangan Belum Diproses</a></li>
					<li><a href="hilangsproses.php">Laporan Kehilangan Terproses</a></li>
					<li><a href="lost.php">Data Barang Belum Diambil </a></li>
					<li><a href="found.php">Data Barang Diambil</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			
			<!-- Heading -->
			<div id="heading" >
				<h1>CLAIM</h1>
			</div>
			
			<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
				
				<?php
				if ((isset($_GET['iddata'])) && (is_numeric($_GET['iddata']))){
					$id = $_GET['iddata'];
				}elseif ((isset($_POST['iddata'])) && (is_numeric($_POST['iddata']))){
					$id = $_POST['iddata'];
				}else {
					echo '<p class="error"> Halaman ini Error</p>';
					exit();
				}
				require('mysqli_connect.php');
				
				//apakah form telah disubmit?
			if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
					$arrayError = array();
				
				//1
				if (empty($_POST['petugas'])){
					$arrayError[] = '<script type="text/javascript">alert("Nama petugas tidak boleh kosong");</script>';
				}else{
					$petugas = mysqli_real_escape_string($dbkoneksi, trim($_POST['petugas']));
				}
				
				if (empty($arrayError)){
					$q="UPDATE kehilangan SET  petugas='$petugas',tglproses=NOW(), status='Terproses' WHERE iddata = $id LIMIT 1";
					$hasil = @mysqli_query($dbkoneksi, $q);
					
					if (mysqli_affected_rows($dbkoneksi) == 1){
						echo '<p>  BERHASIL DIEDIT. <a href="hilangsproses.php">Kembali</a>, <a href="admin.php">Halaman Utama</a>.</p>';
					}else{
						echo '<script type="text/javascript">alert("Batal diproses");</script>';
						
					}
				}else{
					echo '<script type="text/javascript">alert("Pastikan Semua Kolom Terisi");</script>';
				}
			}
				
				//menyeleksi rekaman
				$q = "SELECT tanggal, nama, jenis, deskripsi,petugas FROM kehilangan WHERE iddata =$id";
				$hasil = @mysqli_query ($dbkoneksi, $q);
				
				
				if(mysqli_num_rows ($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					
					
					//form edit
					echo '
						<form action="proses.php" method="post">
						<div class="row gtr-uniform">
						<div class="col-12 col-12-xsmall">
                            <ul class="alt">
							<label>FORM DATA</label>
							<li></li>
						</ul>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <h3>Tanggal Laporan	: ' . $baris[0] . '</h3>
						</div>
						<div class="col-6 col-12-xsmall">
                            <h3>Nama Pelapor	: ' . $baris[1] . '</h3>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <h3>Jenis Barang Yang Hilang	: ' . $baris[2] . '</h3>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <h3>Deskripsi Barang	: ' . $baris[3] . '</h3>
						</div>
						
						<div class="col-12 col-12-xsmall">
                            <ul class="alt">
							<label>FORM PETUGAS</label>
							<li></li>
						</ul>
						</div>
						<div class="col-6 col-12-xsmall">
                            <label>Petugas Jaga	:
                            <input class="form-control" name="petugas" type="text"  value="' . $baris[4] . '">
							</label>
						</div>
						
						<div class="col-3 col-12-xsmall">
						<br><p><a href="hilangbproses.php" class="button primary fit">Batal</a></p></div>
						
						<div class="col-3 col-12-xsmall">
						<br><p><input id="submit" class="primary fit" 
						type="submit" name="submit" value="Proses"></p>
						<br><input type="hidden" name="iddata" value="' . $id . '"/>
						<div class="col-lg-6">
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