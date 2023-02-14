<div class="card">
	<div class="card-header">
		<h4 class="card-title">Tambah Pemeliharaan</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul" class="form-control">
					</div>
					<div class="form-group">
						<label>Paragraf</label>
						<input type="text" name="paragraf" class="form-control">
					</div>
					<div class="form-group">
						<label>Foto</label>
						<div class="letak-input" style="margin-bottom: 5px;">
							<input type="file" name="gambar[]" class="form-control">
						</div>
					</div>
					<button name="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST["submit"])) {

	$namanamafoto = $_FILES["gambar"]["name"];
	$lokasilokasifoto = $_FILES["gambar"]["tmp_name"];
	move_uploaded_file($lokasilokasifoto[0], "../foto_pemeliharaan/" . $namanamafoto[0]);

	// menyimpan ke database
	$result = $koneksi->query("INSERT INTO pemeliharaan VALUES('', '$_POST[judul]', '$_POST[paragraf]', '$namanamafoto[0]')");

	if ($result and $hasil) {

	}

	echo "<script>alert('Data berhasil ditambahkan');</script>";
	echo "<script>location='index.php?halaman=pemeliharaan';</script>";
}
?>

<script>
	$(document).ready(function() {
		$(".btn-tambah").on("click", function() {
			$(".letak-input").append("<input type='file' name='foto[]' class='form-control'>");
		})
	})
</script>