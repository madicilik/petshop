<?php
session_start();

//koneksi ke database
include 'koneksi.php';

// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION["pelanggan"])) {
    // Diarahkan ke ke login.php
    echo "<script>alert('Silahkan login!')</script>";
    echo "<script>location='login.php';</script>";
}



?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Profil</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>

<body style="background-image: url(assets/images/bg-profil1.jpg)">
    <div class="container"><br><br><br><br><br>
        <div class="card bg-light">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Profil</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama_pelanggan" value="<?= $_SESSION['pelanggan']['nama_pelanggan']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email_pelanggan" value="<?= $_SESSION['pelanggan']['email_pelanggan']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="jenis_kelamin" value="<?= $_SESSION['pelanggan']['jenis_kelamin']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" class="form-control" name="telepon_pelanggan" value="<?= $_SESSION['pelanggan']['telepon_pelanggan']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password_pelanggan" value="<?= $_SESSION['pelanggan']['password_pelanggan']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat_pelanggan" value="<?= $_SESSION['pelanggan']['alamat_pelanggan']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3 mb-3">
								<button name="ubah" class="btn btn-success">Ubah Data</button>
								<a href="index.php" class="btn btn-danger">Kembali</a>
							</div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
</body>

</html>
<?php
        if (isset($_POST["ubah"])) {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            $nama_pel = $_POST["nama_pelanggan"];
            $jenisk = $_POST["jenis_kelamin"];
            $email_pel = $_POST["email_pelanggan"];
            $password_pel = $_POST["password_pelanggan"];
            $telepon_pel = $_POST["telepon_pelanggan"];
            $alamat_pel = $_POST["alamat_pelanggan"];
            

            // Menyimpan data ke tabel transaksi
            $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama_pel', jenis_kelamin='$jenisk', email_pelanggan='$email_pel', password_pelanggan='$password_pel', telepon_pelanggan='$telepon_pel', alamat_pelanggan='$alamat_pel' WHERE id_pelanggan='$id_pelanggan'");
             
                    
        
            echo "<script>alert('Ubah data sukses');</script>";
            echo "<script>location='index.php';</script>";
        }
?>