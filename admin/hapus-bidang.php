<?php

session_start();

// check login jika gagal lempar kembali ke login.php
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda harus login terlebih dahulu');
            document.location.href = 'login.php';
          </script>";
    exit;
}

require "config/core.php"; // panggil file config/core.php

$id_bidang = (int)$_GET['id_bidang'];

// hapus bidang
if (hapus_bidang($id_bidang) > 0) {
    // pesan berhasil
    echo "<script>
                alert('Data Bidang Berhasil Dihapus'); 
                document.location.href = 'daftar-bidang.php';
             </script>";
} else {
    // pesan gagal
    echo "<script>
                alert('Data Bidang Gagal Dihapus');
                document.location.href = 'daftar-bidang.php';
             </script>";
}
