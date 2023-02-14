<div class="card">
	<div class="card-header">
		<h4 class="card-title">Tambah Kategori</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<form action="" method="post">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama_kategori" class="form-control">
					</div>

					<button name="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['submit'])) {
	$nama_kategori = $_POST['nama_kategori'];

	$sql = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");
	if ($sql) {
?>
		<script>
			alert('data telah di simpan');
			window.location.href = 'index.php?halaman=kategori';
		</script>
<?php
	}
}
?>