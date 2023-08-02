<?php
	include "../inc/koneksi.php";
	
	$id = $_GET['id'];

	$sql_cek = "SELECT * FROM tb_profil";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	{
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK DATA PEGAWAI</title>
</head>

<body>
	<center>

		<h2>
			<?php echo $data_cek['nama_profil']; ?>
		</h2>
		<h3>
			<?php echo $data_cek['alamat']; ?>
			<hr / size="2px" color="black">

			<?php
			}

			$sql_tampil = "select * from tb_pegawai where id='$id'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>DATA PEGAWAI</u>
		</h4>
	</center>

	<table border="1" cellspacing="0" style="width: 85%" align="center">
		<tbody>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td>
					<?php echo $data['id']; ?>
				</td>
				<td rowspan="8" align="center">
					<img src="../foto/<?php echo $data['foto']; ?>" width="150px" />
				</td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>TTL</td>
				<td>:</td>
				<td>
					<?php echo $data['ttl']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat']; ?>
				</td>
			</tr>
			<tr>
				<td>No HP</td>
				<td>:</td>
				<td>
					<?php echo $data['no_hp']; ?>
				</td>
			</tr>
			<tr>
				<td>Pendidikan Terakhir</td>
				<td>:</td>
				<td>
					<?php echo $data['pendidikan_terakhir']; ?>
				</td>
			</tr>
			<tr>
				<td>Lokasi Jukir</td>
				<td>:</td>
				<td>
					<?php echo $data['lokasi']; ?>
				</td>
			</tr>
			<tr>
				<td>Masa Kerja</td>
				<td>:</td>
				<td>
					<?php echo $data['masa_kerja']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>


	<script>
		window.print();
	</script>

</body>

</html>