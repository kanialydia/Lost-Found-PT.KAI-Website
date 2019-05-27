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
					<li><a href="lostfound.php">Data Seluruh Barang</a></li>
					<li><a href="lost.php">Data Barang Belum Diambil </a></li>
					<li><a href="found.php">Data Barang Diambil</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			
			<!-- Heading -->
			<div id="heading" >
				<h1>LOST & FOUND</h1>
			</div>
			
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<div class="table-wrapper">
						<table class="alt">
							<?php
							//skrip untuk koneksi
							require('mysqli_connect.php');
							//skrip ini u/ membaca rekaman
							$q="SELECT * FROM data ";
							$hasil=@mysqli_query ($dbkoneksi, $q);// menjalankan query 
						
								if($hasil){
							
                                    echo '
                                        <thead>
                                            <tr">
												<th>Edit</th>
                                                <th>No</th>
                                                <th>Jenis</th>
												<th>Merk</th>
												<th>Warna</th>
												<th>Jumlah</th>
												<th>Deskripsi</th>
												<th>Ditemukan</th>
												<th>Status</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
										<tbody>';
										//tampilkan semua user
                                            while($baris=mysqli_fetch_array($hasil, MYSQLI_ASSOC)){
                                        echo'<tr>
												<td><a href="edit.php?idbarang=' . $baris['idbarang'] . '">
												<button type="button" class="button primary fit small">Edit</button></a></td>
												<td>' . $baris['idbarang'] . '</td>
                                                <td>' . $baris['jenis'] . '</td>
												<td>' . $baris['merk'] . '</td>
                                                <td>' . $baris['warna'] . '</td>
												<td>' . $baris['jumlah'] . '</td>
												<td>' . $baris['lainnya'] . '</td>
												<td>' . $baris['tglditemukan'] . '</td>
												<td>' . $baris['status'] . '</td>
												<td><a href="delete.php?idbarang=' . $baris['idbarang'] . '">
												<button type="button" class="button primary fit small">Hapus</button></a></td>
												</tr>
                                        </tbody>';}
									mysqli_free_result($hasil);
								
								}else{
									echo '<p class="error">Terjadi Kesalahan.! </p>';
									echo '<p>' . mysqli_error($dbkoneksi) . '<br><br>Query:' . $q . '</p>'; 
								}
								mysqli_close($dbkoneksi);
								?>
						</table>
						</div>
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