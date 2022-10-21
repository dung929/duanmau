<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: login.php?errors=$errors");
}
session_start();
unset($_SESSION['user']);
header('location: login.php');