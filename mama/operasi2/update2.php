<?php 
$nama_lengkapErr = $NIPErr = $tempat_tanggal_lahirErr = $alamatErr = $AgamaErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['nama_lengkap']) || !isset($_POST['NIP']) || !isset($_POST['tempat_tanggal_lahir']) || !isset($_POST['alamat']) || !$_POST['Agama']){
		if($_POST['nama_lengkap'] == ""){
		$NamaErr = "nama_lengkap tidak boleh kosong!";
		}
		if($_POST['NIP'] == ""){
			$NIPErr = "NIM tidak boleh kosong!";
		}
		if($_POST['tempat_tanggal_lahir'] == ""){
			$tempat_tanggal_lahirErr = "tempat_tanggal_lahir tidak boleh kosong!";
		}
		if($_POST['alamat'] == ""){
			$alamatErr = "alamat tidak boleh kosong!";
		}
		if($_POST['Agama'] == ""){
			$AgamaErr = "alamat tidak boleh kosong!";
		}
	}else{
		$id_kepala_sekolah = $_GET['id_kepala_sekolah'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$NIP = $_POST['NIP'];
		$tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir'];
		$alamat = $_POST['alamat'];
		$Agama = $_POST['Agama'];

		$query = "INSERT INTO kepala_sekolah (nama_lengkap,NIP,tempat_tanggal_lahir,alamat,Agama) VALUES('$nama_lengkap', '$NIP', '$tempat_tanggal_lahir', '$alamat', '$Agama')";
		$query = "UPDATE kepala_sekolah SET nama_lengkap='$nama_lengkap', NIP='$NIP',tempat_tanggal_lahir='$tempat_tanggal_lahir', alamat='$alamat', Agama='$Agama' WHERE id_kepala_sekolah=$id_kepala_sekolah";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_kepala_sekolah = $_GET['id_kepala_sekolah'];
$query = "SELECT * FROM kepala_sekolah WHERE id_kepala_sekolah = $id_kepala_sekolah";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>index2.php" class="btn btn-warning mb-3">
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
			<label for="inputtempat_tanggal_lahir">tempat_tanggal_lahir</label>
			<input type="tempat_tanggal_lahir" name="tempat_tanggal_lahir" class="form-control" id="inputtempat_tanggal_lahir" value="<?= $data['tempat_tanggal_lahir'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $tempat_tanggal_lahirErr == "" ? "":"* $tempat_tanggal_lahirErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputalamat">alamat</label>
			<input type="alamat" name="alamat" class="form-control" id="inputalamat" value="<?= $data['alamat'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $alamatErr == "" ? "":"* $alamatErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputAgama">Agama</label>
			<input type="text" name="Agama" class="form-control" id="inputAgama" value="<?= $data['Agama'] ?>" maxlength="40" required>
			<small class="text-danger"><?= $AgamaErr == "" ? "":"* $AgamaErr " ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>