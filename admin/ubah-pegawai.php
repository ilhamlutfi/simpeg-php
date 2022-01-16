<?php  

$judul = "Ubah Pegawai";

include 'layout/header.php';

// ambil id_pegawai berdasarkan tombol ubah/yang dipilih
$id_pegawai = (int)$_GET['id_pegawai'];

// tampil data pegawai berdasarkan yang dipilih
$pegawai = query("SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'")[0];

// tampil data bidang sebagai option
$bidang = query("SELECT * FROM bidang ORDER BY id_bidang DESC"); 

// ketika tombol ubah ditekan, jalankan script dibawah ini
if (isset($_POST['ubah'])) {
	if (ubah_pegawai($_POST) > 0) {
		echo "<script>
				alert('Data Pegawai Berhasil Diubah');
				document.location.href = 'daftar-pegawai.php';
			 </script>";
	} else {
		echo "<script>
				alert('Data Pegawai Gagal Diubah');
				document.location.href = 'ubah-pegawai.php';
			 </script>";
	}
}

?>

<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4"> Ubah Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Ubah Pegawai</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-edit mr-1"></i>
                Form Ubah Pegawai
            </div>
            <div class="card-body">
               <form action="" method="POST" enctype="multipart/form-data">

               	<input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
               	<input type="hidden" name="id_user" value="<?= $pegawai['id_user']; ?>">
               	<input type="hidden" name="fotoLama" value="<?= $pegawai['foto']; ?>">

	               	 <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="nip">NIP</label>
	                		<input type="number" name="nip" id="nip" class="form-control" required minlength="8" value="<?= $pegawai['nip']; ?>">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="nama">Nama</label>
	                		<input type="text" name="nama" id="nama" class="form-control" required minlength="3" value="<?= $pegawai['nama']; ?>">
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="jk">Jenis Kelamin</label>
	                		<select name="jk" id="jk" class="form-control" required>
	                			<?php $jk = $pegawai['jk']; ?>
	                			<option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
	                			<option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
	                		</select>
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="id_bidang">Bidang</label>
	                		<select name="id_bidang" id="id_bidang" class="form-control">
	                			<?php foreach ($bidang as $option) : ?>
	                				<?php if ($pegawai['id_bidang'] == $option['id_bidang']) : ?>
	                					<option value="<?= $option['id_bidang'] ?>" selected><?= $option['nama'] ?></option>
	                				<?php else : ?>
	                					<option value="<?= $option['id_bidang'] ?>"><?= $option['nama'] ?></option>
	                				<?php endif; ?>
	                			<?php endforeach; ?>
	                		</select>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="alamat">Alamat Lengkap</label>
	                		<input type="text" name="alamat" id="alamat" class="form-control" required minlength="3" value="<?= $pegawai['alamat']; ?>">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="email">Email</label>
	                		<input type="email" name="email" id="email" class="form-control" required minlength="8" value="<?= $pegawai['email']; ?>">
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="no_telepon">No Telepon</label>
	                		<input type="number" name="no_telepon" id="no_telepon" class="form-control" required minlength="8" value="<?= $pegawai['no_telepon']; ?>">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="golongan">Golongan</label>
	                		<select name="golongan" id="golongan" class="form-control" required>
	                			<?php $golongan = $pegawai['golongan']; ?>
	                			<option value="PNS" <?= $golongan == 'PNS' ? 'selected' : null ?>>PNS</option>
	                			<option value="CPNS" <?= $golongan == 'CPNS' ? 'selected' : null ?>>CPNS</option>
	                			<option value="Kontrak" <?= $golongan == 'Kontrak' ? 'selected' : null ?>>Kontrak</option>
	                			<option value="PHL" <?= $golongan == 'PHL' ? 'selected' : null ?>>PHL</option>
	                		</select>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="gaji">Gaji</label>
	                		<input type="number" name="gaji" id="gaji" class="form-control" required minlength="6" value="<?= $pegawai['gaji']; ?>">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="status">Status</label>
	                		<select name="status" id="status" class="form-control" required>
	                			<?php $status = $pegawai['status']; ?>
	                			<option value="Menikah" <?= $status == 'Menikah' ? 'selected' : null?>>Menikah</option>
	                			<option value="Belum Menikah" <?= $status == 'Belum Menikah' ? 'selected' : null?>>Belum Menikah</option>
	                		</select>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="tmk">Terhitung Masa Kerja</label>
	                		<input type="date" name="tmk" id="tmk" class="form-control" required minlength="6" value="<?= $pegawai['tmk']; ?>">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="foto">Foto <small>(Max 2 MB</small></label><br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()">
                                <label class="custom-file-label" for="foto">Pilih foto...</label>
                            </div>
                            <div class="mt-1">
                                <img src="assets/img/<?= $pegawai['foto']; ?>" alt="" class="img-thumbnail img-preview" width="100px">
                            </div>
	                	</div>
	                </div>

					<div class="float-right">
	                	<button type="submit" name="ubah" class="btn btn-primary"><i class="fas fa-edit"></i> Ubah</button>
					</div>

               </form>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function previewImg() {
        const gambar = document.querySelector('#foto');
        const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include 'layout/footer.php'; ?>