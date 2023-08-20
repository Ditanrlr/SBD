<?php 
$Nama_lengkapErr = $NISNErr = $Tempat_tanggal_lahirErr = $JurusanErr = $nama_orang_tuaErr = $alamatErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['Nama_lengkap']) || !isset($_POST['NISN']) || !isset($_POST['Tempat_tanggal_lahir']) || !isset($_POST['Jurusan']) || !isset($_POST['nama_orang_tua']) || !$_POST['alamat']){
		if($_POST['Nama_lengkap'] == ""){
		$NamaErr = "Nama_lengkap tidak boleh kosong!";
		}
		if($_POST['NISN'] == ""){
			$NISNErr = "NISN tidak boleh kosong!";
		}
		if($_POST['Tempat_tanggal_lahir'] == ""){
			$Tempat_tanggal_lahirErr = "Tempat_tanggal_lahir tidak boleh kosong!";
		}
		if($_POST['Jurusan'] == ""){
			$JurusanErr = "Jurusan tidak boleh kosong!";
		}
		if($_POST['nama_orang_tua'] == ""){
			$nama_orang_tuaErr = "Alamat tidak boleh kosong!";
		}
		if($_POST['alamat'] == ""){
			$alamatErr = "alamat tidak boleh kosong!";
		}
	}else{
		$id_Siswa = $_GET['id_Siswa'];
		$Nama_lengkap = $_POST['Nama_lengkap'];
		$NISN = $_POST['NISN'];
		$Tempat_tanggal_lahir = $_POST['Tempat_tanggal_lahir'];
		$Jurusan = $_POST['Jurusan'];
		$nama_orang_tua = $_POST['nama_orang_tua'];
		$alamat = $_POST['alamat'];

		$query = "INSERT INTO siswa (Nama_lengkap,NISN,Tempat_tanggal_lahir,Jurusan,nama_orang_tua,alamat) VALUES('$Nama_lengkap', '$NISN', '$Tempat_tanggal_lahir', '$Jurusan', '$nama_orang_tua', '$alamat')";
		$query = "UPDATE siswa SET Nama_lengkap='$Nama_lengkap', NISN='$NISN', Tempat_tanggal_lahir='$Tempat_tanggal_lahir', Jurusan='$Jurusan', nama_orang_tua='$nama_orang_tua', alamat='$alamat' WHERE id_Siswa=$id_Siswa";
		if (mysqli_query($connect, $query)) {
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
		}else{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
		}
	}
}

$id_Siswa = $_GET['id_Siswa'];
$query = "SELECT * FROM siswa WHERE id_Siswa = $id_Siswa";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>index.php" class="btn btn-warning mb-3">
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
			<label for="inputNISN">NISN</label>
			<input type="NISN" name="NISN" class="form-control" id="inputNISN" value="<?= $data['NISN'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $NISNErr == "" ? "":"* $NISNErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputTempat_tanggal_lahir">Tempat_tanggal_lahir</label>
			<input type="Tempat_tanggal_lahir" name="Tempat_tanggal_lahir" class="form-control" id="inputTempat_tanggal_lahir" value="<?= $data['Tempat_tanggal_lahir'] ?>" maxlength="30" minlength="3" required>
			<small class="text-danger"><?= $Tempat_tanggal_lahirErr == "" ? "":"* $Tempat_tanggal_lahirErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputJurusan">Jurusan</label>
			<input type="Jurusan" name="Jurusan" class="form-control" id="inputJurusan" value="<?= $data['Jurusan'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $JurusanErr == "" ? "":"* $JurusanErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputnama_orang_tua">nama_orang_tua</label>
			<input type="text" name="nama_orang_tua" class="form-control" id="inputnama_orang_tua" value="<?= $data['nama_orang_tua'] ?>" maxlength="40" required>
			<small class="text-danger"><?= $nama_orang_tuaErr == "" ? "":"* $nama_orang_tuaErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputalamat">alamat</label>
			<input type="alamat" name="alamat" class="form-control" id="inputalamat" value="<?= $data['alamat'] ?>" maxlength="50" required>
			<small class="text-danger"><?= $alamatErr == "" ? "":"* $alamatErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>