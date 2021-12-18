<?php include_once('../_header.php'); 
$delete = mysqli_query($con, "DELETE FROM pemilik WHERE id_pemilik = '".$_GET['id']."'");
	if($delete){
		header('location: tampil.php');
	} else {
		echo 'Gagal Hapus';
	}
?>