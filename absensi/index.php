<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (empty($_SESSION['akun'])) {
        include __DIR__ . "./masuk.php";
    }