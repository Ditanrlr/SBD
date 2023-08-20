<?php 
$guru_id_guruErr = $nama_lengkapErr = $tanggalErr = $keteranganErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['guru_id_guru']) || !isset($_POST['nama_lengkap']) || !isset($_POST['tanggal']) || !$_POST['keterangan']){
		if($_POST['guru_id_guru'] == ""){
		$NamaErr = "guru_id_guru tidak boleh kosong!";
		}
		if($_POST['nama_lengkap'] == ""){
			$nama_lengkapErr = "NIM tidak boleh kosong!";
		}
		if($_POST['tanggal'] == ""){
			$tanggalErr = "tanggal tidak boleh kosong!";
		}
		if($_POST['keterangan'] == ""){
			$keteranganErr = "keterangan tidak boleh kosong!";
		}
	}else{
		$id_absen_guru = $_GET['id_absen_guru'];
		$guru_id_guru = $_POST['guru_id_guru'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$tanggal = $_POST['tanggal'];
		$keterangan = $_POST['keterangan'];

		$query = "INSERT INTO absen_guru (guru_id_guru,nama_lengkap,tanggal,keterangan) VALUES('$guru_id_guru', '$nama_lengkap', '$tanggal', '$keterangan')";
		$query = "UPDATE absen_guru SET guru_id_guru='$guru_id_guru', nama_lengkap='$nama_lengkap', tanggal='$tanggal', keterangan='$keterangan' WHERE id_absen_guru=$id_absen_guru";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_absen_guru = $_GET['id_absen_guru'];
$query = "SELECT * FROM absen_guru WHERE id_absen_guru = $id_absen_guru";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>index8.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputguru_id_guru">guru_id_guru</label>
			<input type="text" name="guru_id_guru" class="form-control" id="inputguru_id_guru" value="<?= $data['guru_id_guru'] ?>" maxlength="40" required autofocus>
			<small class="text-danger"><?= $guru_id_guruErr == "" ? "":"* $guru_id_guruErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputnama_lengkap">nama_lengkap</label>
			<input type="nama_lengkap" name="nama_lengkap" class="form-control" id="inputnama_lengkap" value="<?= $data['nama_lengkap'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $nama_lengkapErr == "" ? "":"* $nama_lengkapErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputtanggal">tanggal</label>
			<input type="tanggal" name="tanggal" class="form-control" id="inputtanggal" value="<?= $data['tanggal'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $tanggalErr == "" ? "":"* $tanggalErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputketerangan">keterangan</label>
			<input type="keterangan" name="keterangan" class="form-control" id="inputketerangan" value="<?= $data['keterangan'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $keteranganErr == "" ? "":"* $keteranganErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>