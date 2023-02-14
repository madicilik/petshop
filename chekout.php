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

if (!isset($_SESSION["keranjang"])) {
    // Diarahkan ke ke index.php
    echo "<script>alert('Keranjang kosong!')</script>";
    echo "<script>location='index.php';</script>";
}


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

        <?php include 'layouts/navbar.php'; ?>

        <!--Body Content-->
        <div id="page-content">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Checkout</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->

            <div class="container">
                <div class="row">
                </div>
                <div class="row billing-fields">
                    <div class=" col-sm-12 sm-margin-30px-bottom">
                        <div class="create-ac-content bg-light-gray padding-20px-all">
                            <form action="" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <h3 class="login-title mb-3">Pengiriman</h3>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                            <label for="input-firstname">Nama <span class="required-f">*</span></label>
                                            <input name="nama_pelanggan" readonly value="<?= $_SESSION['pelanggan']['nama_pelanggan']; ?>" type="text">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                            <label for="input-address-1">Alamat <span class="required-f">*</span></label>
                                            <input name="alamat_pelanggan" readonly value="<?= $_SESSION['pelanggan']['alamat_pelanggan']; ?>" type="text">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                            <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                            <input name="email_pelanggan" readonly value="<?= $_SESSION['pelanggan']['email_pelanggan']; ?>" type="text">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                            <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                            <input name="telepon_pelanggan" readonly value="<?= $_SESSION['pelanggan']['telepon_pelanggan']; ?>" type="text">
                                        </div>
                                    </div>
                                </fieldset><br>
                                <h3>Pemesanan</h3>
                                <div class="table-responsive-sm order-table">
                                    <table class="bg-white table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php $totalberat = 0; ?>
                                            <?php $totalbelanja = 0; ?>
                                            <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                                                <!-- Menampilkan produk yang sedang duperulangkan berdasarkan id_produk -->
                                                <?php
                                                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                                                $pecah = $ambil->fetch_assoc();
                                                $subharga = $pecah['harga_produk'] * $jumlah;
                                                // Subberat diperoleh dari berat produk x jumlah
                                                $subberat = $pecah['berat_produk'] * $jumlah;
                                                $totalberat += $subberat;
                                                ?>
                                                <tr>
                                                    <td class="text-left"><?= $pecah['nama_produk']; ?></td>
                                                    <td>Rp. <?= number_format($pecah['harga_produk']); ?>,-</td>
                                                    <td><?= $jumlah; ?></td>
                                                    <td>Rp. <?= number_format($subharga); ?>,-</td>
                                                </tr>
                                                <?php $totalbelanja += $subharga; ?>
                                            <?php endforeach; ?>

                                        </tbody>
                                        <tfoot class="font-weight-600">
                                            <tr>
                                                <td colspan="4" class="text-right">Total</td>
                                                <td>Rp. <?= number_format($totalbelanja); ?>,-</td>
                                            </tr>
                                        </tfoot>
                                    </table> 
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" name="checkout">Pembayaran</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Body Content-->
        <?php
        if (isset($_POST["checkout"])) {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            $tanggal_pembelian = date('Y-m-d');

            $total_pembelian = $totalbelanja;

            // Menyimpan data ke tabel transaksi
            $koneksi->query("INSERT INTO transaksi(id_pelanggan, tanggal_pembelian, total_pembelian) VALUES('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian')");

            // Mendapatkan id_pembelian yang baru terjadi
            $id_transaksi_barusan = $koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

                // Mendapatkan data produk berdasarkan id_produk
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];
                $berat = $perproduk['berat_produk'];
                $subberat = $perproduk['berat_produk'] * $jumlah;
                $subharga = $perproduk['harga_produk'] * $jumlah;

                $koneksi->query("INSERT INTO penjualan(id_transaksi, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES('$id_transaksi_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')");

                // Update stok
                $koneksi->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk'");
            }

            // Mengosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            echo "<script>alert('Pesanan anda sukses');</script>";
            echo "<script>location='riwayat_pesanan.php?id=$id_transaksi_barusan';</script>";
        }

        ?>


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