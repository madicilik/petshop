<?php
// get data pembayaran
$getpem = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran = '$_GET[id]'");

?>
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Konfirmasi Pembayaran</h4>
  </div>
  <div class="card-body">
    <?php
    $id_transaksi = $_GET['id'];
    $ambil = $koneksi->query("SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.id_transaksi = '$_GET[id]'");
    $detail = $ambil->fetch_assoc();

    ?>
    <div class="row">
      <div class="col-md-6">
        <table class="table">
          <tr>
            <th>Nama</th>
            <td><?= $detail['nama_pelanggan']; ?></td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <td><?= $detail['tanggal_pembelian']; ?></td>
          </tr>
          <tr>
            <th>Status Pesanan</th>
            <td><?= $detail['status_pembelian']; ?></td>
          </tr>
          <tr>
            <th>Jumlah</th>
            <td><?= $detail['total_pembelian']; ?></td>
          </tr>
          <tr>
          <?php while ($datapem = mysqli_fetch_array($getpem)) { ?>                                 
            <th>Bukti Pembayaran</th>
            <td><img src="../bukti_pembayaran/<?= $datapem['bukti']; ?>" width="100" height="100"></td>
            <?php } ?>
          </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="" method="post">
          <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="" class="form-control">
              <option value="">Pilih Status</option>
              <option value="lunas">Lunas</option>
              <option value="belum lunas">Belum Lunas</option>
              <option value="batal pesan">Batal Pesan</option>
            </select>
          </div>
          <button class="btn btn-success" name="proses">Proses</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['proses'])) {
  $status = $_POST['status'];
  $koneksi->query("UPDATE transaksi SET status_pembelian='$status' WHERE id_transaksi='$id_transaksi'");

  echo "<script>alert('Status transaksi selesai');</script>";
  echo "<script>location='index.php?halaman=penjualan';</script>";
}

?>