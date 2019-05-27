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
				<h1>DELETE</h1>
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
				
				//apakah form telah disubmit?
				if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
					if($_POST['yakin']=='Ya'){
						$q ="DELETE FROM pengguna WHERE iduser=$id LIMIT 1";
						$hasil = @mysqli_query ($dbkoneksi, $q);
					
						if (mysqli_affected_rows($dbkoneksi) == 1){
						echo '<script type="text/javascript">alert("Rekaman berhasil dihapus");</script> ';
						header("Location:sadata.php");
						}else{
						echo '<p class="error"> User tidak bisa dihapus karena error sistem.</p>';
						echo '<p>' . mysqli_error($dbkoneksi) . '<br />Query: ' . $q . '</p>';
						}
					}else{
					echo '<script type="text/javascript">alert("Batal Dihapus");</script> ';
					header("Location:sadata.php");
					}
				}else{
					
					$q = "SELECT CONCAT (nama) FROM pengguna WHERE iduser=$id";
					$hasil = @mysqli_query ($dbkoneksi, $q);
					
				if(mysqli_num_rows($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					echo "<h3> Anda yakin menghapus $baris[0]?</h3>";
					
					//form hapus
					echo '<form action="delete.php" method="post">
						<br><p><input id="submit-yes" class="primary  " 
						type="submit" name="yakin" value="Ya">
						<input id="submit-no" class="primary" 
						type="submit" name="yakin" value="Tidak"></p>
						<br><input type="hidden" name="iduser" value="' . $id . '"/>
						
						
						</form>';
						
				}else{
					echo '<p class="error">Halaman Error</p>';
					echo '<p>&nbsp;</p>';
				}
				}
				
				mysqli_close($dbkoneksi);
				echo '<p>&nbsp;</p>';
				?>
				</div>
			</div>
			</section>
			
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Accumsan montes viverra</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
						</section>
						<section>
							<h4>Sem turpis amet semper</h4>
							<ul class="alt">
								<li><a href="#">Dolor pulvinar sed etiam.</a></li>
								<li><a href="#">Etiam vel lorem sed amet.</a></li>
								<li><a href="#">Felis enim feugiat viverra.</a></li>
								<li><a href="#">Dolor pulvinar magna etiam.</a></li>
							</ul>
						</section>
						<section>
							<h4>Magna sed ipsum</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
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