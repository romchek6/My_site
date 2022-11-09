<?php
    session_start();
    include_once 'path.php';
    unset($_SESSION['id_user']);
    unset($_SESSION['admin']);
    unset($_SESSION['user_login']);
    unset($_SESSION['user_email']);
    unset($_SESSION['date_created']);
    header('location:' . INDEX_URL);
