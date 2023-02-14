
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Data Penjualan</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<a href="index.php?halaman=laporan_penjualan" class="btn btn-success"><i class="fa fa-file"></i> Laporan Penjualan</a><br><br>
				<table id="basic-datatables" class="display table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Pesan</th>
							<th>Nama Produk</th>
							<th>Status</th>
							<th>Bukti Pembayaran</th>
							<th>aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php $ambil = $koneksi->query("SELECT * FROM penjualan,transaksi,produk,pembayaran WHERE penjualan.id_transaksi = 
							transaksi.id_transaksi AND penjualan.id_produk = produk.id_produk AND pembayaran.id_transaksi = transaksi.id_transaksi"); ?>
						<?php while ($pecah = $ambil->fetch_assoc()) : ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $pecah["tanggal_pembelian"]; ?></td>
								<td><?= $pecah["nama_produk"]; ?></td>
								<td><?= $pecah["status_pembelian"]; ?></td>
								<td><img src="../bukti_pembayaran/<?= $pecah['bukti']; ?>" width="100" height="100"></td>
								<td>
									<a href="index.php?halaman=hapuspenjualan&id=<?= $pecah['id_penjualan']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
								</td>
							</tr>
							<?php $no++; ?>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>