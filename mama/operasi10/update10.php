<?php 
$Nama_siswaErr = $mata_pelajaranErr = $SemesterErr = $Nama_jurusanErr = $bobot_nilaiErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['Nama_siswa']) || !isset($_POST['mata_pelajaran']) || !isset($_POST['Semester']) || !isset($_POST['Nama_jurusan']) || !$_POST['bobot_nilai']){
		if($_POST['Nama_siswa'] == ""){
		$NamaErr = "Nama_siswa tidak boleh kosong!";
		}
		if($_POST['mata_pelajaran'] == ""){
			$mata_pelajaranErr = "NIM tidak boleh kosong!";
		}
		if($_POST['Semester'] == ""){
			$SemesterErr = "Semester tidak boleh kosong!";
		}
		if($_POST['Nama_jurusan'] == ""){
			$Nama_jurusanErr = "Nama_jurusan tidak boleh kosong!";
		}
		if($_POST['bobot_nilai'] == ""){
			$bobot_nilaiErr = "Semester tidak boleh kosong!";
		}
	}else{
		$id_nilai = $_GET['id_nilai'];
		$Nama_siswa = $_POST['Nama_siswa'];
		$mata_pelajaran = $_POST['mata_pelajaran'];
		$Semester = $_POST['Semester'];
		$Nama_jurusan = $_POST['Nama_jurusan'];
		$bobot_nilai = $_POST['bobot_nilai'];

		$query = "INSERT INTO nilai (Nama_siswa,mata_pelajaran,Semester,Nama_jurusan,bobot_nilai) VALUES('$Nama_siswa', '$mata_pelajaran', '$Semester', '$Nama_jurusan', '$bobot_nilai')";
		$query = "UPDATE nilai SET Nama_siswa='$Nama_siswa', mata_pelajaran='$mata_pelajaran', Semester='$Semester', Nama_jurusan='$Nama_jurusan', bobot_nilai='$bobot_nilai' WHERE id_nilai=$id_nilai";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_nilai = $_GET['id_nilai'];
$query = "SELECT * FROM nilai WHERE id_nilai = $id_nilai";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>index10.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputNama_siswa">Nama_siswa</label>
			<input type="text" name="Nama_siswa" class="form-control" id="inputNama_siswa" value="<?= $data['Nama_siswa'] ?>" maxlength="40" required autofocus>
			<small class="text-danger"><?= $Nama_siswaErr == "" ? "":"* $Nama_siswaErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputmata_pelajaran">mata_pelajaran</label>
			<input type="mata_pelajaran" name="mata_pelajaran" class="form-control" id="inputmata_pelajaran" value="<?= $data['mata_pelajaran'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $mata_pelajaranErr == "" ? "":"* $mata_pelajaranErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputSemester">Semester</label>
			<input type="Semester" name="Semester" class="form-control" id="inputSemester" value="<?= $data['Semester'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $SemesterErr == "" ? "":"* $SemesterErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputNama_jurusan">Nama_jurusan</label>
			<input type="Nama_jurusan" name="Nama_jurusan" class="form-control" id="inputNama_jurusan" value="<?= $data['Nama_jurusan'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $Nama_jurusanErr == "" ? "":"* $Nama_jurusanErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputbobot_nilai">bobot_nilai</label>
			<input type="text" name="bobot_nilai" class="form-control" id="inputbobot_nilai" value="<?= $data['bobot_nilai'] ?>" maxlength="40" required>
			<small class="text-danger"><?= $bobot_nilaiErr == "" ? "":"* $bobot_nilaiErr " ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>