<?php include_once('../_header.php'); ?>

<div class="box">
	<h1>Penyewa</h1>
	<h4>
		<small>Data Penyewa</small>
		<div class="pull-right">
			<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="create.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		</div>
	</h4>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>No KTP</th>
					<th>Nama Penyewa</th>
					<th>No Telpon</th>
					<th>Kesanggupan Membayar</th>
					<th>Peraturan Kos</th>
					<th>ID Kamar</th>
					<th><i class="glyphicon glyphicon-cog"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$sql_penyewa = mysqli_query($con, "SELECT * FROM Penyewa") or die (mysqli_error($con));
				if(mysqli_num_rows($sql_penyewa) > 0) {
					while ($data = mysqli_fetch_array($sql_penyewa)) { ?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['no_ktp']?></td>
							<td><?=$data['nama']?></td>
							<td><?=$data['no_hp']?></td>
							<td><?=$data['kesanggupan_membayar']?></td>
							<td><?=$data['peraturan_kos']?></td>
							<td><?=$data['id_kamar']?></td>
							<td>
								<a href="ubah.php?id=<?=$data['no_ktp']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
								<a href="hapus.php?id=<?=$data['no_ktp']?>" onclick="return confirm('Yakin akan menghapus data ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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