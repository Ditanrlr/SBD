<?php 
$mata_pelajaran_id_mata_pelajaranErr = $mata_pelajaranErr = $nama_kurikulumErr = $status_kurikulumErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['mata_pelajaran_id_mata_pelajaran']) || !isset($_POST['mata_pelajaran']) || !isset($_POST['nama_kurikulum']) || !$_POST['status_kurikulum']){
		if($_POST['mata_pelajaran_id_mata_pelajaran'] == ""){
		$NamaErr = "mata_pelajaran_id_mata_pelajaran tidak boleh kosong!";
		}
		if($_POST['mata_pelajaran'] == ""){
			$mata_pelajaranErr = "NIM tidak boleh kosong!";
		}
		if($_POST['nama_kurikulum'] == ""){
			$nama_kurikulumErr = "nama_kurikulum tidak boleh kosong!";
		}
		if($_POST['status_kurikulum'] == ""){
			$status_kurikulumErr = "status_kurikulum tidak boleh kosong!";
		}
	}else{
		$id_kurikulum = $_GET['id_kurikulum'];
		$mata_pelajaran_id_mata_pelajaran = $_POST['mata_pelajaran_id_mata_pelajaran'];
		$mata_pelajaran = $_POST['mata_pelajaran'];
		$nama_kurikulum = $_POST['nama_kurikulum'];
		$status_kurikulum = $_POST['status_kurikulum'];

		$query = "INSERT INTO kurikulum (mata_pelajaran_id_mata_pelajaran,mata_pelajaran,nama_kurikulum,status_kurikulum) VALUES('$mata_pelajaran_id_mata_pelajaran', '$mata_pelajaran', '$nama_kurikulum', '$status_kurikulum')";
		$query = "UPDATE kurikulum SET mata_pelajaran_id_mata_pelajaran='$mata_pelajaran_id_mata_pelajaran', mata_pelajaran='$mata_pelajaran', nama_kurikulum='$nama_kurikulum', status_kurikulum='$status_kurikulum' WHERE id_kurikulum=$id_kurikulum";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_kurikulum = $_GET['id_kurikulum'];
$query = "SELECT * FROM kurikulum WHERE id_kurikulum = $id_kurikulum";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>indexk.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputmata_pelajaran_id_mata_pelajaran">mata_pelajaran_id_mata_pelajaran</label>
			<input type="text" name="mata_pelajaran_id_mata_pelajaran" class="form-control" id="inputmata_pelajaran_id_mata_pelajaran" value="<?= $data['mata_pelajaran_id_mata_pelajaran'] ?>" maxlength="40" required autofocus>
			<small class="text-danger"><?= $mata_pelajaran_id_mata_pelajaranErr == "" ? "":"* $mata_pelajaran_id_mata_pelajaranErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputmata_pelajaran">mata_pelajaran</label>
			<input type="mata_pelajaran" name="mata_pelajaran" class="form-control" id="inputmata_pelajaran" value="<?= $data['mata_pelajaran'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $mata_pelajaranErr == "" ? "":"* $mata_pelajaranErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputnama_kurikulum">nama_kurikulum</label>
			<input type="nama_kurikulum" name="nama_kurikulum" class="form-control" id="inputnama_kurikulum" value="<?= $data['nama_kurikulum'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $nama_kurikulumErr == "" ? "":"* $nama_kurikulumErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputstatus_kurikulum">status_kurikulum</label>
			<input type="status_kurikulum" name="status_kurikulum" class="form-control" id="inputstatus_kurikulum" value="<?= $data['status_kurikulum'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $status_kurikulumErr == "" ? "":"* $status_kurikulumErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>