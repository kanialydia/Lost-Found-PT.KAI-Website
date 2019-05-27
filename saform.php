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
				<h1>FORM</h1>
			</div>
			
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<p><a href="superadmin.php">Batal</a></p>
					<div class="row">
						<div class="col-12 col-12-medium">
						<ul class="alt">
							<li>DATA BARANG</li>
							<li></li>
						</ul>
				<?php
			    include "kon.php";
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					
					//apakah nama telah dimasukkan
					if(empty($_POST['jenis'])){
						$arrayError[]='<script type="text/javascript">alert("Jenis barang tidak boleh kosong");</script> ';
					}
					else{$jenis = trim($_POST['jenis']);
					}
					
					if(empty($_POST['milikka'])){
						$arrayError[]='<script type="text/javascript">alert("milikka barang tidak boleh kosong");</script>';
					}
					else{$milikka = trim($_POST['milikka']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['penemu'])){
						$arrayError[]='<script type="text/javascript">alert("penemu barang tidak boleh kosong");</script> ';
					}
					else{$penemu = trim($_POST['penemu']);
					}
					
					//apakah nama telah dimasukkan
					if(empty($_POST['lainnya'])){
						$lainnya = trim($_POST['lainnya']);
					}
					else{$lainnya = trim($_POST['lainnya']);
					}
					
					if(empty($_POST['tglditemukan'])){
						$arrayError[]='<script type="text/javascript">alert("Tanggal tidak boleh kosong");</script> ';
					}
					else{$tglditemukan = trim($_POST['tglditemukan']);
					}
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('mysqli_connect.php');//koneksi ke database.
						//melakukan query
						$q = "INSERT INTO data (idbarang,jenis,milikka,penemu,lainnya,tglditemukan,tgldiambil,status)
						VALUES('','$jenis','$milikka','$penemu','$lainnya','$tglditemukan','','belum diklaim' )";
						$hasil = @mysqli_query ($dbkoneksi, $q);//menjalankan query
						if($hasil){//jika berhasil
							echo'<script type="text/javascript">alert("Data berhasil dimasukkan");</script> ';
						}
						else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Data gagal dimasukkan karena error sistem");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($dbkoneksi).'<br><br>Query: ' .$q. '</p>';
						}
						mysqli_close($dbkoneksi);//menutup koneksi
						header("Location:lost.php");
						//menyertakan footer dan keluar dari skript:
						exit();
					}
					else{
						foreach ($arrayError as $psn) {//menampilkan error
							echo"<h11>$psn</h11><br>\n";
						}
						echo '</p><h2>Silahkan coba lagi.</h2>';
					}
				}
				?>
						
						<form action="form.php" method="post">
						<div class="row gtr-uniform">
							<div class="col-7 col-12-xsmall">
								<input class="form-control" id="jenis"  for="jenis" 
								placeholder="Jenis Barang" name="jenis" type="text" required autofocus
								value="<?php if (isset($_POST['jenis'])) echo $_POST['jenis']; ?>"/>
							</div>
							<div class="col-5">
								<label>Tanggal Terima :
								<input class="form-control" id="tglditemukan" for="tglditemukan" 
								placeholder="Tanggal Terima" name="tglditemukan" type="date" required autofocus
								value="<?php if (isset($_POST['tglditemukan'])) echo $_POST['tglditemukan']; ?>"/>
								</label>
							</div>
							<div class="col-7 col-12-xsmall">
								<input class="form-control" id="penemu" for="penemu" 
								placeholder="Yang Menyerahkan" name="penemu" type="text" required autofocus
								value="<?php if (isset($_POST['penemu'])) echo $_POST['penemu']; ?>"/>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<div class="col-5 ">
								<input id="submit"  class="primary fit"
								type="submit" name="Submit" value="Submit"/>
							</div>
							<div class="col-7 col-12-xsmall">
								<input class="form-control" id="milikka"  for="milikka" 
								placeholder="Milik KNP KA" name="milikka" type="text" required autofocus
								value="<?php if (isset($_POST['milikka'])) echo $_POST['milikka']; ?>"/>
							</div>
							<div class="col-7">
								<textarea name="lainnya" id="lainnya" for="lainnya" placeholder="Deskripsi Lainnya" 
								type="text" rows="3" 
								value="<?php if (isset($_POST['lainnya'])) echo $_POST['lainnya']; ?>"></textarea>
							</div>
						</div>
						</form>
						
						</div>
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