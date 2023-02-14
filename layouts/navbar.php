<?php
    include 'koneksi.php';
    $sqlkategori = mysqli_query($koneksi, "SELECT * FROM kategori");
    
?>
<div class="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-sm-8 col-md-5 col-lg-4">
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
            </div>
            <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                <ul class="customer-links list-inline">
                    <li><a href="register.php">Daftar Akun</a></li>
                    <li><a href="user_profil.php">Akun Saya</a></li>
                    <li><a href="logout.php">Keluar</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Top Header-->

<!--Header-->
<div class="header-wrap animated d-flex">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!--Desktop Logo-->
            <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                <a href="index.php">
                    <img src="assets/images/logo/petshopdeva-removebg-preview.png" width="160" height="45" alt="Deva Petshop & Pet Care" title="Deva Petshop & Pet Care" />
                </a>
            </div>
            <!--End Desktop Logo-->
            <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                <div class="d-block d-lg-none">
                    <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        <i class="icon anm anm-times-l"></i>
                        <i class="anm anm-bars-r"></i>
                    </button>
                </div>
                <!--Desktop Menu-->
                <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                    <ul id="siteNav" class="site-nav medium center hidearrow">
                        <li class="lvl1"><a href="index.php"><b>Home</b></a></li>
                        <li class="lvl1"><a href="about.php"><b>About Us</b></a></li>
                        <li class="lvl1"><a href="produk.php"><b>Produk</b></a></li>
                        <li class="lvl1 parent dropdown"><a href="#">Kategori <i class="anm anm-angle-down-l"></i></a>
                            <ul class="dropdown">
                                <?php while ($kategori = mysqli_fetch_array($sqlkategori)) { ?>
                                    <li class="lvl-1"><a href="produk.php?kategori=<?php echo $kategori['nama_kategori']; ?>" class="site-nav"><?php echo $kategori['nama_kategori']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="lvl1 parent dropdown"><a href="#">Layanan <i class="anm anm-angle-down-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="pemeliharaan_hewan.php" class="site-nav">Pemeliharaan</a></li>
                                <li><a href="penitipan_hewan.php" class="site-nav">Penitipan</a></li>
                            </ul>
                        </li>
                        <li class="lvl1"><a href="blog.php"><b>News</b></a></li>
                        <li class="lvl1"><a href="kontak.php"><b>Kontak Kami</b></a></li>
                    </ul>
                </nav>
                <!--End Desktop Menu-->
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                <div class="logo">
                    <a href="index.php">
                        <img src="assets/images/logo/petshopdeva-removebg-preview.png" width="160" height="45" alt="Deva Petshop & Pet Care" title="Deva Petshop & Pet Care" />
                    </a>
                </div>
            </div>
            <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                <div class="site-nav medium center hidearrow">
                    <a class="lvl1"><a href="keranjang.php"><b>Keranjang</b></a></a>
                </div>   
            </div>
        </div>
    </div>
</div>
<!--End Header-->
<!--Mobile Menu-->
<div class="mobile-nav-wrapper" role="navigation">
    <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
    <ul id="MobileNav" class="mobile-nav">
        <li class="lvl1"><a href="#"><b>Home</b></a></li>
        <li class="lvl1"><a href="#"><b>About Us</b></a></li>
        <li class="lvl1"><a href="#"><b>Produk</b></a></li>
        <li class="lvl1 parent dropdown"><a href="#">Kategori <i class="anm anm-angle-down-l"></i></a>
            <ul class="dropdown">
                <?php while ($kategori = mysqli_fetch_array($sqlkategori)) { ?>
                    <li class="lvl-1"><a href="produk.php?kategori=<?php echo $kategori['nama_kategori']; ?>" class="site-nav"><?php echo $kategori['nama_kategori']; ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li class="lvl1 parent dropdown"><a href="#">Layanan <i class="anm anm-angle-down-l"></i></a>
            <ul class="dropdown">
                <li><a href="blog-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                <li><a href="blog-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
            </ul>
        </li>
        <li class="lvl1"><a href="#"><b>News</b></a></li>
        <li class="lvl1"><a href="#"><b>Kontak Kami</b></a></li>
    </ul>
</div>
<!--End Mobile Menu-->