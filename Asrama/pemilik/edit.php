<?php include_once('../_header.php'); 

$data = mysqli_query($con, "SELECT * FROM pemilik WHERE id_pemilik = '".$_GET['id']."'");
$r = mysqli_fetch_array($data);

$nama_pemilik = $r['nama_pemilik'];
$alamat = $r['alamat'];
$foto_kos = $r['foto_kos'];
$biaya = $r['biaya'];
?>


<div class="box">
	<h1>Pemilik</h1>
	<h4>
		<small>Edit Data Pemilik</small>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label" for="nama_pemilik"> Nama Pemilik</label>
					<input type="text" name="nama_pemilik" class="form-control" value="<?=$nama_pemilik?>" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="nama_pemilik"> Alamat</label>
					<input type="text" name="alamat" class="form-control" value="<?=$alamat?>" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="nama_pemilik"> Foto Kos</label>
					<input type="file" name="foto_kos" class="form-control" value="<?=$foto_kos?>" required>
				</div>
				<div class="form-group">
					<label class="control-label" for="nama_pemilik"> Biaya</label>
					<input type="text" name="biaya" class="form-control" value="<?=$biaya?>" required>
				</div>
				<div>
					<input type="submit" name="simpan" value="simpan" class="btn btn-success">
				</div>
			</form>
			<?php
    			if(isset($_POST['simpan'])) {
    		 	$nama_pemilik = $_POST['nama_pemilik'];
    			$alamat = $_POST['alamat'];
    			$foto_kos = $_FILES['foto_kos']['name'];
    			$source = $_FILES['foto_kos']['tmp_name'];
    			$folder = '../foto_kos/';
    			$biaya = $_POST['biaya'];
  
    			if($foto_kos != ''){
    			move_uploaded_file($source, $folder.$foto_kos);
    			$update = mysqli_query($con, "UPDATE pemilik SET 
      			nama_pemilik = '".$nama_pemilik."',
      			alamat = '".$alamat."',
      			foto_kos = '".$foto_kos."',
      			biaya = '".$biaya."'
      			WHERE id_pemilik = '".$_GET['id']."'
      			");
    			if($update){
      			header('location: tampil.php');
      			} else {
      			echo 'Gagal Update';
      			}
    			} else {
    			$update = mysqli_query($con, "UPDATE pemilik SET 
      			nama_pemilik = '".$nama_pemilik."',
      			alamat = '".$alamat."',
      			biaya = '".$biaya."'
      			WHERE id_pemilik = '".$_GET['id']."'
      			");
    			if($update){
      			header('location: tampil.php');
    			} else {
      			echo 'Gagal Update';
    			} 
  				}

				}
			?>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>