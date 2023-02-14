<div class="card">
	<div class="card-header">
		<h4 class="card-title">Data Pemeliharaan</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<a href="index.php?halaman=tambahpemeliharaan" class="btn btn-primary">Tambah Data Pemeliharaan</a><br><br>
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
					<?php $ambil = $koneksi->query("SELECT * FROM pemeliharaan") ?>
					<?php while ($pecah = $ambil->fetch_assoc()) : ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $pecah["judul"]; ?></td>
							<td><?= $pecah['paragraf']; ?></td>

							<td>
								<img src="../foto_pemeliharaan/<?= $pecah["gambar"]; ?>" width="100">
							</td>

							<td>
								<a href="index.php?halaman=ubahpemeliharaan&id=<?= $pecah['id_pemeliharaan']; ?>" class="btn btn-warning btn-xs">ubah</a>
								<a href="index.php?halaman=hapuspemeliharaan&id=<?= $pecah['id_pemeliharaan']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endwhile; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>