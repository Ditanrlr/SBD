<?php 
$Nama_lengkapErr = $JabatanErr = $alamatErr = $tempat_tanggal_lahirErr = $AgamaErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['Nama_lengkap']) || !isset($_POST['Jabatan']) || !isset($_POST['alamat']) || !isset($_POST['tempat_tanggal_lahir']) || !$_POST['Agama']){
		if($_POST['Nama_lengkap'] == ""){
		$NamaErr = "Nama_lengkap tidak boleh kosong!";
		}
		if($_POST['Jabatan'] == ""){
			$JabatanErr = "NIM tidak boleh kosong!";
		}
		if($_POST['alamat'] == ""){
			$alamatErr = "alamat tidak boleh kosong!";
		}
		if($_POST['tempat_tanggal_lahir'] == ""){
			$tempat_tanggal_lahirErr = "tempat_tanggal_lahir tidak boleh kosong!";
		}
		if($_POST['Agama'] == ""){
			$AgamaErr = "Alamat tidak boleh kosong!";
		}
	}else{
		$id_Staff = $_GET['id_Staff'];
		$Nama_lengkap = $_POST['Nama_lengkap'];
		$Jabatan = $_POST['Jabatan'];
		$alamat = $_POST['alamat'];
		$tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir'];
		$Agama = $_POST['Agama'];

		$query = "INSERT INTO Staff (Nama_lengkap,Jabatan,alamat,tempat_tanggal_lahir,Agama) VALUES('$Nama_lengkap', '$Jabatan', '$alamat', '$tempat_tanggal_lahir', '$Agama')";
		$query = "UPDATE Staff SET Nama_lengkap='$Nama_lengkap', Jabatan='$Jabatan', alamat='$alamat', tempat_tanggal_lahir='$tempat_tanggal_lahir', Agama='$Agama' WHERE id_Staff=$id_Staff";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_Staff = $_GET['id_Staff'];
$query = "SELECT * FROM Staff WHERE id_Staff = $id_Staff";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>index3.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
    	<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputNama_lengkap">Nama_lengkap</label>
			<input type="text" name="Nama_lengkap" class="form-control" id="inputNama_lengkap" value="<?= $data['Nama_lengkap'] ?>" maxlength="40" required autofocus>
			<small class="text-danger"><?= $Nama_lengkapErr == "" ? "":"* $Nama_lengkapErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputJabatan">Jabatan</label>
			<input type="Jabatan" name="Jabatan" class="form-control" id="inputJabatan" value="<?= $data['Jabatan'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $JabatanErr == "" ? "":"* $JabatanErr" ?></small>
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
			<label for="inputAgama">Agama</label>
			<input type="text" name="Agama" class="form-control" id="inputAgama" value="<?= $data['Agama'] ?>" maxlength="40" required>
			<small class="text-danger"><?= $AgamaErr == "" ? "":"* $AgamaErr " ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>