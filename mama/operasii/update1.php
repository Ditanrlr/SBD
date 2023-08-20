<?php 
$nama_lengkapErr = $NIPErr = $alamatErr = $tempat_tanggal_lahirErr = $mata_pelajaranErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['nama_lengkap']) || !isset($_POST['NIP']) || !isset($_POST['alamat']) || !isset($_POST['tempat_tanggal_lahir']) || !$_POST['mata_pelajaran']){
		if($_POST['nama_lengkap'] == ""){
		$NamaErr = "nama_lengkap tidak boleh kosong!";
		}
		if($_POST['NIP'] == ""){
			$NIPErr = "NIM tidak boleh kosong!";
		}
		if($_POST['alamat'] == ""){
			$alamatErr = "alamat tidak boleh kosong!";
		}
		if($_POST['tempat_tanggal_lahir'] == ""){
			$tempat_tanggal_lahirErr = "tempat_tanggal_lahir tidak boleh kosong!";
		}
		if($_POST['mata_pelajaran'] == ""){
			$mata_pelajaranErr = "Alamat tidak boleh kosong!";
		}
	}else{
		$id_guru = $_GET['id_guru'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$NIP = $_POST['NIP'];
		$alamat = $_POST['alamat'];
		$tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir'];
		$mata_pelajaran = $_POST['mata_pelajaran'];

		$query = "INSERT INTO guru (nama_lengkap,NIP,alamat,tempat_tanggal_lahir,mata_pelajaran) VALUES('$nama_lengkap', '$NIP', '$alamat', '$tempat_tanggal_lahir', '$mata_pelajaran')";
		$query = "UPDATE guru SET nama_lengkap='$nama_lengkap', NIP='$NIP', alamat='$alamat', tempat_tanggal_lahir='$tempat_tanggal_lahir', mata_pelajaran='$mata_pelajaran' WHERE id_guru=$id_guru";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_guru = $_GET['id_guru'];
$query = "SELECT * FROM guru WHERE id_guru = $id_guru";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>indexx.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputnama_lengkap">nama_lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" id="inputnama_lengkap" value="<?= $data['nama_lengkap'] ?>" maxlength="40" required autofocus>
			<small class="text-danger"><?= $nama_lengkapErr == "" ? "":"* $nama_lengkapErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputNIP">NIP</label>
			<input type="NIP" name="NIP" class="form-control" id="inputNIP" value="<?= $data['NIP'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $NIPErr == "" ? "":"* $NIPErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputalamat">alamat</label>
			<input type="alamat" name="alamat" class="form-control" id="inputalamat" value="<?= $data['alamat'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $alamatErr == "" ? "":"* $alamatErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputtempat_tanggal_lahir">tempat_tanggal_lahir</label>
			<input type="tempat_tanggal_lahir" name="tempat_tanggal_lahir" class="form-control" id="inputtempat_tanggal_lahir" value="<?= $data['tempat_tanggal_lahir'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $tempat_tanggal_lahirErr == "" ? "":"* $tempat_tanggal_lahirErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputmata_pelajaran">mata_pelajaran</label>
			<input type="text" name="mata_pelajaran" class="form-control" id="inputmata_pelajaran" value="<?= $data['mata_pelajaran'] ?>" maxlength="40" required>
			<small class="text-danger"><?= $mata_pelajaranErr == "" ? "":"* $mata_pelajaranErr " ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>