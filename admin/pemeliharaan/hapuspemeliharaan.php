<?php

$ambil = $koneksi->query("SELECT * FROM pemeliharaan WHERE id_pemeliharaan = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM pemeliharaan WHERE id_pemeliharaan = '$_GET[id]'");

echo "<script>alert('Pemeliharaan terhapus');</script>";
echo "<script>location='index.php?halaman=pemeliharaan';</script>";