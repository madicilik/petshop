<div class="card">
	<div class="card-header">
		<h4 class="card-title">Data Kategori</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Data Kategori</a><br><br>
			<table id="basic-datatables" class="display table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
						<th>aksi</th>
					</tr>
				</thead>

				<tbody>

					<?php $no = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM kategori"); ?>
					<?php while ($pecah = $ambil->fetch_assoc()) : ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $pecah["nama_kategori"]; ?></td>
							<td>
								<a href="index.php?halaman=ubahkategori&id=<?= $pecah['id_kategori']; ?>" class="btn btn-warning btn-xs">ubah</a>

								<a href="index.php?halaman=hapuskategori&id=<?= $pecah['id_kategori']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endwhile; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>