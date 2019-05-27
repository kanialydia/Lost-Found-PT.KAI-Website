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
				<h1>FORM REGISTRASI</h1>
			</div>
			
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<p><a href="superadmin.php">Batal</a></p>
					<div class="row">
				<?php
			    include "kon.php";
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					
					//apakah nama telah dimasukkan
					if(empty($_POST['nama'])){
						$arrayError[]='<script type="text/javascript">alert("nama barang tidak boleh kosong");</script> ';
					}
					else{$nama = trim($_POST['nama']);
					}
					
					if(empty($_POST['nipp'])){
						$arrayError[]='<script type="text/javascript">alert("nipp barang tidak boleh kosong");</script>';
					}
					else{$nipp = trim($_POST['nipp']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['username'])){
						$arrayError[]='<script type="text/javascript">alert("username barang tidak boleh kosong");</script> ';
					}
					else{$username = trim($_POST['username']);
					}
					
					//apakah kedua password cocok
					if(!empty($_POST['password1'])){
						if($_POST['password1'] != $_POST['password']){
							$arrayError[]='<script type="text/javascript">alert("Password yang anda masukkan tidak sama");</script> ';
						}
						else{$password = trim($_POST['password']);
						}
					}
					else{$arrayError[]='<script type="text/javascript">alert("password tidak boleh kosong");</script>' ;
					}
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('mysqli_connect.php');//koneksi ke database.
						//melakukan query
						$cek_data=mysqli_query($dbkoneksi, "SELECT * FROM pengguna WHERE
						username ='".$_POST['username']."'  ");
						if (mysqli_num_rows($cek_data) > 1){
							$q = "INSERT INTO pengguna (iduser,username,password,level,nama,nipp)
							VALUES('','$username','$password','user','$nama','$nipp' )";
							$hasil = @mysqli_query ($dbkoneksi, $q);//menjalankan query
						
							if($hasil){//jika berhasil
								echo'<script type="text/javascript">alert("Data berhasil dimasukkan");</script> ';
								header("Location:sadata.php");
							}else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Data gagal dimasukkan karena error sistem");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($dbkoneksi).'<br><br>Query: ' .$q. '</p>';
							}
						}else{
							echo'<script type="text/javascript">alert("Username Telah Digunakan");</script> ';
						}
						mysqli_close($dbkoneksi);//menutup koneksi
					}
					else{
						foreach ($arrayError as $psn) {//menampilkan error
							echo"<h11>$psn</h11><br>\n";
						}
						echo '</p><h2>Silahkan coba lagi.</h2>';
					}
					}
				
				?>
						
						<form action="registrasi.php" method="post">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="nama"  for="nama" 
								placeholder="Nama Lengkap" name="nama" type="text" required autofocus
								value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>"/>
							</div>
							<div class="col-6">
								<input class="form-control" id="password" for="password" 
								placeholder="Password" name="password" type="password" required autofocus
								value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
								</label>
							</div>
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="username" for="username" 
								placeholder="Username" name="username" type="text" required autofocus
								value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
							</div>
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="password1"  for="password1" 
								placeholder="Konfirmasi Password" name="password1" type="password" required autofocus
								value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>"/>
							</div>
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="nipp"  for="nipp" 
								placeholder="NIPP" name="nipp" type="text" required autofocus
								value="<?php if (isset($_POST['nipp'])) echo $_POST['nipp']; ?>"/>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<div class="col-6 ">
								<input id="submit"  class="primary fit"
								type="submit" name="Submit" value="Submit"/>
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