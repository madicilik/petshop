<?php
$ambil = $koneksi->query("SELECT * FROM berita WHERE id_berita= '$_GET[id]'");
$pecah = $ambil->fetch_assoc();


if (isset($_POST['ubah'])) {
  $namafoto = $_FILES['gambar_berita']['name'];
  $lokasifoto = $_FILES['gambar_berita']['tmp_name'];

  // jika foto dirubah
  if (!empty($lokasifoto)) {
    move_uploaded_file($lokasifoto, "../foto_berita/$namafoto");

    $koneksi->query("UPDATE berita SET judul='$_POST[judul]', isi='$_POST[isi]', gambar_berita='$namafoto' WHERE id_berita='$_GET[id]'");
  } else {
    $koneksi->query("UPDATE berita SET judul='$_POST[judul]', isi='$_POST[isi]' WHERE id_berita='$_GET[id]'");
  }

  echo "<script>alert('Data berhasil diubah');</script>";
  echo "<script>location='index.php?halaman=berita';</script>";
}

?>

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Berita</h4>
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
            <label for="">Isi</label>
            <input type="text" name="isi" class="form-control" value="<?= $pecah['isi']; ?>">
          </div>

          <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $pecah['tanggal']; ?>">
          </div>

          <div class="form-group">
            <label for="">Foto </label><br>
            <img src="../foto_berita/<?= $pecah['gambar_berita'] ?>" width="200">
          </div>
          <div class="form-group">
            <label for="">Ganti Foto</label>
            <input type="file" name="gambar_berita" class="form-control">
          </div>

          <button name="ubah" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>