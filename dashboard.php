<?php
//memasukkan sesi autentikasi kepada pengguna
include("autentikasi.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profilmu</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hallo, <?php echo $_SESSION['username']; ?>!</p>
        <p>Selamat datang di Dashboard Dita.</p>
        <hr>
        <p> Nama Pengguna : <?php echo $_SESSION['username']; ?></p>
        <p> Password : <?php echo $_SESSION['password']; ?></p>
        <p><a href="keluar.php">KELUAR</a></p>
    </div>
</body>
</html>