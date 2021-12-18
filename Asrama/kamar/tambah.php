<?php include_once('../_header.php'); ?>

<div class="box">
	<h1>Kamar</h1>
	<h4>
		<small>Tambah Data Kamar</small>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="" method="post">
				<div class="form-group">
					<label class="control-label" for="tipe_kamar"> Tipe Kamar</label>
					<input type="text" name="tipe_kamar" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="tipe_kamar"> Fasilitas</label>
					<input type="text" name="fasilitas" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="tipe_kamar"> Sistem Pembayaran</label>
					<input type="text" name="stm_byr" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="tipe_kmr"> ID Pemilik</label>
					<div class="control-label">
						<select name="id_pemilik" class="form-control">
							<option>Pilih Pemilik</option>
							<?php
							$sql_pemilik = mysqli_query($con, "SELECT * FROM pemilik") or die (mysqli_error($con));
							while ($data_pemilik = mysqli_fetch_array($sql_pemilik)) {
								echo '<option velue="'.$data_pemilik['id_pemilik'].'">'.$data_pemilik['id_pemilik'].'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div>
					<input type="submit" name="simpan" value="simpan" class="btn btn-success">
				</div>
			</form>
			<?php
				if(isset($_POST['simpan'])){
					$tipe_kamar = $_POST['tipe_kamar'];
					$fasilitas = $_POST['fasilitas'];
					$stm_byr = $_POST['stm_byr'];
					$id_pemilik = $_POST['id_pemilik'];

					$insert = mysqli_query($con, "INSERT INTO kamar VALUES (null, '$tipe_kamar', '$fasilitas', '$stm_byr', '$id_pemilik')");

					if($insert) {
						header('location: read.php');
					} else {
						echo 'Gagal Upload';
					}
				}
				?>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>