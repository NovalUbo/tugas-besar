<?php include_once('../_header.php'); ?>

<div class="box">
	<h1>Kamar</h1>
	<h4>
		<small>Data Kamar</small>
		<div class="pull-right">
			<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="tambah.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		</div>
	</h4>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Tipe Kamar</th>
					<th>Fasilitas</th>
					<th>Sistem Pembayaran</th>
					<th>Id Kamar</th>
					<th><i class="glyphicon glyphicon-cog"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$sql_kamar = mysqli_query($con, "SELECT * FROM kamar") or die (mysqli_error($con));
				if(mysqli_num_rows($sql_kamar) > 0) {
					while ($data = mysqli_fetch_array($sql_kamar)) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['tipe_kamar']?></td>
							<td><?=$data['fasilitas']?></td>
							<td><?=$data['stm_byr']?></td>
							<td><?=$data['id_pemilik']?></td>
							<td>
								<a href="edd.php?id=<?=$data['id_kamar']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
								<a href="dele.php?id=<?=$data['id_kamar']?>" onclick="return confirm('Yakin akan menghapus data ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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