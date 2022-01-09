<?php

// fungsi menampilkan data dari database
function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah bidang
function tambah_bidang($post) 
{
    // panggil koneksi ke database
    global $db;

    // ambil input user
    $nama = htmlspecialchars($post['nama']);

    // query tambah data
    $query = "INSERT INTO bidang VALUES(null, '$nama', CURRENT_TIMESTAMP)";

    // simpan query ke database
    mysqli_query($db, $query);

    // check kolom yang bertambah
    return mysqli_affected_rows($db);
}

// fungsi hapus bidang
function hapus_bidang($id_bidang)
{
    global $db;

    $query = "DELETE FROM bidang WHERE id_bidang = $id_bidang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi tambah bidang
function ubah_bidang($post)
{
    // panggil koneksi ke database
    global $db;

    // ambil input user
    $id_bidang  = $post['id_bidang'];
    $nama       = htmlspecialchars($post['nama']);

    // query ubah data
    $query = "UPDATE bidang SET nama = '$nama' WHERE id_bidang = $id_bidang";

    // simpan query ke database
    mysqli_query($db, $query);

    // check kolom yang bertambah
    return mysqli_affected_rows($db);
}