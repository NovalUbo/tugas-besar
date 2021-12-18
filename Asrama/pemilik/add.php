<?php include_once('../_header.php'); ?>

<div class="box">
	<h1>Pemilik</h1>
	<h4>
		<small>Tambah Data Pemilik</small>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label" for="nama_pemilik"> Nama Pemilik</label>
					<input type="text" name="nama_pemilik" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="nama_pemilik"> Alamat</label>
					<input type="text" name="alamat" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="nama_pemilik"> Foto Kos</label>
					<input type="file" name="foto_kos" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="nama_pemilik"> Biaya</label>
					<input type="text" name="biaya" class="form-control" required>
				</div>
				<div>
					<input type="submit" name="simpan" value="simpan" class="btn btn-success">
				</div>
			</form>
				<?php
				if(isset($_POST['simpan'])){
					$nama_pemilik = $_POST['nama_pemilik'];
					$alamat = $_POST['alamat'];
					$foto_kos = $_FILES['foto_kos']['name'];
					$source = $_FILES['foto_kos']['tmp_name'];
					$folder = '../foto_kos/';
					$biaya = $_POST['biaya'];

					move_uploaded_file($source, $folder.$foto_kos);
					$insert = mysqli_query($con, "INSERT INTO pemilik VALUES (null, '$nama_pemilik', '$alamat', '$foto_kos', '$biaya')");

					if($insert) {
						header('location: tampil.php');
					} else {
						echo 'Gagal Upload';
					}
				}
				?>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>