<?php

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
