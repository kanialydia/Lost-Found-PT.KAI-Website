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
				<h1>EDIT</h1>
			</div>
			
			<section id="main" class="wrapper">
			<div class="inner">
				<div class="content">
				<p><a href="found.php">Kembali,  </a>  <a href="admin.php">Halaman Utama.</a></p>
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
				//1
				if (empty($_POST['jenis'])){
					$arrayError[] = '<script type="text/javascript">alert("Jenis Barang tidak boleh kosong");</script>';
				}else{
					$jenis = mysqli_real_escape_string($dbkoneksi, trim($_POST['jenis']));
				}
				//2
				if (empty($_POST['tglditemukan'])){
					$arrayError[] = '<script type="text/javascript">alert("Tanggal Ditemukan tidak boleh kosong");</script>';
				}else{
					$ditemukan = mysqli_real_escape_string($dbkoneksi, trim($_POST['tglditemukan']));
				}
				//3
				if (empty($_POST['lainnya'])){
					$ket = mysqli_real_escape_string($dbkoneksi, trim($_POST['lainnya']));
				}else{
					$ket = mysqli_real_escape_string($dbkoneksi, trim($_POST['lainnya']));
				}
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
				//7
				if (empty($_POST['tgldiambil'])){
					$arrayError[] = '<script type="text/javascript">alert("Tanggal Diambil tidak boleh kosong");</script>';
				}else{
					$diambil = mysqli_real_escape_string($dbkoneksi, trim($_POST['tgldiambil']));
				}
				//8
				if (empty($_POST['penemu'])){
					$arrayError[] = '<script type="text/javascript">alert("Yang Menyerahkan tidak boleh kosong");</script>';
				}else{
					$penemu = mysqli_real_escape_string($dbkoneksi, trim($_POST['penemu']));
				}
				
				//9
				if (empty($_POST['milikka'])){
					$arrayError[] = '<script type="text/javascript">alert("Milik KNP KA tidak boleh kosong");</script>';
				}else{
					$ka = mysqli_real_escape_string($dbkoneksi, trim($_POST['milikka']));
				}
				//
				if (empty($arrayError)){
					$q="UPDATE data SET  penerima='$penerima',penemu='$penemu', milikka='$ka' ,jenis='$jenis',
					lainnya='$ket', jenispengenal='$identitas',  nopengenal='$noidentitas',
					tglditemukan='$ditemukan', tgldiambil='$diambil' WHERE idbarang = $id LIMIT 1";
					$hasil = @mysqli_query($dbkoneksi, $q);
					
					if (mysqli_affected_rows($dbkoneksi) == 1){
						echo '<p>  BERHASIL DIEDIT. <a href="found.php">Kembali</a>, <a href="admin.php">Halaman Utama</a>.</p>';
					}else{
						echo '<script type="text/javascript">alert("Batal diedit");</script>';
						
					}
				}else{
					echo '<script type="text/javascript">alert("Pastikan Semua Kolom Terisi");</script>';
				}
			}
				
				//menyeleksi rekaman
				$q = "SELECT jenis, lainnya, penemu, tglditemukan, penerima, tgldiambil, jenispengenal, nopengenal, milikka FROM data WHERE idbarang =$id";
				$hasil = @mysqli_query ($dbkoneksi, $q);
				
				
				if(mysqli_num_rows ($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					
					
					//form edit
					echo '
						<form action="edit.php" method="post">
						<div class="row gtr-uniform">
						<div class="col-6 col-12-xsmall">
                            <h3>FORM DATA</h3>
						</div>
						<div class="col-6 col-12-xsmall">
                            <h3>FORM PENERIMA</h3>
						</div>
						<div class="col-6 col-12-xsmall">
                            <label>Jenis Barang	:
                            <input class="form-control" name="jenis" type="text"  value="' . $baris[0] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>Deskripsi Lainnya	:
                            <input class="form-control" name="lainnya" type="text"  value="' . $baris[1] . '">
                        </label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>Yang Menyerahkan	:
                            <input class="form-control" name="penemu" type="text"  value="' . $baris[2] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>Tanggal Ditemukan	:
                            <input class="form-control" name="tglditemukan" type="date"  value="' . $baris[3] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>Penerima	:
                            <input class="form-control" name="penerima" type="text"  value="' . $baris[4] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>Tanggal Diambil	:
                            <input class="form-control" name="tgldiambil" type="date"  value="' . $baris[5] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>Jenis Identitas	:
                            <input class="form-control" name="jenispengenal" type="text"  value="' . $baris[6] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>No. Identitas	:
                            <input class="form-control" name="nopengenal" type="number"  value="' . $baris[7] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
                            <label>Milik KNP KA	:
                            <input class="form-control" name="milikka" type="text"  value="' . $baris[8] . '">
							</label>
						</div>
						
						<div class="col-6 col-12-xsmall">
						<br><p><input id="submit" class="primary fit" 
						type="submit" name="submit" value="Update"></p>
						<br><input type="hidden" name="idbarang" value="' . $id . '"/>
						<div class="col-lg-6">
						</div>
						</div>
						</form>';
				}else{
				echo "Halaman Error";
				}
				mysqli_close($dbkoneksi);
				?>
				<p><a href="found.php">Batal Edit</a></p>
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