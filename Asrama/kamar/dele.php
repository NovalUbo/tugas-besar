<?php include_once('../_header.php'); 
$delete = mysqli_query($con, "DELETE FROM kamar WHERE id_kamar = '".$_GET['id']."'");
	if($delete){
		header('location: read.php');
	} else {
		echo 'Gagal Hapus';
	}
?>