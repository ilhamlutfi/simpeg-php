<?php
// pesan error 0 untuk produksi 1 untuk pengembangan, 
error_reporting(0);

session_start();

if (isset($_SESSION['login']) == true) {
    $id_akun   = $_SESSION["id_akun"];
    $nama      = $_SESSION["nama"];
    $role      = $_SESSION["role"];
}

require 'controller.php';
require 'database.php';