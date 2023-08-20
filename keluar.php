<?php
    session_start();
    if(session_destroy()) {
        // kembali ke bagian login tadi
        header("Location: login.php");
    }
?>