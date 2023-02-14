<?php

    include 'koneksi.php';
    $datakategori = [];
    $ambil = $koneksi->query("SELECT * FROM kategori");
    while($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap; } ?> <?php
  //  $sqlkategori = mysqli_query($koneksi, "SELECT * FROM kategori");

    // get produk by nama produk
    if (isset($_GET['keyword'])) {
        $sqlproduk = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%$_GET[keyword]%'");
    }
    // get produk by kategori
    else if (isset($_GET['kategori'])) {

        $sqlkategoriId = mysqli_query($koneksi, "SELECT id_kategori FROM kategori WHERE nama_kategori = '$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($sqlkategoriId);

        $sqlproduk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='$kategoriId[id_kategori]'");
    }
    // get produk default
    else {
        $sqlproduk = mysqli_query($koneksi, "SELECT * FROM produk");
    }

    $countproduk = mysqli_num_rows($sqlproduk);

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/shop-grid-4.html   11 Nov 2019 12:39:07 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Women &ndash; Belle Multipurpose Bootstrap 4 Template</title>
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

<body class="template-collection belle">
    <div class="pageWrapper">
        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="#">
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
                </form>
                <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
            </div>
        </div>
        <!--End Search Form Drawer-->

        <?php include 'layouts/navbar.php'; ?>

        <div id="page-content">
            <!--Collection Banner-->
            <div class="collection-header">
                <div class="collection-hero">
                    <div class="collection-hero__image"><img class="blur-up lazyload" produk-src="assets/images/cat-women1.jpg" src="assets/images/cat-women1.jpg" alt="Women" title="Women" /></div>
                    <div class="collection-hero__title-wrapper">
                        <h1 class="collection-hero__title page-width">Produk terbaik kami</h1>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                        <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                        <div class="sidebar_tags">
                           <!--Categories-->
                    	<div class="sidebar_widget categories filter-widget">
                            <div class="widget-title"><h2>Kategori</h2></div>
                            <div class="widget-content">
                                <ul class="sidebar_categories">
                                    <?php foreach($datakategori as $key => $value): ?>
                                        <li class="lvl-1"><a href="produk.php?kategori=<?= $value['nama_kategori'] ?>" class="site-nav"><?= $value['nama_kategori']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!--Categories-->
                        </div>
                    </div>
                    <!--End Sidebar-->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                        <div class="productList">
                            <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                            <div class="toolbar">
                                <div class="filters-toolbar-wrapper">
                                   
                                </div>
                            </div>
                            <div class="grid-products grid--view-items">
                                <div class="row">
                                    <?php
                                    if ($countproduk < 1) {
                                    ?>
                                        <h4 class="text-center my-5">Produk yang anda cari tidak tersedia</h4>
                                    <?php
                                    }
                                    ?>
                                    <?php while ($produk = mysqli_fetch_array($sqlproduk)) { ?>
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                            <div class="product-image">
                                                <a href="detail_produk.php?nama=<?= $produk['id_produk']; ?>">
                                                    <img class="primary blur-up lazyload" produk-src="foto_produk/<?= $produk["foto_produk"]; ?>" src="foto_produk/<?= $produk["foto_produk"]; ?>" alt="image" title="product">
                                                    <img class="hover blur-up lazyload" produk-src="foto_produk/<?= $produk["foto_produk"]; ?>" src="foto_produk/<?= $produk["foto_produk"]; ?>" alt="image" title="product">
                                                </a>
                                                <form class="variants add" action="#" onclick="window.location.href='beli.php?id=<?= $produk['id_produk']; ?>'" method="post">
                                                    <button class="btn btn-addto-cart" type="button">Masuk Keranjang</button>
                                                </form>

                                            </div>
                                            <div class="product-details text-center">
                                                <div class="product-name">
                                                    <a href="#"><?php echo $produk['nama_produk']; ?></a>
                                                </div>
                                                <div class="product-price">
                                                    <span class="price">Rp. <?= number_format($produk["harga_produk"]); ?>,-</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="infinitpaginOuter">
                            <div class="infinitpagin">
                                <a href="produk.php" class="btn loadMore">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php include 'layouts/footer.php'; ?>

        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <div class="newsletter-wrap" id="popup-container">
            <div id="popup-window">
                <a class="btn closepopup"><i class="icon icon anm anm-times-l"></i></a>
                <div class="display-table splash-bg">
                    <div class="display-table-cell width40"><img src="assets/images/newsletter-img.jpg" alt="Join Our Mailing List" title="Join Our Mailing List" /> </div>
                    <div class="display-table-cell width60 text-center">
                        <div class="newsletter-left">
                            <ul class="list--inline site-footer__social-icons social-icons">
                                <li><a class="social-icons__link" href="#" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                <li><a class="social-icons__link" href="#" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<!-- belle/index.html   11 Nov 2019 12:20:55 GMT -->

</html>