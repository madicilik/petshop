<?php
session_start();
//koneksi ke database
include 'koneksi.php';

// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
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

<body class="template-index belle template-index-belle">
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
            <div class="page section-header text-center mb-0">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Riwayat Pesanan</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
                    <a href="blog-left-sidebar.html" title="Back to News">Riwayat Pesanan</a><span aria-hidden="true"></span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                </div>
                <div class="row billing-fields">
                    <div class=" col-sm-12 sm-margin-30px-bottom">
                        <div class="create-ac-content bg-light-gray padding-20px-all">
                            <form>
                                <h3>Pesanan</h3>
                                <div class="table-responsive-sm order-table">
                                    <table class="bg-white table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Nama</th>
                                                <th>Tanggal Pesan</th>
                                                
                                                <th>Status</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            // Mendapatkan id_pelanggan yang login dari session
                                            $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                                            $ambil = $koneksi->query("SELECT * FROM transaksi WHERE id_pelanggan='$id_pelanggan'");
                                            if($ambil->num_rows == 0):
                                            ?>
                                                <tr>
                                                    <td colspan="5">Tidak ada data riwayat... </td>
                                                </tr>
				                            <?php endif; ?>
                                            <?php
                                            while ($pecah = $ambil->fetch_assoc()) :
                                            ?>
                                                <tr>
                                                    <td class="text-left"><?= $_SESSION['pelanggan']['nama_pelanggan']; ?></td>
                                                    <td><?= date("d F Y", strtotime($pecah['tanggal_pembelian'])); ?></td>
                                                    <td><?= $pecah['status_pembelian']; ?></td>
                                                    <td>Rp. <?= number_format($pecah['total_pembelian']); ?>,-</td>
                                                    <td>
                                                        
                                                            <a href="pembayaran.php?id=<?= $pecah['id_transaksi']; ?>" class="btn btn-success">Pembayaran</a>
                                                            <a href="cek_pembayaran.php?id=<?= $pecah['id_transaksi']; ?>" class="btn btn-success">Lihat Pembayaran</a>
                                                    </td>
                                                </tr>
                                            
                                            <?php endwhile; ?>
                                        </tbody>

                                    </table>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Body Content-->

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