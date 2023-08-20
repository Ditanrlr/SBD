<?php 

$delete_id = $_GET['id_orang_tua'];
$query = "DELETE FROM orang_tua WHERE id_orang_tua='$delete_id'";

if(mysqli_query($connect, $query)){
	$_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data telah terhapus</div>";
}else{
	$_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal terhapus</div>";
}
echo "<script>window.location='".$WEB_CONFIG["base_url"]."';</script>";