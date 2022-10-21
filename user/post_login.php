<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: login.php?errors=$errors");
}
require_once('../db.php');
$email = $_POST['email'];
$password = $_POST['password'];
$e_errors = '';
$p_errors = '';
if ($email == '') {
    $e_errors .= 'User không được để trống!.';
}
if ($password == '') {
    $p_errors .= 'Password không được để trống!.';
}
if (!empty($e_errors) || !empty($p_errors)) {
    header("location: login.php?e_errors=$errors&p_errors=$p_errors");
} else {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $loginUser = $statement->fetch();
    if ($loginUser == false) {
        $e_errors = 'Người dùng không tồn tại!';
        header("location: login.php?e_errors=$e_errors");
    } else if (password_verify($password, $loginUser['password']) == false) {
        $p_errors = 'Mật khẩu không chính xác!';
        header("location: login.php?p_errors=$p_errors");
    } else {
        session_start();
        $_SESSION['user'] = $loginUser;
        header("location:login.php");
    }
}
