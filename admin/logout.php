<?php
session_start();
$_SESSION=[];
session_unset();
session_destroy();

echo "<script>alert('Anda telah logout!');</script>";
echo "<script>location='login.php';</script>";
