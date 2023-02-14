<?php
session_start();

//koneksi ke database
include 'koneksi.php';

// jika tombol login ditekan
if(isset($_POST['login'])){

  $email = $_POST['email_pelanggan'];
  $password = $_POST['password_pelanggan'];

  // Melakukan query pada tabel pelanggan
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

  // Mengecek akun yang cocok (email & password)
  $akunyangcocok = $ambil->num_rows;

  // Jika ada akun yang cocok
  if($akunyangcocok == 1){
    // Mendapatkan aku dalam bentuk array
    $akun = $ambil->fetch_assoc();

    // Simpan di session
    $_SESSION["pelanggan"] = $akun;
    echo "<div class='alert alert-success'>Login sukses</div>";

    // Jika sudah belanja
    if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
      echo "<meta http-equiv='refresh' content='1;url=chekout.php'>";
    }
    else{
      echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
  }
  else{
    
    echo "<div class='alert alert-danger'>Login gagal!</div>";
		echo "<meta http-equiv='refresh' content='1;url=login.php'>";
  }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Deva Pet Shop & Pet Care</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>

<body style="background-image: url(assets/images/bg-register.jpg)">
<div class="container"><br><br><br><br><br><br>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Login Akun</h4>
            <form action="" method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email_pelanggan" class="form-control" placeholder="Masukan Email" type="email">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" name="password_pelanggan" placeholder="Masukan Password" type="password">
                </div> <!-- form-group// -->                                     
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-block">Login </button>
                </div> <!-- form-group// -->      
                <p class="text-center">Belum punya akun? <a href="register.php">Register</a> </p>                                                                 
            </form>
        </article>
    </div> <!-- card.// -->
</div> 
<!--container end.//-->
</body>
</html>