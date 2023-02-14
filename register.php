<?php
//koneksi ke database
include 'koneksi.php';

// Jika tombol daftar ditekan
if(isset($_POST['register'])){
  // Mengambil isian nama, email, password, alamat, telepon
  $nama = $_POST['nama_pelanggan'];
  $jenisk = $_POST['jenis_kelamin'];
  $email = $_POST['email_pelanggan'];
  $password = $_POST['password_pelanggan'];
  $telepon = $_POST['telepon_pelanggan'];
  $alamat = $_POST['alamat_pelanggan'];
  

  // Cek apakah email sudah digunakan atau belum
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
  $yangcocok = $ambil->num_rows;
  if($yangcocok == 1){
    echo "<div class='alert alert-danger'>Pendaftaran gagal, email sudah digunakan!</div>";
		echo "<meta http-equiv='refresh' content='1;url=register.php'>";
  }
  else{
    // Insert ke tabel pelanggan
    $koneksi->query("INSERT INTO pelanggan(email_pelanggan, jenis_kelamin, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES('$email', '$jenisk', '$password', '$nama', '$telepon', '$alamat')");
    echo "<div class='alert alert-success'>Pendaftaran sukses, Silahkan login</div>";
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
<div class="container"><br><br><br>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Register Akun</h4>
            <form  action="" method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="nama_pelanggan" class="form-control" placeholder="Masukan nama" type="text" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="jenis_kelamin" class="form-control" placeholder="Masukan jenis kelamin" type="text" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email_pelanggan" class="form-control" placeholder="Masukan email" type="email" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="telepon_pelanggan" class="form-control" placeholder="Masukan no hp" type="text" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
                    </div>
                    <input name="alamat_pelanggan" class="form-control" placeholder="Masukan alamat" type="text" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password_pelanggan" class="form-control" placeholder="Masukan password" type="password" required>
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" name="register" class="btn btn-primary btn-block"> Register </button>
                </div> <!-- form-group// -->
                <p class="text-center">Sudah punya akun? <a href="login.php">Login</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->
</div>
<!--container end.//--> 
</body>
</html>