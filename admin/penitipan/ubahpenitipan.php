<?php
$ambil = $koneksi->query("SELECT * FROM penitipan WHERE id_penitipan = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();


if (isset($_POST['ubah'])) {
  $namafoto = $_FILES['foto']['name'];
  $lokasifoto = $_FILES['foto']['tmp_name'];

  // jika foto dirubah
  if (!empty($lokasifoto)) {
    move_uploaded_file($lokasifoto, "../foto_penitipan/$namafoto");

    $koneksi->query("UPDATE penitipan SET judul='$_POST[judul]', paragraf='$_POST[paragraf]', foto='$namafoto' WHERE id_penitipan='$_GET[id]'");
  } else {
    $koneksi->query("UPDATE penitipan SET judul='$_POST[judul]', paragraf='$_POST[paragraf]' WHERE id_penitipan='$_GET[id]'");
  }

  echo "<script>alert('Data berhasil diubah');</script>";
  echo "<script>location='index.php?halaman=penitipan';</script>";
}

?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Produk</h4>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= $pecah['judul']; ?>">
          </div>

          <div class="form-group">
            <label for="">Paragraf</label>
            <input type="text" name="paragraf" class="form-control" value="<?= $pecah['paragraf']; ?>">
          </div>

          <div class="form-group">
            <label for="">Foto </label><br>
            <img src="../foto_penitipan/<?= $pecah['foto'] ?>" width="200">
          </div>
          <div class="form-group">
            <label for="">Ganti Foto</label>
            <input type="file" name="foto" class="form-control">
          </div>

          <button name="ubah" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>