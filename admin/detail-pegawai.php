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

$judul = "Detail Pegawai";

include 'layout/header.php';

// ambil id_pegawai berdasarkan tombol ubah/yang dipilih
$id_pegawai = (int)$_GET['id_pegawai'];

// tampil data pegawai berdasarkan yang dipilih
$pegawai = query("SELECT * FROM pegawai INNER JOIN bidang 
ON pegawai.id_bidang = bidang.id_bidang WHERE id_pegawai = '$id_pegawai'")[0];

?>

<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4"> Detail Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail Pegawai</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user mr-1"></i>
                Detail Pegawai
            </div>
            <div class="card-body">
               <table class="table table-bordered table-striped">
               		<tr>
               			<td>Bidang</td>
               			<td>: <?= $pegawai['nama_bidang']; ?></td>
               			<td>Foto</td>
               			<td width="25%"><img src="assets/img/<?= $pegawai['foto']; ?>" alt="foto" width="100%"></td>
               		</tr>

               		<tr>
               			<td>NIP</td>
               			<td>: <?= $pegawai['nip']; ?></td>
               			<td>Nama</td>
               			<td>: <?= $pegawai['nama']; ?></td>
               		</tr>

               		<tr>
               			<td>Jenis Kelamin</td>
               			<td>: <?= $pegawai['jk']; ?></td>
               			<td>Alamat</td>
               			<td>: <?= $pegawai['alamat']; ?></td>
               		</tr>
               		<tr>
               			<td>Email</td>
               			<td>: <?= $pegawai['email']; ?></td>
               			<td>No Telepon</td>
               			<td>: <?= $pegawai['no_telepon']; ?></td>
               		</tr>

               		<tr>
               			<td>Golongan</td>
               			<td>: <?= $pegawai['golongan']; ?></td>
               			<td>Gaji</td>
               			<td>: Rp. <?= number_format($pegawai['gaji'], 0, '.', '.'); ?></td>
               		</tr>
               		<tr>
               			<td>Status</td>
               			<td>: <?= $pegawai['status']; ?></td>
               			<td>Terhitung Masa Kerja</td>
               			<td>: <?= date('d/m/Y', strtotime($pegawai['tmk'])); ?></td>
               		</tr>
               </table>
               <div class="float-right">
               	<a href="daftar-pegawai.php" class="btn btn-secondary">Kembali</a>
               </div>
            </div>
        </div>
    </div>
</main>



<?php include 'layout/footer.php'; ?>