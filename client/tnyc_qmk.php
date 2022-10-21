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
if ($errors != '') {
    header("location: qmk.php?errors=$errors");
} else {
    $sql = "SELECT * FROM client WHERE user='$user'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $loginUser = $statement->fetch();
    if ($loginUser == false) {
        $errors = 'Người dùng không tồn tại!';
        header("location: qmk.php?errors=$errors");
    }
    else if($loginUser == true) {
        session_start();
        $password_hashed = password_hash($loginUser['password'],PASSWORD_BCRYPT);
        $errors = 'Mật khẩu của bạn là:'.$password_hashed;
        header("location:qmk.php?errors=$errors");
    }
}