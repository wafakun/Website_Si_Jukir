<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_pegawai WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Pegawai</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>ID</b>
							</td>
							<td>:
								<?php echo $data_cek['id']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama Lengkap</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>TTL</b>
							</td>
							<td>:
								<?php echo $data_cek['ttl']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Alamat</b>
							</td>
							<td>:
								<?php echo $data_cek['alamat']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>No HP</b>
							</td>
							<td>:
								<?php echo $data_cek['no_hp']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Pendidikan Terakhir</b>
							</td>
							<td>:
								<?php echo $data_cek['pendidikan_terakhir']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Lokasi Jukir</b>
							</td>
							<td>:
								<?php echo $data_cek['lokasi']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Masa Kerja</b>
							</td>
							<td>:
								<?php echo $data_cek['masa_kerja']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-pegawai" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-pegawai.php?id=<?php echo $data_cek['id']; ?>" target=" _blank"
					 title="Cetak Data Pegawai" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto Pegawai
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<?php echo $data_cek['id']; ?>
					-
					<?php echo $data_cek['nama']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>