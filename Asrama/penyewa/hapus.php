<?php include_once('../_header.php'); 
$delete = mysqli_query($con, "DELETE FROM penyewa WHERE no_ktp = '".$_GET['id']."'");
	if($delete){
		header('location: view.php');
	} else {
		echo 'Gagal Hapus';
	}
?>