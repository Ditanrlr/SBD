<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
 <head>
	<title><?= $WEB_CONFIG['app_name'] ?></title>
	<link rel="stylesheet" href="assets1/style.css">
	<script type="text/javascript" src="assets1/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="assets1/bootstrap/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark fixed-top">
	  <a class="navbar-brand" href="#">
	    <img src="<?= $WEB_CONFIG['base_url'] ?>pngegg.png"  alt="">
	    <?= $WEB_CONFIG['app_name'] ?>
	  </a>
	</nav>

	<?php session_start();
	$content = (isset($_GET["page"])) ? $_GET["page"] : ""; ?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<h2 class='text-uppercase'><?= $content ?> Data Guru SMK</h2>
			</div>
			<div class="col-md-10">
			<?php
			if(isset($_SESSION['flash'])){
				echo $_SESSION['flash'];
				unset($_SESSION['flash']);
			}

			switch ($content) {
				case 'add':
					require 'operasii/create1.php';
					break;
				case 'delete':
					require 'operasii/delete1.php';
					break;
				case 'update':
					require 'operasii/update1.php';
					break;
				default:
					require 'operasii/read1.php';
					break;
			} ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="assets1/script.js"></script>
	<script type="text/javascript" src="assets1/bootstrap/bootstrap.min.js"></script>
</body>
</html>