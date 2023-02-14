<?php

$ambil = $koneksi->query("SELECT * FROM penitipan WHERE id_penitipan = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM penitipan WHERE id_penitipan = '$_GET[id]'");

echo "<script>alert('Penitipan terhapus');</script>";
echo "<script>location='index.php?halaman=penitipan';</script>";