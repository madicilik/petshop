<?php
session_start();

// Koneksi ke database
include 'koneksi.php';

// Mendapatkan id_produk dari url
$nama_produk = $_GET['nama'];

// Query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$nama_produk'");
$detail = $ambil->fetch_assoc();


if (isset($_POST['beli'])) {
    $jumlah = $_POST['jumlah'];
    $_SESSION['keranjang'][$nama_produk] = $jumlah;
    $stok = $detail['stok_produk'];

    $sisa = $stok-$jumlah;

    if($stok<$jumlah) {
        ?>
         <script language="JavaScript">
            alert('Oops! Jumlah stok produk habis ...');
            document.location='index.php';
        </script>
        <?php
    }else{

    echo "<div class='alert alert-success'>Produk telah masuk ke keranjang</div>";
    echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
    }
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

<body class="template-product belle">
    <div class="pageWrapper">
        <?php include 'layouts/navbar.php'; ?>
        <!--Body Content-->
        <div id="page-content">
            <!--MainContent-->
            <div id="MainContent" class="main-content" role="main">
                <!--Breadcrumb-->
                <div class="bredcrumbWrap">
                    <div class="container breadcrumbs">
                        <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Detail Produk</span>
                    </div>
                </div>
                <!--End Breadcrumb-->
                <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                    <!--product-single-->
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-details-img">
                                    <div class="product-thumb">
                                    </div>
                                    <div class="zoompro-wrap product-zoom-right pl-20">
                                        <div class="zoompro-span">
                                            <img class="zoompro blur-up lazyload" data-zoom-image="foto_produk/<?= $detail['foto_produk']; ?>" alt="" src="foto_produk/<?= $detail['foto_produk']; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <form action="" method="post">
                                    <div class="product-single__meta">
                                        <h1 class="product-single__title"><?= $detail['nama_produk']; ?></h1>
                                        <div class="product-nav clearfix">
                                            <a href="#" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="prInfoRow">
                                            <div class="product-stock"> <span class="instock ">Stock</span> <span name="jumlah" class=""><?= $detail['stok_produk']; ?></span> </div>
                                        </div>
                                        <p class="product-single__price product-single__price-product-template">
                                            <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                                <span id="ProductPrice-product-template"><span class="money">Rp. <?= number_format($detail["harga_produk"]); ?>,-</span></span>
                                            </span>
                                        </p>
                                    </div><br><br>
                                    <div class="product-action clearfix">
                                        <div class="product-form__item--quantity">
                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                    <input type="text" value="1" class="product-form__input qty" name="jumlah" max="<?php echo number_format($detail["stok_produk"]); ?>" required>
                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group-button">
                                            <button class="btn btn-primary" name="beli"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="display-table shareRow">
                                    <div class="display-table-cell text-right">
                                        <div class="social-sharing">
                                            <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                                <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                            </a>
                                            <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                                <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                            </a>
                                            <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                                <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--End-product-single-->

                    <!--Product Tabs-->
                    <div class="tabs-listing">
                        <ul class="product-tabs">
                            <li rel="tab1"><a class="tablink">Deskripsi</a></li>
                            <li rel="tab2"><a class="tablink">Reviews</a></li>

                        </ul>
                        <div class="tab-container">
                            <div id="tab1" class="tab-content">
                                <div class="product-description rte">
                                    <p><?= $detail['deskripsi_produk']; ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Product Tabs-->
                </div>
                <!--#ProductSection-product-template-->
            </div>
            <!--MainContent-->
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