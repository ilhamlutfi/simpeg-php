<?php

require "config/core.php"; // panggil file config/core.php

$id_akun = (int)$_GET['id_akun'];

// hapus akun
if (hapus_akun($id_akun) > 0) {
    // pesan berhasil
    echo "<script>
                alert('Data Akun Berhasil Dihapus'); 
                document.location.href = 'daftar-akun.php';
             </script>";
} else {
    // pesan gagal
    echo "<script>
                alert('Data Akun Gagal Dihapus');
                document.location.href = 'daftar-akun.php';
             </script>";
}
