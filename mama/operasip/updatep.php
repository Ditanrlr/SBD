<?php 
$nama_mata_pelajaranErr = $guru_pengajarErr = $tingkat_kelasErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['nama_mata_pelajaran']) || !isset($_POST['guru_pengajar']) || !$_POST['tingkat_kelas']){
		if($_POST['nama_mata_pelajaran'] == ""){
		$NamaErr = "nama_mata_pelajaran tidak boleh kosong!";
		}
		if($_POST['guru_pengajar'] == ""){
			$guru_pengajarErr = "guru pengajar tidak boleh kosong!";
		}
		if($_POST['tingkat_kelas'] == ""){
			$tingkat_kelasErr = "tingkat_kelas tidak boleh kosong!";
		}
	}else{
		$id_mata_pelajaran = $_GET['id_mata_pelajaran'];
		$nama_mata_pelajaran = $_POST['nama_mata_pelajaran'];
		$guru_pengajar = $_POST['guru_pengajar'];
		$tingkat_kelas = $_POST['tingkat_kelas'];

		$query = "INSERT INTO mata_pelajaran (nama_mata_pelajaran,guru_pengajar,tingkat_kelas) VALUES('$nama_mata_pelajaran', '$guru_pengajar', '$tingkat_kelas')";
		$query = "UPDATE mata_pelajaran SET nama_mata_pelajaran='$nama_mata_pelajaran', guru_pengajar='$guru_pengajar', tingkat_kelas='$tingkat_kelas' WHERE id_mata_pelajaran=$id_mata_pelajaran";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_mata_pelajaran = $_GET['id_mata_pelajaran'];
$query = "SELECT * FROM mata_pelajaran WHERE id_mata_pelajaran = $id_mata_pelajaran";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>indexp.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputnama_mata_pelajaran">nama_mata_pelajaran</label>
			<input type="text" name="nama_mata_pelajaran" class="form-control" id="inputnama_mata_pelajaran" value="<?= $data['nama_mata_pelajaran'] ?>" maxlength="40" required autofocus>
			<small class="text-danger"><?= $nama_mata_pelajaranErr == "" ? "":"* $nama_mata_pelajaranErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputguru_pengajar">guru_pengajar</label>
			<input type="guru_pengajar" name="guru_pengajar" class="form-control" id="inputguru_pengajar" value="<?= $data['guru_pengajar'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $guru_pengajarErr == "" ? "":"* $guru_pengajarErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputtingkat_kelas">tingkat_kelas</label>
			<input type="tingkat_kelas" name="tingkat_kelas" class="form-control" id="inputtingkat_kelas" value="<?= $data['tingkat_kelas'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $tingkat_kelasErr == "" ? "":"* $tingkat_kelasErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>