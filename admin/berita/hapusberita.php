<?php

$ambil = $koneksi->query("SELECT * FROM berita WHERE id_berita = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM berita WHERE id_berita = '$_GET[id]'");

echo "<script>alert('Berita terhapus');</script>";
echo "<script>location='index.php?halaman=berita';</script>";
