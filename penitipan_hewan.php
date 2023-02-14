<?php
session_start();
//koneksi ke database
include 'koneksi.php';

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

        <?php include 'layouts/navbar.php'; ?>

        <div id="page-content">
            <!--Page Title-->
            <div class="page section-header text-center mb-0">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Menyediakan Jasa Penitipan Hewan (Anjing & Kucing)</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
                    <a href="penitipan.php" title="Back to News">Penitipan</a><span aria-hidden="true"></span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php $no = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM penitipan") ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) : ?>
                    <!--Main Content-->
                    <div class="col-md-12"><a class="article_featured-image" href="#"><img class="blur-up lazyload" data-src="foto_penitipan/<?= $pecah["foto"]; ?>" src="foto_penitipan/<?= $pecah["foto"]; ?>" alt=""></a> </div>
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                        <div class="blog--list-view">
                            <div class="article">
                                <!-- Article Image -->
                                <h1><a href="#"><?= $pecah["judul"]; ?></a></h1>
                                <ul class="publish-detail">
                                </ul>
                                <div class="rte">
                                    <p><?= $pecah['paragraf']; ?></p>
                                    <h3>Penting Diketahui, Lebih Baik Anjing / Kucing Anda Dititipkan Jika ...</h3>
                                    <ul class="list-items">
                                        <li>Anda tidak punya waktu mengurus Anjing Kucing Anda ?</li>
                                        <li>Anda tidak punya waktu untuk mengajak jalan mereka ?</li>
                                        <li>Anda tidak sempat merawat saat anjing kucing anda dalam kondisi tidak sehat ?</li>
                                        <li>Anda sedang mau pergi dalam waktu singkat / lama dan tidak ada yang menjaga nya ?</li>
                                        <li>Anda mau melatih anjing kucing anda lebih mandiri, pintar, patuh sekaligus bersosialisasi dengan hewan lain ?</li>
                                    </ul>
                                    <h4>JIKA Banyak Diantara Itu Yang Kamu Khawatirkan, Berarti Kami Solusi Yang Tepat Untuk Permasalahan Anda.</h4>
                                    <h4>Syarat Penitipan Hewan</h4>
                                    <ol>
                                        <li>Hewan dalam kondisi sehat & tidak berkutu. Kita akan cek dahulu kondisi anjing & kucing saat datang. Tujuannya untuk menjaga keamanan & kesehatan anjing, kucing dan hewan yang lain.</li>
                                        <li>Apabila setelah pengecekan ada terkena kutu atau sakit kulit, itu wajib dilakukan pengobatan khusus langsung saat datang. Dan hewan tetap bisa dititipkan di ruang khusus untuk perawatan. Jadi tidak dicampur dengan yang sehat.</li>
                                        <li>Mereka ada waktu bisa bebas jalan & main dengan pengunjung / hewan yang lain tanpa diikat atau dikandangin kecuali ada permintaan untuk dikandangin atau situasi tertentu.</li>
                                        <li>Perlengkapan khusus yang kira-kira diperlukan boleh dibawa seperti makanan, cemilan, vitamin, mainan dan sebagainya.</li>
                                    </ol>
                                </div>
                                <hr />
                            </div>
                        </div>
                        <?php $no++; ?>
                        <?php endwhile; ?>
                    </div>
                    <!--End Main Content-->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <p><a href="https://wa.me/" class="btn btn-secondary btn-small" target="_blank">Hubungi Kami Untuk Konsultasi</a></p>
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