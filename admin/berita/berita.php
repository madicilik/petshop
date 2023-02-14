<div class="card">
	<div class="card-header">
		<h4 class="card-title">Data Berita</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<a href="index.php?halaman=tambahberita" class="btn btn-primary">Tambah Data Berita</a><br><br>
			<table id="basic-datatables" class="display table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Isi</th>
						<th>Tanggal</th>
						<th>Gambar</th>
						<th>aksi</th>
					</tr>
				</thead>

				<tbody>

					<?php $no = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM berita") ?>
					<?php while ($pecah = $ambil->fetch_assoc()) : ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $pecah["judul"]; ?></td>
							<td><?= $pecah['isi']; ?></td>
							<td><?= $pecah['tanggal']; ?></td>
							<td>
								<img src="../foto_berita/<?= $pecah["gambar_berita"]; ?>" width="100">
							</td>

							<td>
								<a href="index.php?halaman=ubahberita&id=<?= $pecah['id_berita']; ?>" class="btn btn-warning btn-xs">ubah</a>
								<a href="index.php?halaman=hapusberita&id=<?= $pecah['id_berita']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endwhile; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>