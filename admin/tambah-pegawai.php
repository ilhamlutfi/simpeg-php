<?php  

$judul = "Tambah Pegawai";

include 'layout/header.php';

// tampil data bidang sebagai option
$bidang = query("SELECT * FROM bidang ORDER BY id_bidang DESC"); 

?>

<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Pegawai</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user-plus mr-1"></i>
                Form Tambah Pegawai
            </div>
            <div class="card-body">
               <form action="" method="POST" enctype="multipart/form-data">
	               	 <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="nip">NIP</label>
	                		<input type="number" name="nip" id="nip" class="form-control" required minlength="8">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="nama">Nama</label>
	                		<input type="text" name="nama" id="nama" class="form-control" required minlength="3">
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="jk">Jenis Kelamin</label>
	                		<select name="jk" id="jk" class="form-control">
	                			<option value="">-- pilih --</option>
	                			<option value="Laki-Laki">Laki-Laki</option>
	                			<option value="Perempuan">Perempuan</option>
	                		</select>
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="id_bidang">Bidang</label>
	                		<select name="id_bidang" id="id_bidang" class="form-control">
	                			<option value="">-- pilih --</option>
	                			<?php foreach ($bidang as $option) : ?>
	                				<option value="<?= $option['id_bidang'] ?>"><?= $option['nama'] ?></option>
	                			<?php endforeach; ?>
	                		</select>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="alamat">Alamat Lengkap</label>
	                		<input type="text" name="alamat" id="alamat" class="form-control" required minlength="3">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="email">Email</label>
	                		<input type="email" name="email" id="email" class="form-control" required minlength="8">
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="no_telepon">No Telepon</label>
	                		<input type="number" name="no_telepon" id="no_telepon" class="form-control" required minlength="8">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="golongan">Golongan</label>
	                		<select name="golongan" id="golongan" class="form-control" required>
	                			<option value="">pilih</option>
	                			<option value="PNS">PNS</option>
	                			<option value="CPNS">CPNS</option>
	                			<option value="Kontrak">Kontrak</option>
	                			<option value="PHL">PHL</option>
	                		</select>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="gaji">Gaji</label>
	                		<input type="number" name="gaji" id="gaji" class="form-control" required minlength="6">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="status">Status</label>
	                		<select name="status" id="status" class="form-control" required>
	                			<option value="">pilih</option>
	                			<option value="Menikah">Menikah</option>
	                			<option value="Belum Menikah">Belum Menikah</option>
	                		</select>
	                	</div>
	                </div>

	                <div class="row">
	                	<div class="form-group col-sm-6">
	                		<label for="tmk">Terhitung Masa Kerja</label>
	                		<input type="date" name="tmk" id="tmk" class="form-control" required minlength="6">
	                	</div>

	                	<div class="form-group col-sm-6">
	                		<label for="foto">Foto <small>(Max 2 MB</small></label><br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()" required>
                                <label class="custom-file-label" for="foto">Pilih foto...</label>
                            </div>
                            <div class="mt-1">
                                <img src="" alt="" class="img-thumbnail img-preview" width="100px">
                            </div>
	                	</div>
	                </div>

					<div class="float-right">
	                	<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
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