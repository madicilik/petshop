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
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Kontak Kami</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->
            <div class="map-section map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2124771233766!2d110.40461001431777!3d-6.984232770334743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b48e796d57d%3A0x68e587c00d812c66!2sJl.%20Jayengan%20No.6%2C%20Barusari%2C%20Kec.%20Semarang%20Sel.%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050245!5e0!3m2!1sid!2sid!4v1675004332279!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="container">
                    <div class="row">
                        <div class="map-section__overlay-wrapper">
                            <div class="map-section__overlay">
                                <h3 class="h4">Alamat Toko Kami</h3>
                                <div class="rte-setting">
                                    <p>Jl. Jayengan No.6 Barusari Kec. Semarang Sel.<br>Kota Semarang, Jawa Tengah 50245</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Kontak Kami</span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
                        <div class="formFeilds contact-form form-vertical">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <p><a href="https://wa.me/" class="btn btn--secondary btn--small" target="_blank">Hubungi Kami</a></p>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="open-hours">
                            <strong>Buka Setiap Hari</strong><br>
                            Mon - Sat : 9am - 11pm<br>
                            Sunday: 11am - 5pm
                        </div>
                        <hr />
                        <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i>
                                <p>Jl. Jayengan No.6 Barusari Kec. Semarang Sel.<br>Kota Semarang, Jawa Tengah 50245</p>
                            </li>
                            <li class="phone"><i class="icon anm anm-phone-s"></i>
                                <p>+62 8765876542</p>
                            </li>
                            <li class="email"><i class="icon anm anm-envelope-l"></i>
                                <p>devapetshop@gmail.com</p>
                            </li>
                        </ul>
                        <hr />
                        <ul class="list--inline site-footer__social-icons social-icons">
                            <li><a class="social-icons__link" href="#" target="_blank" title="Deva Pet Shop & Pet Care on Facebook"><i class="icon icon-facebook"></i></a></li>
                            <li><a class="social-icons__link" href="#" target="_blank" title="Deva Pet Shop & Pet Care on Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                            <li><a class="social-icons__link" href="#" target="_blank" title="Deva Pet Shop & Pet Care on Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                            <li><a class="social-icons__link" href="#" target="_blank" title="Deva Pet Shop & Pet Care on YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                        </ul>
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