<?php 
$query = "SELECT * FROM kelas ORDER BY id_kelas DESC";
$result = mysqli_query($connect, $query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<title>Data kelas SMK</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<body>
    <a href="<?= $WEB_CONFIG['base_url'] ?>index9.php?page=add" class="btn btn-primary mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1 m">
	    <path fill="#fff" d="M10,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
	</svg> Add New
</a>
<a href="<?= $WEB_CONFIG['base_url'] ?>index.html" class="btn btn-primary mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1 m">
	<path fill="#fff" d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
	</svg> Home
</a>
<br><br>
<div class="container">
<div class="box_table">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>id_kelas</th>
				<th>Siswa_id_Siswa</th>
				<th>wali_kelas</th>
				<th>tingkat_kelas</th>
				<th>Jurusan</th>
				<th width="20%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php while($data = mysqli_fetch_array($result)) : ?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $data['Siswa_id_Siswa'] ?></td>
				<td><?= $data['wali_kelas'] ?></td>
				<td><?= $data['tingkat_kelas'] ?></td>
				<td><?= $data['jurusan'] ?></td>
				<td>
					<a href="<?= $WEB_CONFIG['base_url'] ?>index9.php?page=update&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-success m-1">
					<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
					    <path fill="#fff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12H20A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4V2M18.78,3C18.61,3 18.43,3.07 18.3,3.2L17.08,4.41L19.58,6.91L20.8,5.7C21.06,5.44 21.06,5 20.8,4.75L19.25,3.2C19.12,3.07 18.95,3 18.78,3M16.37,5.12L9,12.5V15H11.5L18.87,7.62L16.37,5.12Z" />
					</svg> Edit</a>
					<a href="javascript:alertDelete(<?= $data['id_kelas'] ?>);" class="btn btn-danger m1">
					<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
					    <path fill="#fff" d="M20.37,8.91L19.37,10.64L7.24,3.64L8.24,1.91L11.28,3.66L12.64,3.29L16.97,5.79L17.34,7.16L20.37,8.91M6,19V7H11.07L18,11V19A2,2 0 0,1 16,21H8A2,2 0 0,1 6,19Z" />
					</svg> Delete</a>
				</td>
			</tr>
			<?php $no++ ?>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm To Delete Data</h5>
      </div>
      <div class="modal-body">
        <p>Are you sure ? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a type="button" class="btn btn-danger" id="deleteButtonModal">Delete Now!</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<br>	
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
      scrolly: '250px',
        dom: 'Bfrtip',
        buttons: [
            'copy','excel', 'pdf', 'print'
        ]
    } );
} );


</script>

<script type="text/javascript">
function alertDelete(idn) {
	$('#deleteButtonModal').attr('href', '<?= $WEB_CONFIG['base_url'] ?>index9.php?page=delete&id_kelas='+idn);
	$('#deleteModal').modal('show');
}
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>
</html>