<div class="card">
	<div class="card-header">
		<h4 class="card-title">Tambah Bank</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<form action="" method="post">
					<div class="form-group">
						<label>Nama Bank</label>
						<input type="text" name="nama_bank" class="form-control">
					</div>

					<div class="form-group">
						<label>Nomor Rekening</label>
						<input type="text" name="nomor_rekening" class="form-control">
					</div>

					<div class="form-group">
						<label>Nama Pemilik</label>
						<input type="text" name="nama_pemilik" class="form-control">
					</div>

					<button name="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['submit'])) {
	$nama_bank = $_POST['nama_bank'];
	$nomor_rekening = $_POST['nomor_rekening'];
	$nama_pemilik = $_POST['nama_pemilik'];

	$sql = mysqli_query($koneksi, "INSERT INTO bank (nama_bank,nomor_rekening,nama_pemilik) VALUES  ('$nama_bank','$nomor_rekening','$nama_pemilik')");
	if ($sql) {
?>
		<script>
			alert('data telah di simpan');
			window.location.href = 'index.php?halaman=bank';
		</script>
<?php
	}
}
?>