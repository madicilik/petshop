<div class="tab-slider-product section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2">Produk Kami</h2>
                    <p>Pilihan Terbaik untuk hewan anda.
                        Semua kebutuhan hewan peliharan anda dari mulai kucing sampai anjing dapat ditemukan disini.</p>
                </div><br><br>
                <div class="tabs-listing">
                    <div class="tab_container">
                        <div id="tab1" class="tab_content grid-products">
                            <div class="productSlider">
                            <?php $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT 8") ?>
                                    <?php while($data = $ambil->fetch_assoc()): ?> 
                                    <div class="col-12 item">
                                        <div class="product-image">
                                            <a href="detail_produk.php?nama=<?= $data['id_produk']; ?>">
                                                <img class="primary blur-up lazyload" data-src="foto_produk/<?= $data["foto_produk"]; ?>" src="foto_produk/<?= $data["foto_produk"]; ?>" alt="image" title="produk">
                                                <img class="hover blur-up lazyload" data-src="foto_produk/<?= $data["foto_produk"]; ?>" src="foto_produk/<?= $data["foto_produk"]; ?>" alt="image" title="product">
                                            </a>
                                            <form class="variants add" action="#" onclick="window.location.href='beli.php?id=<?= $data['id_produk']; ?>'"method="post">
                                                <button class="btn btn-addto-cart" type="button" tabindex="0">Masuk Keranjang</button>
                                            </form> 
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-name">
                                                <a><?php echo $data['nama_produk']; ?></a>
                                            </div>
                                            <div class="product-price">
                                                <span class="price">Rp. <?= number_format($data["harga_produk"]); ?>,-</span>
                                            </div> 
                                        </div> 
                                    </div>
                                    <?php endwhile; ?>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div><br><br><br><br>
      