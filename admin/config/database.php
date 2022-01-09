<?php

$host       = "localhost"; // host proyek
$username   = "root"; // username database di phpmyadmin
$password   = ""; // password database di phpmyadmin
$dbname     = "simpeg-php"; // nama database di phpmyadmin

// koneksi ke database
$db = mysqli_connect($host, $username, $password, $dbname);

// check koneksi ke database
// if (!$db) {
//     echo "koneksi gagal";
// } else {
//     echo "koneksi berhasil";
// }
