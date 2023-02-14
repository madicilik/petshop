<div class="card">
	<div class="card-header">
		<h4 class="card-title">Data Pelanggan</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="basic-datatables" class="display table table-striped table-hover">
				<thead>

					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>Jenis Kelamin</th>
						<th>Email</th>
						<th>No Telepon</th>
						<th>Alamat</th>
						<th>aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php $no = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
					<?php while ($pecah = $ambil->fetch_assoc()) : ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $pecah["nama_pelanggan"]; ?></td>
							<td><?= $pecah["jenis_kelamin"]; ?></td>
							<td><?= $pecah["email_pelanggan"]; ?></td>
							<td><?= $pecah["telepon_pelanggan"]; ?></td>
							<td><?= $pecah["alamat_pelanggan"]; ?></td>
							<td>
								<a href="index.php?halaman=hapuspelanggan&id=<?= $pecah['id_pelanggan']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">Hapus</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endwhile; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>