﻿<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "petshop");
?>

<?php
if(isset($_POST['login'])){
	$ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
	$yangcocok = $ambil->num_rows;

	if($yangcocok == 1){
		$_SESSION['admin'] = $ambil->fetch_assoc();
		echo "<div class='alert alert-info'>Login sukses</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php'>";
	}
	else{
		echo "<div class='alert alert-danger'>Login gagal!</div>";
		echo "<meta http-equiv='refresh' content='1;url=login.php'>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Masuk Sistem</h3>
			<div class="login-form">
			<form role="form" method="post">
				<div class="form-group">
					<label for="username" class="placeholder"><b>Username</b></label>
					<input id="username" name="user" type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password" class="placeholder"><b>Password</b></label>
					
					<div class="position-relative">
						<input id="password" name="pass" type="password" class="form-control" required>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
				</div>
				<div class="form-group form-action-d-flex mb-3">
					<div class="custom-control custom-checkbox">
						
					</div>
					<button class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold" name="login">Login</button>
				</div>
			</form>	
		</div>
	</div>

		
	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/atlantis.min.js"></script>
</body>
</html>
