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

$judul = 'Daftar Akun';

include 'layout/header.php';

// query tampil data akun untuk admin
$akun = query("SELECT * FROM akun");

// query tampil akun untuk operator
$akun_operator = query("SELECT * FROM akun WHERE id_akun = $id_akun");

// ketika tombol submit ditekan jalankan fungsi dibawah ini
if (isset($_POST['tambah'])) {
    if (tambah_akun($_POST) > 0) {
        // pesan berhasil
        echo "<script>
                alert('Data Akun Berhasil Ditambahkan'); 
                document.location.href = 'daftar-akun.php';
             </script>";
    } else {
        // pesan gagal
        echo "<script>
                alert('Data Akun Gagal Ditambahkan');
                document.location.href = 'daftar-akun.php';
             </script>";
    }
}

// ketika tombol ubah ditekan jalankan fungsi dibawah ini
if (isset($_POST['ubah'])) {
    if (ubah_akun($_POST) > 0) {
        // pesan berhasil
        echo "<script>
                alert('Data Akun Berhasil Diubah'); 
                document.location.href = 'daftar-akun.php';
             </script>";
    } else {
        // pesan gagal
        echo "<script>
                alert('Data Akun Gagal Diubah');
                document.location.href = 'daftar-akun.php';
             </script>";
    }
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Akun</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Akun</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Tabel Daftar Akun
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if ($role == 1) : ?>
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah</button>
                        <?php endif; ?>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Hak Akses</th>
                                    <th>Password</th>
                                    <th>Fungsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                <?php if ($role == 1) : ?>
                                    <!-- tampil jika login admin -->
                                    <?php foreach ($akun as $data) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['no_telepon']; ?></td>
                                            <td>
                                            	<?php if ($data['role'] == 1) : ?>
                                            		Admin
                                            	<?php else : ?>
                                            		Operator
                                            	<?php endif; ?>
                                            </td>
                                            <td>Ter-enkripsi</td>
                                            <td width="15%" class="text-center">
                                                <button class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#modalUbah<?= $data['id_akun']; ?>"><i class="fas fa-edit"></i>
                                                    Ubah</button>
                                                <?php if ($data['id_akun'] != $id_akun) : ?>
                                                <a href="hapus-akun.php?id_akun=<?= $data['id_akun']; ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin Data Akun Akan Dihapus.?');"><i class="fas fa-trash-alt"></i>
                                                    Hapus</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <!-- tampil jika login operator -->
                                    <?php foreach ($akun_operator as $data) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['no_telepon']; ?></td>
                                            <td>
                                                <?php if ($data['role'] == 1) : ?>
                                                    Admin
                                                <?php else : ?>
                                                    Operator
                                                <?php endif; ?>
                                            </td>
                                            <td>Ter-enkripsi</td>
                                            <td width="15%" class="text-center">
                                                <button class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#modalUbah<?= $data['id_akun']; ?>"><i class="fas fa-edit"></i>
                                                    Ubah</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required minlength="3">
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="number" name="no_telepon" id="no_telepon" class="form-control" required minlength="3">
                        </div>

                        <div class="form-group">
                        	<label for="role">Hak Akses</label>
                        	<select name="role" id="role" class="form-control" required>
                        		<option value="">-- pilih --</option>
                        		<option value="1">Administrator</option>
                        		<option value="2">Operator</option>
                        	</select>
                        </div>

                        <div class="form-group">
                        	<label for="password">Password</label>
                        	<input type="password" name="password" id="password" class="form-control" minlength="6" required>
                        </div>

                        <input type="checkbox" class="form-checkbox"> <small>Lihat Password</small>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-mb" data-dismiss="modal">Kembali</button>
                            <button type="submit" name="tambah" class="btn btn-primary btn-mb">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ubah -->
    <?php foreach ($akun as $data) : ?>
    	<div class="modal fade" id="modalUbah<?= $data['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Ubah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    	<input type="hidden" name="id_akun" value="<?= $data['id_akun']; ?>">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required minlength="3" value="<?= $data['nama']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="number" name="no_telepon" id="no_telepon" class="form-control" required minlength="3" value="<?= $data['no_telepon']; ?>">
                        </div>

                        <div class="form-group">
                        	<label for="role">Hak Akses</label>
                        	<select name="role" id="role" class="form-control" required>
                        		<?php $role = $data['role']; ?>
                        		<option value="1" <?= $role == '1' ? : null ?>>Administrator</option>
                        		<option value="2" <?= $role == '2' ? : null ?>>Operator</option>
                        	</select>
                        </div>

                        <div class="form-group">
                        	<label for="password">Password <small>(Masukkan Password Lama/Baru)</small></label>
                        	<input type="password" name="password" id="password<?= $data['id_akun']; ?>" class="form-control" minlength="6" required>
                        </div>

                        <input type="checkbox" class="form-checkbox show-ubah<?= $data['id_akun']; ?>"> <small>Lihat Password</small>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-mb" data-dismiss="modal">Kembali</button>
                            <button type="submit" name="ubah" class="btn btn-primary btn-mb">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('.form-checkbox').click(function() {
      if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
  });
</script>

<?php foreach ($akun as $data) : ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.show-ubah<?= $data['id_akun']; ?>').click(function() {
      if ($(this).is(':checked')) {
        $('#password<?= $data['id_akun']; ?>').attr('type', 'text');
      } else {
        $('#password<?= $data['id_akun']; ?>').attr('type', 'password');
      }
    });
  });
</script>
<?php endforeach; ?>

<?php include 'layout/footer.php'; ?>