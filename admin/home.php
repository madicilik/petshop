<h2>Selamat datang Administrator</h2>

<?php
$data_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);

$data_penjualan = mysqli_query($koneksi, "SELECT * FROM penjualan");
$jumlah_penjualan = mysqli_num_rows($data_penjualan);

?>
<div class="row">
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="fas fa-users text-warning"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Pelanggan</p>
							<h4 class="card-title"><?php echo $jumlah_pelanggan; ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-coins text-success"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Penjualan</p>
							<h4 class="card-title"><?php echo $jumlah_penjualan; ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<div class="icon-big text-center">
							<i class="fas fa-dollar-sign text-danger"></i>
						</div>
					</div>
					<div class="col-8 col-stats">
						<div class="numbers">
							<p class="card-category">Total Pendapatan</p>
							<h4 class="card-title">Rp.3.000.000</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
