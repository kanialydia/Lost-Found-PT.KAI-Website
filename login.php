<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Login</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

        <title>Startmin - Bootstrap Admin Theme</title>
<link rel="stylesheet" href="assets/css/main.css" />
    

		
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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
				<h1>LOGIN</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
				
				<?php
			//Bagian ini berfungsi untuk memproses submisi form login!
			//memeriksa apakah form login sudah terisi:
			if (isset($_POST['login'])){
				include "mysqli-connect.php";

				$cek_data=mysqli_query($conn, "SELECT * FROM pengguna WHERE
				username ='".$_POST['username']."' AND password = '".$_POST['password']."' ");
				$data = mysqli_fetch_array($cek_data);
				$level = $data['level'];
				if (mysqli_num_rows($cek_data) > 0){
					if($level == 'admin'){
						header("Location:superadmin.php");
					}elseif($level == 'user'){
						header("Location:admin.php");
					}
				}else{
					echo '<script type="text/javascript">alert("Username atau Password salah!");</script> ';
				}
			}
			?>
						<div class="row">
						<div class="col-12 col-12-medium">
					
						<h3>Please Sign In</h3>
						
							
								<form action="login.php" method="post">
							<div class="row gtr-uniform">
									<div class="col-5 col-12-xsmall">
										<input class="form-control" id="username"  for="username" 
										placeholder="Username" name="username" type="text" required autofocus
										value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
									</div>
									<div class="col-5 col-12-xsmall">
										<input class="form-control" id="password" for="password" 
										placeholder="Password" name="password" type="password" required autofocus
										value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
									</div>
									<!-- Change this to a button or input when using this as a form -->
									<div class="col-2 ">
										<input id="submit"  class="primary fit"
										type="submit" name="login" value="Sign In"/>
									</div>
								</form>
							</div>
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
