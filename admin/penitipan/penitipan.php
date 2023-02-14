<div class="card">
	<div class="card-header">
		<h4 class="card-title">Data Penitipan</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<a href="index.php?halaman=tambahpenitipan" class="btn btn-primary">Tambah Data Penitipan</a><br><br>
			<table id="basic-datatables" class="display table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Paragraf</th>
						<th>Gambar</th>
						<th>aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM penitipan") ?>
					<?php while ($pecah = $ambil->fetch_assoc()) : ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $pecah["judul"]; ?></td>
							<td><?= $pecah['paragraf']; ?></td>
							<td>
								<img src="../foto_penitipan/<?= $pecah["foto"]; ?>" width="100">
							</td>
							<td>
								<a href="index.php?halaman=ubahpenitipan&id=<?= $pecah['id_penitipan']; ?>" class="btn btn-warning btn-xs">ubah</a>
								<a href="index.php?halaman=hapuspenitipan&id=<?= $pecah['id_penitipan']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>