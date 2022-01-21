<?php

$judul = "Daftar Pegawai";

include "layout/header.php";

$pegawai = query("SELECT * FROM pegawai ORDER BY id_pegawai DESC"); // query untuk menampilkan data dari tabel pegawai

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Pegawai</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Pegawai</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Daftar Pegawai
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Golongan</th>
                                    <th>TMK</th>
                                    <th>Telepon</th>
                                    <th>Foto</th>
                                    <th>Fungsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pegawai as $data) : ?>
                                    <tr>
                                        <td width="1%"><?= $no++; ?></td>
                                        <td><?= $data['nip']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['golongan']; ?></td>
                                        <td><?= date('d/m/Y', strtotime($data['tmk'])); ?></td>
                                        <td><?= $data['no_telepon']; ?></td>
                                        <td width="20%">
                                           <a href="assets/img/<?= $data['foto']; ?>">
                                                <img src="assets/img/<?= $data['foto']; ?>" alt="foto" width="100%">
                                           </a>
                                        </td>

                                        <td width="15%" class="text-center">
                                            <a href="detail-pegawai.php?id_pegawai=<?= $data['id_pegawai']; ?>" class="btn btn-secondary btn-sm mb-1" title="Detail"><i class="fas fa-eye"></i></a>
                                            
                                            <a href="ubah-pegawai.php?id_pegawai=<?= $data['id_pegawai']; ?>" class="btn btn-success btn-sm mb-1" title="Ubah"><i class="fas fa-edit"></i></a>
                                            
                                            <a href="" class="btn btn-danger btn-sm mb-1" title="Hapus" data-toggle="modal" data-target="#hapusModal<?= $data['id_pegawai']; ?>"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Hapus -->
    <?php foreach ($pegawai as $data) : ?>
        <div class="modal fade" id="hapusModal<?= $data['id_pegawai']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash-alt"></i> Hapus Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin Data Pegawai : <?= $data['nama'] ?> Akan Dihapus..?</p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <a href="hapus-pegawai.php?id_pegawai=<?= $data['id_pegawai']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>


    <?php include "layout/footer.php"; ?>