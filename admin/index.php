<?php

$judul = "Dashboard"; // $judul menyimpan judul halaman masing-masing

include "layout/header.php";

// ambil seluruh data bidang untuk dihitung
$bidang = query("SELECT * FROM bidang");

// ambil seluruh data pegawai untuk dihitung
$pegawai = query("SELECT * FROM pegawai");

// ambil seluruh data akun untuk dihitung
$akun = query("SELECT * FROM akun");

$pegawai_terbaru = query("SELECT * FROM pegawai ORDER BY id_pegawai DESC LIMIT 0, 3");

?>

<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Bidang : <?= count($bidang); ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="daftar-bidang.php">Lihat</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Total Pegawai : <?= count($pegawai); ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="daftar-pegawai.php">Lihat</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Akun : <?= count($pegawai); ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="daftar-akun.php">Lihat</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Donwload Laporan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="download-laporan.php">Download</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pegawai_terbaru as $data) : ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data['nip']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['jk']; ?></td>
                                <td><?= $data['no_telepon']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include "layout/footer.php" ?>