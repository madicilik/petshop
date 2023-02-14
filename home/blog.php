<?php
// Mendapatkan id_produk dari url
 $berita = isset($_GET['berita']);

// Query ambil data
$ambil = $koneksi->query("SELECT * FROM berita WHERE judul='$berita' LIMIT 1");
$beritaterkini = $ambil->fetch_assoc();
?>
<div class="latest-blog section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2">Blog Terkini</h2>
                </div>
            </div>
        </div><br><br>
        <div class="row">
            <?php $no = 1; ?>
            <?php $ambil = $koneksi->query("SELECT id_berita, judul, isi, tanggal, gambar_berita FROM berita LIMIT 2") ?>
            <?php while ($pecah = $ambil->fetch_assoc()) : ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="wrap-blog">
                    <a href="blog-left-sidebar.html" class="article__grid-image">
              			<img src="foto_berita/<?= $pecah["gambar_berita"]; ?>" width="300" height="275" alt="" title="" class="blur-up lazyloaded"/>
				    </a>
                    <div class="article__grid-meta article__grid-meta--has-image">
                        <div class="wrap-blog-inner">
                            <h2 class="h3 article__title">
                                <a href="blog-left-sidebar.html"><?= $pecah["judul"]; ?></a>
                            </h2>
                            <span class="article__date"><?= $pecah['tanggal']; ?></span>
                            <div class="rte article__grid-excerpt">
                            <?= $pecah['isi']; ?>
                            </div>
                            <ul class="list--inline article__meta-buttons">
                                <li><a href="blog.php?berita=<?= $pecah['judul']; ?>">Selengkapnya</a></li>
                            </ul>
                        </div>
					</div>
                </div>
            </div>
        <?php $no++; ?>
		<?php endwhile; ?>
            
        </div>
    </div>
</div><br><br>