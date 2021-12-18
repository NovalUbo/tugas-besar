<?php include_once('../_header.php'); ?>

<div class="box">
	<h1>Penyewa</h1>
	<h4>
		<small>Tambah Data Penyewa</small>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="" method="post">
				<div class="form-group">
					<label class="control-label" for="no_ktp"> No KTP</label>
					<input type="text" name="no_ktp" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="no_ktp"> Nama Penyewa</label>
					<input type="text" name="nama" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="no_ktp"> No Telpon</label>
					<input type="text" name="no_hp" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="no_ktp"> Kesanggupan Membayar</label>
					<br>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-info" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="kesanggupan_membayar" value="Cash" required > Cash
						</label>
						<label class="btn btn-danger" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="kesanggupan_membayar" value="Cicil" required> Cicil
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" for="no_ktp"> Peraturan Kos</label>
					<input type="text" name="peraturan_kos" class="form-control" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="no_ktp"> ID Kamar</label>
					<div class="control-label">
						<select name="id_kamar" class="form-control">
							<option>Pilih Kamar</option>
							<?php
							$sql_kamar = mysqli_query($con, "SELECT * FROM kamar ") or die (mysqli_error($con));
							while ($data_kamar = mysqli_fetch_array($sql_kamar)) {
								echo '<option velue="'.$data_kamar['id_kamar'].'">'.$data_kamar['id_kamar'].'</option>';
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
					$no_ktp = $_POST['no_ktp'];
					$nama = $_POST['nama'];
					$no_hp = $_POST['no_hp'];
					$kesanggupan_membayar = $_POST['kesanggupan_membayar'];
					$peraturan_kos = $_POST['peraturan_kos'];
					$id_kamar = $_POST['id_kamar'];

					$upload = mysqli_query($con, "INSERT INTO penyewa VALUES ('$no_ktp', '$nama', '$no_hp', '$kesanggupan_membayar', '$peraturan_kos', '$id_kamar')");

					if ($upload) {
						header('location: user/tampilpenyewa.php');
					} else{
						echo 'Gagal Upload';
					}
				}
			?>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>