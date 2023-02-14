<?php
$ambil = $koneksi->query("SELECT * FROM admin");
$pecah = $ambil->fetch_assoc();
?>
<h4 class="page-title">Profile</h4>
<div class="row">
	<div class="col-md-8">
		<div class="card card-with-nav">
			<div class="card-header">
				<div class="row row-nav-line">
					<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Profil</a> </li>

					</ul>
				</div>
			</div>

			<div class="card-body">

				<div class="row mt-3">
					<div class="col-md-12">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="nama_lengkap" value="<?= $pecah['nama_lengkap']; ?>">
						</div>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-md-6">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username" value="<?= $pecah['username']; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" value="<?= $pecah['password']; ?>">
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

