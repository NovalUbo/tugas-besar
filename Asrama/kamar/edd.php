<?php include_once('../_header.php');

$data = mysqli_query($con, "SELECT * FROM kamar WHERE id_kamar = '".$_GET['id']."'");
$r = mysqli_fetch_array($data);

$tipe_kamar = $r['tipe_kamar'];
$fasilitas = $r['fasilitas'];
$stm_byr = $r['stm_byr'];
$id_pemilik = $r['id_pemilik'];
?>

<div class="box">
	<h1>Kamar</h1>
	<h4>
		<small>Edit Data Kamar</small>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label" for="tipe_kamar"> Tipe Kamar</label>
					<input type="text" name="tipe_kamar" class="form-control" value="<?=$tipe_kamar?>" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="tipe_kamar"> Fasilitas</label>
					<input type="text" name="fasilitas" class="form-control" value="<?=$fasilitas?>" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="tipe_kamar"> Sistem Pembayaran</label>
					<input type="text" name="stm_byr" class="form-control" value="<?=$stm_byr?>" required>
				</div>

				<div class="form-group">
					<label class="control-label" for="tipe_kmr"> ID Pemilik</label>
					<div class="control-label">
						<select name="id_pemilik" class="form-control" readonly>
							<option readonly>Pilih Pemilik</option>
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
    			if(isset($_POST['simpan'])) {
    		 	$tipe_kamar = $_POST['tipe_kamar'];
    			$fasilitas = $_POST['fasilitas'];
    			$stm_byr = $_POST['stm_byr'];
    			$id_pemilik = $_POST['id_pemilik'];
  
    			$update = mysqli_query($con, "UPDATE kamar SET 
      			tipe_kamar = '".$tipe_kamar."',
      			fasilitas = '".$fasilitas."',
      			stm_byr = '".$stm_byr."',
      			id_pemilik = '".$id_pemilik."'
      			WHERE id_kamar = '".$_GET['id']."'
      			");
    			if($update){
      			header('location: read.php');
    			} else {
      			echo 'Gagal Update';
    			} 
  				}
			?>

		</div>
	</div>
</div>


<?php include_once('../_footer.php');?>