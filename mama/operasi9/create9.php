<?php 
$Siswa_id_SiswaErr = $wali_kelasErr = $tingkat_kelasErr = $jurusanErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['Siswa_id_Siswa']) || !isset($_POST['wali_kelas']) || !isset($_POST['tingkat_kelas']) || !$_POST['jurusan']){
		if($_POST['Siswa_id_Siswa'] == ""){
		$Siswa_id_SiswaErr = "Nama tidak boleh kosong!";
		}
		if($_POST['wali_kelas'] == ""){
			$wali_kelasErr = "wali_kelas tidak boleh kosong!";
		}
		if($_POST['tingkat_kelas'] == ""){
			$tingkat_kelasErr = "TTL tidak boleh kosong!";
		}
		if($_POST['jurusan'] == ""){
			$jurusanErr = "jurusan tidak boleh kosong!";
		}
	}else{
		$Siswa_id_Siswa = $_POST['Siswa_id_Siswa'];
		$wali_kelas = $_POST['wali_kelas'];
		$tingkat_kelas= $_POST['tingkat_kelas'];
		$jurusan = $_POST['jurusan'];

		$query = "INSERT INTO kelas(Siswa_id_Siswa,wali_kelas,tingkat_kelas,jurusan) VALUES('$Siswa_id_Siswa', '$wali_kelas', '$tingkat_kelas', '$jurusan')";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan</div>";
		}
	}
}
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>index9.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<a href="<?= $WEB_CONFIG['base_url'] ?>index.html" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
	<path fill="#000000" d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
	</svg> Home
</a>

<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputSiswa_id_Siswa">Siswa_id_Siswa</label>
			<input type="text" name="Siswa_id_Siswa" class="form-control" id="inputSiswa_id_Siswa" maxlength="40" required autofocus>
			<small class="text-danger"><?= $Siswa_id_SiswaErr == "" ? "":"* $Siswa_id_SiswaErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputwali_kelas">wali_kelas</label>
			<input type="wali_kelas" name="wali_kelas" class="form-control" id="inputwali_kelas" maxlength="30" required>
			<small class="text-danger"><?= $wali_kelasErr == "" ? "":"* $wali_kelasErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputtingkat_kelas">tingkat_kelas</label>
			<input type="tingkat_kelas" name="tingkat_kelas" class="form-control" id="inputtingkat_kelas" maxlength="30" minlength="2" required>
			<small class="text-danger"><?= $tingkat_kelasErr == "" ? "":"* $tingkat_kelasErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputjurusan">jurusan</label>
			<input type="jurusan" name="jurusan" class="form-control" id="inputjurusan" maxlength="50" required>
			<small class="text-danger"><?= $jurusanErr == "" ? "":"* $jurusanErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
	</form>
</div>