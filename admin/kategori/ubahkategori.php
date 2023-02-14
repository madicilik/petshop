<?php
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Kategori</h4>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post">
          <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="<?= $pecah['nama_kategori']; ?>">
          </div>

          <button name="ubah" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST['ubah'])) {

  $koneksi->query("UPDATE kategori SET nama_kategori='$_POST[nama_kategori]' WHERE id_kategori='$_GET[id]'");

  echo "<script>alert('Data berhasil diubah');</script>";
  echo "<script>location='index.php?halaman=kategori';</script>";
}

?>