<?php include_once('../_header.php'); ?>

 <div class="row">
    <div class="col-lg-12">
        <h1>Haii,, <mark><?=$_SESSION['user']; ?></mark></h1>
        <h4>
           <small>Daftar Kamar Kos</small>
        </h4>
    </div>
</div>

<div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
         <thead>
            <tr>
               <th>No.</th>
               <th>Nama Pemilik</th>
               <th>Alamat</th>
               <th>Foto Kos</th>
               <th>Tipe Kamar</th>
               <th>Fasilitas</th>
               <th>Sistem Pembayaran</th>
               <th>Biaya Kamar</th>
               <th><i class="glyphicon glyphicon-cog"></i> Opsi</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $no = 1;
            $sql_lihat = mysqli_query($con, "SELECT * FROM kamar INNER JOIN pemilik ON kamar.id_pemilik = pemilik.id_pemilik") or die (mysqli_error($con));
            if(mysqli_num_rows($sql_lihat) > 0) {
               while ($data = mysqli_fetch_array($sql_lihat)) { ?>
                  <tr>
                     <td><?=$no++?>.</td>
                     <td><?=$data['nama_pemilik']?></td>
                     <td><?=$data['alamat']?></td>
                     <td><img src="../foto_kos/<?=$data['foto_kos']?>" width="150px" height="90px"></td>
                     <td><?=$data['tipe_kamar']?></td>
                     <td><?=$data['fasilitas']?></td>
                     <td><?=$data['stm_byr']?></td>
                     <td><?=$data['biaya']?></td>
                     <td>
                        <a href="<?=base_url('penyewa/create.php')?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Sewa</a>
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

<?php include_once('../_footer.php'); ?>