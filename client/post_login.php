<?php
session_start();
if (!isset($_SESSION['users'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location:login.php?errors=$errors");
}
require_once('../db.php');
$user = $_POST['user'];
$password = $_POST['password'];
$errors = '';
if ($user == '') {
    $errors = $errors . 'User không được để trống!.';
}
if ($password == '') {
    $errors .= 'Password không được để trống!.';
}
if ($errors != '') {
    header("location: login.php?errors=$errors");
} else {
    $sql = "SELECT * FROM client WHERE user='$user'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $loginUser = $statement->fetch();
    if ($loginUser == false) {
        $errors = 'Người dùng không tồn tại!';
        
        header("location: login.php?errors=$errors");
    } else if (password_verify($password, $loginUser['password']) ==false) {
        $errors = 'Mật khẩu không chính xác!';
        header("location: login.php?errors=$errors");
    } else {
        session_start();
        $_SESSION['users'] = $loginUser;
        header("location:index.php");
    }
}