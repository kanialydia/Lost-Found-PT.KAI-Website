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
				<a class="logo" href="index.html">LOST AND FOUND</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
			
			<!-- Heading -->
			<div id="heading" >
				<h1>FORM BARANG</h1>
			</div>
			
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<p><a href="admin.php">Batal</a></p>
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
					
					//apakah data telah dimasukkan
					if(empty($_POST['jenis'])){
						$arrayError[]='<script type="text/javascript">alert("Jenis barang tidak boleh kosong");</script> ';
					}
					else{$jenis = trim($_POST['jenis']);
					}
					
					if(empty($_POST['nama'])){
						$arrayError[]='<script type="text/javascript">alert("nama barang tidak boleh kosong");</script>';
					}
					else{$nama = trim($_POST['nama']);
					}
					
					if(empty($_POST['telpon'])){
						$arrayError[]='<script type="text/javascript">alert("telpon barang tidak boleh kosong");</script> ';
					}
					else{$telpon = trim($_POST['telpon']);
					}
					
					if(empty($_POST['deskripsi'])){
						$deskripsi = trim($_POST['deskripsi']);
					}
					else{$deskripsi = trim($_POST['deskripsi']);
					}
					
					if(empty($_POST['ka'])){
						$arrayError[]='<script type="text/javascript">alert("Tanggal tidak boleh kosong");</script> ';
					}
					else{$ka = trim($_POST['ka']);
					}
					
					if(empty($_POST['asal'])){
						$arrayError[]='<script type="text/javascript">alert("Kota asal tidak boleh kosong");</script> ';
					}
					else{$asal = trim($_POST['asal']);
					}
					
					if(empty($_POST['tujuan'])){
						$arrayError[]='<script type="text/javascript">alert("Kota Tujuan tidak boleh kosong");</script> ';
					}
					else{$tujuan = trim($_POST['tujuan']);
					}
					
					if(empty($_POST['noka'])){
						$arrayError[]='<script type="text/javascript">alert("No. Kereta tidak boleh kosong");</script> ';
					}
					else{$noka = trim($_POST['noka']);
					}
					
					if(empty($_POST['noduduk'])){
						$arrayError[]='<script type="text/javascript">alert("No. Tempat duduk tidak boleh kosong");</script> ';
					}
					else{$noduduk = trim($_POST['noduduk']);
					}
					
					if(empty($_POST['notiket'])){
						$arrayError[]='<script type="text/javascript">alert("No. Tempat duduk tidak boleh kosong");</script> ';
					}
					else{$notiket = trim($_POST['notiket']);
					}
					
					if(empty($_POST['tglkejadian'])){
						$arrayError[]='<script type="text/javascript">alert("No. Tempat duduk tidak boleh kosong");</script> ';
					}
					else{$tglkejadian = trim($_POST['tglkejadian']);
					}
					
					if(empty($_POST['waktukejadian'])){
						$arrayError[]='<script type="text/javascript">alert("No. Tempat duduk tidak boleh kosong");</script> ';
					}
					else{$waktukejadian= trim($_POST['waktukejadian']);
					}
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('mysqli_connect.php');//koneksi ke database.
						//melakukan query
						$q = "INSERT INTO kehilangan (iddata,jenis,nama,telpon,deskripsi,ka,status,asal,tujuan,noka,noduduk,tanggal,tglproses,petugas,notiket,tglkejadian,waktukejadian)
						VALUES('','$jenis','$nama','$telpon','$deskripsi','$ka','Belum diproses','$asal','$tujuan','$noka','$noduduk',NOW(),'','','$notiket','$tglkejadian','$waktukejadian')";
						$hasil = @mysqli_query ($dbkoneksi, $q);//menjalankan query
						if($hasil){//jika berhasil
							echo'<script type="text/javascript">alert("Laporan berhasil dikirim");</script> ';
							
						}
						else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Data gagal dimasukkan karena error sistem");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($dbkoneksi).'<br><br>Query: ' .$q. '</p>';
						}
						mysqli_close($dbkoneksi);//menutup koneksi
						header("Location:sukses.php");
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
						
						<form action="formkehilangan.php" method="post">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="nama"  for="nama" 
								placeholder="Nama Lengkap Anda" name="nama" type="text" required autofocus
								value="<?php if (isset($_POST['nama'])) echo $_POST['nama']; ?>"/>
							</div>
							
							<div class="col-2">
								<input class="form-control" id="noka" for="noka" 
								placeholder="No. Kereta Api" name="noka" type="text" required autofocus
								value="<?php if (isset($_POST['noka'])) echo $_POST['noka']; ?>"/>
								</label>
							</div>
							<h2>/</h2>
							<div class="col-3">
								<input class="form-control" id="ka" for="ka" 
								placeholder="Kereta Api" name="ka" type="text" required autofocus
								value="<?php if (isset($_POST['ka'])) echo $_POST['ka']; ?>"/>
								</label>
							</div>
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="telpon" for="telpon" 
								placeholder="No. Telpon Anda" name="telpon" type="text" required autofocus
								value="<?php if (isset($_POST['telpon'])) echo $_POST['telpon']; ?>"/>
							</div>
							<h3>Relasi	:</h3>
							<div class="col-2 col-12-xsmall">
								<input class="form-control" id="asal" for="asal" 
								placeholder="Asal" name="asal" type="text" required autofocus
								value="<?php if (isset($_POST['asal'])) echo $_POST['asal']; ?>"/>
							</div>
							<h2>-</h2>
							<div class="col-2 col-12-xsmall">
								<input class="form-control" id="tujuan" for="tujuan" 
								placeholder="Tujuan" name="tujuan" type="text" required autofocus
								value="<?php if (isset($_POST['tujuan'])) echo $_POST['tujuan']; ?>"/>
							</div>
							<div class="col-6 col-12-xsmall">
								<input class="form-control" id="jenis"  for="jenis" 
								placeholder="Jenis Barang Yang Hilang" name="jenis" type="text" required autofocus
								value="<?php if (isset($_POST['jenis'])) echo $_POST['jenis']; ?>"/>
							</div>
							<div class="col-3 col-12-xsmall">
								<input class="form-control" id="notiket"  for="notiket" 
								placeholder="No. Tiket" name="notiket" type="text" required autofocus
								value="<?php if (isset($_POST['notiket'])) echo $_POST['notiket']; ?>"/>
							</div>
							<div class="col-3 col-12-xsmall">
								<input class="form-control" id="noduduk"  for="noduduk" 
								placeholder="No. Kursi" name="noduduk" type="text" required autofocus
								value="<?php if (isset($_POST['noduduk'])) echo $_POST['noduduk']; ?>"/>
							</div>
							<div class="col-6">
								<textarea name="deskripsi" id="deskripsi" for="deskripsi" placeholder="Deskripsi Lainnya" 
								type="text" rows="2" 
								value="<?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; ?>"></textarea>
							</div>
							<h3>Waktu Kejadian	:</h3>
							<div class="col-3 col-12-xsmall">
							<input class="form-control" id="waktukejadian"  for="waktukejadian" 
								placeholder="" name="waktukejadian" type="time" required autofocus
								value="<?php if (isset($_POST['waktukejadian'])) echo $_POST['waktukejadian']; ?>"/>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<div class="col-6 ">
								<input id="submit"  class="primary fit"
								type="submit" name="Submit" value="Kirim"/>
							</div>
							<h3>Tanggal Kejadian	:</h3>
							<div class="col-3 col-12-xsmall">
								<input class="form-control" id="tglkejadian"  for="tglkejadian" 
								placeholder="" name="tglkejadian" type="date" required autofocus
								value="<?php if (isset($_POST['tglkejadian'])) echo $_POST['tglkejadian']; ?>"/>
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