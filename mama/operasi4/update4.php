<?php 
$Siswa_id_SiswaErr = $nama_lengkapErr = $alamatErr = $pekerjaanErr = $tempat_tanggal_lahirErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['Siswa_id_Siswa']) || !isset($_POST['nama_lengkap']) || !isset($_POST['alamat']) || !isset($_POST['pekerjaan']) || !$_POST['tempat_tanggal_lahir']){
		if($_POST['Siswa_id_Siswa'] == ""){
		$NamaErr = "Siswa_id_Siswa tidak boleh kosong!";
		}
		if($_POST['nama_lengkap'] == ""){
			$nama_lengkapErr = "NIM tidak boleh kosong!";
		}
		if($_POST['alamat'] == ""){
			$alamatErr = "alamat tidak boleh kosong!";
		}
		if($_POST['pekerjaan'] == ""){
			$pekerjaanErr = "pekerjaan tidak boleh kosong!";
		}
		if($_POST['tempat_tanggal_lahir'] == ""){
			$tempat_tanggal_lahirErr = "Alamat tidak boleh kosong!";
		}
	}else{
		$id_orang_tua = $_GET['id_orang_tua'];
		$Siswa_id_Siswa = $_POST['Siswa_id_Siswa'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$alamat = $_POST['alamat'];
		$pekerjaan = $_POST['pekerjaan'];
		$tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir'];

		$query = "INSERT INTO orang_tua (Siswa_id_Siswa,nama_lengkap,alamat,pekerjaan,tempat_tanggal_lahir) VALUES('$Siswa_id_Siswa', '$nama_lengkap', '$alamat', '$pekerjaan', '$tempat_tanggal_lahir')";
		$query = "UPDATE orang_tua SET Siswa_id_Siswa='$Siswa_id_Siswa', nama_lengkap='$nama_lengkap', alamat='$alamat', pekerjaan='$pekerjaan', tempat_tanggal_lahir='$tempat_tanggal_lahir' WHERE id_orang_tua=$id_orang_tua";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_orang_tua = $_GET['id_orang_tua'];
$query = "SELECT * FROM orang_tua WHERE id_orang_tua = $id_orang_tua";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>index4.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputSiswa_id_Siswa">Siswa_id_Siswa</label>
			<input type="text" name="Siswa_id_Siswa" class="form-control" id="inputSiswa_id_Siswa" value="<?= $data['Siswa_id_Siswa'] ?>" maxlength="40" required autofocus>
			<small class="text-danger"><?= $Siswa_id_SiswaErr == "" ? "":"* $Siswa_id_SiswaErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputnama_lengkap">nama_lengkap</label>
			<input type="nama_lengkap" name="nama_lengkap" class="form-control" id="inputnama_lengkap" value="<?= $data['nama_lengkap'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $nama_lengkapErr == "" ? "":"* $nama_lengkapErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputalamat">alamat</label>
			<input type="alamat" name="alamat" class="form-control" id="inputalamat" value="<?= $data['alamat'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $alamatErr == "" ? "":"* $alamatErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputpekerjaan">pekerjaan</label>
			<input type="pekerjaan" name="pekerjaan" class="form-control" id="inputpekerjaan" value="<?= $data['pekerjaan'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $pekerjaanErr == "" ? "":"* $pekerjaanErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputtempat_tanggal_lahir">tempat_tanggal_lahir</label>
			<input type="text" name="tempat_tanggal_lahir" class="form-control" id="inputtempat_tanggal_lahir" value="<?= $data['tempat_tanggal_lahir'] ?>" maxlength="40" required>
			<small class="text-danger"><?= $tempat_tanggal_lahirErr == "" ? "":"* $tempat_tanggal_lahirErr " ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>