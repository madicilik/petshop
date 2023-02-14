<?php

$ambil = $koneksi->query("SELECT * FROM penjualan WHERE id_penjualan = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM transaksi WHERE id_transaksi = '$_GET[id]'");

echo "<script>alert('Penjualan  terhapus');</script>";
echo "<script>location='index.php?halaman=penjualan';</script>";