<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pegawai WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">id</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="id" name="id" placeholder="ID" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="ttl" name="ttl" placeholder="TTL" required>
				</div>
			</div>

			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No HP</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
				<div class="col-sm-4">
					<select name="pendidikan terakhir" id="pendidikan terakhir" class="form-control">
						<option value="">-- Pilih --</option>
						<?php
                //cek data yg dipilih sebelumnya
                if ($data_cek['status'] == "SD") echo "<option value='SD' selected>SD</option>";
                else echo "<option value='SD'>SD</option>";

                if ($data_cek['status'] == "SMP") echo "<option value='SMP' selected>SMP</option>";
                else echo "<option value='SMP'>SMP</option>";
				
				if ($data_cek['status'] == "SMA") echo "<option value='SMA' selected>SMA</option>";
                else echo "<option value='SMA'>SMA</option>";
            			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Lokasi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="lokasi jukir" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Masa Kerja</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="masa kerja" name="masa kerja" placeholder="Masukan Tahun" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Pegawai</label>
				<div class="col-sm-6">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Foto</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pegawai" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_pegawai SET
			id='".$_POST['id']."',
			nama='".$_POST['nama']."',
			ttl='".$_POST['ttl']."',
			alamat='".$_POST['alamat']."',
			no_hp='".$_POST['no_hp']."',
			pendidikan terakhir='".$_POST['pendidikan terakhir']."',
			lokasi='".$_POST['lokasi']."',
			masa kerja=".$_POST['masa kerja']."',
			foto='".$nama_file."'		
            WHERE id='".$_POST['id']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tb_pegawai SET
			id='".$_POST['id']."',
			nama='".$_POST['nama']."',
			ttl='".$_POST['ttl']."',
			alamat='".$_POST['alamat']."',
			no_hp='".$_POST['no_hp']."',
			pendidikan terakhir='".$_POST['pendidikan terakhir']."',
			lokasi='".$_POST['lokasi']."',
			masa kerja=".$_POST['masa kerja']."',
			foto='".$nama_file."'		
            WHERE id='".$_POST['id']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pegawai';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pegawai';
            }
        })</script>";
    }
}

