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
    $nama_bidang = htmlspecialchars($post['nama_bidang']);

    // query tambah data
    $query = "INSERT INTO bidang VALUES(null, '$nama_bidang', CURRENT_TIMESTAMP)";

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
    $id_bidang      = $post['id_bidang'];
    $nama_bidang    = htmlspecialchars($post['nama_bidang']);

    // query ubah data
    $query = "UPDATE bidang SET nama_bidang = '$nama_bidang' WHERE id_bidang = $id_bidang";

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

// fungsi ubah pegawai
function ubah_pegawai($post)
{
    global $db;

    $id_pegawai = strip_tags($post['id_pegawai']);
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
    $fotoLama   = $post['fotoLama'];

    // check foto di ubah atau tidak
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama; // jika tidak pakai foto lama
    } else {
        $foto = upload_foto_pegawai(); // jika diubah pakai foto baru
    }

    // buat query tambah data
    $query = "UPDATE pegawai SET id_bidang = '$id_bidang', nip = '$nip', nama = '$nama', jk = '$jk', alamat = '$alamat', email = '$email', no_telepon = '$no_telepon', golongan = '$golongan', gaji = '$gaji', status = '$status', tmk = '$tmk', foto = '$foto', id_user = '$id_user' WHERE id_pegawai = $id_pegawai";

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
                document.location.href = 'daftar-pegawai.php';
            </script>";
        die();
    }

    // jika ukuran melampaui batas maksimal
    if ($ukuranFile > 2048000) { // batas 2 mb
        echo "<script>
                alert('Ukuran Gambar Terlalu Besar');
                document.location.href = 'daftar-pegawai.php';
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

// ---------------------------------------------------------------------------

// fungsi tambah akun
function tambah_akun($post) 
{
    // panggil koneksi ke database
    global $db;

    // ambil input user
    $nama       = htmlspecialchars($post['nama']);
    $no_telepon = htmlspecialchars($post['no_telepon']);
    $password   = htmlspecialchars($post['password']);
    $role       = htmlspecialchars($post['role']);

    // enkripsi password ke database
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$no_telepon', '$password', '$role')";

    // simpan query ke database
    mysqli_query($db, $query);

    // check kolom yang bertambah
    return mysqli_affected_rows($db);
}

// fungsi hapus akun
function hapus_akun($id_akun)
{
    global $db;

    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi ubah akun
function ubah_akun($post) 
{
    // panggil koneksi ke database
    global $db;

    // ambil input user
    $nama       = htmlspecialchars($post['nama']);
    $no_telepon = htmlspecialchars($post['no_telepon']);
    $password   = htmlspecialchars($post['password']);
    $role       = htmlspecialchars($post['role']);
    $id_akun    = $post['id_akun'];

    // enkripsi password ke database
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query ubah data
    $query = "UPDATE akun SET nama = '$nama', no_telepon = '$no_telepon', role = '$role', password = '$password' WHERE id_akun = $id_akun";

    // simpan query ke database
    mysqli_query($db, $query);

    // check kolom yang bertambah
    return mysqli_affected_rows($db);
}

