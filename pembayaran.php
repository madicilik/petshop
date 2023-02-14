<?php
session_start();

// Koneksi ke database
include 'koneksi.php';

// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// Mendapatkan id_pembelian dari url
$idtrans = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM transaksi WHERE id_transaksi='$idtrans'");
$dettrans = $ambil->fetch_assoc();

// Mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $dettrans['id_pelanggan'];
// Mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];



// get data bank
$getbank = mysqli_query($koneksi, "SELECT * FROM bank");

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Deva Pet Shop & Pet Care</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body class="page-template belle">
    <div class="pageWrapper">
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="#">
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
                </form>
                <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
            </div>
        </div>

        <?php include 'layouts/navbar.php'; ?>

        <!--Body Content-->
        <div id="page-content">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">pembayaran</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->

            <section class="content">
                <div class="container">
                    <h3>Konfirmasi Pembayaran</h3>
                    <p>Silahkan lakukan pembayaran melalui rek yang tertera dan upload bukti pembayaran.</p>
                    <?php while ($databank = mysqli_fetch_array($getbank)) { ?>
                        <div class="alert alert-info col-md-4"><span><?= $databank['nama_bank']; ?> - <?= $databank['nomor_rekening']; ?> - An <?= $databank['nama_pemilik']; ?></span></div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="alert alert-info">total tagihan anda <strong>Rp. <?= number_format($dettrans['total_pembelian']); ?>,-</strong></div>
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="">Foto Bukti</label>
                                    <input type="file" class="form-control" name="bukti">
                                    <p class="text-danger">foto bukti harus JPG maksimal 2 MB</p>
                                </div>
                                <button class="btn btn-primary" name="kirim">Kirim</button>
                            </form>

                            <?php
                            // Jika tombol kirim di pencet
                            if (isset($_POST['kirim'])) {
                                // Upload dulu foto bukti
                                $namabukti = $_FILES['bukti']['name'];
                                $lokasibukti = $_FILES['bukti']['tmp_name'];
                                $namafiks = date('YmdHis') . $namabukti;
                                move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");


                                // Insert ke tabel pembayaran
                                $koneksi->query("INSERT INTO pembayaran(id_transaksi, bukti) VALUES('$idtrans', '$namafiks')");

                                // Update data transaksi dari pending menjadi sudah kirim pembayaran
                                $koneksi->query("UPDATE transaksi SET status_pembelian='sudah kirim pembayaran' WHERE id_transaksi='$idtrans'");

                                echo "<script>alert('Terima kasih sudah melakukan pembayaran');</script>";
                                echo "<script>location='riwayat_pesanan.php';</script>";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </section>


            <?php include 'layouts/footer.php'; ?>
            <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
            <!-- Including Jquery -->
            <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
            <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
            <script src="assets/js/vendor/jquery.cookie.js"></script>
            <script src="assets/js/vendor/wow.min.js"></script>
            <!-- Including Javascript -->
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/lazysizes.js"></script>
            <script src="assets/js/main.js"></script>
            <!--For Newsletter Popup-->
            <script>
                jQuery(document).ready(function() {
                    jQuery('.closepopup').on('click', function() {
                        jQuery('#popup-container').fadeOut();
                        jQuery('#modalOverly').fadeOut();
                    });

                    var visits = jQuery.cookie('visits') || 0;
                    visits++;
                    jQuery.cookie('visits', visits, {
                        expires: 1,
                        path: '/'
                    });
                    console.debug(jQuery.cookie('visits'));
                    if (jQuery.cookie('visits') > 1) {
                        jQuery('#modalOverly').hide();
                        jQuery('#popup-container').hide();
                    } else {
                        var pageHeight = jQuery(document).height();
                        jQuery('<div id="modalOverly"></div>').insertBefore('body');
                        jQuery('#modalOverly').css("height", pageHeight);
                        jQuery('#popup-container').show();
                    }
                    if (jQuery.cookie('noShowWelcome')) {
                        jQuery('#popup-container').hide();
                        jQuery('#active-popup').hide();
                    }
                });

                jQuery(document).mouseup(function(e) {
                    var container = jQuery('#popup-container');
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        container.fadeOut();
                        jQuery('#modalOverly').fadeIn(200);
                        jQuery('#modalOverly').hide();
                    }
                });
            </script>
            <!--End For Newsletter Popup-->
        </div>
</body>

</html>