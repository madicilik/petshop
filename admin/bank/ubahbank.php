<?php
$ambil = $koneksi->query("SELECT * FROM bank WHERE id_bank = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Edit Bank</h4>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post">
          <div class="form-group">
            <label for="">Nama Bank</label>
            <input type="text" name="nama_bank" class="form-control" value="<?= $pecah['nama_bank']; ?>">
          </div>

          <div class="form-group">
            <label for="">Nomor Rekening</label>
            <input type="text" name="nomor_rekening" class="form-control" value="<?= $pecah['nomor_rekening']; ?>">
          </div>

          <div class="form-group">
            <label for="">Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" value="<?= $pecah['nama_pemilik']; ?>">
          </div>

          <button name="ubah" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST['ubah'])) {

  $koneksi->query("UPDATE bank SET nama_bank='$_POST[nama_bank]', nomor_rekening='$_POST[nomor_rekening]', nama_pemilik='$_POST[nama_pemilik]' WHERE id_bank='$_GET[id]'");

  echo "<script>alert('Data berhasil diubah');</script>";
  echo "<script>location='index.php?halaman=bank';</script>";
}

?>