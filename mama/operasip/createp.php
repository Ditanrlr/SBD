<?php 
$nama_mata_pelajaranErr = $guru_pengajarErr = $tingkat_kelasErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['nama_mata_pelajaran']) || !isset($_POST['guru_pengajar']) || !$_POST['tingkat_kelas']){
		if($_POST['nama_mata_pelajaran'] == ""){
		$nama_mata_pelajaranErr = "Nama tidak boleh kosong!";
		}
		if($_POST['guru_pengajar'] == ""){
			$guru_pengajarErr = "guru_pengajar tidak boleh kosong!";
		}
		if($_POST['tingkat_kelas'] == ""){
			$tingkat_kelasErr = "tingkat kelas tidak boleh kosong!";
		}
	}else{
		$nama_mata_pelajaran = $_POST['nama_mata_pelajaran'];
		$guru_pengajar = $_POST['guru_pengajar'];
		$tingkat_kelas= $_POST['tingkat_kelas'];

		$query = "INSERT INTO mata_pelajaran (nama_mata_pelajaran,guru_pengajar,tingkat_kelas) VALUES('$nama_mata_pelajaran', '$guru_pengajar', '$tingkat_kelas')";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan</div>";
		}
	}
}
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>indexp.php" class="btn btn-warning mb-3">
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
			<label for="inputnama_mata_pelajaran">nama_mata_pelajaran</label>
			<input type="nama_mata_pelajaran" name="nama_mata_pelajaran" class="form-control" id="inputnama_mata_pelajaran" maxlength="40" required autofocus>
			<small class="text-danger"><?= $nama_mata_pelajaranErr == "" ? "":"* $nama_mata_pelajaranErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputguru_pengajar">guru_pengajar</label>
			<input type="guru_pengajar" name="guru_pengajar" class="form-control" id="inputguru_pengajar" maxlength="30" required>
			<small class="text-danger"><?= $guru_pengajarErr == "" ? "":"* $guru_pengajarErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputtingkat_kelas">tingkat_kelas</label>
			<input type="tingkat_kelas" name="tingkat_kelas" class="form-control" id="inputtingkat_kelas" maxlength="30" minlength="2" required>
			<small class="text-danger"><?= $tingkat_kelasErr == "" ? "":"* $tingkat_kelasErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
	</form>
</div>