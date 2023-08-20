<?php
    $con = mysqli_connect("localhost","root","","LoginBase");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Gagal Menghubungkan ke Database!: " . mysqli_connect_error();
    }
?>