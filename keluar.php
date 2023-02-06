<?php 
    // Start sesi
    session_start();

    // Hapus sesi
    session_destroy();

    //Pindah halaman masuk
    header("location:masuk.php");
?>