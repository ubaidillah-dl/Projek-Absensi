<?php
    session_start();

    if (empty($_SESSION['akun'])) {
        include __DIR__ . "../masuk.php";
    }