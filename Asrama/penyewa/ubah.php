<?php include_once('../_header.php');

$data = mysqli_query($con, "SELECT * FROM penyewa WHERE no_ktp = '".$_GET['id']."'");
$r = mysqli_fetch_array($data);

$no_ktp = $r['no_ktp'];
$nama = $r['nama'];
$no_hp = $r['no_hp'];
$kesanggupan_membayar = $r['kesanggupan_membayar'];
$peraturan_kos = $r['peraturan_kos'];
$id_kamar = $r['id_kamar'];
?>

<div class="box">
	<h1>Penyewa</h1>
	<h4>
		<small>Edit Data Penyewa</small>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="" method="post">
				<div class="form-group">
					<label class="control-label" for="no_ktp"> No KTP</label>
					<input type="text" name="no_ktp" class="form-control" value="<?=$no_ktp?>" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="no_ktp"> Nama Penyewa</label>
					<input type="text" name="nama" class="form-control" value="<?=$nama?>" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="no_ktp"> No Telpon</label>
					<input type="text" name="no_hp" class="form-control" value="<?=$no_hp?>" required>
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
					<input type="text" name="peraturan_kos" class="form-control" value="<?=$peraturan_kos?>" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="no_ktp"> ID Kamar</label>
					<div class="control-label">
						<select name="id_kamar" class="form-control" readonly>
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
    			if(isset($_POST['simpan'])) {
    		 	$no_ktp = $_POST['no_ktp'];
    			$nama = $_POST['nama'];
    			$no_hp = $_POST['no_hp'];
    			$kesanggupan_membayar = $_POST['kesanggupan_membayar'];
    			$peraturan_kos = $_POST['peraturan_kos'];
    			$id_kamar = $_POST['id_kamar'];
  
    			$update = mysqli_query($con, "UPDATE penyewa SET 
      			no_ktp = '".$no_ktp."',
      			nama = '".$nama."',
      			no_hp = '".$no_hp."',
      			kesanggupan_membayar = '".$kesanggupan_membayar."',
      			peraturan_kos = '".$peraturan_kos."',
      			id_kamar = '".$id_kamar."'
      			WHERE no_ktp = '".$_GET['id']."'
      			");
    			if($update){
      			header('location: view.php');
    			} else {
      			echo 'Gagal Update';
    			} 
  				}
			?>
		</div>
	</div>	
</div>




<?php include_once('../_footer.php');?>