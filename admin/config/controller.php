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

// ----------------------------------------------------------------------------------

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

// ------------------------------------------------------------------------------

// fungsi tambah pegawai
function tambah_pegawai($post)
{
    global $db;

    $id_bidang  = strip_tags($post['id_bidang']);
    $nip        = strip_tags($post['nip']);
    $nama       = strip_tags($post['nama']);
    $jk         = strip_tags($post['jk']);
    $alamat     = strip_tags($post['alamat']);
    $email      = strip_tags($post['email']);
    $no_telepon = strip_tags($post['no_telepon']);
    $golongan   = strip_tags($post['golongan']);
    $gaji       = strip_tags($post['gaji']);
    $status     = strip_tags($post['status']);
    $tmk        = strip_tags($post['tmk']);
    $id_user    = strip_tags($post['id_user']);

    // upload foto
    $foto = upload_foto_pegawai(); // fungsi upload foto pegawai

    // check gagal atau tidaknya upload foto
    if (!$foto) {
        return false;
    }

    // buat query tambah data
    $query = "INSERT INTO pegawai VALUES(null, '$id_bidang', '$nip', '$nama', '$jk', '$alamat', '$email', '$no_telepon', '$golongan', '$gaji', '$status', '$tmk', '$foto', '$id_user', CURRENT_TIMESTAMP)";

    // masukkan query ke database
    mysqli_query($db, $query);

    // check database yg terefek
    return mysqli_affected_rows($db);
}

// fungsi upload foto pegawai
function upload_foto_pegawai()
{
    $namaFile       = $_FILES['foto']['name']; // nama file (file)
    $ukuranFile     = $_FILES['foto']['size']; // ukuran data (file)
    $error          = $_FILES['foto']['error']; // jika file error
    $tmpName        = $_FILES['foto']['tmp_name']; //tempat penyimpanan sementara

    // Check file yg diupload
    $extensiFotoValid = ['jpg', 'jpeg', 'png']; // menentukan extensi file
    $extensiFoto      = explode('.', $namaFile);
    $extensiFoto      = strtolower(end($extensiFoto));
    if (!in_array($extensiFoto, $extensiFotoValid)) {
        // pesan gagal
        echo "<script>
                alert('Format Foto Tidak VALID');
                document.location.href = 'tambah-pegawai.php';
            </script>";
        die();
    }

    // jika ukuran melampaui batas maksimal
    if ($ukuranFile > 2048000) { // batas 2 mb
        echo "<script>
                alert('Ukuran Gambar Terlalu Besar');
                document.location.href = 'tambah-pegawai.php';
            </script>";
        die();
    }

    // ubah nama file yang di upload
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $extensiFoto;

    // memindahkan data yg di upload ke folder img
    move_uploaded_file($tmpName, 'assets/img/' . $namaFilebaru);
    return $namaFilebaru;
}

// fungsi hapus pegawai
function hapus_pegawai($id_pegawai)
{
    global $db;

    $query = "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

