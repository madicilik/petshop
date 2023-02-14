<h2>Detail Transaksi</h2>
<br>
<?php
$ambil = $koneksi->query("SELECT * FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.id_transaksi = '$_GET[id]'");
$detail = $ambil->fetch_assoc();

?>

<div class="row" style="margin-bottom:10px;">
	<div class="col-md-4">
		<h5>Pemesanan</h5>
		tanggal : <?= $detail["tanggal_pembelian"]; ?><br>
	</div>
	<div class="col-md-4">
		<h5>Nama Pelanggan</h5>
		<strong><?= $detail["nama_pelanggan"]; ?></strong><br>
	</div>
</div>
<div class="card">
	<div class="card-header">
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="basic-datatables" class="display table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM penjualan JOIN produk ON penjualan.id_produk = produk.id_produk WHERE penjualan.id_penjualan = '$_GET[id]'"); ?>
					<?php while ($pecah = $ambil->fetch_assoc()) : ?>
						<tr>
							<td><?= $no; ?>.</td>
							<td><?= $pecah["nama_produk"]; ?></td>
							<td>Rp. <?= number_format($pecah["harga_produk"]); ?>,-</td>
							<td><?= $pecah["jumlah"]; ?></td>
							<td>Rp. <?= number_format($pecah["jumlah"] * $pecah["harga_produk"]); ?>,-</td>
						</tr>
						<?php $no++; ?>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>