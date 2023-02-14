
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Data Transaksi</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="basic-datatables" class="display table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Pelanggan</th>
						<th>Tanggal beli</th>
						<th>Status Pesanan</th>
						<th>Bukti</th>
						<th>Subtotal</th>
						<th>aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM transaksi,pelanggan,pembayaran WHERE transaksi.id_pelanggan = 
							pelanggan.id_pelanggan AND pembayaran.id_transaksi = transaksi.id_transaksi"); ?>
					<?php while ($pecah = $ambil->fetch_assoc()) : ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $pecah["nama_pelanggan"]; ?></td>
							<td><?= date("d F Y", strtotime($pecah["tanggal_pembelian"])); ?></td>
							<td><?= $pecah["status_pembelian"]; ?></td>
            				<td><img src="../bukti_pembayaran/<?= $pecah['bukti']; ?>" width="100" height="100"></td>
							<td>Rp. <?= number_format($pecah["total_pembelian"]); ?>,-</td>
							<td>
								<a href="index.php?halaman=detail&id=<?= $pecah["id_transaksi"]; ?>" class="btn btn-primary btn-xs">detail</a>
								<?php if ($pecah['status_pembelian'] != 'pending') : ?>
									<a href="index.php?halaman=konfirmasi_pembayaran&id=<?= $pecah['id_transaksi']; ?>" class="btn btn-success btn-xs">Konfirmasi Pembayaran</a>
								<?php endif; ?>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>