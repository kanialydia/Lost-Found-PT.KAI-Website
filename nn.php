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
				email ='".$_POST['email']."' AND password = '".$_POST['password']."' ");
				$data = mysqli_fetch_array($cek_data);
				$level = $data['level'];
				if (mysqli_num_rows($cek_data) > 0){
					if($level == 'admin'){
						header("Location:admin.php");
					}elseif($level == 'user'){
						header("Location:index-user.php");
					}elseif($level == 'kurir'){
						header('Location:index-kurir.php');
					}
				}else{
					echo '<script type="text/javascript">alert("email atau password tidak boleh kosong");</script> ';
				}
			}
			?>
						<div class="row">
						<div class="col-12 col-12-medium">
					
						<h3>Please Sign In</h3>
						
							
								<form action="nn.php" method="post">
							<div class="row gtr-uniform">
									<div class="col-5 col-12-xsmall">
										<input class="form-control" id="email"  for="email" 
										placeholder="email" name="email" type="email" required autofocus
										value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/>
									</div>
									<div class="col-5 col-12-xsmall">
										<input class="form-control" id="password" for="password" 
										placeholder="Password" name="password" type="password" required autofocus
										value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
									</div>
									<!-- Change this to a button or input when using this as a form -->
									<div class="col-2 col-12-xsmall">
										<input id="submit"  class="primary fit"
										type="submit" name="login" value="Login"/>
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
						&copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a href="https://coverr.co">Coverr</a>.
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
