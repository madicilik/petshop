<?php

$ambil = $koneksi->query("SELECT * FROM bank WHERE id_bank = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM bank WHERE id_bank = '$_GET[id]'");

echo "<script>alert('Bank terhapus');</script>";
echo "<script>location='index.php?halaman=bank';</script>";
