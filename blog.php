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
                        <h1 class="page-width">Berita Terkini</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
                    <a href="blog.php" title="Back to News">News</a><span aria-hidden="true">›</span><span>Berita Terkini</span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!--Main Content-->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                        <div class="blog--list-view">
                        <?php $sqlberita = mysqli_query($koneksi, "SELECT * FROM berita"); ?>
                                <?php while($data=mysqli_fetch_array($sqlberita)){ ?>
                                <div class="article">
                                    <!-- Article Image -->
                                    <a class="article_featured-image" href="#"><img class="blur-up lazyload" data-src="foto_berita/<?= $data["gambar_berita"]; ?>" src="foto_berita/<?= $data["gambar_berita"]; ?>" alt=""></a>
                                    <h1><a href="blog-left-sidebar.html"><?= $data["judul"]; ?></a></h1>
                                    <ul class="publish-detail">
                                        <li><i class="icon anm anm-clock-r"></i> <time datetime=""><?= $data['tanggal']; ?></time></li>
                                    </ul>
                                    <div class="rte">
                                        <p><?= $data['isi']; ?></p>
                                    </div>
                                    <hr />
                                    <div class="social-sharing">
                                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                            <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                        </a>
                                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                        </a>
                                        <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                        </div>
                       
                    </div>
                    <!--End Main Content-->
                    <!--Sidebar-->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar">
                        <div class="sidebar_tags">
                            <div class="sidebar_widget categories">
                                <div class="widget-title">
                                    <h2>Kategori</h2>
                                </div>
                                <div class="widget-content">
                                    <ul class="sidebar_categories">
                                        <li class="lvl-1 "><a href="http://annimexweb.com/" class="site-nav lvl-1">Kesehatan</a></li>
                                        <li class="lvl-1  active"><a href="#" class="site-nav lvl-1">Perawatan</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar_widget">
                                <div class="widget-title">
                                    <h2>Recent Posts</h2>
                                </div>
                                <div class="widget-content">
                                    <div class="list list-sidebar-products">
                                        <div class="grid">
                                            <div class="grid__item">
                                                <?php $no = 1; ?>
                                                <?php $ambil = $koneksi->query("SELECT * FROM berita") ?>
                                                <?php while ($pecah = $ambil->fetch_assoc()) : ?>
                                                    <div class="mini-list-item">
                                                        <div class="mini-view_image">
                                                            <a class="grid-view-item__link" href="#">
                                                                <img class="grid-view-item__image blur-up lazyload" data-src="foto_berita/<?= $pecah["gambar_berita"]; ?>" src="foto_berita/<?= $pecah["gambar_berita"]; ?>" alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="details"> <a class="grid-view-item__title" href="#"><?= $pecah["judul"]; ?></a>
                                                            <div class="grid-view-item__meta"><span class="article__date"> <time datetime=""><?= $pecah['tanggal']; ?></time></span></div>
                                                        </div>
                                                    </div>
                                                    <?php $no++; ?>
                                                <?php endwhile; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Sidebar-->
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