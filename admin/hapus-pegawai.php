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

$id_pegawai = (int)$_GET['id_pegawai'];

// hapus pegawai
if (hapus_pegawai($id_pegawai) > 0) {
    // pesan berhasil
    echo "<script>
                alert('Data Pegawai Berhasil Dihapus'); 
                document.location.href = 'daftar-pegawai.php';
             </script>";
} else {
    // pesan gagal
    echo "<script>
                alert('Data Pegawai Gagal Dihapus');
                document.location.href = 'daftar-pegawai.php';
             </script>";
}
