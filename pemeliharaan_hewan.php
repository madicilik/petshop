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
                        <h1 class="page-width">Jasa Grooming & Salon Anjing Kucing Hewan</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
                    <a href="pemeliharaan_hewan.php" title="Back to News">Pemeliharaan</a><span aria-hidden="true"></span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!--Main Content-->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                        <?php $no = 1; ?>
                        <?php $ambil = $koneksi->query("SELECT * FROM pemeliharaan") ?>
                        <?php while ($pecah = $ambil->fetch_assoc()) : ?>
                            <div class="blog--list-view">
                                <div class="article">
                                    <!-- Article Image -->
                                    <h1><a href="#"><?= $pecah["judul"]; ?></a></h1>
                                    <ul class="publish-detail">
                                    </ul>
                                    <div class="rte">
                                        <p><?= $pecah['paragraf']; ?></p>
                                        <h3>APAKAH ANDA MENGALAMI MASALAH INI ???</h3>
                                        <ul class="list-items">
                                            <li>Sibuk & Susah Atur Waktu Ke Pet Salon ???</li>
                                            <li>Takut & Sering Kena Macet Saat Ke Pet Salon ???</li>
                                            <li>Menunggu Antrian Terlalu Lama ???</li>
                                            <li>Takut Tertular Penyakit Dari Hewan Lain ???</li>
                                            <li>Kesulitan Membawa Hewan Ke Pet Salon ???</li>
                                        </ul>
                                        <h4>JIKA Banyak Diantara Itu Yang Kamu Khawatirkan, Berarti Kami Solusi Yang Tepat Untuk Permasalahan Anda.</h4>
                                        <p>Kami menyediakan jasa grooming hewan panggilan rumah ke rumah (Home Services)
                                            Pelayanan kami sangat diminati oleh kamu yang menginginkan privasi, fleksibel & kenyamanan tanpa harus meninggalkan rumah.
                                            Dengan tenaga ahli yang sudah berpengalaman dan profesional di bidang grooming & salon, kami mengutamakan kualitas dan hasil yang maksimal untuk anjing , kucing dan hewan kesayangan Anda.
                                            Peralatan yang lengkap dan berkualitas serta produk yang kami gunakan adalah produk yang memang sudah terbukti dan terjamin kualitasnya.</p>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12"><a class="article_featured-image" href="#"><img class="blur-up lazyload" data-src="foto_pemeliharaan/<?= $pecah["gambar"]; ?>" src="foto_pemeliharaan/<?= $pecah["gambar"]; ?>" alt=""></a></div>
                    <!--End Main Content--> <?php $no++; ?>
                <?php endwhile; ?>
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