<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda harus login terlebih dahulu');
            document.location.href = 'login.php';
          </script>";
    exit;
}

//menghilangkan session
$_SESSION = [];

session_unset();
session_destroy();
header('Location:login.php');