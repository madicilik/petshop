<?php
$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk = $ambil->fetch_assoc();

$fotoproduk = array();
$ambilfoto = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
while ($tiap = $ambilfoto->fetch_assoc()) {
  $fotoproduk[] = $tiap;
}

?>


<div class="card">
  <div class="card-header">
    <h4 class="card-title">Detail Produk</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <tr>
        <th>Produk</th>
        <td><?= $detailproduk['nama_produk']; ?></td>
      </tr>
      <tr>
        <th>Kategori</th>
        <td><?= $detailproduk['nama_kategori']; ?></td>
      </tr>
      <tr>
        <th>Harga</th>
        <td>Rp. <?= number_format($detailproduk['harga_produk']) ?>,-</td>
      </tr>
      <tr>
        <th>Berat</th>
        <td><?= $detailproduk['berat_produk']; ?></td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <td><?= $detailproduk['deskripsi_produk']; ?></td>
      </tr>
      <tr>
        <th>Stok</th>
        <td><?= $detailproduk['stok_produk']; ?></td>
      </tr>
    </table>

    <div class="row">

      <div class="col-md-4 text-center">
        <img src="../foto_produk/<?= $detailproduk['foto_produk']; ?>" alt="" class="img-responsive"><br>

      </div>

    </div><br>

    <div class="row">

    </div>
  </div>
</div>


<?php
if (isset($_POST['simpan'])) {
  $lokasifoto = $_FILES['produk_foto']['tmp_name'];
  $namafoto = $_FILES['produk_foto']['name'];
  $namafoto = date('YmdHis') . $namafoto;

  // Upload ke folder foto_produk
  move_uploaded_file($lokasifoto, '../foto_produk/' . $namafoto);

  // Memasukkan nama foto ke tabel produk_foto
  $koneksi->query("INSERT INTO produk_foto(id_produk, nama_produk_foto) VALUES('$id_produk', '$namafoto')");

  echo "<script>alert('Foto produk berhasil ditambahkan');</script>";
  echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>";
}

?>