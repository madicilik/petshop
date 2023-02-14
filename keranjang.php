<?php
session_start();

include 'koneksi.php';

if(empty($_SESSION['keranjang'])or !isset($_SESSION['keranjang']))
{
	echo"<script>alert('Silahkan isi keranjang dulu');</script>";
	echo"<script>location='index.php';</script>";
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
                        <h1 class="page-width">Keranjang</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                        <form action="#" method="post" class="cart style2">
                            <table>
                                <thead class="cart__row cart__header">
                                    <tr>

                                        <th colspan="2" class="text-center">Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-right">Total</th>
                                        <th class="action">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                                        <?php
                                            $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                                            $pecah = $ambil->fetch_assoc();
                                            $subharga = $pecah['harga_produk']*$jumlah;
                                        ?>
                                        <tr class="cart__row border-bottom line1 cart-flex border-top">
                                            <td class="cart__image-wrapper cart-flex-item">
                                                <a href="#"><img class="cart__image" src="foto_produk/<?= $pecah['foto_produk']; ?>" alt=""></a>
                                            </td>
                                            <td class="cart__meta small--text-left cart-flex-item">
                                                <div class="list-view-item__title">
                                                    <a href="#"><?= $pecah['nama_produk']; ?></a>
                                                </div>
                                            </td>
                                            <td class="cart__price-wrapper cart-flex-item">
                                                <span class="money">Rp. <?= number_format($pecah["harga_produk"]); ?>,-</span>
                                            </td>
                                            <td class="cart__update-wrapper cart-flex-item text-right">
                                                <div class="cart__qty text-center">
                                                    <span class="money"><?= $jumlah ?></span>
                                                </div>
                                            </td>
                                            <td class="text-right small--hide cart-price">
                                                <div><span class="money">Rp. <?= number_format($subharga); ?>,-</span></div>
                                            </td>
                                            <td class="text-center small--hide"><a href="#" class="btn btn--secondary cart__remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <hr>
                        </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                        <div class="cart-note">
                            <div class="solid-border">
                                <h5><label for="CartSpecialInstructions" class="cart-note__label small--text-center"></label></h5>
                                <textarea name="note" id="CartSpecialInstructions" class="cart-note__input"></textarea>
                            </div>
                        </div>
                        <div class="solid-border">
                            <div class="row">
                                <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                                <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money"><span class="money">Rp. <?= number_format($subharga); ?>,-</span></span></span>
                            </div>
                            <p class="cart_tearm">
                            </p>
                            <a href="chekout.php" class="btn btn-secondary btn--small">Lanjutkan Pesanan</a>

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