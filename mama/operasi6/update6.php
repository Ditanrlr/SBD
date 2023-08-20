<?php 
$Siswa_id_SiswaErr = $Nama_siswaErr = $nama_ekstrakulikulerErr = $tingkat_kelasErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['Siswa_id_Siswa']) || !isset($_POST['Nama_siswa']) || !isset($_POST['nama_ekstrakulikuler']) || !$_POST['tingkat_kelas']){
		if($_POST['Siswa_id_Siswa'] == ""){
		$NamaErr = "Siswa_id_Siswa tidak boleh kosong!";
		}
		if($_POST['Nama_siswa'] == ""){
			$Nama_siswaErr = "NIM tidak boleh kosong!";
		}
		if($_POST['nama_ekstrakulikuler'] == ""){
			$nama_ekstrakulikulerErr = "nama_ekstrakulikuler tidak boleh kosong!";
		}
		if($_POST['tingkat_kelas'] == ""){
			$tingkat_kelasErr = "tingkat_kelas tidak boleh kosong!";
		}
	}else{
		$id_ekstrakulikuler = $_GET['id_ekstrakulikuler'];
		$Siswa_id_Siswa = $_POST['Siswa_id_Siswa'];
		$Nama_siswa = $_POST['Nama_siswa'];
		$nama_ekstrakulikuler = $_POST['nama_ekstrakulikuler'];
		$tingkat_kelas = $_POST['tingkat_kelas'];

		$query = "INSERT INTO ekstrakulikuler (Siswa_id_Siswa,Nama_siswa,nama_ekstrakulikuler,tingkat_kelas) VALUES('$Siswa_id_Siswa', '$Nama_siswa', '$nama_ekstrakulikuler', '$tingkat_kelas')";
		$query = "UPDATE ekstrakulikuler SET Siswa_id_Siswa='$Siswa_id_Siswa', Nama_siswa='$Nama_siswa', nama_ekstrakulikuler='$nama_ekstrakulikuler', tingkat_kelas='$tingkat_kelas' WHERE id_ekstrakulikuler=$id_ekstrakulikuler";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_ekstrakulikuler = $_GET['id_ekstrakulikuler'];
$query = "SELECT * FROM ekstrakulikuler WHERE id_ekstrakulikuler = $id_ekstrakulikuler";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>index6.php" class="btn btn-warning mb-3">
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
			<label for="inputNama_siswa">Nama_siswa</label>
			<input type="Nama_siswa" name="Nama_siswa" class="form-control" id="inputNama_siswa" value="<?= $data['Nama_siswa'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $Nama_siswaErr == "" ? "":"* $Nama_siswaErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputnama_ekstrakulikuler">nama_ekstrakulikuler</label>
			<input type="nama_ekstrakulikuler" name="nama_ekstrakulikuler" class="form-control" id="inputnama_ekstrakulikuler" value="<?= $data['nama_ekstrakulikuler'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $nama_ekstrakulikulerErr == "" ? "":"* $nama_ekstrakulikulerErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputtingkat_kelas">tingkat_kelas</label>
			<input type="tingkat_kelas" name="tingkat_kelas" class="form-control" id="inputtingkat_kelas" value="<?= $data['tingkat_kelas'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $tingkat_kelasErr == "" ? "":"* $tingkat_kelasErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>