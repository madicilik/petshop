<div class="card">
	<div class="card-header">
		<h4 class="card-title">Data Bank</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<a href="index.php?halaman=tambahbank" class="btn btn-primary">Tambah Data Bank</a><br><br>
			<table id="basic-datatables" class="display table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Bank</th>
						<th>Nomor Rekening</th>
						<th>Nama Pemilik</th>
						<th>aksi</th>
					</tr>
				</thead>

				<tbody>

					<?php $no = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM bank"); ?>
					<?php while ($pecah = $ambil->fetch_assoc()) : ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $pecah["nama_bank"]; ?></td>
							<td><?= $pecah["nomor_rekening"]; ?></td>
							<td><?= $pecah["nama_pemilik"]; ?></td>
							<td>
								<a href="index.php?halaman=ubahbank&id=<?= $pecah['id_bank']; ?>" class="btn btn-warning btn-xs">ubah</a>

								<a href="index.php?halaman=hapusbank&id=<?= $pecah['id_bank']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs">hapus</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endwhile; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>