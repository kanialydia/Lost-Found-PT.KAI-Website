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
				<h1>CLAIM</h1>
			</div>
			
			<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
				
				<?php
				if ((isset($_GET['idbarang'])) && (is_numeric($_GET['idbarang']))){
					$id = $_GET['idbarang'];
				}elseif ((isset($_POST['idbarang'])) && (is_numeric($_POST['idbarang']))){
					$id = $_POST['idbarang'];
				}else {
					echo '<p class="error"> Halaman ini Error</p>';
					exit();
				}
				require('mysqli_connect.php');
				
				//apakah form telah disubmit?
			if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
					$arrayError = array();
				
				//4
				if (empty($_POST['penerima'])){
					$arrayError[] = '<script type="text/javascript">alert("Penerima tidak boleh kosong");</script>';
				}else{
					$penerima = mysqli_real_escape_string($dbkoneksi, trim($_POST['penerima']));
				}
				//5
				if (empty($_POST['jenispengenal'])){
					$arrayError[] = '<script type="text/javascript">alert("Jenis Identitas tidak boleh kosong");</script>';
				}else{
					$identitas = mysqli_real_escape_string($dbkoneksi, trim($_POST['jenispengenal']));
				}
				//6
				if (empty($_POST['nopengenal'])){
					$arrayError[] = '<script type="text/javascript">alert("No. Identitas tidak boleh kosong");</script>';
				}else{
					$noidentitas = mysqli_real_escape_string($dbkoneksi, trim($_POST['nopengenal']));
				}
				
				//
				if (empty($arrayError)){
					$q="UPDATE data SET  penerima='$penerima',
					jenispengenal='$identitas',  nopengenal='$noidentitas',
					 tgldiambil=NOW(), status='terklaim' WHERE idbarang = $id LIMIT 1";
					$hasil = @mysqli_query($dbkoneksi, $q);
					
					if (mysqli_affected_rows($dbkoneksi) == 1){
						echo '<p>  BERHASIL DIEDIT. <a href="safound.php">Kembali</a>, <a href="superadmin.php">Halaman Utama</a>.</p>';
					}else{
						echo '<script type="text/javascript">alert("Batal diedit");</script>';
						
					}
				}else{
					echo '<script type="text/javascript">alert("Pastikan Semua Kolom Terisi");</script>';
				}
			}
				
				//menyeleksi rekaman
				$q = "SELECT jenis, penerima, penemu, jenispengenal, lainnya, tgldiambil, tglditemukan, nopengenal, milikka FROM data WHERE idbarang =$id";
				$hasil = @mysqli_query ($dbkoneksi, $q);
				
				
				if(mysqli_num_rows ($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					
					
					//form edit
					echo '
						<form action="saklaim.php" method="post">
						<div class="row gtr-uniform">
						<div class="col-12 col-12-xsmall">
                            <ul class="alt">
							<label>FORM DATA</label>
							<li></li>
						</ul>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <h3>Jenis Barang	: ' . $baris[0] . '</h3>
						</div>
						<div class="col-6 col-12-xsmall">
                            <h3>Yang Menyerahkan	: ' . $baris[2] . '</h3>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <h3>Deskripsi Lainnya	: ' . $baris[4] . '</h3>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <h3>Tanggal Ditemukan	: ' . $baris[6] . '</h3>
						</div>
						
						<div class="col-12 col-12-xsmall">
                            <h3>Milik KNP KA	: ' . $baris[8] . '</h3>
						</div>
						<div class="col-12 col-12-xsmall">
                            <ul class="alt">
							<label>FORM PENERIMA</label>
							<li></li>
						</ul>
						</div>
						<div class="col-6 col-12-xsmall">
                            <label>Penerima	:
                            <input class="form-control" name="penerima" type="text"  value="' . $baris[1] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>Jenis Identitas	:
                            <input class="form-control" name="jenispengenal" type="text"  value="' . $baris[3] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>No. Identitas	:
                            <input class="form-control" name="nopengenal" type="text"  value="' . $baris[7] . '">
							</label>
						</div>
						
						
						<div class="col-6 col-12-xsmall">
						<br><p><input id="submit" class="primary fit" 
						type="submit" name="submit" value="Claim"></p>
						<br><input type="hidden" name="idbarang" value="' . $id . '"/>
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