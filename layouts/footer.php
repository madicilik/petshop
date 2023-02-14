<?php

include 'koneksi.php';
$sqlkategori = mysqli_query($koneksi, "SELECT * FROM kategori");

?>
<footer id="footer">
    <div class="site-footer">
        <div class="container">
            <!--Footer Links-->
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Kategori Shop</h4>
                        <ul>
                        <?php while ($kategori = mysqli_fetch_array($sqlkategori)) { ?>
                            <li class="lvl-1"><a href="produk.php?kategori=<?php echo $kategori['nama_kategori']; ?>" class="site-nav"><?php echo $kategori['nama_kategori']; ?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Informasi</h4>
                        <ul>
                            <li><a href="about.php">About us</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Pelayanan Customer</h4>
                        <ul>
                            <li><a href="pemeliharaan_hewan.php">Pemeliharaan</a></li>
                            <li><a href="penitipan_hewan.php">Penitipan</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        <h4 class="h4">Kontak Kami</h4>
                        <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i>
                                <p>Jl. Jayengan No.6 Barusari Kec. Semarang Sel.<br>Kota Semarang, Jawa Tengah 50245</p>
                            </li>
                            <li class="phone"><i class="icon anm anm-phone-s"></i>
                                <p>0812 2414 5140</p>
                            </li>
                            <li class="email"><i class="icon anm anm-envelope-l"></i>
                                <p>irfannugraha11016@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End Footer Links-->
            <hr>
            <div class="footer-bottom">
                <div class="row">
                    <!--Footer Copyright-->
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left"><span></span> <a href="templateshub.net">Copyright 2023 All Reserved</a></div>
                    <!--End Footer Copyright-->

                </div>
            </div>
        </div>
    </div>
</footer>