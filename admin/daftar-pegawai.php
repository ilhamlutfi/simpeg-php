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
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['nip']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['golongan']; ?></td>
                                        <td><?= date('d/m/Y', strtotime($data['tmk'])); ?></td>
                                        <td><?= $data['no_telepon']; ?></td>
                                        <td><?= $data['foto']; ?></td>
                                        <td width="15%" class="text-center">
                                            <a href="" class="btn btn-secondary btn-sm mb-1" title="Detail"><i class="fas fa-eye"></i></a>
                                            
                                            <button class="btn btn-success btn-sm mb-1" title="Ubah"><i class="fas fa-edit"></i></button>
                                            
                                            <a href="" class="btn btn-danger btn-sm mb-1" title="Hapus"><i class="fas fa-trash-alt"></i></a>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama Bidang</label>
                            <input type="text" name="nama" id="nama" class="form-control" required minlength="3">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-mb" data-dismiss="modal">Kembali</button>
                            <button type="submit" name="tambah" class="btn btn-primary btn-mb">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include "layout/footer.php"; ?>