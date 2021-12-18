<?php include_once('../_header.php'); ?>

<div class="box">
	<h1>Pemilik</h1>
	<h4>
		<small>Data Pemilik</small>
		<div class="pull-right">
			<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		</div>
	</h4>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Pemilik</th>
					<th>Alamat</th>
					<th>Foto Kos</th>
					<th>Biaya</th>
					<th><i class="glyphicon glyphicon-cog"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$sql_pemilik = mysqli_query($con, "SELECT * FROM pemilik") or die (mysqli_error($con));
				if(mysqli_num_rows($sql_pemilik) > 0) {
					while ($data = mysqli_fetch_array($sql_pemilik)) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['nama_pemilik']?></td>
							<td><?=$data['alamat']?></td>
							<td><img src="../foto_kos/<?=$data['foto_kos']?>" width="150px" height="90px"></td>
							<td><?=$data['biaya']?></td>
							<td>
								<a href="edit.php?id=<?=$data['id_pemilik']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
								<a href="del.php?id=<?=$data['id_pemilik']?>" onclick="return confirm('Yakin akan menghapus data ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php
					}
				}else{
					echo "<tr><td cosplan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php include_once('../_footer.php'); ?>